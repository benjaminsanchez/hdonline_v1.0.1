<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<table border="1">
  
    <?php foreach ($datos as $row): ?>
    <thead>
    <tr bgcolor="#ABC4D0" >
      <th><?php echo $LSI["codigo"]; ?> </th>
      <th><?php echo $LSI["nombre"]; ?></th>
      <th><?php echo $LSI["telefono"]; ?> </th>
      <th><?php echo $LSI["id_zona_geografica1"]; ?> </th>
      <th> <?php echo $LSI["id_zona_geografica2"]; ?> </th>
      <th><?php echo $LSI["id_zona_geografica3"]; ?></th>
      <th><?php echo $LSI["direccion"]; ?></th>
      <th><?php echo $LSI["estado"]; ?></th> 
    </tr>
  </thead>
    <tr >
      <td><?php echo $row->codigo; ?></td>
      <td><?php echo $row->nombre; ?></td>
      <td><?php echo $row->telefono; ?></td>
      <td><?php echo $row->zg1; ?></td>
      <td><?php echo $row->zg2; ?></td>
      <td><?php echo $row->zg3; ?></td>
      <td><?php echo $row->direccion; ?></td>
      <td><?php echo @$LS["distribuidores"]["x_estado"][$row->estado]; ?></td>
    </tr>
    <?php if (count($usuarios[$row->id_distribuidor])>0): ?>
    <tr>
      <td colspan="8"><table>
          <thead>
            <tr bgcolor="#ABC4D0">
              <th><?php echo $LSIB["nombre"]; ?></th>
              <th><?php echo $LSIB["celular"]; ?></th>
              <th><?php echo $LSIB["telefono"]; ?></th>
              <th><?php echo $LSIB["direccion"]; ?></th>
              <th><?php echo $LSIB["id_perfil_usuario"]; ?> </th>
              <th><?php echo $LSIB["genero"]; ?></th>
              <th><?php echo $LSIB["fecha_nacimiento"]; ?> </th>
              <th><?php echo $LSIB["email"]; ?></th>
              <th><?php echo $LSIB["estado"]; ?></th>
            </tr>
          </thead> 
          <tbody>
            <?php foreach ($usuarios[$row->id_distribuidor] as $user): ?>
            <tr>
              <td><?php echo $user->nombre; ?></td>
              <td><?php echo $user->celular; ?></td>
              <td><?php echo $user->telefono; ?></td>
              <td><?php echo $user->direccion; ?></td>
              <td><?php echo $user->perfil_nombre; ?></td>
              <td><?php echo $user->genero; ?></td>
              <td><?php echo $user->fecha_nacimiento; ?></td>
              <td><?php echo $user->email; ?></td>
              <td><?php echo @$LS["distribuidores"]["x_estado"][$user->estado]; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table></td>
    </tr>
   <tr>
      <td colspan="8">
      </td></tr>
    <?php endif; // usuarios  ?>
    
    <?php endforeach; ?>

</table>
</body>
</html>