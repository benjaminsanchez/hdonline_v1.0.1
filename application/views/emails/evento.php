<?php $this->load->view('emails/header'); ?>

<tr  style="background-color: #EAF1F5;">
  <td align="center" colspan="2" style="padding: 20px;"><table border="0" width="100%">
      <tr>
        <td style="padding:0px 15px"><img src="<?php echo base_url(); ?>assets/custom/img/icons/calendar.png"   alt=""/></td>
        <td><div style="font-size: 24px; padding-bottom: 20px; text-align:left; color:#30383E; padding-top:20px"><strong><?php echo @$nombre_usuario; ?>,</strong><br>
            <span style="font-size: 16px;">Esta es una notificación al evento que te inscribiste.</span></div></td>
      </tr>
    </table></td>
</tr>
<tr>
  <td align="left" colspan="2" style="padding: 35px"><table>
      <tr>
        <td style="padding-left:15px"><p style="text-align:center;font-size:15px; color:#59A8D2; line-height:20px"><strong><?php echo $evento->titulo; ?></strong></p>
          <p style="font-size:14px; text-align:center; color:#545454"><?php echo nl2br($evento->texto_resumen); ?> </p></td>
    </table></td>
</tr>
<tr>
  <td><div style="border:1px solid #778C97; margin:20px 38px; padding:20px; color:#778C97; font-size:14px; text-align:center;     vertical-align: text-top;   line-height: 25px;"><img src="<?php echo base_url(); ?>assets/custom/img/icons/Geo2-Love-icon.png" >
  
  <?php if ($sesion->tipo_sesion == "presencial"): ?>
   <a href="https://www.google.com/maps?ll=<?php echo $sesion->coordenadas; ?>&z=16&t=m&mapclient=embed&q=<?php echo urlencode($sesion->ubicacion); ?>" target="_blank"  style="margin-top:-4px"><i class="fa fa-map-marker"></i><?php echo ($sesion->ubicacion); ?></a>
   
   <?php elseif ($sesion->tipo_sesion == "online"): ?>
   
   <span style="margin-top:-4px">Sesión Online</span>
   
   <?php endif; ?><br>
      <img src="<?php echo base_url(); ?>assets/custom/img/icons/Calendar-3-icon.png" > <?php echo fecha($sesion->fecha); ?> <img src="<?php echo base_url(); ?>assets/custom/img/icons/Time-And-Date-Clock-icon.png" > <?php echo hora($sesion->hora); ?>Hrs </div></td>
</tr>
<?php /*<tr>
  <td align="center"><strong style="font-weight:16px">Agendar en tu calendario</strong></td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 10px 30px 30px;">
    <table style="font-size:14px">
      <tr>
        <td><a href="#" style="text-decoration:none"><img src="<?php echo base_url(); ?>assets/custom/img/icons/Microsoft-Outlook-2013-icon.png" ></a></td>
        <td><a href="#" style="text-decoration:none; color:#2F373E">Outlook</a></td>
        <td style="padding-left:20px"><a href="#" style="text-decoration:none"><img src="<?php echo base_url(); ?>assets/custom/img/icons/Gmail-icon.png" ></a></td>
        <td style="padding-right:20px"><a href="#" style="text-decoration:none; color:#2F373E">Gmail</td>
        <td><a href="#" style="text-decoration:none"><img src="<?php echo base_url(); ?>assets/custom/img/icons/calendar-icon.png" ></a></td>
        <td><a href="#" style="text-decoration:none; color:#2F373E">Calendario</a></td>
      </tr>
    </table>
    <br clear="all"></td>
</tr>
*/ ?>
<tr><td align="center" style="padding-bottom:30px; padding-top:10px"> <a href="<?php echo base_url(uri_string()); ?>" style="font-size: 14px; margin-top: 10px; line-height: 20px; text-align: center; background-color: #59A8D2; padding: 15px 20px; width:200px; text-decoration:none; color:#FFF">DETALLE DEL EVENTO</a></td></tr>
<?php $this->load->view('emails/footer'); ?>
