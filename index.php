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

$sword = new Sword(); // Меч
$romka = new Warrior(); // Воин
$romka->sword = $sword; // Воин берет меч
$romka->hit(); // Воин бьет (воин ударит мечем или кулаком в зависимости от того есть ли у него меч. Так мы написалы в методе hit())
