<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['titulo_pagina'] ?></title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php
    require_once('./Views/Components/stylesContratante.php');
    ?>
</head>

<body class="right-column-fixed" id="menu">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/LoadingForms.php');
        require_once('./Views/Components/LayoutC.php');
        ?>
        <!-- Page Content  -->
        <div id="page-content" class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <h2 class="mb-4">Registro de Vacantes</h2>
                                    </div>
                                </div>
                                <ul id="top-tab-list" class="p-0">
                                    <li class="active" id="account">
                                        <a href="javascript:void();">
                                            <i class="fas fa-pen-alt"></i><span>Datos Básicos</span>
                                        </a>
                                    </li>
                                    <li id="personal" class="">
                                        <a href="javascript:void();">
                                            <i class="fas fa-user-circle"></i><span>Datos Adicionales</span>
                                        </a>
                                    </li>
                                    <li id="payment" class="">
                                        <a href="javascript:void();">
                                            <i class="far fa-image"></i><span>Requisitos</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset style="position: relative; opacity: 1;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-6 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form method="POST" id="form-vacancy" class="forms-sample">
                                                            <input type="hidden" id="idVacancy" name="idVacancy" value="">
                                                            <div class="form-group">
                                                                <label for="nombre"> Nombre Vacante *</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" placeholder="Nombre Vacante..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cantidad"> Cantidad de Vacantes *</label>
                                                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantida de Vacantes..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Especificaciones *</label>
                                                                <textarea class="form-control" name="especificaciones" id="especificaciones" placeholder="Especificaciones..." required></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="tipoContrato"> Tipo de Contrato *</label>
                                                            <select class="form-control" name="tipoContrato" id="tipoContrato" required>
                                                                <option value="" disabled selected>Seleccion Tipo de
                                                                    Contranto</option>
                                                                <option value="1">Contrato por Obra o Labor</option>
                                                                <option value="2">Contrato a Termino Fijo</option>
                                                                <option value="3">Contrato a Termino Indefinido
                                                                </option>
                                                                <option value="4">Contrato de Aprendizaje</option>
                                                                <option value="5">Contrato Temporal, Ocacional o
                                                                    Accidental</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sueldo"> Sueldo *</label>
                                                            <input type="number" class="form-control" name="sueldo" id="sueldo" autocomplete="off" placeholder="Sueldo..." required>
                                                        </div>
                                                        <div class="form-group"">
                                                            <label> Perfil del Trabajador *</label>
                                                            <textarea class=" form-control" name="perfil" id="perfil" placeholder="Perfil del Trabajador..." required>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Siguiente</button>
                                </fieldset>
                                <fieldset style="display: none; opacity: 0; position: relative;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="fechapublicacion"> Fecha de
                                                                Publicacion *</label>
                                                            <input type="datetime-local" class="form-control" name="fechapublicacion" id="fechapublicacion" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fechacierre"> Fecha de Cierre *</label>
                                                            <input type="datetime-local" class="form-control" name="fechacierre" id="fechacierre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="direccion"> Dirección *</label>
                                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección..." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estado"> Estado *</label>
                                                            <select class="form-control" name="estado" id="estado" required>
                                                                <option value="" disabled selected>Seleccion Estado
                                                                </option>
                                                                <option value="1">Activo</option>
                                                                <option value="2">Inactivo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="idSectorFK"> Sector *</label>
                                                            <select class="form-control" name="idSectorFK" id="idSectorFK" required>
                                                                <option selected disabled value="">--- Seleccione el
                                                                    Sector ---</option>
                                                                <?php foreach ($data['list_sector'] as $sector) : ?>
                                                                    <option value="<?php echo $sector['idSector'] ?>">
                                                                        <?php echo $sector['nombreSector'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <button type="submit" id="btn_submit" class="btn btn-primary mr-2 mb-3"> Registrar
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Siguiente</button>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Anterior</button>
                                </fieldset>
                                <fieldset style="display: none; opacity: 0; position: relative;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="fechapublicacion"> Fecha de
                                                                Publicacion *</label>
                                                            <input type="datetime-local" class="form-control" name="fechapublicacion" id="fechapublicacion" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fechacierre"> Fecha de Cierre *</label>
                                                            <input type="datetime-local" class="form-control" name="fechacierre" id="fechacierre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="direccion"> Dirección *</label>
                                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección..." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estado"> Estado *</label>
                                                            <select class="form-control" name="estado" id="estado" required>
                                                                <option value="" disabled selected>Seleccion Estado
                                                                </option>
                                                                <option value="1">Activo</option>
                                                                <option value="2">Inactivo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="idSectorFK"> Sector *</label>
                                                            <select class="form-control" name="idSectorFK" id="idSectorFK" required>
                                                                <option selected disabled value="">--- Seleccione el
                                                                    Sector ---</option>
                                                                <?php foreach ($data['list_sector'] as $sector) : ?>
                                                                    <option value="<?php echo $sector['idSector'] ?>">
                                                                        <?php echo $sector['nombreSector'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <button type="submit" id="btn_submit" class="btn btn-primary mr-2 mb-3"> Registrar
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Siguiente</button>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Anterior</button>
                                </fieldset>
                                <fieldset style="display: block; opacity: 0; position: relative;">
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-6 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form method="POST" id="form-vacancy" class="forms-sample">
                                                            <input type="hidden" id="idVacancy" name="idVacancy" value="">
                                                            <div class="form-group">
                                                                <label for="nombre"> Nombre Vacante *</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" placeholder="Nombre Vacante..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cantidad"> Cantidad de Vacantes *</label>
                                                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantida de Vacantes..." required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Especificaciones *</label>
                                                                <textarea class="form-control" name="especificaciones" id="especificaciones" placeholder="Especificaciones..." required></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="tipoContrato"> Tipo de Contrato *</label>
                                                            <select class="form-control" name="tipoContrato" id="tipoContrato" required>
                                                                <option value="" disabled selected>Seleccion Tipo de
                                                                    Contranto</option>
                                                                <option value="1">Contrato por Obra o Labor</option>
                                                                <option value="2">Contrato a Termino Fijo</option>
                                                                <option value="3">Contrato a Termino Indefinido
                                                                </option>
                                                                <option value="4">Contrato de Aprendizaje</option>
                                                                <option value="5">Contrato Temporal, Ocacional o Accidental</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sueldo"> Sueldo *</label>
                                                            <input type="number" class="form-control" name="sueldo" id="sueldo" autocomplete="off" placeholder="Sueldo..." required>
                                                        </div>
                                                        <div class="form-group"">
                                                            <label> Perfil del Trabajador *</label>
                                                            <textarea class=" form-control" name="perfil" id="perfil" placeholder="Perfil del Trabajador..." required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Anterior</button>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <?php
    require_once('./Views/Components/Footer.php');
    ?>
    <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/vacante.js" defer type="module"></script>
</body>

</html>