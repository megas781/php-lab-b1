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
                return $this->conn->query("select *, DATE_FORMAT(users.birthday, '%e %b, %Y') as birthday from users order by id desc limit " . $lowerLimit . ", " . $upperLimit)->fetch_all(MYSQLI_ASSOC);
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

    public function getUserNames(){
        return $this->conn->query("select id, surname, UPPER(substr(users.name, 1, 1)) as name_abbr, UPPER(substr(users.middle_name, 1, 1)) as middle_name_abbr, concat(surname, ' ', name) as fullname from users order by fullname")->fetch_all(MYSQLI_ASSOC);
    }

//    Кол-во пользователей
    public function getUsersCount() {
        return $this->conn->query("select count(*) from users;")->fetch_row()[0];
    }
//    Кол-во страниц
    public function getPagesCount() {
        return ceil(((float)$this->getUsersCount())/$this->pageSize);
    }
//    Пользователь по ID
    public function getUserById($id) {
        return $this->conn->query('select * from users where id = "' . $id . '"')->fetch_assoc();
    }


//    Сохранение пользователя
    public function updateUser($id, $surname, $name, $middle_name, $is_male, $birthday, $phone_number, $address, $email, $comment) {
//        echo '<pre>';
//        print_r($_POST);
        $query = "
        update users set surname = '".$surname."',
                 name = '".$name."',
                 middle_name = '".$middle_name."',
                 is_male = '".$is_male."',
                 birthday = '".$birthday."',
                 phone_number = '".$phone_number."',
                 address = '".$address."',
                 email = '".$email."',
                 comment = '".$comment."' where id = '".$id."'";

//        echo 'query:<br>' . $query;
        $this->conn->query($query);
    }

//    Добавление нового пользователя
    public function addUser($surname, $name, $middle_name, $is_male, $birthday, $phone_number, $address, $email, $comment) {
        $this->conn->query("
        insert into users (
                   surname,
                   name,
                   middle_name,
                   is_male,
                   birthday,
                   phone_number,
                   address,
                   email,
                   comment)
        value ('".$surname."', 
               '".$name."',
               '".$middle_name."',
               '".$is_male."',
               '".$birthday."',
               '".$phone_number."',
               '".$address."',
               '".$email."',
               '".$comment."')
               ");
    }

//    Удаление пользователя
    public function deleteUserById(int $id) {
        $this->conn->query("delete from users where id = '".$id."'");
    }
}


$db = new Database();
?>
