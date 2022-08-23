<?php
if (include_once("functions.php")) {
};
headerHtml() ?>

<form method="post">
    <h2>Registeration</h2>
    <?php
    $errors = false;
    div_lable_input("first_name", "first name: ", "text");
    if (isset($_POST['register'])) {
        if (empty($_POST['first_name'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">first Name is MANDAToRY!</div>";
        }
        if (strip_tags(trim($_POST['first_name'])) !== $_POST['first_name']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">first Name can NOT contain spaces or special characters as < or > nor / !</div>";
        }
        $first_name = $_POST['first_name'];
    }
    div_lable_input("last_name", "last name: ", "text");
    if (isset($_POST['register'])) {
        if (empty($_POST['last_name'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">last Name is MANDAToRY!</div>";
        }
        if (strip_tags(trim($_POST['last_name'])) !== $_POST['last_name']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">last Name can NOT contain spaces or special characters as < or > nor / !</div>";
        }
        $last_name = $_POST['last_name'];
    }
    div_lable_input("phone", "Phone: ", "phone");
    if (isset($_POST['register'])) {
        if (empty($_POST['phone'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">phone number is MANDAToRY!</div>";
        }
        if (strip_tags(trim($_POST['phone'])) !== $_POST['phone']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Your phone number is not valid. < or > nor / !</div>";
        }
        if (!is_numeric($_POST['phone'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">phone number is INVALID!</div>";
        }
        $phone = $_POST['phone'];
    }
    div_lable_input("user_name", "User Name: ", "text");
    if (isset($_POST['register'])) {
        if (empty($_POST['user_name'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">User Name is MANDAToRY!</div>";
        }
        if (strip_tags(trim($_POST['user_name'])) !== $_POST['user_name']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">User Name can NOT contain spaces or special characters as < or > nor / !</div>";
        }
        $user_name = $_POST['user_name'];
    }
    div_lable_input("email", "Email address: ", "text");
    if (isset($_POST['register'])) {
        if (empty($_POST['email'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Email address is MANDAToRY!</div>";
        }
        if (strlen($_POST['email']) < 8 || strlen($_POST['email']) > 50) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Email address must be between 8 and 50 characters.!</div>";
        }
        $inputed_email = $_POST['email'];
        $validated_email = filter_var($inputed_email, FILTER_VALIDATE_EMAIL);
        if (!$validated_email && (strip_tags(trim($_POST['email'])) !== $_POST['email'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Email address can NOT contain spaces or special characters as < or > nor / !</div>";
        }
        $email = $_POST['email'];
    }

    div_lable_input("password", "Password: ", "password");
    if (isset($_POST['register'])) {
        if (empty($_POST['password'])) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Password is MANDAToRY!</div>";
        }
        if (strlen($_POST['password']) < 8) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Password must be at least 8 character long!</div>";
            $errors = true;
        }
        if (strip_tags(trim($_POST['password'])) !== $_POST['password']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Passowd not hacking codes!</div>";
        }
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    };

    div_lable_input("password_con", "Password confirmation: ", "password");
    if (isset($_POST['register'])) {
        if ($_POST['password_con'] !== $_POST['password']) {
            $errors = true;
            echo "<div class=\"alert alert-danger\" role=\"alert\">Passowds are not identical!</div>";
        }
    }

    ?>
    <input type="submit" class="btn btn-primary" name="register" value="register">
</form>
<?php
if (isset($_POST['register'])) {
    if ($errors === false) {
        $verification = "unverified";
        $connect_DB =  mysqli_connect('localhost', 'root', 'root', 'id19375428_socialcoding');
        if ($connect_DB) {
            $query_check_user_name = "SELECT userName FROM users WHERE userName= '$user_name' ";
            $check_user_name = mysqli_query($connect_DB, $query_check_user_name);
            $query_check_email = "SELECT email FROM users WHERE userName= '$email' ";
            $check_email = mysqli_query($connect_DB, $query_check_email);
            $existed = false;
            if (mysqli_num_rows($check_user_name) > 0) {
                $existed = true;
            }
            if (mysqli_num_rows($check_email) > 0) {
                $existed = true;
            }
            if ($existed) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Username and/or Email address already used!</div>";
            } else {
                $add_user_query = "INSERT INTO users (id, userName, email, password, phone, firstName, familyName, status, profilePicture) VALUES (NULL, '$user_name', '$email', '$password', '$phone', '$first_name', '$last_name', '$verification', '/assets/upload/standard.png')";
                show_results($add_user_query);
                $inserting_user = mysqli_query($connect_DB, $add_user_query);
                echo "<div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Well done!</h4><p>Your data is stored, you are signed up.</p><hr><p class=\"mb-0\">Please wait for the verification Email which will get you the verification code.</p></div>
";
            }
        } else {
            echo 'error with connection';
        }
    }
}
footerHtml(); ?>