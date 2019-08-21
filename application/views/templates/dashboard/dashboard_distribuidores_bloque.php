﻿<?php 
$seccion = "distribuidores"; 
$detalle = NULL;
$subdetalle = NULL;
// Primero selecciona las referencias con más VISITAS
$sql = "SELECT d.id_evento,  d.id_referencia, e.seccion, e.evento, e.descripcion, e.tabla, count(d.localizacion) total
			FROM dashboard_data d
			INNER JOIN dashboard_eventos e ON (e.id = d.id_evento)
			WHERE d.localizacion = '".$localizacion."' 
			AND e.evento = 'visita'
			AND e.seccion = '".$seccion."'
			AND ".$wherefecha."
			GROUP BY d.id_referencia
			ORDER BY total DESC
			LIMIT ".$limit; 
	//	DIE($sql);
$Data2 = getRows($sql);
//print_r($Data2);
$total = count($Data2);
// Segundo recorro las referencias mas visitadas consultando los eventos que se realizaron asociados a esa referencia
if ($Data2):
	foreach ($Data2 as $row):
		// Consultar por los otros resultados mediante la misma referencia
		$detalle[$row["id_referencia"]]["visitas"] = $row["total"];
		$sqlsd = "SELECT d.id_evento,  d.id_referencia, e.seccion, e.evento, e.descripcion, e.tabla, count(d.localizacion) total
			FROM dashboard_data d
			INNER JOIN dashboard_eventos e ON (e.id = d.id_evento)
			WHERE d.localizacion = '".$localizacion."' 
			AND e.evento != 'visita'
			AND e.seccion = '".$seccion."'
			AND d.id_referencia = '".$row["id_referencia"]."' 
			AND ".$wherefecha."
			GROUP BY d.id_evento"; 
		
		$subdetalle = getRows($sqlsd);
		
		if ($subdetalle):
		
			foreach ($subdetalle as $sd):
				$detalle[$row["id_referencia"]]["sub"][$sd["id_evento"]]["descripcion"] = $sd["descripcion"];
				$detalle[$row["id_referencia"]]["sub"][$sd["id_evento"]]["total"] = $sd["total"];
				
				
			endforeach;
		endif;
		
		
		$detalle[$row["id_referencia"]]["nombre"] = getField("nombre",$row["tabla"]." WHERE id_distribuidor = '".$row["id_referencia"]."' ",$conn);
	
		// echo ($detalle);
	endforeach; 
endif; 

?>
<!-- start:  BLOQUE DISTRIBUIDORES -->

<div class="portlet light">
  <div class="portlet-title">
    <div class="caption"> <i class="icolist font-green-sharp"></i> <span class="caption-subject font-green-sharp bold uppercase">Interacciones generadas en distribuidores</span> <span class="caption-helper"><?php echo @$LSI["list_help"]; ?></span> </div>
    <?php if ($sExport == "") { ?>
    <div class="actions">
      <div class="btn-group"> <a class="btn btn-default btn-circle" href="<?php echo base_url(); ?>dashboard/distribuidores/excel" > <i class="fa fa-share"></i> <?php echo $LS["ExportToExcel"]; ?>  </a>
        
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="portlet-body"> 
    <!-- START PAGEDETAIL --> 
    <!-- END PAGE DETAIL -->
    <div class="table-container">
      <div id="datatable_products_wrapper" class="dataTables_wrapper dataTables_extended_wrapper no-footer"> 
        
        <!-- Start table -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div>  <?php
				if ($total ==0) {
					echo ($msgsinresultados);	
				} else {
				?>
              <table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                <thead>
                  <tr role="row" class="heading">
                    <th class="stvisitas"><span class="bold">Interacciones totales</span></th>
                    <?php $count = 0;
						  foreach ($TE[$seccion] as $data): $count++; ?>
                    <th  class="st<?php echo $count;?> tcenter"><?php echo ( $data["nombre"]); ?></th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                  <tr role="row" <?php echo @$sItemRowClass; ?>>
                    <td class="stvisitas tcenter"><span class="font-green-sharp bigmore"><?php echo $TE[$seccion."_sumtotal"] ; ?></span></td>
                    <?php $count = 0;
						  foreach ($TE[$seccion] as $data): $count++;?>
                    <td class="st<?php echo $count;?> tcenter"><span class="font-green-sharp big"><?php echo $data["total"]; ?></span></td>
                    <?php endforeach; ?>
                  </tr>
                </tbody>
              </table
                >
                <?php } ?>
            </div>
          </div>
        </div>
        <!-- End table --->
        
        <?php  if (count(@$TE[$seccion])>0): ?>  
        <div class="table-scrollable"> </div>
        <div class="portlet-title">
          <div class="caption"> <i class="icolist font-green-sharp"></i> <span class="caption-subject font-green-sharp bold uppercase">Listado de distribuidores</span> <span class="caption-helper"><?php echo @$LS["list_help"]; ?></span> </div>
        </div>
        
        <!-- Start table -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div>
              <table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                <thead>
                  <tr role="row" class="heading">
                    <th>Nombre</th>
                    <th class="tcenter"><span class="bold">Visitas</span></th>
                    <?php foreach ($TE[$seccion] as $data): ?>
                    <th class="tcenter"><?php echo ( $data["nombre"]); ?></th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                <?php
				if ($detalle):
					foreach ($detalle as $id_referencia => $det):
					 ?>
                  <tr role="row" <?php echo @$sItemRowClass; ?>>
                    <td class=""><span class="bold"><?php echo $det["nombre"]; ?></span></td>
                    <td class=" tcenter"><span class="bold"><?php echo $detalle[$id_referencia]["visitas"]; ?></span></td>
                    <?php $count = 0;foreach ($TE[$seccion] as $key  => $val): $count++; ?>
                    <td  class="tcenter"><?php echo intval(@$detalle[$id_referencia]["sub"][$key]["total"]);  ?></td>
                    <?php endforeach; ?>
                  </tr>
                  <?php
				  	endforeach;
				endif; ?>
                </tbody>
              </table
                >
            </div>
          </div>
        </div>
        <!-- End table --->
        
       <?php if (@$ffile=="dashboard"): ?>
        <div class="table-scrollable">
          <div class="col-md-12 col-sm-12 tcenter">
            <div class="dataTables_length" id="datatable_products_length">
              <button class="btn btn-sm btn-circle green-sharp table-group-action-submit"  onclick="document.location.href='dashboard/distribuidores'" > Ver todos </button>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php endif ?>
        
        
      </div>
    </div>
  </div>
</div>
<!-- End: BLOQUE DISTRIBUIDORES -->