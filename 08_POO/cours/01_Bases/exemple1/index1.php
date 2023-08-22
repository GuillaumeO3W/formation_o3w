<?php 


class User {
    
    # public : accessible depuis la classe elle-meme ainsi que dans les classes dérivées et à travers les instances de classe  
    # private : accessible uniquement depuis la classe elle-meme
    # protected : accessible uniquement depuis la classse elle-meme et les classes dérivées 

    // public string $name = 'Sony';
    // public int $age = 34;
    public string $name;
    public int $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function greeting(){
        // return "Bonjour";
        return "Bonjour $this->name";
    }

}


$user = new User('Sony', 26);
// $user = new User();
// $user2 = new User();
echo $user->greeting();
echo '<br>';

// $user2 = new User();
// echo $user2->name = 'Olivier';
// echo $user2->age = 66;
// echo '<br>';

// echo $user2->greeting();
// echo '<br>';
// echo $user2->name . ' user2';

echo '<pre>';
var_dump($user);
echo '</pre>';
// echo '<pre>';
// var_dump($user2);
// echo '</pre>';