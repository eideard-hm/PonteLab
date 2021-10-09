<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $data['titulo_pagina'] ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= URL; ?>Assets/img/Logo_ponslabor.ico" type="image/x-icon" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" /> -->
  <!-- CSS -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/stylesMenu.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="<?= URL ?>Assets/css/responsive.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    require_once('./Views/Components/LayoutC.php');
    ?>
    <!-- Page Content  -->
    <div id="page-content" class="content-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Registro Vacantes</h4>
                <div id="wizardVertical">
                  <h2>First Step</h2>
                  <section>
                    <h4>Heading</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas arcu sem, hendrerit a tempor quis, 
                        sagittis accumsan tellus. In hac habitasse platea dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus. 
                        Nam tellus dolor, tristique ac tempus nec, iaculis quis nisi.</p>
                  </section>
  
                  <h2>Second Step</h2>
                  <section>
                    <h4>Heading</h4>
                    <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque. 
                        In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum 
                        dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur. 
                        In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam. 
                        Donec non pulvinar urna. Aliquam id velit lacus.</p>
                  </section>
  
                  <h2>Third Step</h2>
                  <section>
                    <h4>Heading</h4>
                    <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                        pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
                        Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                        venenatis.</p>
                  </section>
  
                  <h2>Forth Step</h2>
                  <section>
                    <h4>Heading</h4>
                    <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                        Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                        Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                  </section>
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
  <!-- Scripts  -->
  <?php
  require_once('./Views/Components/ScriptsJs.php');
  ?>  
  <script src="<?= URL ?>Assets/js/vacante.js"></script>  
  <!-- custom js for this page -->
  <script src="<?= URL ?>Assets/js/wizard.js"></script>
</body>
</html>


