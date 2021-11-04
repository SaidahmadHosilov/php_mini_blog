<?php

class PostController
{
    public function actionCreate()
    {
        $title = '';
        $text = '';
        $mainText = '';
        $ctgName = '';
        $tagName = '';
        $image = '';

        if(isset($_POST['submit'])){

            $title = $_POST['title'] ?? '';
            $text = $_POST['text'] ?? '';
            $mainText = base64_encode($_POST['post-content']) ?? '';
            $ctgName = $_POST['ctg_name'] ?? '';
            $tagName = $_POST['tag_name'] ?? '';
            $image = $_FILES['image']['name'] == '' ? 'no-post.png' : $_FILES['image']['name'];

            $errors = false;

            if(!Post::checkTitle($title)){
                $errors['title'] = 'Sarlavha 4 ta belgidan kam bo\'lmasin';
            }
            if(!Post::checkText($text)){
                $errors['text'] = 'Bo\'sh bo\'lishi mumkin emas!';
            }
            if(!Post::checkMainText($mainText)){
                $errors['mainText'] = 'Iltimos, postni to\'liqroq kiriting!';
            }
            if(!Post::checkCtgName($ctgName)){
                $errors['ctg_name'] = 'Mosini tanlang!';
            }
            if(!Post::checkTagName($tagName)){
                $errors['tag_name'] = 'Mosini tanlang!';
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
                }

                // Check if $uploadOk is set to 0 by an error
                if (!empty($errors["image"])) {
                    var_dump($errors["image"]);
                    echo "Kechirasiz, rasm yuklanmadi, qaytadan urinib ko'ring!";
                    // if everything is ok, try to upload file
                } else {
                    if(empty($errors['image'])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    }
                }
            }
            //image upload finish

            if($errors == false){
                $date = date('Y-m-d H:i:s', time());
                if(Post::insertDataPost($title, $text, $mainText, $image, $date, $tagName, $ctgName, $_SESSION['user'])){
                    header("Location: /");
                } else {
                    echo "Xatolik yuz berdi!";
                    exit;
                }
            }
        }

        require_once( ROOT . '/views/post/create.php' );

        return true;
    }
}