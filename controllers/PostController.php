<?php

class PostController
{
    public function actionSearch()
    {
        $title = $_POST['post_title'] ?? '';

        $result = Post::searchAjax($title);

        if (empty($result)) {
            $result = ['There is no result'];
        }

        echo json_encode($result);
        exit;
    }

    public function actionDeletePost($post_id)
    {
        $db = Db::getConnection();
        $stmt = $db->query("SELECT user_id FROM posts WHERE id = $post_id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $userId = $stmt->fetch();

        if (Post::deletePost($post_id)) {
            header("Location: /user/profile/view/" . $userId['user_id']);
        } else {
            echo "404 not found";
            exit;
        }
    }

    public function actionEditPost($post_id)
    {
        $post = Post::getCurrentPost($post_id);

        if (isset($_POST['submit'])) {
            $errors = false;

            $title = $_POST['title'] ?? '';
            $text = $_POST['text'] ?? '';
            $main_text = base64_encode($_POST['post-content']) ?? '';
            $ctg_name = $_POST['ctg_name'] ?? '';
            $tag_name = $_POST['tag_name'] ?? '';

            if (!Post::checkTitle($title)) {
                $errors['title'] = 'Sarlavha 4 ta belgidan kam bo\'lmasin';
            }
            if (!Post::checkText($text)) {
                $errors['text'] = 'Bo\'sh bo\'lishi mumkin emas!';
            }
            if (!Post::checkMainText($main_text)) {
                $errors['mainText'] = 'Iltimos, postni to\'liqroq kiriting!';
            }
            if (!Post::checkCtgName($ctg_name)) {
                $errors['ctg_name'] = 'Mosini tanlang!';
            }
            if (!Post::checkTagName($tag_name)) {
                $errors['tag_name'] = 'Mosini tanlang!';
            }

            $image = $_FILES['image']['name'] == '' ? $post['image'] : $_FILES['image']['name'];


            if ($image != $post['image'] && $errors == false) {
                // image upload
                $target_dir = "upload/profile_image/";
                $target_file = $target_dir . basename($image);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != '') {
                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"]) && empty($_FILES["image"])) {
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($check !== false) {
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
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $errors["image"] = "Kechirasiz, faqat JPG, JPEG, PNG & GIF tiplarni ishlatish mumkin.";
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

                if (file_exists('upload/profile_image/' . basename($post['image']))) {
                    unlink('upload/profile_image/' . basename($post['image']));
                }
                //image upload finish
            }

            if ($errors == false) {
                Post::updatePostData($post['id'], $title, $text, $main_text, $image, $ctg_name, $tag_name);
                header("Location: /post/details/" . $post['id']);
            }
        }

        require_once(ROOT . '/views/post/edit.php');

        return true;
    }

    public function actionDeleteComment()
    {
        $comment_id = $_POST['comment_id'] ?? false;
        $postId = Post::getPostIdBeforeDeletingComment($comment_id);
        if (Post::deleteComment($comment_id, $postId)) {
            echo json_encode(['success']);
            die;
        }
        echo json_encode(['error']);
        die;
    }
    public function actionCreateComment()
    {
        $arr = array();
        $comment = $_POST['comment'] ?? '';
        $userId = $_POST['user_id'] ?? '';
        $date = date('Y-m-d H:i:s');
        $postId = $_POST['post'] ?? '';

        $commentData = Post::insertDataComment($userId, $date, $comment, $postId);
        $countComment = Post::countComments($postId);

        $user = User::getUser($_SESSION['user']);
        echo json_encode(['success', $user, date("Y-m-d H:i:s", time()), $commentData, $countComment]);
        exit;
    }

    public function actionView($id)
    {
        $post_tags = Post::getPostTags($id);
        $posts = Post::getPostsByLimit(4);
        $currentPost = Post::getCurrentPost($id);

        $ctg_id = $currentPost[0]['ctg_id'];
        $categoriesList = Category::getCategoriesList($id);
        $popularPosts = Post::getPopularPosts(3);
        $categories = Post::getCategoriesList();
        $tags = Post::getTagsList();
        $comments = Post::getCurrentComments($id)[0];
        $childrenComments = Post::getCurrentComments($id)[1];
        $countComment = Post::countComments($id);



        require_once(ROOT . '/views/post/details.php');

        return true;
    }

    public static function actionShortMessagesEdit()
    {
        $comment = $_POST['comment'] ?? '';
        $user_id = $_POST['user_id'] ?? '';

        if (Post::ajaxUpdate($comment, $user_id)) {
            echo json_encode([$comment]);
            exit;
        }
        echo json_encode(['error']);
        exit;
    }

    public static function actionShortMessages()
    {
        $comment = $_POST['comment'] ?? '';
        $post_id = $_POST['post_id'] ?? '';
        $user_session = $_POST['user_session'] ?? '';
        $user_id = $_POST['user_id'] ?? '';

        if ($cmId = Post::insertShortComment($comment, $post_id, $user_session, $user_id)) {
            $user = User::getUser($user_session);
            $countComment = Post::countComments($post_id);
            echo json_encode(['success', $user, date("Y-m-d H:i:s", time()), $cmId, $countComment]);
            exit;
        } else {
            echo json_encode(['error']);
            exit;
        }
    }

    public function actionCreate()
    {
        $tags = Post::getTagsList();
        $categories = Post::getCategoriesList();

        $title = '';
        $text = '';
        $mainText = '';
        $ctgName = '';
        $tagName = array();
        $image = '';

        if (isset($_POST['submit'])) {

            $title = $_POST['title'] ?? '';
            $text = $_POST['text'] ?? '';
            $mainText = base64_encode($_POST['post-content']) ?? '';
            $ctgName = $_POST['categories'] ?? '';
            $tagName = $_POST['states'] ?? '';
            $image = $_FILES['image']['name'] == '' ? 'no-post.png' : $_FILES['image']['name'];

            $errors = false;

            if (!Post::checkTitle($title)) {
                $errors['title'] = 'Sarlavha 4 ta belgidan kam bo\'lmasin';
            }
            if (!Post::checkText($text)) {
                $errors['text'] = 'Bo\'sh bo\'lishi mumkin emas!';
            }
            if (!Post::checkMainText($mainText)) {
                $errors['mainText'] = 'Iltimos, postni to\'liqroq kiriting!';
            }
            if (!Post::checkCtgName($ctgName)) {
                $errors['ctg_name'] = 'Mosini tanlang!';
            }
            if (!Post::checkTagName($tagName)) {
                $errors['tag_name'] = 'Mosini tanlang!';
            }

            // image upload
            $target_dir = "upload/profile_image/";
            $target_file = $target_dir . basename($image);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES['image']['name'] != '') {
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"]) && empty($_FILES["image"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        $errors["image"] = "Bu rasm - " . $check["mime"] . ".";
                    } else {
                        $errors["image"] = "Bu rasm emas!";
                    }
                }

                // // Check if file already exists
                // if (file_exists($target_file)) {
                //     $errors["image"] = "Kechirasiz, bunday rasm mavjud!";
                // }

                // Check file size
                if ($_FILES["image"]["size"] > 5000000) {
                    $errors["image"] = "Kechirasiz, sizning rasmingiz katta hajmli!";
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $errors["image"] = "Kechirasiz, faqat JPG, JPEG, PNG & GIF tiplarni ishlatish mumkin.";
                }

                // Check if $uploadOk is set to 0 by an error
                if (!empty($errors["image"])) {
                    // var_dump($errors["image"]);
                    // echo "Kechirasiz, rasm yuklanmadi, qaytadan urinib ko'ring!";
                    // if everything is ok, try to upload file
                }
            }
            //image upload finish

            if ($errors == false) {
                $date = date('Y-m-d H:i:s', time());
                if (empty($errors['image'])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
                if (Post::insertDataPost($title, $text, $mainText, $image, $date, $tagName, $ctgName, $_SESSION['user'])) {
                    header("Location: /");
                } else {
                    echo "Xatolik yuz berdi!";
                    exit;
                }
            }
        }

        require_once(ROOT . '/views/post/create.php');

        return true;
    }
}
