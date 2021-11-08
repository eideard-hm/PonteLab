<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php
    require_once('./Views/Components/stylesAspirante.php');
    ?>
    <!-- DataTables -->
    <link href="<?= assets_url_css() ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= assets_url_css() ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" />

    <!-- Responsive datatable examples -->
    <link href="<?= assets_url_css() ?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" />
</head>

<body class="right-column-fixed">
    <!-- loader Start -->
    <?php
    require_once('./Views/Components/loader.php');
    ?>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <?php require_once('./Views/Components/LoadingForms.php'); ?>
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/Layout.php');
        ?>

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <!-- Información aplicacion a vacantes -->
                            <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title titulo-perfil">Aplicaciones a vacantes de <b><?= $_SESSION['user-data']['nombreUsuario']; ?></b></h4>
                                                    </div>
                                                </div>
                                                <div class="iq-card-body" id="aplicaciones_vacante">
                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Id aplicación</th>
                                                                <th>Nombre vacante</th>
                                                                <th>Contratante</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="lista-vacantes">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Required datatable js -->
    <?php require_once('./Views/Components/ScriptsJs.php'); ?>
    <script src="<?= assets_url_js() ?>datatables/jquery.dataTables.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/dataTables.bootstrap4.min.js" defer></script>
    <!-- Buttons examples -->
    <script src="<?= assets_url_js() ?>datatables/dataTables.buttons.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/buttons.bootstrap4.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/jszip.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/pdfmake.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/vfs_fonts.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/buttons.html5.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/buttons.print.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/buttons.colVis.min.js" defer></script>
    <!-- Responsive examples -->
    <script src="<?= assets_url_js() ?>datatables/dataTables.responsive.min.js" defer></script>
    <script src="<?= assets_url_js() ?>datatables/responsive.bootstrap4.min.js" defer></script>

    <script async>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
                }
            });

            //Buttons examples
            let table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>