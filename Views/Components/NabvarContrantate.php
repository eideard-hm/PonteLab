<a href="<?= URL ?>Menu/Menu_Contratante" class="active"><i class="fas fa-home"></i>Inicio</a>
<a href="<?= URL ?>Contratante"><i class="fas fa-user-tie"></i>Contratante</a>
<a href="<?= URL ?>Vacante"><i class="fas fa-business-time"></i>Vacante</a>

<button class="switch" id="switch">
    <i class="fas fa-sun sol"></i>
    <i class="fas fa-moon luna"></i>
    <span class="circulo"></span>
</button>
<div class="imagen-persona">
    <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
</div>