<nav class="nav nav_menu">
    <a href="Menu"><i class="fas fa-home"></i>Inicio</a>
    <a href="#" class="active"><i class="fas fa-user-tie"></i>Aspirante</a>
    <a href="Estudios"><i class="fas fa-graduation-cap"></i>Estudios</a>
    <a href="Experiencia"><i class="fas fa-briefcase"></i>Experiencia</a>
    <a href="HojaVida"><i class="fas fa-folder"></i>Hoja de vida</a>
    <button class="switch" id="switch">
        <i class="fas fa-sun sol" title="Modo claro"></i>
        <i class="fas fa-moon luna" title="Modo oscuro"></i>
        <span class="circulo"></span>
    </button>
    <div class="imagen-persona">
        <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
    </div>
</nav>