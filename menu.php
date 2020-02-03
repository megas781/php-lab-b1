<ul class="menu">
    <li class="menu-item active">
        <a href="" class="menu-link">Просмотр</a>
        <ul class="submenu">
            <li class="submenu-item <?= (isset($_GET['sort']) and ($_GET['sort'] === 'by-date-added' or $_GET['sort'] !== 'by-surname' and $_GET['sort'] !== 'by-birthday'))? 'active' : '' ?>"><a href="./?sort=by-date-added" class="submenu-link">В дате добавления</a></li>
            <li class="submenu-item <?= (isset($_GET['sort']) and $_GET['sort'] === 'by-surname')? 'active' : '' ?>"><a href="./?sort=by-surname" class="submenu-link">По фамилии</a></li>
            <li class="submenu-item <?= (isset($_GET['sort']) and $_GET['sort'] === 'by-birthday')? 'active' : '' ?>"><a href="./?sort=by-birthday" class="submenu-link">По дате рождения</a></li>
        </ul>
    </li>
    <li class="menu-item"><a href="" class="menu-link">Добавление</a></li>
    <li class="menu-item"><a href="" class="menu-link">Редактирование</a></li>
    <li class="menu-item"><a href="" class="menu-link">Удаление</a></li>
</ul>
