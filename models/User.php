<?php

class User
{
    public static function register( $name, $email, $password, $image, $bio )
    {
        $db = Db::getConnection();
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, email, password, image, bio)
                VALUES (:name, :email, :password, :image, :bio)"; 

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':bio', $bio, PDO::PARAM_STR);
        $result->execute();
        
        $data = $db->query('SELECT id FROM users WHERE email="'.$email.'"');
        $data->bindParam(':email', $email, PDO::PARAM_STR);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        $row = $data->fetch();

        return $row['id'];
    }

    public static function storeSocial($array, $user_id) // [1] => 'tele', [3] => 'face'
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO user_socials(social_id, user_id, link) 
                VALUES(:social_id, :user_id, :link)";
        $stmt = $db->prepare($sql);

        foreach ($array as $social_id => $link) {
            $stmt->bindParam(':social_id',  $social_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id',  $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':link', $link, PDO::PARAM_STR);
            $stmt->execute();
        }

        return true;
    }

    public static function checkName($name)
    {
        if(strlen($name) > 3){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var( $email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if( strlen($password) >= 6 ){
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = $db->query("SELECT * FROM users");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetchAll();

        for( $i = 0; $i < count($result); $i ++ ){
            if( $result[$i]['email'] == $email ){
                return true;
            }
        }
        return false;
        exit;
    }

    public static function isExistsProfile($password, $email) // asl password 159753
    {
        $db = Db::getConnection();

        $sql = $db->query("SELECT id, email, password FROM users");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetchAll();
        $pass = '';

        for ( $i = 0;  $i < count($result) ;  $i ++ ) {
            $pass = $result[$i]['password'];

            if(password_verify($password, $pass) && $result[$i]['email'] == $email) {
                return $result[$i]['id'];
            }  
        }

        return false;
    }

    public static function getUser($id)
    {
        $db = Db::getConnection();

        $sql = $db->query("SELECT * FROM users WHERE id = $id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        
        return $result;
    }


    public static function getTeamUsers()
    {
        $db = Db::getConnection();
        $socials = array();

        $sql = "SELECT * FROM users WHERE role = 'admin' OR role = 'operator'";
        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $users = $result->fetchAll();
        $i = 0;

        foreach ($users as $user){
            $stmt = $db->prepare("SELECT * FROM user_socials
                                  INNER JOIN socials 
                                  ON user_socials.social_id = socials.id 
                                  WHERE user_id = :user_id");
            $stmt->bindParam('user_id', $user['id'], PDO::PARAM_STR);
            $stmt->execute();
            $socials = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($socials)){
                $user['socials'] = $socials;
                $users[$i] = $user;
            }
            $i++;
        }
        
        return $users;       
    }

    public static function getUserPosts($user_id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts WHERE user_id = $user_id";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    public static function updateUserData($user_id, $name, $image, $bio)
    {
        $db = Db::getConnection();
        $sql = "UPDATE users SET name = '$name', image = '$image', bio = '$bio' WHERE id = $user_id";
        $result = $db->query($sql);

        return true;
    }

    public static function deleteAccount($user_id)
    {
        $user_id = intval($user_id);
        $db = Db::getConnection();
        $photos = $db->query("SELECT image FROM posts WHERE user_id = $user_id");
        $photos->setFetchMode(PDO::FETCH_ASSOC);
        $photos = $photos->fetchAll();

        foreach($photos as $photo) {
            if( $photo['image'] != 'no-post.png' ) {
                unlink('upload/profile_image/' . $photo['image']);
            }
        }

        $userImage = $db->query("SELECT image FROM users WHERE id = $user_id");
        $userImage->setFetchMode(PDO::FETCH_ASSOC);
        $userImage = $userImage->fetch();

        if( $userImage['image'] != 'no-image.png' ) {
            unlink('upload/profile_image/' . $userImage['image']);
        }

        $db->query("DELETE FROM comments WHERE user_id = $user_id");
        $db->query("DELETE FROM posts WHERE user_id = $user_id");
        $db->query("DELETE FROM users WHERE id = $user_id");
        
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        return true;
    }

    public static function isExistLinks($user_id)
    {
        $db = Db::getConnection();
        $arr = [];
        
        $sql = "SELECT * FROM user_socials WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam('user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $i = 0;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[$i]['id'] = $row['id'];
            $arr[$i]['social_id'] = $row['social_id'];
            $arr[$i]['link'] = $row['link'];
            $i++;
        }

        return $arr;
    }

    public static function addOrUpdateLinks($user_id, $links)// [1] => telegeram, [2] => facebook 
    {
        $db = Db::getConnection();
        $sql = "SELECT social_id FROM user_socials WHERE user_id = :user_id";
        $statement = $db->prepare($sql);
        $statement->bindParam('user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $social_ids = [];
        $i = 0;

        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $social_ids[$i] = $row['social_id'];
            $i++;
        }

        foreach ($links as $key => $value) {
            if(in_array($key, $social_ids)){
                $stmt = $db->prepare("UPDATE user_socials 
                              SET link = :link 
                              WHERE user_id = :user_id 
                              AND social_id = :social_id");
                $stmt->bindParam(':link', $value, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':social_id', $key, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                $stmt2 = $db->prepare("INSERT INTO user_socials(social_id, user_id, link) 
                                     VALUES( :social_id, :user_id, :link)"); 
                $stmt2->bindParam(':link', $value, PDO::PARAM_STR);
                $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt2->bindParam(':social_id', $key, PDO::PARAM_INT);
                $stmt2->execute();
            } 
        }

        return true;
    }
}