<?php $this->load->view('emails/header'); ?>

<tr  style="background-color: #EAF1F5;">
  <td align="center" colspan="2" style="padding: 20px;"><table border="0" width="100%">
      <tr>
        <td style="padding:0px 15px 0 5px"><img src="<?php echo base_url(); ?>assets/custom/img/icons/alert-icon-48.png"   alt="" height="36"/></td>
        <td><div style="font-size: 20px; padding-bottom: 20px; text-align:left; color:#30383E; "> <strong><?php echo @$nombre; ?></strong><br>
            <span style="font-size: 14px;">El usuario <b><?php echo $nombre_usuario; ?></b> ha solicitado la siguiente imagen en alta resolución</span></div></td>
      </tr>
    </table></td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 35px"><span style="font-size:14px; text-align:center"> <img src="<?php echo base_url(); ?>/img/<?php echo localizacion(); ?>/320x0-1/biblioteca/<?php echo $biblioteca->archivo_nombre; ?>" alt="<?php echo $biblioteca->archivo_nombre; ?>"></span><br>
    <p style="font-size:14px; text-align:center"><b>Nombre de imagen:</b><br><?php echo ($biblioteca->nombre!= "")? $biblioteca->nombre: $biblioteca->archivo_nombre; ?></p>
       <p style="font-size:14px"><b>Email usuario:</b><br>
      <a href="mailto:<?php echo @$email_usuario; ?>"><?php echo @$email_usuario; ?></a></p>
      
    <p style="font-size:14px"><b>Motivo:</b><br>
      <?php echo @$comentario; ?> </p>
    <strong>&nbsp;</strong> </span> <span style="font-size:12px"><strong>&nbsp;</strong> </span></td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 10px 30px 30px;"><strong style="font-size: 15px; text-align: left;"> </strong><br>
    <a href="<?php echo base_url();; ?>" style="font-size: 14px; margin-top: 10px; line-height: 20px; text-align: center; background-color: #59A8D2; padding: 15px 20px; width:200px; text-decoration:none; color:#FFF"><?php echo name_system(); ?></a> <br>
    <br clear="all"></td>
</tr>
<?php $this->load->view('emails/footer'); ?>
