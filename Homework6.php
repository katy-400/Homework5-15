<h1> PHP Tips and Tricks </h1>
<h4>1. Functions with Arbitrary Number of Arguments</h4>
This function takes 2 arguements and will print "Hello world" becuase that is the input given. The function can also take no arguements and will print out nothing.
<br><br>
<?php

  function foo($arg1 = '', $arg2 = '') {
   
      echo "arg1: $arg1\n";
      echo "arg2: $arg2\n";
  }

  foo('hello','world');
  foo();
  
?>


<h4>2. Using Glob() to Find Files</h4>
The first function will print out all of the php in a directory. The second does that AND the .txt files. The third prints array and file path.
echo "<br><br>";  

<?php 
  echo "<pre>";
   $files = glob('*.php');
   print_r($files);
   echo "<br>";
   $files = glob('*.{php,txt}', GLOB_BRACE);
   print_r($files);
   echo "<br>";
   $files = glob('../images/a*.jpg');
   echo "<br>";
   $files = array_map('realpath',$files);
   print_r($files);
   echo "</pre>";
?>

<h4>3. Memory Usage Information</h4>
The two for loops are for finding then printing inital memory. The two echo statements are for printing final and peak memory usage.

<?php
    echo "<pre>";
    echo "Initial: ".memory_get_usage()." bytes \n";
    for ($i = 0; $i < 100000; $i++) {
        $array []= md5($i);
    }
    for ($i = 0; $i < 100000; $i++) {
        unset($array[$i]);
    }
    echo "Final: ".memory_get_usage()." bytes \n";
    echo "Peak: ".memory_get_peak_usage()." bytes \n";
    echo "</pre>";
?>
<h4>CPU Usage Information</h4>
This function prints the usage, states, and operations of the CPU. Next program prints the amount of power the CPU used. The third prves that the CPU usage and actual runtime length are different.
<?php
  echo "<pre>";
  print_r(getrusage());
  echo "</pre>";

  sleep(3);
   
  $data = getrusage();
  echo "User time: ".
      ($data['ru_utime.tv_sec'] +
      $data['ru_utime.tv_usec'] / 1000000);
  echo "<br>";
  echo "System time: ".
      ($data['ru_stime.tv_sec'] +
      $data['ru_stime.tv_usec'] / 1000000);
      echo "<br><br>";
      
  for($i=0;$i<10000000;$i++) { }
  $data = getrusage();
  echo "User time: ".
      ($data['ru_utime.tv_sec'] +
      $data['ru_utime.tv_usec'] / 1000000);
  echo "<br>";
  echo "System time: ".
      ($data['ru_stime.tv_sec'] +
      $data['ru_stime.tv_usec'] / 1000000);

  echo "<br><br>";
  $start = microtime(true);
  while(microtime(true) - $start < 3) { } 
  $data = getrusage();
  echo "User time: ".
      ($data['ru_utime.tv_sec'] +
      $data['ru_utime.tv_usec'] / 1000000);
  echo "<br>";
  echo "System time: ".
      ($data['ru_stime.tv_sec'] +
      $data['ru_stime.tv_usec'] / 1000000);
      
?>

<h4>5. Magic Constants</h4>

  require_once('config/database.php');
  <br>
  require_once(dirname(__FILE__) . '/config/database.php');
  <br>
  my_debug("some debug message", __LINE__);
  <br>
  my_debug("another debug message", __LINE__);
  <br>

<h4>6. Generating Unique IDs</h4>
Comes up with a one of a kind ID. Good for password generators.

<?php

  echo md5(time() . mt_rand(1,1000000));
  echo "<br>";
  echo uniqid();
  echo "<br>";
  echo uniqid();
  echo "<br>";
  echo uniqid('foo_');
  echo "<br>";
  echo uniqid('',true);
  echo "<br>";
  echo uniqid('bar_',true);
 
?>

<h4>7. Serialization</h4>
Converts complex variables into arrays automatically.
<?php
  echo "<pre>";
  $myvar = array(
    'hello',
    42,
    array(1,'two'),
    'apple'
  );
  echo "<br>";
  $string = serialize($myvar);
  echo $string;
  echo "<br>";
  $newvar = unserialize($string);
  print_r($newvar);
  echo "</pre>";
?>

<h4>8. Compressing Strings</h4>
Using the funtion to print the number of words in the string.Then compresses it. Good for archiving.

<?php
  echo "<pre>";
  $string =
    "Here comes the sun (doo doo doo doo)
    Here comes the sun, and I say
    It's all right
    Little darling, it's been a long cold lonely winter
    Little darling, it feels like years since it's been here
    Here comes the sun
    Here comes the sun, and I say
    It's all right
    Little darling, the smiles returning to the faces
    Little darling, it seems like years since it's been here
    Here comes the sun
    Here comes the sun, and I say
    It's all right
    Sun, sun, sun, here it comes
    Sun, sun, sun, here it comes
    Sun, sun, sun, here it comes
    Sun, sun, sun, here it comes
    Sun, sun,…";
     
    $compressed = gzcompress($string);
     
    echo "Original size: ". strlen($string)."\n"; 
     
    echo "Compressed size: ". strlen($compressed)."\n";
    $original = gzuncompress($compressed);
  echo "</pre>";
?>

<h4>9. Register Shutdown Function</h4>
Prints out how long it takes to shut down. Also allows you to see sript before the shut down.

<?php
  echo "<pre>";
  $start_time = microtime(true);
  echo "execution took: ".
          (microtime(true) - $start_time).
          " seconds.";
  echo "<br>";
  $start_time = microtime(true);
 
  register_shutdown_function('my_shutdown');
    
  function my_shutdown() {
      global $start_time;
   
      echo "execution took: ".
              (microtime(true) - $start_time).
              " seconds.";
  }
  echo "</pre>";
?>


