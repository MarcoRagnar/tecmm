<?php
  include "conexion.php";
  $tipo = $_POST['tipocheck'];
  $param = $_POST['clasecheck'];
  $sql1 = $_POST['consulta'];
  $nfiltros = $_POST['nfiltro'];

  switch ($tipo) {
    case 'checkboxTipo':
        if ($nfiltros > 0 ) {
         $sql1 = $sql1."AND tipo = '".$param."'";
        } else {
         $sql1 = $sql1."WHERE tipo = '".$param."'";
        }
      break;
    case 'checkboxMarcas':
        if ($nfiltros > 0 ) {
           $sql1 = $sql1."AND marca = '".$param."'";
        } else {
           $sql1 = $sql1."WHERE marca = '".$param."'";
        }
      break;
    case 'checkboxPrecios':
        ?>

      <?php
      break;
    case 'checkboxIndice':
        ?>

      <?php
      break;
  }

  $query = $conn->query($sql1);
  while ($r=$query->fetch_array()) {
    $codigoArticulo = $r['codigoLlanta'];
    $marcaLlanta = $r['marcaLlanta'];
    $indiceDeServicio = $r['indiceDeServicio'];
    $imgMarca = "./img/marcasllantas/banner/".$marcaLlanta.".png";
    $modelo=$r['modeloLlanta'];
    $imgModelo="./img/Articulosllantas/".$modelo.".png";
    $precioContado=$r['contado'];
    $precio6Meses=$r['6meses'];
    $precioDeLista=$r['precioDeLista'];
    $marca=$r['marcaLlanta'];
    $ancho=$r['ancho'];
    $serie=$r['serie'];
    $rin=$r['rin'];
    $capacidadCarga=$r['cargaExtra'];
    $polt = $r['PoLT'];
    $capas = $r['capas'];
    $tipo = $r['tipo'];
  ?>
  <input id="consultaHide" type="hidden" value="<?php echo "$sql1"; ?>">
  <input id="nfiltroHide" type="hidden" value="<?php echo "$numeroDeFiltro"; ?> ">
  <div class="llanta shadow col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center border <?php echo $marca ?> <?php echo $tipo ?> <?php echo $indiceDeServicio ?> <?php echo $precio ?>" style=" margin-right: 10px; margin-left: 10px; border-radius: 10px; margin-bottom: 8px; border-color: #cbcbcb">
    <a href="carritoDeCompras.php?codigo=<?php echo $codigoArticulo;?>">
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
          <img src="<?php echo $imgModelo;?>" alt="*Sin foto*" class="img-fluid" style=" height: 150px; margin-top: 10px;">
        </div>
      </div>
      <div class="row" > <!-- promo y marca -->
        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="padding-bottom: 5px; width: 60%">
          <span style="margin: auto;">
            <img src=" <?php echo "$imgMarca"?> " alt="<?php echo "$marca"; ?>" style="max-width: 100%; ">
          </span>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="padding-bottom: 5px; width: 40%">
          <section style="background-color: #21ae5e; border-radius: 5px; color: white; font-family: dosis-Bold; max-width: 100%; margin: auto; padding-top: 2px; padding-bottom: 3px">-10%</section>
        </div>
      </div>
      <div class="row" style="border-top: solid 1px darkgray;">
        <div class="col-md-12 text-left" style="font-size: .8rem; font-family: dosis-Medium;">
          <span><?php echo "$modelo"; ?> </span> - <span> <?php echo "$indiceDeServicio"; ?> </span> -
          <span><?php echo "$ancho"?> / <?php echo "$serie"  ?> / <?php echo "$rin"; ?><br></span>
          <span>Tipo: <?php echo "$tipo"; ?></span>
        </div>
      </div>
      <div class="row text-center" style="margin: auto; ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5" style="padding: 0px; padding-top: 4px;">
          <strike style="color: #afaaaa;" ><span style="margin: auto; font-size: 1rem; color: #afaaaa">$<?php echo "$precioDeLista"; ?></span></strike style="color" >
        </div>
        <div class="col-md-12 col-md-12 col-md-12 col-lg-12 col-xl-7 text-right" style="padding: 0px;">
          <span style="margin: auto; font-weight: bold; font-size: 1.5rem; color: #045FB4">$<?php echo "$precioContado"; ?><br></span>

        </div>
      </div>
      <div class="row text-right" style="margin-bottom: 10px;">
        <did class="col-md-12">
          <span style="font-size: .8rem; color: #afaaaa">6 meses: </span><span style="margin: auto; font-size: 1rem; color: #afaaaa">$<?php echo "$precio6Meses"; ?></span>
        </did>
      </div>
      </a>
  </div>
  <?php }

 ?>
