<?


//echo "<pre>";
?>


<div class="user-edit-list" style="margin-bottom: 32px;">

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

<div class="pagination">

    <? for ($i = 1; $i <= $db->getPagesCount(); $i++): ?>
        <div class="pagination__item"><a href="./?sort=<?=$_GET['sort']?>&page=<?=$i?>" class="pagination__link" <?= ($page == $i) ? 'disabled' : ''?>><?=$i?></a></div>
    <? endfor ?>
    <!--    <div class="pagination__item"><a href="" class="pagination__link">2</a></div>-->
<!--    <div class="pagination__item"><a href="" class="pagination__link">3</a></div>-->
<!--    <div class="pagination__item"><a href="" class="pagination__link">4</a></div>-->
<!--    <div class="pagination__item"><a href="" class="pagination__link">Последнаяя</a></div>-->
</div>
