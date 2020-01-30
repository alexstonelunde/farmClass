<?php

abstract class Animal
{
    public $name;
    public $animalType;
    public $favFood;
    public $inBarn = 0;
    public $barnName;
    public $id;

    public function __construct($animalName, $food, $type)
    {
        $this->name = $animalName;
        $this->favFood = $food;
        $this->animalType = $type;
        $this->id = $this->name . $this->animalType;
    }
}

class Goat extends Animal
{

}

class Cow extends Animal
{

}

class Chicken extends Animal
{

}

class Barn
{
    public $animals;
    public $name;
    public $animalCount = 0;

    public function __construct($barnName)
    {
        $this->name = $barnName;
    }

    public function addAnimal (Animal $newAnimal)
    {
        $this->animals[] =  array('ID' => $newAnimal->id, 'Name' => $newAnimal->name, 'Type' => $newAnimal->animalType, 'FavFood' => $newAnimal->favFood);
        $newAnimal->barnName = $this->name;
        $this->animalCount++;

    }

    public function removeAnimal (Animal $newAnimal)
    {
        foreach ($this->animals as $key => $animal) {
            if ($animal['ID'] == $newAnimal->id) {
                unset($this->animals[$key]);
                $this->animalCount--;
            }
        }
    }

    public function printContents()
    {
        echo '<p>' . $this->name . '<br>  Total animals in barn: ' . $this->animalCount . '</p>';
        foreach ($this->animals as $key => $animal) {
            echo '<p>Animal name: ' . $animal['Name'] . '<br>';
            echo 'Animal type: ' . $animal['Type'] . '<br>';
            echo 'Favourite food: ' . $animal['FavFood'] . '</p>';
            }
    }
}

$billy = new Goat('Billy', 'Tin cans', 'Goat');
$carlos = new Goat('Carlos', 'Chicken feed', 'Chicken');
$lola = new Goat('Lola', 'Grass', 'Cow');

$redBarn = new Barn('Red Barn');
$blueBarn = new Barn('Blue Barn');

$redBarn->addAnimal($billy);
$redBarn->addAnimal($lola);
$redBarn->addAnimal($carlos);

$redBarn->removeAnimal($billy);

$blueBarn->addAnimal($billy);
$blueBarn->addAnimal($lola);
$blueBarn->addAnimal($carlos);

$blueBarn->removeAnimal($lola);

$blueBarn->printContents();


?>