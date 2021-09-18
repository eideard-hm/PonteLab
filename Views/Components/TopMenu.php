<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="<?= URL ?>Menu">
                    <img src="<?= URL ?>Assets/img/logo_pontelab.png" class="img-fluid" alt="PonteLab">
                </a>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle">
                            <i class="las la-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-search-bar">
                <form action="#" class="searchbox">
                    <input type="search" id="txtSearchVacantes" class="text search-input" name="txtSearchVacantes" placeholder="Ingrese lo que desea buscar" />
                    <a class="search-link" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Buscar">
                        <i class="las la-search"></i>
                    </a>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="las la-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li>
                        <a href="profile.html" class="iq-waves-effect d-flex align-items-center">
                            <img src="<?= URL ?>Assets/img/Edier.jpeg" class="img-fluid rounded-circle mr-3" alt="user">
                            <div class="caption">
                                <h6 class="mb-0 line-height" style="font-size: 15px;">Edier Heraldo <br> Hernandez Molano</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URL ?>Menu" class="iq-waves-effect d-flex align-items-center" data-toggle="tooltip" data-placement="bottom" data-original-title="Inicio">
                            <i class="las la-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URL ?>Vacante/ListaEmpleos" class="iq-waves-effect d-flex align-items-center" data-toggle="tooltip" data-placement="bottom" data-original-title="Empleos">
                            <i class="las la-briefcase"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-list">
                    <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                            <i class="las la-caret-down"></i>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3 line-height">
                                        <h5 class="mb-0 text-white line-height">Hola Edier Hernandez</h5>
                                        <span class="text-white font-size-12">Aspirante</span>
                                    </div>
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
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
                                    <a href="profile-edit.html" class="iq-sub-card iq-bg-warning-hover">
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
                                    <a href="account-setting.html" class="iq-sub-card iq-bg-info-hover">
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
                                    <a href="privacy-setting.html" class="iq-sub-card iq-bg-danger-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-danger">
                                                <i class="las la-shield-alt"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Configuración de seguridad</h6>
                                                <p class="mb-0 font-size-12">Controle sus parámetros de seguridad.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Cerrar sesión<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>