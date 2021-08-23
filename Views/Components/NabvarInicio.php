<header class="menu_header" id="header_menu">
    <div class="contenedor barra">
        <a href="#" class="content-logo">
            <img src="<?= URL; ?>Assets/img/Logo_ponslabor.png" alt="Ponstelab" class="logo" />
        </a>
        <nav class="navbar_menu">
            <a href="<?= URL ?>"><i class="fas fa-home" style="margin-right: 5px;"></i>Inicio</a>
            <a href="<?= URL ?>#section-nosotros"><i class="fas fa-business-time" style="margin-right: 5px;"></i>Nosotros</a>
            <button class="switch dark-mode" id="switch">
                <i class="fas fa-sun sol"></i>
                <i class="fas fa-moon luna"></i>
                <span class="circulo"></span>
            </button>
            <a href="<?= URL ?>Login" class="btn-init iniciar">Iniciar sesión</a>
            <a href="<?= URL ?>Registro" class="btn-init registro">Registrarse</a>
        </nav>
    </div>
</header>