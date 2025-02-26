<?php 
//string
echo "hello"."<br>";
echo 'world'."<br>";

//integer
$x=12;
echo $x."<br>";

//float
$y=5.2;
echo $y."<br>";


//boolean
$z=true;
echo $z."<br>";

//array
$fruit=array("mango","apple","litchi");
var_dump($fruit)."<br>";

// //object
// class car{
//     public $name;
//     public $color;
//     public function __construct($name,$color) {
//         $this->name=name;
//         $this->color=color;

//     }
//     public function msg(){
//         echo "my car is of".$this->name."and color is".$this->color;

//     }
// }
// $data=new car("audi","black");
// var_dump($data);

//stringfun
$str="helloworld";
echo strlen($str)."<br>";
echo strtolower($str)."<br>";
echo strtoupper($str)."<br>";
echo strrev($str)."<br>";
echo strpos("helloworld","hello")."<br>";
echo str_word_count($str)."<br>";
echo substr($str,2,5)."<br>";
//concate
echo "hello"."world"."<br>";

//typecasting
$a=5.2;
$a=(string) $a ;
echo $a."<br>";

//condition
$x=4;
if($x%2==0){
    echo "even"."<br>";
}
else{
    echo "odd"."<br>";
}

if($x==0){
    echo "x "."<br>";
}

//arrays
//index
$fruits=array("mango","apple","litchi");
echo $fruits[0]."<br>";
$fruits[] ="orange";
var_dump($fruits)."<br>";


//associative
$student=array("name"=>"xyz","age"=>"12","clg"=>"abc");
echo $student["name"]."<br>";
$student["city"] ="surat";
var_dump($student)."<br>";

//multi
$clg=array(array(principle,xyz,abc) ,
arrray(teacher,cvb,bnm),
array(student,asd,fgh),
);
echo $clg[0][0]."<br>";


//global
// $xy=10;
// function test(){
//     echo $GLOBALS['xy']."<br>";
// }
// test();

echo "hello";
print ("test");







?>