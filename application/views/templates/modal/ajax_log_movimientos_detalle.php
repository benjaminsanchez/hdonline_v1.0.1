<?php
if (@$movimiento->movimiento->nombre!="")
	$nombre_mov =  $movimiento->movimiento->nombre;
elseif (@$movimiento->movimiento->titulo != "")
	$nombre_mov =  @$movimiento->movimiento->titulo;
elseif (@$movimiento->key_value != "")
	$nombre_mov =  @$movimiento->key_value; 
			
?>

<div class="modal-body">
  <table class="table table-striped table-bordered table-hover dataTable no-footer">
    <tbody>
      <tr>
        <th>Usuario</th>
        <th>IP</th>
        <th>Fecha</th>
        <th>Tipo Movimiento</th>
        <th>Sección</th>
        <?php if ($nombre_mov != ""): ?>
        <th>Referencia</th>
        <?php endif; ?>
      </tr>
      <tr>
        <td><?php 
			   switch ($movimiento->tipo_usuario):
					case "administrador": 	echo $movimiento->adm_nombre; break;
					case "distribuidor":	echo $movimiento->dus_nombre; break;
					case "usuario":			echo $movimiento->usu_nombre;  break;
			   endswitch; ?></td>
        <td><?php echo $movimiento->ip; ?></td>
        <td><?php echo fecha($movimiento->fecha,"total"); ?></td>
        <td><?php echo $LS["log_movimientos"]["tipo_mov"][$movimiento->tipo_mov]; ?></td>
        <td><?php echo $LS["log_movimientos"]["tabla_nombre"][$movimiento->tabla_nombre]; ?></td>
        <?php if ($nombre_mov != ""): ?>
        <td><?php 
		echo $nombre_mov ; 
		
		?></td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>
  <?php if (count($detalle)>0): ?>
  <div class="detalle-mov">
    <h5>Datos involucrados</h5>
    <table class="table table-striped table-bordered table-hover dataTable no-footer">
      <tbody>
        <tr>
          <th>Campo</th>
          <th>Valor</th>
        </tr>
        <?php foreach ($detalle as $det): ?>
        <?php if ($det->valor != ""): ?>
        <tr>
          <th><?php echo ucwords($det->campo); ?></th>
          <td><?php echo $det->valor; ?></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>
