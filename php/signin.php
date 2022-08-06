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
    <title>signin</title>
</head>

<body>
    <form method="post">
        <h3>sign in</h3>
        <?php
        $errors = false;
        div_lable_input("sign_in_data", "User name or Email", "text");
        if (isset($_POST['sign_in'])) {
            if (empty($_POST['sign_in_data'])) {
                $errors = true;
                echo "<div class=\"alert alert-danger\" role=\"alert\">User Name or email address is required to sign in!</div>";
            }
            if (strip_tags(trim($_POST['sign_in_data'])) !== $_POST['sign_in_data']) {
                $errors = true;
                echo "<div class=\"alert alert-danger\" role=\"alert\">User Name can NOT contain spaces or special characters as < or > nor / !</div>";
            }
            $sign_in_data = $_POST['sign_in_data'];
        }

        div_lable_input("password", "Password: ", "password");
        if (isset($_POST['sign_in'])) {
            if (empty($_POST['password'])) {
                $errors = true;
                echo "<div class=\"alert alert-danger\" role=\"alert\">Password is required to sign in!</div>";
            }
            if (strip_tags(trim($_POST['password'])) !== $_POST['password']) {
                $errors = true;
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a passowrd not a hacking codes!</div>";
            }
            $password = $_POST['password'];
        }


        ?>
        <input type="submit" class="btn btn-primary" name="sign_in" value="sign in">

        <?php
        if (isset($_POST['sign_in'])) {
            if ($errors === false) {
                $connect_DB =  mysqli_connect('localhost', 'root', 'root', 'id19375428_socialcoding');
                if ($connect_DB) {
                    $query_email = "SELECT password,id FROM users WHERE email= '$sign_in_data'";
                    $email_check = mysqli_query($connect_DB, $query_email);
                    $query_user_name = "SELECT password,id,firstName FROM users WHERE userName= '$sign_in_data'";
                    $user_name_check = mysqli_query($connect_DB, $query_user_name);
                    if (mysqli_num_rows($email_check) > 0) {
                        $user_data = mysqli_fetch_assoc($email_check);
                    }
                    if (mysqli_num_rows($user_name_check) > 0) {
                        $user_data = mysqli_fetch_assoc($user_name_check);
                    }
                    if (password_verify($_POST['password'], $user_data['password'])) {
                        setcookie('id', $user_data['id']);
                        setcookie('password', $user_data['password']);
                        setcookie('first_name', $user_data['firstName']);
                        echo "<div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Well done!</h4><p>You are signed in</p><hr><p class=\"mb-0\">you will be redirected to your homepage.</p></div>";
                    } else {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong data! please use correct data!</div>";
                    }
                }
            }
        }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>