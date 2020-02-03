<?php

require_once 'app-start.php';


?>

<?php require SITE_ROOT . 'master-page/Header/header.php'; ?>

<?php require SITE_ROOT . 'menu.php'?>

<!--<h1>Здесь будет контент</h1>-->
<?
//echo '<pre>';
$userNames = $db->getUserNames();
?>

<div class="split-view">
    <div class="user-edit-list">
<!--        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid architecto culpa delectus doloremque, fugiat id nam odio officiis placeat quae quam quisquam sed ullam unde. Ab eum ipsum sit?</span>-->
        <? for ($i = 0; $i <= sizeof($userNames) - 1; $i++):?>
            <div><a href="" class="user-edit-list__link"><?= $userNames[$i]['fullname'] ?></a></div>
        <?endfor?>
    </div>
    <form action="" class="edit-form">
        <h3>Редактирование</h3>
        <table>
            <tr>
                <td><label for="">Фамилия</label></td>
                <td><input type="text" required></td>
            </tr>
            <tr>
                <td><label for="">Имя</label></td>
                <td><input type="text" required></td>
            </tr>
            <tr>
                <td><label for="">Отчество</label></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>Пол</div>
                    <div><label for="male"><input name="male" id="male" type="radio" checked>Мужской</label> <label for="female"><input name="male" id="female" type="radio">Женский</label></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>Дата рождения</div>
                    <input type="date" required>
                </td>
            </tr>
            <tr>
                <td><label for="">Номер телефона</label></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><label for="">Адрес</label></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="email"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Сохранить" style="width: 100%; font-size: 20px;">
                </td>
            </tr>
        </table>
    </form>
</div>


<?php require SITE_ROOT . 'master-page/Footer/footer.php' ?>

