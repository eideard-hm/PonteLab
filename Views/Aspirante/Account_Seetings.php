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
        <div id="content-page" class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Account Setting</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="acc-edit">
                                    <form>
                                        <div class="form-group">
                                            <label for="uname">User Name:</label>
                                            <input type="text" class="form-control" id="uname" value="Bni@01">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Id:</label>
                                            <input type="email" class="form-control" id="email" value="Bnijohn@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="altemail">Alternate Email:</label>
                                            <input type="email" class="form-control" id="altemail" value="designtheme@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block">Language Known:</label>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="english" checked="">
                                                <label class="custom-control-label" for="english">English</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="french" checked="">
                                                <label class="custom-control-label" for="french">French</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="hindi">
                                                <label class="custom-control-label" for="hindi">Hindi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="spanish" checked="">
                                                <label class="custom-control-label" for="spanish">Spanish</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="arabic">
                                                <label class="custom-control-label" for="arabic">Arabic</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="italian">
                                                <label class="custom-control-label" for="italian">Italian</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Social Media</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="acc-edit">
                                    <form>
                                        <div class="form-group">
                                            <label for="facebook">Facebook:</label>
                                            <input type="text" class="form-control" id="facebook" value="www.facebook.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">Twitter:</label>
                                            <input type="text" class="form-control" id="twitter" value="www.twitter.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="google">Google +:</label>
                                            <input type="text" class="form-control" id="google" value="www.google.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">Instagram:</label>
                                            <input type="text" class="form-control" id="instagram" value="www.instagram.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube">You Tube:</label>
                                            <input type="text" class="form-control" id="youtube" value="www.youtube.com">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
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
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
</body>

</html>