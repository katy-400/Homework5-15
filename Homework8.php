<h1>Homework 8 </h1>

<h4>ReflectionClass::__construct</h4>

Creates new reflectionClass object and all of the variables inside of it.
<?php
  echo "<pre>";
  Reflection::export(new ReflectionClass('Exception'));
  echo "</pre>";
?>

<h4>ReflectionClass::getDefaultProperties</h4>
Gets default properties from a class (including inherited properties).
<?php
echo "<pre>";
class Bar {
    protected $inheritedProperty = 'inheritedDefault';
}

class Foo extends Bar {
    public $property = 'propertyDefault';
    private $privateProperty = 'privatePropertyDefault';
    public static $staticProperty = 'staticProperty';
    public $defaultlessProperty;
}

$reflectionClass = new ReflectionClass('Foo');
var_dump($reflectionClass->getDefaultProperties());
echo "</pre>";

?>
<h4>ReflectionClass::getExtension</h4>
Gets a ReflectionExtension object for the extension which defined the class.

<?php
  echo "<pre>";
  $class = new ReflectionClass('ReflectionClass');
  $extension = $class->getExtension();
  var_dump($extension);
  echo "</pre>";
?>

<h4>ReflectionClass::getMethod</h4>
Gets a ReflectionMethod for a class method.
<?php
  echo "<pre>";
  $class = new ReflectionClass('ReflectionClass');
  $method = $class->getMethod('getMethod');
  var_dump($method);
  echo "</pre>"
?>

<h4>ReflectionClass::isIterateable</h4>
Checks whether the class is iterateable.
<?php
echo "<pre>";
class IteratorClass implements Iterator {
    public function __construct() { }
    public function key() { }
    public function current() { }
    function next() { }
    function valid() { }
    function rewind() { }
}
class DerivedClass extends IteratorClass { }
class NonIterator { }

function dump_iterateable($class) {
    $reflection = new ReflectionClass($class);
    var_dump($reflection->isIterateable());
}

$classes = array("ArrayObject", "IteratorClass", "DerivedClass", "NonIterator");

foreach ($classes as $class) {
    echo "Is $class iterateable? ";
    dump_iterateable($class);
}
echo "</pre>";
?>


<h4>Pass by Value</h4>

<?php
  function add_some_extra(&$string)
  {
      $string .= 'and some poop';
  }
  
  $str = 'This is a string, ';
  add_some_extra($str);
  echo $str;    
  
?>

<h4>Pass by Reference</h4>

<?php
  function goodbye( &$greeting ) {
  $greeting = "See you later";
}
 
  $myVar = "Hi there";
  goodbye( $myVar );
  echo $myVar;
?>
