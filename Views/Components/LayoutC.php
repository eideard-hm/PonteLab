<!-- Sidebar  -->
<div class="iq-sidebar">
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                    <a href="<?= URL ?>Menu" class="iq-waves-effect">
                        <i class="las la-home" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Inicio"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="<?= URL ?>Contratante/Perfil_Contratante" class="iq-waves-effect">
                        <i class="las la-user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Perfil"></i>
                        <span>Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="<?= URL ?>Vacante/Vacante" class="iq-waves-effect">
                        <i class="far fa-plus-square" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Vacantes"></i>
                        <span>Vacantes</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
<?php
require_once('./Views/Components/TopMenuC.php');
?>