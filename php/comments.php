<?php
if (include_once("functions.php")) {
};
headerHtml();
?>
<form method="post" enctype="multipart/form-data">
    <?php
    comment_inputs();
    ?>
</form>
<?php footerHtml(); ?>