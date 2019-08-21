<?php $this->load->view('emails/header'); ?>
<tr  style="background-color: #EAF1F5;">
  <td align="center" colspan="2" style="padding: 20px;"><table border="0" width="100%">
      <tr>
        <td style="padding:0px 15px"><img src="<?php echo base_url(); ?>assets/custom/img/icons/alert-icon-48.png"   alt=""/></td>
        <td><div style="font-size: 24px; padding-bottom: 20px; text-align:left; color:#30383E; padding-top:20px"><strong><?php echo @$profile->nombre; ?>,</strong><br>
            <span style="font-size: 16px;">Solicitud reestablecer clave <?php echo name_system(); ?></span></div></td>
      </tr>
    </table></td>
</tr>
<tr>
  <td align="left" colspan="2" style="padding: 35px"><span style="font-size:15px; color:#555"> Ha solicitado reestablecer clave para la cuenta <strong style="font-size: 14px; ; color:#555"><?php echo @$profile->email; ?> </strong><br><br>
    Para asignar una nueva clave haga click en el enlace: </span> <br>
 
     </td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 10px 30px 30px;">
    <a href="<?php echo @$enlace_boton; ?>" style="font-size: 14px; margin-top: 10px; line-height: 20px; text-align: center; background-color: #59A8D2; padding: 15px 20px; width:200px; text-decoration:none; color:#FFF">Asignar nueva clave</a> <br>
    <br clear="all"></td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 10px 30px 30px;">
  
    <span style="font-size:10px; color:#777">Si usted no ha solicitado realizar un cambio de clave o ha sido un error, simplemente ignore este correo.</span> 
    </td>
</tr>

<?php $this->load->view('emails/footer'); ?>
