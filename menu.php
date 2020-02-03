<?// echo $app->getScriptFilename() ?>
<ul class="menu">
    <li class="menu-item <?= ($app->getScriptFilename() != '/index.php') ? 'active' : '' ?> ?>>"><a href="./index.php" class="menu-link">Просмотр</a>
        <ul class="submenu <?= ($app->getScriptFilename() != '/index.php') ? 'hidden' : ''?>">
            <li class="submenu-item <?= ((isset($_GET['sort']) and ($_GET['sort'] == 'by-date-added') or ($_GET['sort'] != 'by-surname' and $_GET['sort'] != 'by-birthday')))? 'active' : '' ?>"><a href="./?sort=by-date-added&page=<?=$page?>" class="submenu-link">В дате добавления</a></li>
            <li class="submenu-item <?= (isset($_GET['sort']) and $_GET['sort'] == 'by-surname')? 'active' : '' ?>"><a href="./?sort=by-surname&page=<?=$page?>" class="submenu-link">По фамилии</a></li>
            <li class="submenu-item <?= (isset($_GET['sort']) and $_GET['sort'] == 'by-birthday')? 'active' : '' ?>"><a href="./?sort=by-birthday&page=<?=$page?>" class="submenu-link">По дате рождения</a></li>
        </ul>
    </li>
    <li class="menu-item <?= ($app->getScriptFilename() != '/add.php') ? 'active' : ''?>"><a href="./add.php" class="menu-link">Добавление</a></li>
    <li class="menu-item <?= ($app->getScriptFilename() != '/edit.php') ? 'active' : ''?>"><a href="./edit.php" class="menu-link">Редактирование</a></li>
    <li class="menu-item <?= ($app->getScriptFilename() != '/delete.php') ? 'active' : ''?>"><a href="./delete.php" class="menu-link">Удаление</a></li>
</ul>
