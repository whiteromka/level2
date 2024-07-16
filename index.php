<?php

/** Класс === Чертеж. Тут мы проектируем кота */
class Cat
{
    /** Ошейник для кота можно просто строкой реализовать, а можно отдельным объектом класса Collar */
    // public string $collar = 'green with brilliants';
    // public ?Collar $collar = null;

    private $name = 'Vasya'; // Приветное свойство, доступнотолько внутри класса

    public function getName(): string
    {
        return $this->name;
    }

    public $age = 4;

    private $color = 'orange';

    public function sayMay()
    {
        echo 'Мяу Мяу';
    }

    public function eat() // Публичный метод. Доступен везде и всем
    {
        echo 'Я кот и я ем!' . '<br>';
        $this->purr(); // Приватный метод, вызывается внутри класса.
    }

    private function purr() // Приватный метод. Доступен долько внутни класса
    {
        echo 'Мур Мур';
    }
}

$cat = new Cat(); // Тут создали нашего кота по проекту чертежа Cat
//echo $cat->getName();

/** Класс === Чертеж. Тут мы проектируем машину */
class Car
{
    public string $mark = 'Lada';
    public string $model = '2110';
    //public $speed = 500;

    /** @var Engine|null - Двигатель машины может быть по чертежу Engine или null */
    private ?Engine $engine = null;

    /**
     * Метод установки двигателя в машину
     *
     * @param Engine $engine
     * @return void
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Вернет время за котрое это автомобиль проедет это кол-во $km
     *
     * @param int $km
     * @return string
     */
    public function go(int $km): string
    {
        $result = $km / $this->engine->getSpeed();
        return $this->mark . ' ' . $this->model . ' проедет расстояние  ' . $km . ' за ' . $result . ' часов';
    }
}

/** Чертеж двигателя котрый может вернуть скорость езды для машины с этим двигателем */
class Engine
{
    private $speed = 120;

    public function getSpeed(): int
    {
        return $this->speed;
    }
}

$engine = new Engine(); // Создали двигатель
$car = new Car(); // Создали машину
$car->setEngine($engine); // Установили в машину двигатель
//echo $car->go(240);


/** Чертеж война котрый может махать мечем если у него он есть */
class Warrior
{
    public int $health = 100;

    public int $power = 10;

    /** @var Sword|null - это держалка для меча. Воин может взять сюда только меч. Не может двигатель или кота ... */
    public ?Sword $sword = null;

    //public Shield $shield = null;

    public function hit()
    {
        if (!empty($this->sword)) {
            $damage = $this->power * $this->sword->getDamage();
        } else {
            $damage = $this->power;
        }
        echo 'Воин ударил с уроном ' . $damage;
    }
}

/** Чертеж меча */
class Sword
{
    private int $attack = 10;

    public function getDamage()
    {
        return $this->attack;
    }
}

//$sword = new Sword(); // Меч
//$romka = new Warrior(); // Воин
//$romka->sword = $sword; // Воин берет меч
//$romka->hit(); // Воин бьет (воин ударит мечем или кулаком в зависимости от того есть ли у него меч. Так мы написалы в методе hit())


/** ***** Lesson 2 OOP Constructor ***** */
// РАЗБОР ЗД: Сложная! Пишу коротко специально чтобы вы сами попробовали
//спроектировать такое взаимодействие:
// Есть охотник.
// Есть ружье.
// Хочу чтобы охотник мог взять ружье и выстрелить.
// Классы, объекты, методы и свойства в них все на ваше усмотрение.
class Gun
{
    private int $damage = 100;

    public function gunShooting()
    {
        echo "Ружье стреляет и наносит " . $this->damage . ' урона!';
    }
}

class Hunter
{
    public ?Gun $gun = null;

    public function getGun(Gun $shootgun): void
    {
        $this->gun = $shootgun;
        echo "Охотник сватил ружье!";
    }

    public function shoot(): void
    {
        if (!empty($this->gun)) {
            $this->gun->gunShooting();
        } else {
            echo 'Не чем стрелять!';
        }
    }
}
$gun = new Gun();
$hunter = new Hunter();
// var_dump($hunter->gun);
// $hunter->getGun($gun);
// $hunter->shoot();

/* *********** */

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

class OrangeCat
{
    public int $age = 0;

    public string $name = '';

    public string $color = 'orange';

    public string $eyesColor = '';

    public int $mass = 5;

    public float $jump = 1;

    public function __construct(string $name, int $mass, float $jumpRange, string $eyesColor, string $color = 'orange')
    {
        $name = $name . random_int(1, 110) . random_int(1, 110) . random_int(1, 110);
        $this->name = $name;
        $this->mass = $mass;
        $this->jump = $jumpRange;
        $this->eyesColor = $eyesColor;
        $this->color = $color;
        $this->age = random_int(1, 30);
    }
}

