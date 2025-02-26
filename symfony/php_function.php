<?php 
//arrayfunction

$fruit=array("mango","litchi","orange");
print_r($fruit);

$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
print_r(array_change_key_case($age,CASE_UPPER));

//array_diff:diffrence
//array_diff_assoc:diffrence with key and value
//array_diff_key:diffrence between key
//array_diff_uassoc:user defined function
//array_diff_ukey:compare key of 2 array
//array_fill:fills value
//array_fill_key:fills value as in respect to key

//array_filter:filters the value using a callback function
function test_odd($var)
  {
  return($var & 1);
  }

$a1=array(1,3,2,3,4);
print_r(array_filter($a1,"test_odd"));

//array_flip:flips key with values
//array_intersect:compare values and return match
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_intersect($a1,$a2);
print_r($result);

//array_intersect_assoc:compare value and key both
//array_assoc_key:compare keys and return string
//array_intersect_uassoc:compare keys and values
//array_intersect_ukey:compare keys userdefined of two arrays
//array_key_exists:key exists or not
//array_key:displays key
//array_map:sends each value to a userdefined function and maps them in new value
//array_merger:merges 2 array
//array_merge_recursive:merges array. diff between merge and recursive merge is that when 2 or more elements are declared recursive merges them as new
$a1=array("a"=>"red","b"=>"green");
$a2=array("c"=>"blue","b"=>"yellow");
print_r(array_merge_recursive($a1,$a2));

//array_multisort:returns array in ascending (multiple arrays)
//array_pad:inserts specify number of elements in the array
//array_pop:pops out the element
//array:product:product
//array:push:inserts 1 element at the end
//array_rand:returns random key from the array
//array_reduce:value in array 
//array_replace:replaces elements
//array_replace_recursive:replaces value of first array with other array and if already exists inarr1 not in arr2 then it will be created
//array_search:searches element
//array_udiff:compare using user defined function
//array_unique:removes duplicate values
//array_unshift: inserts element at beginning
//array_values:returns values of the arrays

//array_walk:runs each and every element of the array
function myfunction($value,$key)
{
echo "The key $key has the value $value<br>";
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction");

//array_walk_recursive:it runs over each and every element of the array the only diffrence between this and array_walk is this is used for nested array
function myfunction2($value,$key)
{
echo "The key $key has the value $value<br>";
}
$a1=array("a"=>"red","b"=>"green");
$a2=array($a1,"1"=>"blue","2"=>"yellow");
array_walk_recursive($a2,"myfunction2");

//in_array:finds element in the array
$people = array("Peter", "Joe", "Glenn", "Cleveland");

if (in_array("Glenn", $people))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }

  //natcasesort:sorts by natural order
  //pos:current element
  //shuffle:randomize the order
  //sizeof:returns number of elements


  //string function
  //chr:ascii value
  //chunk split:splits the string with .
  $str = "Hello world!";
echo chunk_split($str,1,".");
//explode:string into array
$str = "Hello world. It's a beautiful day.";
print_r (explode(" ",$str));
//html_entity_encode:html entities to characters
$str = '&lt;a href=&quot;https://www.w3schools.com&quot;&gt;w3schools.com&lt;/a&gt;';
echo html_entity_decode($str);
//htmlentites:character to entities
$str = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';
echo htmlentities($str);
//implode:array to string
$arr = array('Hello','World!','Beautiful','Day!');
echo implode(" ",$arr);
//Levenshtein:distance between 2 strings
//ord:returns ascii of first character
//sprintf; function writes a formatted string to a variable.
//stripos;finds position of first occurence of string inside another string


//interface
interface Animal {
    public function makeSound();
  }
  
  class Cat implements Animal {
    public function makeSound() {
      echo "Meow";
    }
  }
  
  $animal = new Cat();
  $animal->makeSound();
//constructor
class fruit{
    public $name;
    public $color;
    function __construct($name){
        $this->name=$name;
    }
    function get_name(){
        return $this->name;

    }
}
$orange=new fruit("orange");
echo $orange->get_name();

//destructor
class animals{
    public $name;
    public $color;

    function __construct($name,$color){
        $this->name=$name;
        $this->color=$color;
    }
    function __destruct(){
        echo "animal is {$this->name} and color is {$this->color}";
    }
}
$lion=new animals("lion","orange");

//access modifier
class flower{
    public $name;
    public $color;
    public $season;

    function set_name($n){
        $this->name=$n;
    }
    protected function set_color($n){
        $this->color=$n;
    }
    private function set_season($n){
        $this->season=$n;
    }

}
$lily=new flower();
$lily->set_name("lily");
//$lily->set_color('pink');//error
//$lily->set_season('winter');//error

//inheritance
class car{
   public $name;
   public $color;

   public function __construct($name,$color){
    $this->name=$name;
    $this->color=$color;
   }
   public function intro(){
    echo "car is {$this->name} and color is {$this->color}";
   }

}

class ev extends car{
    public function msg(){
        echo "is this a car?";
    }

}
$ev=new ev("ev","black");
$ev->msg();
$ev->intro();

//constant
class constdemo{
    const msg="hello world";

}
echo constdemo::msg;

//abstract class
//abstract class is a class which has abstract method and abstract method is a method which is declared but not implemented
abstract class sttudent{
    abstract public function somemethod1();
    abstract public function somemethod2($name,$color);
    abstract public function somemethod3():string;  
}

abstract class clg{
    public $teacher;
    public function __construct($teacher){
        $this->teacher=$teacher;
    }
    abstract public function intro():string;
}
class students extends clg{
    public function intro(): string{
        return "hello this is a demo and i am $this->teacher";
    }
}
$students=new students("students");
echo $students->intro();

//diff:interface and abstract class interface keyword is implemented and abstract class cannot be implemented and abstract keyword is not necessary

//interface:polymorphism
interface animalss{
    public function sound();
}
class dog implements animalss{
    public function sound(){
        echo "brr";
    }

}
$animalss=new dog();
$animalss->sound();

//for implementing multiple inheritance traits are used
//static method can be executed using ::
//static method can be accessed in same class name using self

//namespace:
//groups classes that perform same function 
//allows same name to be used for more than one or more class

//cookie:
$cookie_name="student";
$cookie_value="xyz";
setcookie($cookie_name,$cookie_value,time()+3600);
if(!isset($_COOKIE[$cookie_name])){
    echo "cookie is".$cookie_name."not set";
}
else{
    echo "cookie is".$cookie_name."set";
    echo "value is ".$_COOKIE[$cookie_name];
}
?>
<?php 
//session
session_start();
$_SESSION['name']="XYZ";
$_SESSION['color']="blue";
echo "session sets".$_SESSION['name'];
?>