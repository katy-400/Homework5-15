<h1>Homework 7</h1>

<h4>$GLOBAL</h4>

<?php
//A $GLOBAL is n associative array containing references to all variables which are currently defined in the global scope of the script. 
//The variable names are the keys of the array.
  function test() {
      $foo = "local variable";
  
      echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
      echo '$foo in current scope: ' . $foo . "\n";
  }
  
  $foo = "Example content";
  test();
?>

<h4>$_SERVER</h4>

<?php
//$_SERVER is an array containing information such as headers, paths, and script locations.
//Entries in this array are created by the web server.

  echo $_SERVER['SERVER_NAME'];
?>

<h4>$_GET</h4>

<?php
  
  //$_GET is an associative array of variables passed to the current script via the URL parameters.
//$HTTP_GET_VARS contains the same initial information, but is not a superglobal. 
  echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
?>

<h4>$_POST</h4>

<?php
//$_POST is an associative array of variables passed to the current script via the HTTP POST method when using application/x-www-form-urlencoded or multipart/form-data as the HTTP Content-Type in the request.
  echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
?>

<h4>$_FILES</h4>

<?php
//$_FILES is an associative array of items uploaded to the current script via the HTTP POST method. 
//The structure of this array is outlined in the POST method uploads section.
  echo ($_FILES); 
?>

<h4>$_COOKIE</h4>

<?php
//An associative array of variables passed to the current script via HTTP Cookies.
  echo 'Hello ' . htmlspecialchars($_COOKIE["name"]) . '!';
?>

<h4>$_SESSION</h4>

<?php
//An associative array containing session variables available to the current script.
  session_start();
  $_SESSION["newsession"]=$value;
  echo $_SESSION["newsession"];
?>

<h4>$_REQUEST</h4>

<?php
//An associative array that by default contains the contents of $_GET, $_POST and $_COOKIE.
  echo $_REQUEST[“name”];
?>

<h4>$_ENV</h4>

<?php
//An associative array of variables passed to the current script via the environment method.
//These variables are imported because they are provided by the shell under which PHP is running and different systems are likely running different kinds of shells, a definitive list is impossible.
  echo 'My username is ' .$_ENV["USER"] . '!';
?>