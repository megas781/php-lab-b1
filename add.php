<?
require_once 'app-start.php';
require_once 'Database.php';
?>
<?php require SITE_ROOT . 'master-page/Header/header.php'; ?>
<?php require SITE_ROOT . 'menu.php' ?>

<?
//Проверяем наличием данных в POST
$isAdded = isset($_POST['name']);

if ($isAdded) {
    //Добавляем
    $db->addUser(
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

?>
<div class="_flex-centering">

    <form action="add.php" method="post" class="add-form">

        <? if ($isAdded): ?>
            <h3><?= 'Пользователь ' . $_POST['surname'] . ' ' . $_POST['name'] . ' добавлен' ?></h3>
        <? else: ?>
            <h3>Добавление нового пользователя</h3>
            <table class="edit-form__table">
                <tr>
                    <td><label for="">Фамилия</label></td>
                    <td><input type="text" name="surname" required value=""></td>
                </tr>
                <tr>
                    <td><label for="">Имя</label></td>
                    <td><input type="text" name="name" required value=""></td>
                </tr>
                <tr>
                    <td><label for="">Отчество</label></td>
                    <td><input type="text" name="middle_name" value=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>Пол</div>
                        <div>
                            <label for="male"><input name="is_male" id="male" value="1"
                                                     type="radio" checked>Мужской</label>
                            <label for="female"><input name="is_male" id="female"
                                                       type="radio" value="0">Женский</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>Дата рождения</div>
                        <input type="date" name="birthday" value="" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Номер телефона</label></td>
                    <td><input type="tel" name="phone_number" value=""></td>
                </tr>
                <tr>
                    <td><label for="">Адрес</label></td>
                    <td><input type="text" name="address" value=""></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="email" name="email" value=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="comment" id="" style="width: 100%; font-size: 16px; resize: vertical"
                                  rows="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Сохранить" style="width: 100%; font-size: 20px;">
                    </td>
                </tr>
                <input type="hidden" name="id" value="">
            </table>
        <? endif; ?>
    </form>
</div>
