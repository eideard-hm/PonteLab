<ul class="navbar-list">
    <li>
        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
            <i class="las la-caret-down"></i>
        </a>
        <div class="iq-sub-dropdown iq-user-dropdown">
            <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                    <div class="bg-primary p-3 line-height">
                        <h5 class="mb-0 text-white line-height">Hola <?= $_SESSION['user-data']['nombreUsuario'] ?></h5>
                        <span class="text-white font-size-12"><?= $_SESSION['user-data']['nombreRol'] ?></span>
                    </div>
                    <a href="<?= URL ?>Aspirante/Perfil_Aspirante" class="iq-sub-card iq-bg-primary-hover">
                        <div class="media align-items-center">
                            <div class="rounded iq-card-icon iq-bg-primary">
                                <i class="las la-user-circle"></i>
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0 ">Mi perfil</h6>
                                <p class="mb-0 font-size-12">Ver detalles del perfil personal.</p>
                            </div>
                        </div>
                    </a>
                    <a href="<?= URL ?>Aspirante/Edit_Profile_Aspirante" class="iq-sub-card iq-bg-warning-hover">
                        <div class="media align-items-center">
                            <div class="rounded iq-card-icon iq-bg-warning">
                                <i class="las la-user-edit"></i>
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0 ">Editar perfil</h6>
                                <p class="mb-0 font-size-12">
                                    Modifica tus datos personales.</p>
                            </div>
                        </div>
                    </a>
                    <a href="<?= URL ?>Aspirante/Account_Seetings" class="iq-sub-card iq-bg-info-hover">
                        <div class="media align-items-center">
                            <div class="rounded iq-card-icon iq-bg-info">
                                <i class="las la-user-cog"></i>
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0 ">Configuración de la cuenta</h6>
                                <p class="mb-0 font-size-12">Configurar los parámetros de su cuenta.</p>
                            </div>
                        </div>
                    </a>
                    <div class="d-inline-block w-100 text-center p-3">
                        <a class="bg-primary iq-sign-btn" href="<?= URL ?>logout" role="button"><i class="fas fa-sign-out-alt"></i> Cerrar sesión<i class="ri-login-box-line ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>