$cat1 = new OrangeCat('Barsik',10, 0.1, 'green', 'grey');
$cat2 = new OrangeCat('Vasya', 3, 9, 'orange');
//debug($cat1);
//debug($cat2);
//echo $cat1->name;

class Computer
{
    public string $cpu = '';

    public int $screen = 0;

    public int $price = 0;

    public function __construct(string $cpu, int $screen, int $price)
    {
        $this->cpu = $cpu;
        $this->screen = $screen;
        $this->price = $price;
    }
}

$computer = new Computer('intel', 15, 70000);
$computer = new Computer('amd', 17, 120000);
//debug($computer);



/** ***** Lesson 3 OOP - Inheritance ***** */
abstract class Animal
{
    public int $health = 100;

    public int $age = 10;

    public bool $isAlive = true;

    public function bite(): void
    {
        echo "bite!";
    }

    public function jump(): void
    {
        echo "jump!";
    }
}

class Lion extends Animal
{
    public int $health = 1000;

    public int $mane = 1;

    public function roar(): void
    {
        echo "roar!";
    }
}

class SpaceLion extends Lion
{
    public function flyToStar()
    {
        echo "flyToStar!";
    }
}

//$animal = new Animal();
//$animal->bite();
//$animal->jump();
//echo $animal->health;
//debug($animal);

//echo "<br>";

//$lion = new Lion();
//$lion->bite();
//$lion->roar();
//$lion->jump();
//echo $lion->health;
//debug($lion);





class Weapon
{
    public string $mark = 'pm'; // Пистолет Макарова

    public int $damage = 1;

    public string $typeDamage = 'bullet';

    public function attack(): void
    {
        echo $this->mark . ' наносит ' . $this->damage . ' ' . $this->typeDamage . ' урона';
    }
}

class GaysWeapon extends Weapon
{
    public string $mark = 'GaysPm';

    public int $damage = 10;

    public string $typeDamage = 'enegry';
}

class Stalker
{
    private Weapon $weapon;

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function attack()
    {
        $this->weapon->attack();
    }
}

$pm = new Weapon();
//$gpm = new GaysWeapon();

$stalker = new Stalker();
$stalker->setWeapon($pm);
$stalker->attack();



/********** Пример из реальной жизни  web программиста ***************/
class CatCreateForm
{
    const GENDER_BOY = 'Boy';
    const GENDER_GIRL = 'Girl';

    public string $name = '';

    public int $age = 0;

    public string $gender = '';

    public function loadPost($_POST)
    {
        if (!in_array($_POST['gender'], [self::GENDER_BOY, self::GENDER_GIRL])) {
            return false;
        }
    }
}

class LoginForm
{
    public string $username = '';

    public string $password = '';

    public string $email = '';

    public bool $emailNotification = true;

    public function login(): bool
    {
        // ...
        return true;
    }
}

class ExtendedLoginForm extends LoginForm
{
    public int $age = 0;

    public function login(): bool
    {
        if ($this->age < 18) {
            return false;
        } else {
            // ...
            return true;
        }
    }
}


/* **** Дальше не успели **** */



class BaseCat
{
    public string $name = '';     // Публичные свойства и методы видны и доступны везде

    private int $age;             // Приватные свойства и методы видны и доступны только внутри своего класса в котором они объявлены

//    public function setAge(int $age): void
//    {
//        $this->age = $age;
//    }
//
//    public function getAge(): int
//    {
//        return $this->age;
//    }

    protected string $color = ''; // Протектед свойства и методы видны и доступны только внутри класса и внутри наследников класса

    public function __construct(string $catName, int $age, string $color)
    {
        $this->name = $catName;
        $this->age = $age;
        $this->color = $color;
    }

    public function may()
    {
        // может быть очень много строк кода
        echo "Мяу мяу! Я " . $this->name . ' Мне ' . $this->age . ' лет';
    }
}

class AdvancedCat extends BaseCat
{
    public string $colorEyes = '';

    public function __construct(string $catName, int $age, string $color, string $eyesColor)
    {
        parent::__construct($catName, $age, $color);
        $this->colorEyes = $eyesColor;
    }

    public function may()
    {
        parent::may();
        echo " У меня глаза цвета:" . $this->colorEyes;
    }
}

$baseCat = new BaseCat('Tom', 5, 'blue');
$advancedCat = new AdvancedCat('Forrest', 5, 'orange', 'yellow');

//echo $baseCat->name; // public свойство YES
//echo $advancedCat->name; // public свойство YES
//
//echo $baseCat->age; // private свойство NO
//echo $advancedCat->age; // private свойство NO
//
//echo $baseCat->color; // protected свойство NO
//echo $advancedCat->color; // protected свойство NO








