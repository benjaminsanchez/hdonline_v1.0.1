<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<table>
  <thead>
    <tr>
      <th><?php echo $LSI["nombre"]; ?></th>
      <th><?php echo $LSI["celular"]; ?></th>
      <th><?php echo $LSI["telefono"]; ?></th>
      <th><?php echo $LSI["direccion"]; ?></th>
      <th><?php echo $LSI["id_perfil_usuario"]; ?> </th>
      <th><?php echo $LSI["genero"]; ?></th>
      <th><?php echo $LSI["fecha_nacimiento"]; ?> </th>
      <th><?php echo $LSI["email"]; ?></th>
      <th><?php echo $LSI["estado"]; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $row): ?>
    <tr>
      <td><?php echo $row->nombre; ?></td>
      <td><?php echo $row->celular; ?></td>
      <td><?php echo $row->telefono; ?></td>
      <td><?php echo $row->direccion; ?></td>
      <td><?php echo $row->perfil_nombre; ?></td>
      <td><?php echo $row->genero; ?></td>
      <td><?php echo $row->fecha_nacimiento; ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo @$LS["distribuidores"]["x_estado"][$row->estado]; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>