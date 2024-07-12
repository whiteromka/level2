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
debug($computer);
