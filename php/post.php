<?php
if (include_once("functions.php")) {
}; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>post creation</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <?php
        div_lable_input("file", "Add an Image", "file");
        div_lable_input("text", "add a title", "text");
        echo "<input type=\"submit\" class=\"btn btn-primary\" name=\"new_post\" value=\"post it\">";
        if (isset($_POST['new_post'])) {
            $text = $_POST['text'];
            if (empty($_POST['text'])) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Empty title is not allowd!</div>";
            }
            if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Error during upload!</div>";
                $errors = true;
                die();
            }
            $allowed_files = array_search($_FILES['file']['type'], array(
                '.jpg' => 'image/jpeg',
                '.png' => 'image/png',
                '.gif' => 'image/gif'
            ));

            if ($allowed_files === false) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Only Images are allowed!</div>";
                die();
            } else {
                $fileName = time();
                $filePath = 'assets/upload/' . $fileName . $_COOKIE['first_name'] . $allowed_files;
                $connect_DB =  mysqli_connect('localhost', 'root', 'root', 'id19375428_socialcoding');
                if ($connect_DB) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                        echo "<div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Well done!</h4><p>your picture is uploaded</p><hr><p class=\"mb-0\">uploade more pictures, it is fun</p></div>";
                        $user_id = $_COOKIE['id'];
                        $title = $_POST['text'];
                        $upload_date = date('Y-m-d');
                        $query_post = "INSERT INTO posts (id, user_id, content, image, date) VALUES (NULL, $user_id, '$title', '$filePath', '$upload_date')";
                        echo $query_post;
                        $inserting_user = mysqli_query($connect_DB, $query_post);

                    } else {

                        echo "<div class=\"alert alert-danger\" role=\"alert\"> Uploading your picture failed! please try again!</div>";
                    }
                }else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\"> your picture is uploaded, but the post is not created!</div>";
                }
            }
        }


        ?>



    </form>
</body>

</html>