<?php

if (include_once("functions.php")) {
};
headerHtml();
navigation();
if (isset($_COOKIE['id'])) {
    $connect_DB = mysqli_connect('localhost', 'root', 'root', 'id19375428_socialcoding');
    if ($connect_DB) {
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">connection error!</div>";
    }
} else {
    header('location:http://localhost:8888/socialCoding/php/signin.php');
    exit;
}
footerHtml();
