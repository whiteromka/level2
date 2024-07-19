<?php

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

class User
{
    /** @var string */
    public string $name;

    /** @var string */
    private string $email;

    /** @var string */
    private string $education;

    /** @var int */
    private int $wantedSalary;

    /** @var int */
    private int $age;

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEducation(): string
    {
        return $this->education;
    }

    public function getWantedSalary(): int
    {
        return $this->wantedSalary;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param string $name
     * @param int $age
     * @param int $wantedSalary
     * @param string $education
     * @param string $email
     */
    public function __construct(string $name, int $age, int $wantedSalary, string $education, string $email)
    {
        $this->name = $name;
        $this->age = $age;
        $this->wantedSalary = $wantedSalary;
        $this->education = $education;
        $this->email = $email;
    }
}

class UserCreator
{
    /** @var User[] $users */
    private array $users;

    public function getUsers(): array
    {
        return $this->users;
    }

    /** @var int  */
    private int $count = 10;

    public function __construct(int $count = 10)
    {
        $this->count = $count;
    }

    public function create(): void
    {
        for ($i = 0; $i < $this->count; $i++) {
            $newUser = $this->createUser();
            $this->users[] = $newUser;
        }
    }

    private function createUser(): User
    {
        $name = $this->getRandomName();
        $age = random_int(18, 70);
        $wantedSalary = random_int(45, 350);
        $education = $this->getRandomEducation();
        $email = $this->getRandomEmails($name, $age);

        return new User($name, $age, $wantedSalary, $education, $email);
    }

    private function getRandomName(): string
    {
        $names = ['Anna', 'Bob', 'Dan', 'Vasya', 'Silvia', 'Tom', 'Angella', 'Kate'];
        $key = array_rand($names);
        return $names[$key];
    }

    private function getRandomEducation(): string
    {
        $educations = ['University', 'College', 'School'];
        $key = array_rand($educations);
        return $educations[$key];
    }

    private function getRandomEmails(string $name, int $age): string
    {
        return $name . '_' . $age . '@mail.com';
    }
}

$userCreator = new UserCreator(20);
$userCreator->create();
$users = $userCreator->getUsers();
//debug($users);

// Найти самых недорогих (меньше или = 100) и образованных спецов ('University'). И сохранить их emails
class HireEmployer
{
    private array $users;

    private array $emails;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function sortUsers()
    {
        $users = $this->users;
        /** @var User $user */
        foreach ($users as $user) {
            if (
                $user->getWantedSalary() <= 100 &&
                $user->getEducation() === 'University'
            ) {
                // array_push($this->emails, $user->getEmail()); // !!!
                $this->emails[] = $user->getEmail();
            }
        }
    }


}


$hire = new HireEmployer($users);
$emails = $hire->getEmails(); // !!!! дописать и проверить



