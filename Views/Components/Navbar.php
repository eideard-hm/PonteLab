<header class="header">
    <!--header-start-->
    <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" width="65" height="65" alt="PonsLabor" class="logo1" />

    <div class="logo">
        <h3>Pons<span></span>Labor.</span></h3>
    </div>
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
            <a href="#">
                <button class="switch" id="switch">
                    <i class="fas fa-sun sol"></i>
                    <i class="fas fa-moon luna"></i>
                    <span class="circulo"></span>
                </button>
            </a>
        </li>
        <li><a href="<?= URL; ?>"><i class="fas fa-home menu_icon"></i>Página de inicio</a></li>
        <li><a href="<?= URL; ?>Login"><i class="fas fa-sign-in-alt menu_icon"></i>Iniciar Sesion</a></li>
        <li><a href="<?= URL; ?>Registro"><i class="fas fa-user-plus menu_icon"></i>Crear Cuenta</a></li>
        <li><a href="#"><i class="fas fa-id-card menu_icon"></i>Contactanos</a></li>
    </ul>
</nav>