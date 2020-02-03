<?php
class Database {

    public $conn;
    private $pageSize = 4;

    public function __construct()
    {
        $this->conn = new mysqli('127.0.0.1', 'root','123123123','php_lab_b1', '3306');
    }

//    Достать список пользователей по ограничениям
    public function getUsersWithLimit(int $upperLimit, int $lowerLimit, $sort = 'by-date-added') {
        switch ($sort){
            case 'by-date-added':
                return $this->conn->query("select *, DATE_FORMAT(users.birthday, '%e %b, %Y') as birthday from users order by id limit " . $lowerLimit . ", " . $upperLimit)->fetch_all(MYSQLI_ASSOC);
            case 'by-surname':
                return $this->conn->query("select *, DATE_FORMAT(users.birthday, '%e %b, %Y') as birthday from users order by surname limit " . $lowerLimit . ", " . $upperLimit)->fetch_all(MYSQLI_ASSOC);
            case 'by-birthday':
                return $this->conn->query("select *, DATE_FORMAT(users.birthday, '%e %b, %Y') as birthday from users order by birthday limit " . $lowerLimit . ", " . $upperLimit)->fetch_all(MYSQLI_ASSOC);
            default:
                echo 'ошибка поиска сортировки';
        }
    }

//    Достать список пользователей по номеру страницы
    public function getUserPage(int $pageNumber, $sort = 'by-date-added') {
        $lowerLimit = $this->pageSize * ($pageNumber - 1);
        $upperLimit = $lowerLimit + $this->pageSize;
        return $this->getUsersWithLimit($upperLimit, $lowerLimit, $sort);
    }

//    Кол-во пользователей
    public function getUsersCount() {
        return $this->conn->query("select count(*) from users;")->fetch_row()[0];
    }
//    Пользователь по ID
    public function getUserById($id) {
        return $this->conn->query('select * from users where id = "' . $id . '"')->fetch_assoc();
    }

}


$db = new Database();
//print_r($db->getUserById(1));
?>
