<h4> <span class="bold"> <?php echo $tmp->distribuidor_nombre; ?></span> -
  <?php if ($usuario->email != ""): $mode_dist = "old"; ?>
  Solicitud de modificación de usuario
  <?php else:   $mode_dist = "new"; ?>
  Solicitud de nuevo usuario colaborador
  <?php endif; ?>
</h4>
<form method="post" action="<?php echo base_url(); ?>save/distribuidores_usuarios_pendientes_detail" id="distribuidores_usuarios_pendientes_detail">

<input type="hidden" name="mode_dist" value="<?php echo $mode_dist; ?>">
  <table class="table table-striped table-bordered dataTable no-footer">
    <thead>
      <tr>
        <th width="20%">&nbsp;</th>
        <?php if ($usuario->email != ""): ?>
        <th>Datos Actuales</th>
        <?php endif; ?>
        <th>Datos a moderar </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Nombre</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->nombre; ?></td>
        <?php endif; ?>
        <td><?php echo $tmp->nombre; ?>
          <?php if (in_array("nombre",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr>
        <th>Celular</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->celular; ?></td>
        <?php endif; ?>
        <td ><?php echo $tmp->celular; ?>
          <?php if (in_array("celular",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr>
        <th>Teléfono</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->telefono; ?></td>
        <?php endif; ?>
        <td ><?php echo $tmp->telefono; ?>
          <?php if (in_array("telefono",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr >
        <th >Dirección</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->direccion; ?></td>
        <?php endif; ?>
        <td ><?php echo $tmp->direccion; ?>
          <?php if (in_array("direccion",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr>
        <th>Perfil</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->perfil_nombre; ?></td>
        <?php endif; ?>
        <td><?php echo $tmp->perfil_nombre; ?>
          <?php if (in_array("id_perfil_usuario",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr>
        <th>Género</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->genero; ?></td>
        <?php endif; ?>
        <td><?php echo $tmp->genero; ?>
          <?php if (in_array("genero",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
     <!-- <tr>
        <th>Fecha nacimiento </th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo fecha($usuario->fecha_nacimiento); ?></td>
        <?php endif; ?>
        <td><?php echo fecha($tmp->fecha_nacimiento); ?>
          <?php if (in_array("fecha_nacimiento",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>-->
       <tr>
        <th>Acceso E-Pedidos </th>
          <?php if ($usuario->email != ""): ?>
        <td><?php echo ($usuario->acceso_epedidos); ?></td>
        <?php endif; ?>
        <td><?php echo ($tmp->acceso_epedidos); ?>
          <?php if (in_array("acceso_epedidos",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <?php if ($usuario->email != ""): ?>
        <td><?php echo $usuario->email; ?></td>
        <?php endif; ?>
        <td><?php echo $tmp->email; ?>
          <?php if (in_array("email",$comparar) && $usuario->email != ""): ?>
          <label class="label label-danger pull-right">Cambio</label>
          <?php endif; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="text-center">
    <h5>Opciones de solicitud</h5>
    <p>
    <textarea class="form-control" placeholder="Comentarios al distribuidor" name="comentarios" id="comentarios"  minlength="4"></textarea></p>
    <input type="hidden" name="id_distribuidor_usuario" value="<?php echo $tmp->id_distribuidor_usuario; ?>">
    <input type="hidden" id="modo" name="modo" value="">
    <a class="btn uppercase green" id="aprobar">Aprobar</a> <a class="btn sbold uppercase btn-outline red-pink" id="rechazar">Rechazar</a> </div>
</form>
<script type="text/javascript">
$(document).ready(function(e) {
	$("#aprobar").on('click', function () {	$("#modo").val("aprobar");  $("#distribuidores_usuarios_pendientes_detail").submit(); });
	$("#rechazar").on('click', function () { if ($("#comentarios").val() != "") { $("#modo").val("rechazar"); $("#distribuidores_usuarios_pendientes_detail").submit();} else { alert("Debe ingresar un comentario indicando el motivo de rechazo"); $("#comentarios").focus(); } });
});
</script>