<!-- 
<body>
  <header id="header_menu">
    <div class="contenedor barra">
      <?php
      require_once('./Views/Components/NabvarLogo.php');
      ?>
      <nav class="nav nav_menu">
        <a href="<?= URL ?>Menu/Menu_Contratante"><i class="fas fa-home"></i>Inicio</a>
        <a href="<?= URL ?>Contratante"><i class="fas fa-user-tie"></i>Contratante</a>
        <a href="#" class="active"><i class="fas fa-business-time"></i>Vacante</a>

        <button class="switch" id="switch">
          <i class="fas fa-sun sol"></i>
          <i class="fas fa-moon luna"></i>
          <span class="circulo"></span>
        </button>
        <div class="imagen-persona">
          <img src="<?php echo $_SESSION['imgProfile']; ?>" id="imagen_perfil" data-id="<?php echo $_SESSION['id']; ?>" alt="<?php echo $_SESSION['user-data']['nombreUsuario'] ?>" />
        </div>
      </nav>
    </div>
    <div class="info-persona">
      <?php
      require_once('./Views/Components/NabvarInfoContratante.php');
      ?>
    </div>
    <div class="contenedor-responsive">
      <?php
      require_once('./Views/Components/NabvarResponsiveContratante.php');
      ?>
    </div>
  </header>

  <div class="content">
    <div class="vac-form">
      <h2 class="name"><span>Registro</span> Vacante</h2>

      <form method="POST" id="form-vacancy">
        <input type="hidden" id="idVacancy" name="idVacancy" value="">
        <p>
          <label for="nombre"> Nombre</label>
          <input minlength="1" maxlength="10" pattern="[a-zA-Z]+" type="text" name="nombre" id="nombre" placeholder="Nombre..." required />
        </p>
        <p>
          <label for="cantidad"> Cantidad de Vacantes</label>
          <input minlength="1" maxlength="10" pattern="[0-9]+" type="number" name="cantidad" id="cantidad" placeholder="Cantida de Vacantes..." required />
        </p>
        <p class="block">
          <label for="especificaciones"> Especificaciones </label>
          <br>
          <textarea name="especificaciones" id="especificaciones" rows="1" placeholder="Especificaciones..." required></textarea>
        </p>
        <p class="block">
          <label for="perfil"> Perfil del Trabajador</label>
          <br>
          <textarea type="text" name="perfil" id="perfil" rows="1" placeholder="Perfil del Trabajador..." required></textarea>
        </p>
        <p>
          <label for="tipoContrato"> Tipo de Contrato</label>
          <select name="tipoContrato" id="tipoContrato" required>
            <option value="" disabled selected>Seleccion Tipo de Contranto</option>
            <option value="1">Contrato por Obra o Labor</option>
            <option value="2">Contrato a Termino Fijo</option>
            <option value="3">Contrato a Termino Indefinido</option>
            <option value="4">Contrato de Aprendizaje</option>
            <option value="5">Contrato Temporal, Ocacional o Accidental</option>
          </select>
        </p>
        <p>
          <label for="sueldo">Sueldo</label>
          <input type="number" name="sueldo" id="sueldo" placeholder="Sueldo..." required />
        </p>
        <p class="block">
          <label for="fechapublicacion"> Fecha de Publicacion</label>
          <input type="datetime-local" name="fechapublicacion" id="fechapublicacion" required />
        </p>
        <p class="block">
          <label for="fechacierre"> Fecha de Cierre</label>
          <input type="datetime-local" name="fechacierre" id="fechacierre" required />
        </p>
        <p>
          <label for="direccion"> Dirección</label>
          <input type="text" name="direccion" id="direccion" placeholder="Dirección..." required />
        </p>
        <p>
          <label for="estado">Estado</label>
          <select name="estado" id="estado" required>
            <option value="" disabled selected>Seleccion Estado</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </p>
        <p class="block">
        <label for="idSectorFK">Sector</label>
        <select name="idSectorFK" id="idSectorFK">
          <option selected disabled value="">--- Seleccione el Sector ---</option>
          <?php foreach ($data['list_sector'] as $sector) : ?>
            <option value="<?php echo $sector['idSector'] ?>"><?php echo $sector['nombreSector'] ?></option>
          <?php endforeach ?>
        </select>
        </p>
        <p class="block">
          <button type="submit" id="btn_submit">Registrar</button>
        </p>
        <p class="block">
          <button type="submit" id="btn_modify">Modificar</button>
        </p>
        <p class="block">
          <button type="submit" id="btn_srch">Consultar</button>
        </p>
      </form>
    </div>FORM REQUISITOS
    <div class="req-form">
      <h2 class="name"><span>Registro</span> Vacante</h2>

        <form method="POST" id="form-requirement">
          <input type="hidden" id="idRequisitosVacante" name="idRequisitosVacante" value="0">

          <p >
          <label for="idVacanteFK">Vacante</label>
          <select name="idVacanteFK" id="idVacanteFK">
            <option selected disabled value="">--- Seleccione la Vacante ---</option>
            <?php foreach ($data['list_vacante'] as $vacs) : ?>
              <option value="<?php echo $vacs['idVacante'] ?>"><?php echo $vacs['nombreVacante'] ?></option>
            <?php endforeach ?>
          </select>
          </p>
          <p >
          <label for="idRequisitosFK">Requisito</label>
          <select name="idRequisitosFK" id="idRequisitosFK">
            <option selected disabled value="">--- Seleccione el Requisito ---</option>
            <?php foreach ($data['list_requisitos'] as $reqs) : ?>
              <option value="<?php echo $reqs['idRequisitos'] ?>"><?php echo $reqs['nombreRequisitos'] ?></option>
            <?php endforeach ?>
          </select>
          </p>

          <p class="block">
            <label for="especficacionRequisitos"> Especificaciones Requisitos </label>
            <br>
            <textarea name="especficacionRequisitos" id="especficacionRequisitos" placeholder="Especificaciones Requisitos..." required></textarea>
          </p>
          <p class="block">
              <button type="submit" id="btn_submit_">Registrar Requerimiento</button>
          </p>
          <p class="block">
              <button type="submit" id="btn_modify_">Modificar Requerimiento</button>
          </p>
          <p class="block">
              <button type="submit" id="btn_srch_">Consultar Requerimiento</button>
          </p>
        </form>
    </div>
  </div>
  <script src="https://cdn.tiny.cloud/1/x2oub1u70xqw4t9bxdur2k98oz7jsin9tx0vewhh6zf7pc68/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <?php
    require_once('./Views/Components/ScriptsJs.php');
    ?>
  <script src="<?= URL ?>Assets/js/vacante.js"></script>
</body>

</html> -->