<?php

// Создает отчеты.
// Данные на вход могут быть .csv, .xml, .exel
// data.csv  data.xml

// У программы должен быть метод создать отчет (без подробной реализации)
// Формат отчета определяется пользователем $_GET['format'] >>> csv, xml, exel

// http://level2.local/?filename=text.csv
// $_FILES суперглобальный массив для отлова файлов

interface IParser
{
    public function parse();
}

class ParserCsv implements IParser
{
    public function parse()
    {
        $filename = $_GET['filename'] ?? null; // имя файла  // text.csv
        // array_key_exists('filename', $_GET) // if (array_key_exists('filename', $_GET)) {...}
        // !empty($_GET['filename']) // if (!empty($_GET['filename'])) {...}
        // isset($_GET['filename'])  // if (isset($_GET['filename'])) {...}
        if (!$filename) {
            $filename = 'text.csv';
        }
        $data = [];
        // Открываем файл CSV
        $file = fopen($filename, 'r'); // $file типа resource ресурс!
        // Читаем строки из файла и сохраняем их в массив

        if ($file) {
            //                  пока есть одна строка из файла      !== false
            while (($row = fgetcsv($file, null, ';')) !== false) {
                $data[] = $row;
            }
        }
        fclose($file); // Закрываем файл

        echo "<pre>";
        print_r($data);
    }
}

//$p = new ParserCsv();
//$p->parse();


class ParserCsv2 implements IParser
{
    public function parse()
    {
        $filename = $_GET['filename'] ?? null; // имя файла  // text.csv
        $filename = 'text.csv';
        if (!$filename) {
            throw new Exception('Ошибка, не найден файл для чтения! сломался метод parse()');
        }

        $data = [];
        // Открываем файл CSV
        $file = fopen($filename, 'r'); // resource ресурс!
        // Читаем строки из файла и сохраняем их в массив
        //           одна строка из файла    !== false
        if ($file) {
            while (($row = fgetcsv($file, null, ';')) !== false) {
                $data[] = $row;
            }
        }
        fclose($file); // Закрываем файл

        echo "<pre>";
        print_r($data);
    }
}

$p2 = new ParserCsv2();

try {
    $p2->parse();
    // ...
    // ...
} catch (Exception $exception) {
    echo $exception->getMessage();
    echo "<br>";
    echo $exception->getFile();
    echo "<br>";
    echo $exception->getLine();
    echo "<br> Не волнуйся мы уже чиним!";
      //$logger->addMessage($exception->getMessage() . ' ' . '111' , 'error');
}
// finaly разобрать дома !!!




