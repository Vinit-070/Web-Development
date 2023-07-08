// Author: Vinit Patel
// Aim : PHP program using object-oriented concept in PHP.

<?php
class Person 
{
    private $name;
    private $age;

    public function __construct($name, $age) 
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello() 
    {
        echo "Hello, My name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}

$person = new Person("Vinit", 20);
$person->sayHello();
?>