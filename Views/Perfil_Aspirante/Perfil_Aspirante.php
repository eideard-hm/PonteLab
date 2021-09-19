<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $data['titulo_pagina'] ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= URL ?>Assets/img/Logo_ponslabor.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/responsive.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body class="right-column-fixed">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Menu de navegación -->
        <?php
        require_once('./Views/Components/Layout.php');
        ?>

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body profile-page p-0">
                                <div class="profile-header">
                                    <div class="cover-container">
                                        <img src="<?= URL ?>Assets/img/page-img/profile-bg1.jpg" alt="profile-bg" class="rounded img-fluid">
                                        <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                            <li><a href="javascript:void();"><i class="las la-pencil-alt"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="user-detail text-center mb-3">
                                        <div class="profile-img">
                                            <img src="<?= URL ?>Assets/img/Edier.jpeg" alt="profile-img" class="avatar-130 img-fluid" />
                                        </div>
                                        <div class="profile-detail">
                                            <h3 style="font-size: 18px;">Edier Heraldo Hernandez Molano</h3>
                                        </div>
                                    </div>
                                    <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                                        <div class="social-links">
                                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/08.png" class="img-fluid rounded" alt="facebook"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/09.png" class="img-fluid rounded" alt="Twitter"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/10.png" class="img-fluid rounded" alt="Instagram"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/11.png" class="img-fluid rounded" alt="Google plus"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/12.png" class="img-fluid rounded" alt="You tube"></a>
                                                </li>
                                                <li class="text-center pr-3">
                                                    <a href="#"><img src="<?= URL ?>Assets/img/icon/13.png" class="img-fluid rounded" alt="linkedin"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="user-tabing">
                                    <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                                        <li class="col-sm-6 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#timeline">Perfil</a>
                                        </li>
                                        <li class="col-sm-6 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#about">Información</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                                <div class="iq-card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">Información personal Aspirante</h4>
                                                    </div>
                                                </div>
                                                <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-img">
                                                            <img src="<?= URL ?>Assets/img/Edier.jpeg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                        </div>
                                                        <form class="post-text ml-3 w-100" action="javascript:void();">
                                                            <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-times"></i></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="user-img">
                                                                        <img src="<?= URL ?>Assets/img/Edier.jpeg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                                    </div>
                                                                    <form class="post-text ml-3 w-100" action="javascript:void();">
                                                                        <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                                    </form>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="about" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                                    <li>
                                                        <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact and Basic Info</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-toggle="pill" href="#family">Family and Relationship</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-toggle="pill" href="#work">Work and Education</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-toggle="pill" href="#lived">Places You've Lived</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" data-toggle="pill" href="#details">Details About You</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 pl-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                                        <h4>Contact Information</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">Bnijohn@gmail.com</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Mobile</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">(001) 4544 565 456</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Address</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">United States of America</p>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">Websites and Social Links</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Website</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">www.bootstrap.com</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Social Link</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">www.bootstrap.com</p>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">Basic Information</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <h6>Birth Date</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">24 January</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Birth Year</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">1994</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>Gender</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">Female</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>interested in</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">Designing</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6>language</h6>
                                                            </div>
                                                            <div class="col-9">
                                                                <p class="mb-0">English, French</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="family" role="tabpanel">
                                                        <h4 class="mb-3">Relationship</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add Your Relationship Status</h6>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <h4 class="mt-3 mb-3">Family Members</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add Family Members</h6>
                                                                </div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Paul Molive</h6>
                                                                    <p class="mb-0">Brothe</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Anna Mull</h6>
                                                                    <p class="mb-0">Sister</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Paige Turner</h6>
                                                                    <p class="mb-0">Cousin</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="work" role="tabpanel">
                                                        <h4 class="mb-3">Work</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add Work Place</h6>
                                                                </div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Themeforest</h6>
                                                                    <p class="mb-0">Web Designer</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>iqonicdesign</h6>
                                                                    <p class="mb-0">Web Developer</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>W3school</h6>
                                                                    <p class="mb-0">Designer</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                        </ul>
                                                        <h4 class="mb-3">Professional Skills</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add Professional Skills</h6>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <h4 class="mt-3 mb-3">College</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add College</h6>
                                                                </div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Lorem ipsum</h6>
                                                                    <p class="mb-0">USA</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="lived" role="tabpanel">
                                                        <h4 class="mb-3">Current City and Hometown</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Georgia</h6>
                                                                    <p class="mb-0">Georgia State</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Atlanta</h6>
                                                                    <p class="mb-0">Atlanta City</p>
                                                                </div>
                                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                                            </li>
                                                        </ul>
                                                        <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                                        <ul class="suggestions-lists m-0 p-0">
                                                            <li class="d-flex mb-4 align-items-center">
                                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                                <div class="media-support-info ml-3">
                                                                    <h6>Add Place</h6>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane fade" id="details" role="tabpanel">
                                                        <h4 class="mb-3">About You</h4>
                                                        <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.</p>
                                                        <h4 class="mt-3 mb-3">Other Name</h4>
                                                        <p>Bini Rock</p>
                                                        <h4 class="mt-3 mb-3">Favorite Quotes</h4>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
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
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <?php
    require_once('./Views/Components/Footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= URL ?>Assets/js/jquery.min.js" defer></script>
    <script src="<?= URL ?>Assets/js/popper.min.js" defer></script>
    <script src="<?= URL ?>Assets/js/bootstrap.min.js" defer></script>
    <!-- Custom JavaScript -->
    <script src="https://kit.fontawesome.com/ff77c957bf.js" crossorigin="anonymous"></script>
    <script src="<?= URL ?>Assets/js/custom.js" defer></script>
</body>

</html>