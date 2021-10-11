<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Solicitud de aplicación a vacantes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= URL ?>Assets/css/responsive.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title d-flex">
                            <h4 class="card-title text-center">PonteLab</h4>
                            <a class="navbar-brand nomargin">
                                <img src="<?=URL;?>Assets/img/Logo_ponslabor.png">
                            </a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2">
                                <button class="btn btn-sm iq-bg-success"><i class="ri-add-fill"><span class="pl-1">Add New</span></i>
                                </button>
                            </span>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Company Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Sort</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td contenteditable="true">Gio Metric</td>
                                        <td contenteditable="true">25</td>
                                        <td contenteditable="true">Deepends</td>
                                        <td contenteditable="true">Spain</td>
                                        <td contenteditable="true">Madrid</td>
                                        <td>
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td contenteditable="true">Manny Petty</td>
                                        <td contenteditable="true">45</td>
                                        <td contenteditable="true">Insectus</td>
                                        <td contenteditable="true">France</td>
                                        <td contenteditable="true">San Francisco</td>
                                        <td>
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td contenteditable="true">Lucy Tania</td>
                                        <td contenteditable="true">26</td>
                                        <td contenteditable="true">Isotronic</td>
                                        <td contenteditable="true">Germany</td>
                                        <td contenteditable="true">Frankfurt am Main</td>
                                        <td>
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                        </td>
                                    </tr>
                                    <tr class="hide">
                                        <td contenteditable="true">Anna Mull</td>
                                        <td contenteditable="true">35</td>
                                        <td contenteditable="true">Portica</td>
                                        <td contenteditable="true">USA</td>
                                        <td contenteditable="true">Oregon</td>
                                        <td>
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>