<?php

require_once 'app-start.php';
require_once 'Database.php';

?>

<?php require SITE_ROOT . 'master-page/Header/header.php'; ?>

<?php require SITE_ROOT . 'menu.php' ?>

<!--<h1>Здесь будет контент</h1>-->
<?
//Действия по нажатии на сохранение
do {
    if (isset($_POST['id'])) {
//        print_r($_POST);
        $db->updateUser(
            $_POST['id'],
            $_POST['surname'],
            $_POST['name'],
            $_POST['middle_name'],
            $_POST['is_male'],
            $_POST['birthday'],
            $_POST['phone_number'],
            $_POST['address'],
            $_POST['email'],
            $_POST['comment']);
    }
} while (false);


//Сохранение
$isSaved = isset($_POST['id']);

//Достаем список для ссылок
$userNames = $db->getUserNames();

//Если вдруг нет пользователей в списке
if (sizeof($userNames) == 0) {
    echo '<h2><i>Вас в списке еще нет ниодного пользователя. Добавте кого-нибудь и возвращаейтесь))</i></h2>';
    goto footer;
}

// Если нет запрошенного пользователя, то устанавливаем первого в списке
if (isset($_GET['userId']) and is_int((int)$_GET['userId'])) {
    $editedUser = $db->getUserById($_GET['userId']);
} else {
    $editedUser = $db->getUserById($userNames[0]['id']);
}
?>

<div class="split-view">
    <div class="user-edit-list">
        <? for ($i = 0; $i <= sizeof($userNames) - 1; $i++): ?>
            <div><a href="?userId=<?= $userNames[$i]['id'] ?>"
                    class="user-edit-list__link"><?= $userNames[$i]['fullname'] ?></a></div>
        <? endfor ?>
    </div>
    <form action="edit.php" method="post" class="edit-form">

        <? if ($isSaved): ?>
            <h3><?= 'Пользователь ' . $_POST['surname'] . ' ' . $_POST['name'] . ' сохранен' ?></h3>
        <? else: ?>
            <h3>Редактирование</h3>
            <table class="edit-form__table">
                <tr>
                    <td><label for="">Фамилия</label></td>
                    <td><input type="text" name="surname" required value="<?= $editedUser['surname'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Имя</label></td>
                    <td><input type="text" name="name" required value="<?= $editedUser['name'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Отчество</label></td>
                    <td><input type="text" name="middle_name" value="<?= $editedUser['middle_name'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>Пол</div>
                        <div>
                            <label for="male"><input name="is_male" id="male" value="1"
                                                     type="radio" <?= $editedUser['is_male'] == 1 ? 'checked' : '' ?>>Мужской</label>
                            <label for="female"><input name="is_male" id="female"
                                                       type="radio" value="0" <?= $editedUser['is_male'] != 1 ? 'checked' : '' ?>>Женский</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>Дата рождения</div>
                        <input type="date" name="birthday" value="<?= $editedUser['birthday'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Номер телефона</label></td>
                    <td><input type="tel" name="phone_number" value="<?= $editedUser['phone_number'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Адрес</label></td>
                    <td><input type="text" name="address" value="<?= $editedUser['address'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="email" name="email" value="<?= $editedUser['email'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="comment" id="" style="width: 100%; font-size: 16px; resize: vertical" rows="4"><?=$editedUser['comment']?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Сохранить" style="width: 100%; font-size: 20px;">
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?= $editedUser['id'] ?>">
            </table>
        <? endif; ?>
    </form>
</div>


<?php
footer:
require SITE_ROOT . 'master-page/Footer/footer.php' ?>

