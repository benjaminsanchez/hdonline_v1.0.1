<!DOCTYPE html>
<html>
<head>
<title>Biblioteca</title>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/css/biblioteca.css?v=<?php echo date("Ymhi"); ?>">
<style>
.biblioteca .ShowSelector .bloque a:hover,  .biblioteca .ShowSelector .bloque a:hover i.fa{ color:<?php echo $hexcolor; ?> }
</style>
<script>


</script>
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="biblioteca">
<div class="container">
  <div class="row ShowSelector">
    <div class="col-md-2"></div>
    <div class="col-md-4 text-center bloque"><a href="<?php echo base_url(); ?>biblioteca/upload?mode=&field=&type="><i class="fa fa-cloud-upload"></i>
      <h4>SUBIR ARCHIVOS</h4>
      </a></div>
    <div class="col-md-4 text-center bloque"><a href="<?php echo base_url(); ?>biblioteca/list?mode=&field=&type="><i class="fa fa-list-ul"></i>
      <h4>BUSCAR ARCHIVOS</h4>
      </a></div>
    <div class="col-md-2"></div>
  </div>
</div>
</body>
</html>