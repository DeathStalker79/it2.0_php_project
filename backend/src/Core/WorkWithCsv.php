<?php

namespace It20Academy\App\Core;

class WorkWithCsv
{
    public function getCSV()
    {
        $count = 1;
        $file = fopen('../Storage/posts.csv', 'r');
        while ($data = fgetcsv($file, 1000, ',')) {
            $arrCsv[] = $data;
//    $num = count($data);
//    $count++;
//    for($i=0; $i<$num;$i++)
//    {
//
//    }
        }
        fclose($file);
        return $arrCsv;
    }
}
//class WorkWithCsv {
//
//    private $_csv_file = null;
//
//
//    public function __construct($csv_file) {
//        if (file_exists($csv_file)) { //Если файл существует
//            $this->_csv_file = $csv_file; //Записываем путь к файлу в переменную
//        }
//        else {
//            throw new Exception("Файл \"$csv_file\" не найден");
//        }
//    }
//
//    // Метод для чтения из csv-файла. Возвращает массив с данными из csv
//
//
//    public function getCSV() {
//        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения
//
//        $array_line_full = array(); //Массив будет хранить данные из csv
//        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
//        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
//            $array_line_full[] = $line; //Записываем строчки в массив
//        }
//        fclose($handle); //Закрываем файл
//        return $array_line_full; //Возвращаем прочтенные данные
//    }
//
//}
//
//try {
//    $csv = new CSV("ip.csv"); //Открываем наш csv
//
//    //Чтение из CSV  (и вывод на экран)
//
//
//    $get_csv = $csv->getCSV();
//
//    $connection=mysql_connect ("localhost", "root", "1234");
//    $db1=mysql_select_db ("update", $connection); //подкл к имеющейся бд
//    $del="DELETE FROM ip";
//    $result=mysql_query ($del);//удаление из БД
//
//    foreach ($get_csv as $value) { //Проходим по строкам файла CSV
//        $a=$value[0];
//        $b=$value [1];
//        $c=$value[2];
//        $d=$value[3];
//        $e=$value[4];
//
//        $query="insert into ip values('$a','$b', '$c', '$d', '$e')";
//        $result=mysql_query($query); //добавл данных
//    }
//    if($result) echo "Обновление успешно завершено";
//    else echo"error";
//
//
//}
//catch (Exception $e) { //Если csv файл не существует, выводим сообщение
//    echo "Ошибка: " . $e->getMessage();
//}