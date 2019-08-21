<?php $this->load->view('emails/header'); ?>

<tr  style="background-color: #EAF1F5;">
  <td align="center" colspan="2" style="padding: 20px;"><table border="0" width="100%">
      <tr>
        <td style="padding:0px 5px"><img src="<?php echo base_url(); ?>assets/custom/img/icons/alert-icon-48.png"   alt="" height="36"/></td>
        <td><div style="font-size: 20px; padding-bottom: 20px; text-align:left; color:#30383E; padding-top:20px"> <strong><?php echo @$nombre; ?></strong><br>
            <span style="font-size: 14px;">Información de cuenta de Usuario <?php echo @$perfil_usuario; ?></span></div></td>
      </tr>
    </table></td>
</tr>
<tr>
  <td align="left" colspan="2" style="padding: 35px"><?php if (@$distribuidor != ""): ?>
    <span style="font-size:14px"><strong>Distribuidor <?php echo @$distribuidor; ?> </strong></span><br>
    <br>
    <?php endif; ?>
    <?php if (@$nombre != ""): ?>
    <span style="font-size:14px"><strong>Nombre:</strong> <?php echo @$nombre; ?></span>
    <?php endif; ?>
    <br>
    <?php /*<?php if (@$celular != ""): ?>
    <span style="font-size:14px"><strong>Teléfono Móvil:</strong> <?php echo @$celular; ?></span>
    <?php endif; ?>
    <br>
    <?php if (@$telefono != ""): ?>
    <span style="font-size:14px"><strong>Fono:</strong> <?php echo @$telefono; ?></span>
    <?php endif; ?>
    <br><br> */?>
    <?php if (@$email != ""): ?>
    <span style="font-size:14px"><strong>Email de acceso:</strong> <?php echo @$email; ?></span>
    <?php endif; ?>
    <br>
    <?php if (@$password != ""): ?>
    <span style="font-size:14px"><strong>Contraseña:</strong> <?php echo @$password; ?></span>
    <?php endif; ?>
    <span style="font-size:15px"><strong>&nbsp;</strong> </span></td>
</tr>
<tr>
  <td align="center" colspan="2" style="padding: 10px 30px 30px;"><strong style="font-size: 15px; text-align: left;"> </strong><br>
    <a href="<?php echo @$enlace; ?>" style="font-size: 14px; margin-top: 10px; line-height: 20px; text-align: center; background-color: #59A8D2; padding: 15px 20px; width:200px; text-decoration:none; color:#FFF"><?php echo name_system(); ?></a> <br>
    <br clear="all"></td>
</tr>
<?php $this->load->view('emails/footer'); ?>
