<?php 
class car{
    public $name;
    public $color;
    public function __construct($name,$color) {
        $this -> name=name;
        $this -> color=color;

    }
    public function msg(){
        echo "my car is of".$this->name."and color is".$this->color;

    }
}
$data=new car("audi","black");
var_dump($data);

?>
