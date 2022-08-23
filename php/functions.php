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

function navigation()
{
  echo "<nav class=\"navbar navbar-expand-lg bg-light\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"#\">FDF</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link active\" aria-current=\"page\" href=\"http://localhost:8888/socialCoding/php/home.php\">Home</a>
        </li>";
  if (isset($_COOKIE['first_name'])) {
    echo
    "<li class=\"nav-item\">
          <a class=\"nav-link\" href=\"http://localhost:8888/socialCoding/php/user.php\">user</a>
        </li>";
  } else {
    "<li class=\"nav-item\">
    <a class=\"nav-link\" href=\"http://localhost:8888/socialCoding/php/signup.php\">sign</a></li>";
  }
  echo "<li class=\"nav-item dropdown\">
          <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            Dropdown link
          </a>
          <ul class=\"dropdown-menu\">
            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
          </ul></li></ul></div></div></nav>";
}

function headerHtml()
{
  echo " <!DOCTYPE html>
  <html lang=\"en\">
  
  <head>
      <meta charset=\"UTF-8\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css\">
      <title>user_interface</title>
  </head>
  
  <body>";
}


function footerHtml()
{
  echo "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js\"></script></body></html>";
}