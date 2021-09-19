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
                <?php
                require_once('./Views/Components/ListPerfil.php');
                ?>
            </div>
        </nav>
    </div>
</div>