<h1>Homework 1</h1>

<h3>create at least 4 if statements that use isset, empty and null. </h3> 

<h4>  Isset</h4>
  
  <?php
    $var = '';
    
    if (isset($var)){
       echo "It is set";
    }  
  ?>

<h4>Isset and Null</h4>
  <?php
  
    $a = "Hello";
    $b = "It’s ME!";
    
    var_dump(isset($a));      // TRUE
    var_dump(isset($a, $b)); // TRUE
    
    
    $foo = NULL;
    var_dump(isset($foo));   // FALSE
  
  ?>
  
<h4>  Empty and Isset</h4>
  
   <?php
      $var = '';
      
      // Evaluates to true because $var is empty
      if (empty($var)) {
          echo '$var is either 0, empty, or not set at all';
      }elseif (isset($var)) {
          echo '$var is set even though it is empty';
      }
   ?>
   
<h4>Isset, empty, and is_null</h4>
  <?php
      $var = null;
      
      if (is_null($var)) {
        echo "this is null";
      }elseif (empty($var)) {
        echo "empty";
      }
  ?>

<h3>create 4 examples of switch-case using that use isset, empty and null. </h3>

<h4>One big example of all settings:</h4>
<?php
$var = 1;
//this is a while loop testing if the variable isset, empty or null
//going to test it  times

    
    switch (isset($_GET[$var]))
    {
    case true:
    	echo $var." is not set<br>";
    case false:
    	echo $var." is set <br>";
    	break;
    
    }
    switch (empty($_GET[$var]))
    {
    case true:
    	echo $var." is not empty<br>";
       break;
    case false:
    	echo $var." is empty<br>";
    	break;
    
    }
    switch (is_null($_GET[$var]))
    {
    case true:
    	echo $var." is not null<br>";
       break;
    case false:
    	echo $var." is null<br>";
    	break;  
    }

    ?>