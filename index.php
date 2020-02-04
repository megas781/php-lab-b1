<?php

require_once 'app-start.php';


?>

<?php require SITE_ROOT . 'master-page/Header/header.php'; ?>

<?

require_once 'Database.php';

//Здесь будут многочисленные проверки массива $_GET и $_POST
if (isset($_GET['sort']) and array_search($_GET['sort'], ['by-date-added', 'by-surname', 'by-birthday'])) {
    $sort = $_GET['sort'];
} else {
    $sort = 'by-date-added';
}
if (isset($_GET['page']) and is_integer((int) $_GET['page']) and ((int) $_GET['page'] > 0)) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$userList = $db->getUserPage($page, $sort);

?>

<?php require SITE_ROOT . 'menu.php'?>

<? require 'viewer.php'?>


<?php require SITE_ROOT . 'master-page/Footer/footer.php' ?>

