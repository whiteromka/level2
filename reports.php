<?php

abstract class Creature
{
    protected int $heath = 100;
    abstract public function eat();
}

class Duck extends Creature
{
    public function eat()
    {
        // ...
        echo 'Хватает своим клювом рыбу';
    }
}

class Wolf extends Creature
{
    public function eat()
    {
        // ...
        echo 'Хватает добычу большими зубьями';
    }
}

class Worm extends Creature
{
    public function eat()
    {
         echo "Жуют землю" . $this->heath;
    }
}





abstract class Notifier
{
    protected array $users = [];

    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    abstract public function notify();
}

class SmsNotifier extends Notifier
{
    public function notify()
    {
        // $sms = new SmsService();
        // $sms->setPassword()->setLogin();
        // $sms->loadUserEmails($this->users)
        // $sms->notify();
        echo 'Уведомили по смс всех товарищей!';
    }
}

class TelegramNotifier extends Notifier
{
    public function notify()
    {
        // $t = new TelegramService();
        // $t->setTelegamAccount(124325);
        // $t->loadUserEmails($this->users)
        // $t->sendMessage();
        echo 'Уведомили по Telegram всех товарищей!';
    }
}

class EmailNotifier extends Notifier
{
    public function notify()
    {
        // ...
        // ...
        echo 'Уведомляем по email-у';
    }
}

$t = new TelegramNotifier();
$sms = new SmsNotifier();

/** @var Notifier $notifier */
foreach ([$t, $sms] as $notifier)
{
    $notifier->notify();
}


/*******************/
abstract class Notifier2
{
    abstract public function notify();
}

interface INotifier
{
    public function notify();
}

interface IPay
{
    public function pay();
}

class YndexNotifier implements INotifier, IPay
{
    public int $count = 0;

    public function notify()
    {
        // ...
        echo 'Yandex notified';
        // ....
        $count = 123;
        $this->count = $count;
    }

    public function getResult()
    {
        return $this->count;
    }

    public function pay()
    {
        echo 'Yandex payd';
    }
}

/* ****************** */
abstract class Gun
{
    public function reload()
    {
        // ... Универсальная реализация перезарядки для всех пушек.
    }

    abstract public function shoot();
}

interface IGun
{
    public function shoot();
}

class Pistol implements IGun
{
    public function shoot()
    {
        // Код, который заставит пистолет стрелять
    }
}

class Automat implements IGun
{
    public function shoot()
    {
        // Код, который заставит автомат стрелять
    }
}