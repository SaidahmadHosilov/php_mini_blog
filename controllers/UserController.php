<?php

class UserController
{
    public function actionRegister()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }        

        $name = '';
        $email = '';
        $password = '';
        $result = false;
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $image = $_FILES['image']['name'] == '' ? 'no-image.png' : $_FILES['image']['name'];

            $errors = false;

            if(!User::checkName($name)){
                $errors['name'] = 'Ism 4 ta yoki undan ko\'p belgiga ega bo\'lishi kerak';
            }

            if(!User::checkEmail($email)){
                $errors['email'] = "Email to'g'riligini tekshiring! ";
            }

            if(!User::checkPassword($password)){
                $errors['password'] = "Parol 6 ta belgidan yoki undan ko'p belgidan tashkil topishi kerak!";
            }

            if(User::checkEmailExists($email)){
                $errors['emailExists'] = "Kechirasiz, bunday Email mavjud ";
            }

            // image upload
            $target_dir = "upload/profile_image/";
            $target_file = $target_dir . basename($image);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if( $_FILES['image']['name'] != '' ){
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"]) && empty($_FILES["image"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                        $errors["image"] = "Bu rasm - " . $check["mime"] . ".";
                    } else {
                        $errors["image"] = "Bu rasm emas!";
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    $errors["image"] = "Kechirasiz, bunday rasm mavjud!";
                }

                // Check file size
                if ($_FILES["image"]["size"] > 5000000) {
                    $errors["image"] = "Kechirasiz, sizning rasmingiz katta hajmli!";
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $errors["image"] = "Kechirasiz, faqat JPG, JPEG, PNG & GIF tiplarni ishlatish mumkin.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if (!empty($errors["image"])) {
                    echo "Kechirasiz, rasm yuklanmadi, qaytadan urinib ko'ring!";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "Was done!";
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry!";
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            
            //image upload finish

            if($errors == false){
                
                $_SESSION['user'] = User::register( $name, $email, $password, $image );
                $_SESSION['name'] = $name;
                // $_SESSION['products'] = [];
                header("Location: /");
            }
        }
        require_once( ROOT . "/views/user/register.php");

        return true;
    }

    public function actionLogin()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        } 
        
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        
        if(isset($_POST['submit'])){

            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(empty($email)){
                $errors['email'] = 'Email bo\'sh bo\'lishi mumkin emas';
            }

            if(empty($password)){
                $errors['password'] = 'Parol bo\'sh bo\'lishi mumkin emas';
            }

            $userId = User::isExistsProfile( $password, $email );

            if( !$userId == false && empty($errors) ){
                $_SESSION['user'] = $userId; 
                // $_SESSION['products'] = Cart::getProductCartById($_SESSION['user']);
                header("Location: /");
            } else {
                $errors['isNotExist'] = 'Login Yoki Parol Xato';
            }
        }

        require_once( ROOT . "/views/user/login.php");

        return true;
    }

    public function actionLogout()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        header("Location: /");
    }
}