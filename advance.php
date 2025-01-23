<?php 
//constant:cannot be changed and defined
define ("PI",3.14);
echo "pi is".PI."<br>";

//magic constant:constants which can change its value and written with double underscore except class name
class fruits{
    public function name(){
        return __CLASS__;
    }}
    $apple=new fruits();
    echo $apple->name()."<br>";

    //operators:assignment conditional arithmetic increment decrement string array logical
//     assignment=,+=,/=,!=,-=
//     arithmetic:+**-/%*
// in which ** is exponention that is x power y
//conditional:?:,??
//incr-decr:x++,x--,++x,--x
//string .,.=
//array:==,====,!=,+=,<>(inequality),


//switch

// switch(expression){
//     case1:value1
//     break;
//     case2:value2
//     break;
//     default:statementl;
// }

$student="clg";
switch($student){
    case "clg":
        echo "student is in clg"."<br>";
        break;
    case "school":
        echo "student is in school";
        break;
    case "home":
        echo "student is at home";
        break;
    default:
    echo "student can be somewhere else";

}

//php functions:
//userdefined and built in

//php is loosely typed: datatypes are not strict and can be changed
//vardump:value with datatype and print_r displays only vaue
//echo: has no return value print:has return value as 1
//array functions
$a=array(5,4,9);
print_r(arsort($a))."<br>";
$b=array("red","blue","green");
print_r(array_slice($a,2))."<br>";
$arraychunk=array('a','b','c','d','e');
print_r(array_chunk($arraychunk,3))."<br>";
// $arrayCombine1=array();
// $arrayCombine2=array();
// return (array_combine($arrayCombine1,$arrayCombine2))."<br>";
function arCounting($array){
return (array_count_values($array));
}
$array=array(5,4,9);
print_r(arCounting($array));
$arrayDiff1 = array("10"=>"xyz", "20"=>"abc", "30"=>"pqr","40"=>"qwe", "50"=>"iop"); 
$arrayDiff2 = array("10"=>"xyz", "70"=>"abc", "30"=>"qwe","80"=>"pqr"); 
$arrayDiff3 = array("20"=>"abc", "80"=>"pqr"); 
// ss
//array_diff only states diffrence but array_diff_assoc states diffrence with key
//filter the values using a callback function
//diff between arraymerge and arraymergerecursive is when same keys are between two diff array instead of overriding
//recursive function makes value as array
//array_merge
$arrayMerger1=array("mnb","bvc","xzl");
$arrayMerger2=array("lkj","jhg","gfd");
print_r(array_merge($arrayMerger1,$arrayMerger2))."<br>";
//arraypad:pads same value in array till the index is specified
$array_Pad=array("blue","green");
print_r(array_pad($array_Pad,6,"orange"))."<br>";
//pop delete last element
$array_Pop=array("red","blue","green");
array_pop($array_Pop)."<br>";
print_r($array_Pop);
$array_push=array("red","blue");
array_push($array_push,"yellow");
print_r($array_push);
$array_replace1=array("red","blue");
$array_replace2=array("yellow","orange");
$final_replace=array_replace($array_replace1,$array_replace2);
print_r($final_replace);
print_r(array_reverse($array_replace1));
$array_searching=array("red"=>"1","blue"=>"2");
echo(array_search("blue",$array_searching));


//date time
echo "today is".date("y/m/date")."<br>";
echo "today is".date("y.m.d")."<br>";
echo "today is".date("y-m-d")."<br>";
echo "today is".date("l")."<br>";

//time
echo "time".date("h:i:sa")."<br>";//why here time not matches with the current one

//mktime and strtotime
// hr- min -sec -month- day- year
$d=mktime(11,11,11,11,6,2011);
echo "created date is".date("Y-m-d h-m-sa",$d)."<br>";//what if i want to do pm instead of am


//oops
//class and obj
class animal{
    public $animal_name;
    public $animal_breed;
    public $animal_color;

    function setName($animal_name){
$this->animal_name=$animal_name;
    }
    function setBreed($animal_breed){
        $this->animal_breed=$animal_breed;
    }
    function setColor($animal_color){
        $this->animal_color=$animal_color;
    }
    function getName(){
        return $this->animal_name;
    }
    function getBreed(){
        return $this->animal_breed;
    }
    function getColor(){
        return $this->animal_color;
    }
}

