<?



require_once 'Database.php';

//Здесь будут многочисленные проверки массива $_GET и $_POST
if (isset($_GET['sort']) and array_search($_GET['sort'], ['by-date-added', 'by-surname', 'by-birthday'])) {
    $sort = $_GET['sort'];
} else {
    $sort = 'by-date-added';
}
$userList = $db->getUserPage(1, $sort);

//echo "<pre>";
?>


<div class="user-list" style="margin-bottom: 32px;">

<? for ($i = 0; $i <= sizeof($userList) - 1; $i++):
    $user = $userList[$i];?>

    <div class="user-cell">

        <h2 class="user-name"><?= $user['surname'] . ' ' . $user['name'] . ' ' . $user['middle_name'] ?></h2>
        <div>Пол: <span class="user__prop-value"><?= $user['is_male'] ? 'Мужской' : 'Женский' ?></span></div>
        <div>Дата рождения: <span class="user__prop-value"><?= $user['birthday'] ?></span></div>
        <div>Телефон: <span class="user__prop-value"><?= $user['phone_number'] ?></span></div>
        <div>Адрес: <span class="user__prop-value"><?= $user['address'] ?></span></div>
        <div>Email: <span class="user__prop-value"><?= $user['email'] ?></span></div>
        <div>Комментарий: <br><i><?= $user['comment'] ?></i></div>
    </div>

<? endfor ?>
</div>
