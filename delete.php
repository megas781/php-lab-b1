<?
require_once 'app-start.php';
require_once 'Database.php';
?>
<?php require SITE_ROOT . 'master-page/Header/header.php'; ?>
<?php require SITE_ROOT . 'menu.php' ?>

<?

//Достаем список для ссылок
$userNames = $db->getUserNames();

//Если вдруг нет пользователей в списке
if (sizeof($userNames) == 0) {
    echo '<h2><i>Вас в списке еще нет ниодного пользователя. Добавте кого-нибудь и возвращаейтесь))</i></h2>';
    goto footer;
}




//echo '<pre>';
//print_r($userNames);
?>
<div class="_flex-centering">
    <h3>Удаление пользователя</h3>
    <? if (isset($_GET['userId']) and ((int)$_GET['userId']) > 0):
        $user = $db->getUserById($_GET['userId']);
    $db->deleteUserById($_GET['userId']);
    ?>

    <h2>Запись пользователя '<?= $user['surname'] . ' ' . $user['name'] . ' ' . $user['middle_name']  ?>' удалена</h2>

        <a href="./delete.php">Вернуться к удалению</a>

    <? else: ?>
        <div class="user-edit-list">
            <? for ($i = 0; $i <= sizeof($userNames) - 1; $i++):
                $user = $userNames[$i];?>
                <div class="user-edit-list__item"><a href="?userId=<?= $userNames[$i]['id'] ?>"
                                                     class="user-edit-list__link"><?= $user['surname'] . ' ' . $user['name_abbr'] . '. ' . ($user['middle_name_abbr'] != '' ?' ' . $user['middle_name_abbr'] . '.' : '')  ?></a></div>
            <? endfor ?>
        </div>
    <? endif;?>
</div>

<?php
footer:
require SITE_ROOT . 'master-page/Footer/footer.php' ?>