// //constructor:when object is created from class constructor is automatically called it reduces the method
// // set name so amont of code is saved
class vegetable{
    public $vegetable_name;
    public $vegetable_color;

    function __construct($vegetable_name,$vegetable_color){
$this->vegetable_name=$vegetable_name;
$this->vegetable_color=$vegetable_color;
    }
    function getVegetableDetails(){
return "Vegetable name: ".$this->vegetable_name."<br>"."Vegetable color: ".$this->vegetable_color;
    }}
    $tomato=new vegetable("tomato","red");
    echo $tomato->getVegetableDetails()."<br>";

//     //destructor:as constructor are used in place of SETname likewise destructor are use in place of GETname

    class flower{
        public $flower_name;
        public $flower_color;

        function __construct($flower_name,$flower_color){
            $this->flower_name=$flower_name;
            $this->flower_color=$flower_color;
        }
        function __destruct(){
            echo "flower name is destroyed {$this->$flower_name}"."<br>"."flowercolor is destroyed{$this->flower_color}";
        }
    }
    $sunflower=new flower("sunflower","yellow");
//     //accessprovider
    class tree{
        public $tree_name;
        private $tree_color;
        protected $tree_fruit;
    }
    $neem=new tree();
    $neem->tree_name='neem';
    $neem->tree_color='green';
    $neem->tree_fruit='neemfruit';
// // //inheritance
class berries {
    public $berry_name;
    public $berry_type;
    public function __construct($berry_name,$berry_type){
        $this->berry_name=$berry_name;
        $this->berry_type=$berry_type;

    }
    public function display(){
        echo "name is{$this->$berry_name}"."<br>"."type is{$this->berry_type}";
    
    }

}   
class childberry extends berries{
    public function msg(){
        echo "this is strawberry";
    }
}
$berry_name=new berries("strawberry","sweetberry");
$berry_name->msg();
$berry_name->display();

// //constants:declared inside class and cannot be changed once declared
// //to access outside the class we need to use scope resolution operator ::
class details{
    const id="220213107001";
}
echo details::id;

// //abstract class: declared but not implemented
abstract class student{
    abstract public function display_name();
    abstract public function display_age($name,$enroll);
    abstract public function display_clg():clg;}

// //abstract method
// // intro is method and it should declare everywhere
abstract class continent{
    public $continent_name;
    public function __construct($continent_name){
        $this->continent_name=$continent_name;

    }
abstract public function intro():string;

}
class country extends continent{
    public function intro():string{
        return "this is country"."<br>";
    }}
class ocean extends continent{
    public function intro():string{
        return "this is continent"."<br>";
    }
}
class forest extends continent{
    public function intro():string{
        return "this is forest"."<br>";
    }
}
$country=new country();
echo $country->intro()."<br>";

$ocean=new ocean();
echo $ocean->intro()."<br>";

$forest=new forest();
echo $forest->intro()."<br>";

// //interface:implementskeyword
// //what method a class should implement
// //uses diffrent variety of class in same way
// //more than 1 class use same way


// //diff between interface and abstract class is
// //interface cannot have properties while abstract do have properties
// //interface methods are public abstract class methods are protected and


interface shape{
    public function area();

}
class triangle implements shape{
    public function description(){
        echo "triangle is a shape";
    }

}
$triangle=new triangle();
$square=new square();


$cube=new cube();
$shapes=new shapes($triangle,$square,$cube);
foreach($shapes as $shape){
    $shape->description();
}

// //traits:(use keyword)
// // for handkling multiple inheritance behaviour traits are used
trait msg1{
    public function m(){
        echo "helloworld";
    }

}
trait msg2{
    public function m2(){
        echo "demohello";
    }
}
class dmsg{
    use msg1;
}
class dmsg2{
    use msg2;
}

$obj=new dmsg();
$obj->m();
$obj2=new dmsg2();
$obj2->m2();

class pi{
    public static $pi=3.14;

}
echo pi::$pi;

//namespace:beginning of file script
//iterables:data type of a function argument


?>
