<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<!--[if IE 7]><html lang="es" class="ie7 ie"><![endif]-->
<!--[if IE 8]><html lang="es" class="ie8 ie"><![endif]-->
<!--[if IE 9]><html lang="es" class="ie9 ie"><![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
<?php $this->load->view('templates/head'); ?>
</head>
<body>
<!-- start: #wrapper -->
<div id="wrapper">
	<?php $this->load->view('templates/header'); ?>
    <!-- start: .content -->
    <main id="error-404" class="content" role="main">
		<!-- start: #detalle -->
        <section id="detalle" class="section center">
            <h2 class="titulo wow fadeInDown">Página no encontrada</h2>
            <img src="<?=base_url()?>images/icono-404.png" width="104" height="104" class="icono wow fadeInUp">
            <div class="botones wow fadeIn" data-wow-delay="600ms">
            	
            	<p>Lo sentimos, la página solicitada ya no se encuentra disponible.</p>
                <a href="<?=base_url()?>productos" class="submit-button" data-text="CONOCE NUESTROS PRODUCTOS"><span class="texto">CONOCE NUESTROS PRODUCTOS</a>
                <span class="alignmiddle">O</span> 
                <a href="<?=base_url()?>distribuidores" class="submit-button" data-text="BUSCAR DISTRIBUIDOR"><span class="texto">BUSCAR DISTRIBUIDOR</a>
            </div>
        </section>
        <!-- end: #detalle -->  
    </main>
    <!-- end: .content --> 
</div>
<!-- end: #wrapper -->
<?php $this->load->view('templates/footer'); ?>
</body>
</html>