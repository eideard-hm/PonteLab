<h3><?php echo $_SESSION['user-data']['nombreUsuario'] ?><br /><span><?php echo $_SESSION['user-data']['nombreRol'] ?></span></h3>
<ul>
    <li><i class="fas fa-user-edit"></i><a href="Perfil_Aspirante">Editar perfil</a></li>
    <li><i class="fas fa-user-circle"></i><a href="Perfil_Aspirante">Cambiar foto</a></li>
    <li><i class="fas fa-key"></i><a href="Recuperar_Password">Cambiar contraseña</a></li>
    <li>
        <i class="fas fa-sign-in-alt"></i><a href="<?= URL ?>logout">Cerrar sesión</a>
    </li>
</ul>