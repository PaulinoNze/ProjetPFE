
<?php
/**Msj sc: sesion iniciada correctamente ***/
if(isset($_REQUEST['sc'])){ ?>
<div class="row sc" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
        <strong>Toutes nos félicitations !</strong>
        Vous vous êtes connecté avec succès.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>


<?php
/**Msj csc: msj de cerrar sesion correctamente***/
if(isset($_REQUEST['csc'])){ ?>
<div class="row csc" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
        <strong>Toutes nos félicitations !</strong>
        La session a été fermée avec succès.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>


<?php
/**Msj dui: datos del usurio incorrectos ***/
if(isset($_REQUEST['dui'])){ ?>
<div class="row dui" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
        <strong>Oh !</strong>
        Certaines données sont incorrectes.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>





<?php
/**Msj Datos del Usuario en session Actualizados du= datos user***/
if(isset($_REQUEST['du'])){ ?>
<div class="row du" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
      	<strong>Toutes nos félicitations !</strong>
        Vos données personnelles ont été mises à jour avec succès.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>









































<!----msj nuevo curso agregado correctamente --->
<?php if(isset($_REQUEST['cr'])){ ?>
<div class="row cr" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
        <strong>Toutes nos félicitations !</strong>
        Il a été inscrit avec succès.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>


<!---curso borrado existosamente --->
<?php if(isset($_REQUEST['cbe'])){ ?>
<div class="row cbe" id="proBanner">
<div class="col-md-12 grid-margin">
  <div class="card bg-gradient-primary border-0">
    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
      <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
        <strong>Toutes nos félicitations !</strong>
        Le cours a été supprimé avec succès.      </p>
      
      <div class="d-flex">
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>