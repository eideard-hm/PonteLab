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
                    <div class="col-lg-8 row m-0 p-0">
                        <div class="col-sm-12">
                            <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Create Post</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                                    <div class="d-flex align-items-center">
                                        <div class="user-img">
                                            <img src="images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle">
                                        </div>
                                        <form class="post-text ml-3 w-100" action="javascript:void();">
                                            <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                        </form>
                                    </div>
                                    <hr>
                                    <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                                        <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/07.png" alt="icon" class="img-fluid"> Photo/Video</li>
                                        <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</li>
                                        <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/09.png" alt="icon" class="img-fluid"> Feeling/Activity</li>
                                        <li class="iq-bg-primary rounded p-2 pointer">
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="post-option" data-toggle="dropdown">
                                                        <i class="ri-more-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option">
                                                        <a class="dropdown-item" href="#">Check in</a>
                                                        <a class="dropdown-item" href="#">Live Video</a>
                                                        <a class="dropdown-item" href="#">Gif</a>
                                                        <a class="dropdown-item" href="#">Watch Party</a>
                                                        <a class="dropdown-item" href="#">Play with Friend</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-img">
                                                        <img src="images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                    </div>
                                                    <form class="post-text ml-3 w-100" action="javascript:void();">
                                                        <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                                    </form>
                                                </div>
                                                <hr>
                                                <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/07.png" alt="icon" class="img-fluid"> Photo/Video
                                                        </div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/09.png" alt="icon" class="img-fluid"> Feeling/Activity
                                                        </div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/10.png" alt="icon" class="img-fluid"> Check in</div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/11.png" alt="icon" class="img-fluid"> Live Video</div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/12.png" alt="icon" class="img-fluid"> Gif</div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/13.png" alt="icon" class="img-fluid"> Watch Party
                                                        </div>
                                                    </li>
                                                    <li class="col-md-6 mb-3">
                                                        <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/14.png" alt="icon" class="img-fluid"> Play with
                                                            Friends</div>
                                                    </li>
                                                </ul>
                                                <hr>
                                                <div class="other-option">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="user-img mr-3">
                                                                <img src="images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                            </div>
                                                            <h6>Your Story</h6>
                                                        </div>
                                                        <div class="iq-card-post-toolbar">
                                                            <div class="dropdown">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                    <span class="btn btn-primary">Friend</span>
                                                                </span>
                                                                <div class="dropdown-menu m-0 p-0">
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-save-line"></i>
                                                                            </div>
                                                                            <div class="data ml-2">
                                                                                <h6>Public</h6>
                                                                                <p class="mb-0">Anyone on or off Facebook</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Friends</h6>
                                                                                <p class="mb-0">Your Friend on facebook</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Friends except</h6>
                                                                                <p class="mb-0">Don't show to some friends</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="dropdown-item p-3" href="#">
                                                                        <div class="d-flex align-items-top">
                                                                            <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                                                            <div class="data ml-2">
                                                                                <h6>Only Me</h6>
                                                                                <p class="mb-0">Only me</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-body">
                                    <div class="user-post-data">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle img-fluid" src="images/user/01.jpg" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h5 class="mb-0 d-inline-block"><a href="#" class="">Anna Sthesia</a></h5>
                                                <p class="mb-0 d-inline-block">Add New Post</p>
                                                <p class="mb-0 text-primary">Just Now</p>
                                            </div>
                                            <div class="iq-card-post-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                        <i class="ri-more-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu m-0 p-0">
                                                        <a class="dropdown-item p-3" href="#">
                                                            <div class="d-flex align-items-top">
                                                                <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                                                <div class="data ml-2">
                                                                    <h6>Save Post</h6>
                                                                    <p class="mb-0">Add this to your saved items</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item p-3" href="#">
                                                            <div class="d-flex align-items-top">
                                                                <div class="icon font-size-20"><i class="ri-close-circle-line"></i>
                                                                </div>
                                                                <div class="data ml-2">
                                                                    <h6>Hide Post</h6>
                                                                    <p class="mb-0">See fewer posts like this.</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item p-3" href="#">
                                                            <div class="d-flex align-items-top">
                                                                <div class="icon font-size-20"><i class="ri-user-unfollow-line"></i>
                                                                </div>
                                                                <div class="data ml-2">
                                                                    <h6>Unfollow User</h6>
                                                                    <p class="mb-0">Stop seeing posts but stay friends.</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="dropdown-item p-3" href="#">
                                                            <div class="d-flex align-items-top">
                                                                <div class="icon font-size-20"><i class="ri-notification-line"></i>
                                                                </div>
                                                                <div class="data ml-2">
                                                                    <h6>Notifications</h6>
                                                                    <p class="mb-0">Turn on notifications for this post</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at
                                            commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac
                                            massa sed rhoncus</p>
                                    </div>
                                    <div class="user-post">
                                        <div class="d-flex">
                                            <div class="col-md-6">
                                                <a href="javascript:void();"><img src="images/page-img/p2.jpg" alt="post-image" class="img-fluid rounded w-100"></a>
                                            </div>
                                            <div class="col-md-6 row m-0 p-0">
                                                <div class="col-sm-12">
                                                    <a href="javascript:void();"><img src="images/page-img/p1.jpg" alt="post-image" class="img-fluid rounded w-100"></a>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <a href="javascript:void();"><img src="images/page-img/p3.jpg" alt="post-image" class="img-fluid rounded w-100"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-area mt-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="like-block position-relative d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="like-data">
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                <img src="images/icon/01.png" class="img-fluid" alt="">
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <a class="ml-2 mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like"><img src="images/icon/01.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Love"><img src="images/icon/02.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Happy"><img src="images/icon/03.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="HaHa"><img src="images/icon/04.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Think"><img src="images/icon/05.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sade"><img src="images/icon/06.png" class="img-fluid" alt=""></a>
                                                                <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lovely"><img src="images/icon/07.png" class="img-fluid" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="total-like-block ml-2 mr-3">
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                140 Likes
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Max Emum</a>
                                                                <a class="dropdown-item" href="#">Bill Yerds</a>
                                                                <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                                <a class="dropdown-item" href="#">Tara Misu</a>
                                                                <a class="dropdown-item" href="#">Midge Itz</a>
                                                                <a class="dropdown-item" href="#">Sal Vidge</a>
                                                                <a class="dropdown-item" href="#">Other</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="total-comment-block">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                            20 Comment
                                                        </span>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Max Emum</a>
                                                            <a class="dropdown-item" href="#">Bill Yerds</a>
                                                            <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                            <a class="dropdown-item" href="#">Tara Misu</a>
                                                            <a class="dropdown-item" href="#">Midge Itz</a>
                                                            <a class="dropdown-item" href="#">Sal Vidge</a>
                                                            <a class="dropdown-item" href="#">Other</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="share-block d-flex align-items-center feather-icon mr-3">
                                                <a href="javascript:void();"><i class="ri-share-line"></i>
                                                    <span class="ml-1">99 Share</span></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <ul class="post-comments p-0 m-0">
                                            <li class="mb-2">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-img">
                                                        <img src="images/user/02.jpg" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                    </div>
                                                    <div class="comment-data-block ml-3">
                                                        <h6>Monty Carlo</h6>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                        <div class="d-flex flex-wrap align-items-center comment-activity">
                                                            <a href="javascript:void();">like</a>
                                                            <a href="javascript:void();">reply</a>
                                                            <a href="javascript:void();">translate</a>
                                                            <span> 5 min </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-img">
                                                        <img src="images/user/03.jpg" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                    </div>
                                                    <div class="comment-data-block ml-3">
                                                        <h6>Paul Molive</h6>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                        <div class="d-flex flex-wrap align-items-center comment-activity">
                                                            <a href="javascript:void();">like</a>
                                                            <a href="javascript:void();">reply</a>
                                                            <a href="javascript:void();">translate</a>
                                                            <span> 5 min </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                            <input type="text" class="form-control rounded">
                                            <div class="comment-attagement d-flex">
                                                <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                                <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                                                <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Stories</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="media-story m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                        <i class="ri-add-line font-size-18"></i>
                                        <div class="stories-data ml-3">
                                            <h5>Creat Your Story</h5>
                                            <p class="mb-0">time to story</p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center active">
                                        <img src="images/page-img/s2.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Anna Mull</h5>
                                            <p class="mb-0">1 hour ago</p>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center">
                                        <img src="images/page-img/s3.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Ira Membrit</h5>
                                            <p class="mb-0">4 hour ago</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="images/page-img/s1.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Bob Frapples</h5>
                                            <p class="mb-0">9 hour ago</p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary d-block mt-3">See All</a>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Events</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" role="button">
                                            <i class="ri-more-fill"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="media-story m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center ">
                                        <img src="images/page-img/s4.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Web Workshop</h5>
                                            <p class="mb-0">1 hour ago</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="images/page-img/s5.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Fun Events and Festivals</h5>
                                            <p class="mb-0">1 hour ago</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Upcoming Birthday</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="media-story m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                        <img src="images/user/01.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Anna Sthesia</h5>
                                            <p class="mb-0">Today</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="images/user/02.jpg" alt="story-img" class="rounded-circle img-fluid">
                                        <div class="stories-data ml-3">
                                            <h5>Paul Molive</h5>
                                            <p class="mb-0">Tomorrow</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Suggested Pages</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="false" role="button">
                                            <i class="ri-more-fill"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="suggested-page-story m-0 p-0 list-inline">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="images/page-img/42.png" alt="story-img" class="rounded-circle img-fluid avatar-50">
                                            <div class="stories-data ml-3">
                                                <h5>Iqonic Studio</h5>
                                                <p class="mb-0">Lorem Ipsum</p>
                                            </div>
                                        </div>
                                        <img src="images/small/img-1.jpg" class="img-fluid rounded" alt="Responsive image">
                                        <div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i>
                                                Like Page</a></div>
                                    </li>
                                    <li class="">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="images/page-img/42.png" alt="story-img" class="rounded-circle img-fluid avatar-50">
                                            <div class="stories-data ml-3">
                                                <h5>Cakes & Bakes </h5>
                                                <p class="mb-0">Lorem Ipsum</p>
                                            </div>
                                        </div>
                                        <img src="images/small/img-2.jpg" class="img-fluid rounded" alt="Responsive image">
                                        <div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i>
                                                Like Page</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <img src="<?= URL ?>Assets/img/page-load-loader.gif" alt="loader" style="height: 100px;">
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

    <!-- Scripts  -->
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
    <script src="<?= URL ?>Assets/js/menu.js" defer></script>
</body>

</html>