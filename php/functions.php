<?php
//$connect = mysqli_connect('localhost', 'id19375428_socialcodingmanager', 'z.d%ZVZ%9W%7wJb', '19375428_socialcoding');
function div_lable_input($name, $text, $type)
{
    echo "<div class=\"mb-3\"><label for=\"$name\" class=\"form-label\">$text</label><input type=\"$type\" class=\"form-control\" id=\"$name\" name=\"$name\"></div>";
}
function text_area_function($text, $message)
{
    echo "<div class=\"form-floating\">
    <textarea class=\"form-control\" placeholder=\"$message\" id=\"floatingTextarea\"></textarea>
    <label for=\"floatingTextarea\">$text</label>
  </div>";
}

function show_results($ss)
{
    echo '<pre>';
    var_dump($ss);
    echo '</pre>';
}

function comment_inputs()
{
    echo "<div class=\"input-group mb-3\">
    <input type=\"text\" class=\"form-control\" placeholder=\"comment\" aria-label=\"comment\" aria-describedby=\"button-addon2\" name=\"comment\">
    <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">comment</button>
  </div>";
}
