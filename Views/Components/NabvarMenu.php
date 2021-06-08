<header class="header">
    <!--header-start-->
    <div class="logo">
        <a class="navbar-brand " href="#" style="color: #ffff;">
            <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="" width="80" height="80" class="d-inline-block align-text-top ">
        </a>
    </div>
    <h1 class="h1" style="text-align: center;"> PonsLabor</h1>
    <a href="#" class="nav_ico">
        <label for="menu_trigger">
        </label>
        <span></span>
        <span></span>
        <span></span>
    </a>
</header>
<!--header-end-->

<input type="radio" id="menu_trigger" name="menu_close">
<nav class="side_nav">
    <span class="close_icon">+
        <input type="radio" name="menu_close">
    </span>
    <ul>
        <li>
            <a class="navbar-brand" href="#">
                <img src="<?= URL; ?>Assets/img/perfil.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                Martushis
            </a>
        </li>
        <li>
            <a href="#">
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
            </a>
        </li>
        <li><a href="Contratante">Contratante</a></li>
        <li><a href="Vacante">Vacante</a></li>
        <li><a href="Aspirante">Aspirante</a></li>
        <li><a href="HojaVida">Hoja de Vida</a></li>
        <li><a href="#">Realizar Encuestas </a></li>
        <li><a href="#">Consultar contactos </a></li>
        <li><a href="<?= URL; ?>Login">Cerrar sesión</a></li>
    </ul>
</nav>