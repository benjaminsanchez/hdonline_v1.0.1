<?php 
$seccion = "contactos"; 
$detalle = NULL;


$detalle = NULL;
// Primero selecciona las referencias con más VISITAS
$sql = "SELECT d.id_evento,  d.id_referencia, e.seccion, e.evento, e.descripcion, e.tabla, count(d.localizacion) total
			FROM dashboard_data d
			INNER JOIN dashboard_eventos e ON (e.id = d.id_evento)
			WHERE d.localizacion = '".$localizacion."' 
			AND (e.evento = 'visita' OR e.evento = 'contacto' OR e.evento = 'conv-formulario') 
			AND (e.seccion = '".$seccion."')
			AND ".$wherefecha."
			GROUP BY d.id_referencia
			ORDER BY total DESC
			LIMIT ".$limit; 
	
$Data2 = getRows($sql);
$total = count($Data2);

$root = $_SERVER["DOCUMENT_ROOT"];
define( 'APPLICATION_LOADED', true );
 @define('BASEPATH', "foobar");
include("../application/config/config.php");

// Segundo recorro las referencias mas visitadas consultando los eventos que se realizaron asociados a esa referencia
if ($Data2):
	foreach ($Data2 as $row):
		// Consultar por los otros resultados mediante la misma referencia
		$detalle[$row["id_referencia"]]["visitas"] = $row["total"];
		$detalle[$row["id_referencia"]]["fecha_online"] = getField("MIN(fecha)","dashboard_data d INNER JOIN dashboard_eventos e ON (e.id = d.id_evento)	WHERE d.localizacion = '".$localizacion."' 			AND e.evento = 'visita'	AND e.seccion = '".$seccion."' AND id_referencia = '".$row["id_referencia"]."' "); ;
		$sqlsd = "SELECT d.id_evento,  d.id_referencia, e.seccion, e.evento, e.descripcion, e.tabla, count(d.localizacion) total
			FROM dashboard_data d
			INNER JOIN dashboard_eventos e ON (e.id = d.id_evento)
			WHERE d.localizacion = '".$localizacion."' 
			AND e.evento != 'visita'
			AND e.seccion = '".$seccion."'
			AND d.id_referencia = '".$row["id_referencia"]."' 
			AND ".$wherefecha."
			GROUP BY d.id_evento"; 
		//	 echo $sqlsd;
		$subdetalle = getRows($sqlsd);
		if ($subdetalle):
			foreach ($subdetalle as $sd):
				$detalle[$row["id_referencia"]]["sub"][$sd["id_evento"]]["descripcion"] = $sd["descripcion"];
				
				
				
				$detalle[$row["id_referencia"]]["sub"][$sd["id_evento"]]["total"] = $sd["total"];
				
			endforeach;
		endif;
		$detalle[$row["id_referencia"]]["nombre"] = getField("nombre",$row["tabla"]." WHERE id_contacto_motivo = '".$row["id_referencia"]."' ");
	//	$detalle[$row["id_referencia"]]["url"] = $config['base_url'].getField("url",$row["tabla"]." WHERE id_contacto_motivo = '".$row["id_referencia"]."' ");
	endforeach; 
endif; 

?>
<!-- start:  BLOQUE CONTACTOS -->
    <div class="portlet light">
      <div class="portlet-title">
        <div class="caption"> <i class="icolist font-green-sharp"></i> <span class="caption-subject font-green-sharp bold uppercase">Contactos generados en el sitio</span> <span class="caption-helper"><?php echo @$LSI["list_help"]; ?></span> </div>
        <?php if ($sExport == "") { ?>
        <div class="actions">
          <div class="btn-group"> <a class="btn btn-default btn-circle" href="<?php echo base_url(); ?>dashboard/contactos/excel"> <i class="fa fa-share"></i>  <?php echo $LS['ExportToExcel'] ?></a>
          
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
                <div class="component">
                <?php
				if ($total ==0) {
					echo ($msgsinresultados);	
				} else {
				?>
                  <table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                    <thead>
                      <tr role="row" class="heading">
                        <th><span class="bold">Contactos totales</span></th>
                        <?php foreach ($TE[$seccion] as $data): ?> 
                        <th><?php echo ($data["nombre"]); ?></th>
                        
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <tr role="row" <?php echo @$sItemRowClass; ?>>
                        <td class="tcenter"><span class="font-green-sharp bigmore"><?php echo $TE[$seccion."_sumtotal"] ; ?></span></td>
                         <?php foreach ($TE[$seccion] as $data): ?> 
                        <td class="tcenter"><span class="font-green-sharp big"><?php echo ( $data["total"]); ?></span></td>
                        <?php endforeach; ?>
                      </tr>
                    </tbody>
                  </table>
                  <?php
				}?>
                </div>
              </div> 
            </div>
            <!-- End table --->
          <?php  if (count(@$TE[$seccion2])>0): ?>   
            <div class="table-scrollable"> </div>
            <div class="portlet-title">
              <div class="caption"> <i class="icolist font-green-sharp"></i> <span class="caption-subject font-green-sharp bold uppercase">Contactos generados en landing de campañas</span> <span class="caption-helper"><?php echo @$LSI["list_help"]; ?></span> </div>
            </div>
      
           <!-- Start table -->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="component">
              <table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                <thead>
                  <tr role="row" class="heading">
                    <th>Nombre</th>
                    <th class="tcenter"><span class="bold">Visitas</span></th>
                    <th class="tcenter"><span class="bold">Fecha online</span></th>
                    <?php foreach ($TE[$seccion2] as $data): ?>
                    <th class="tcenter"><?php echo (  $data["url"].$data["nombre"]); ?></th>
                    <?php endforeach; ?>
                  </tr>
                </thead>
                <tbody>
                <?php
				if ($detalle):
					foreach ($detalle as $id_referencia => $det):
					 ?>
                  <tr role="row" <?php echo $sItemRowClass; ?>>
                    <td class="stname" width="50%"><span class=""><a href="<?php echo $det["url"]; ?>" target="_blank"><?php echo $det["nombre"]; ; ?></a></span></td>
                    <td class="stvisitas tcenter"><span class="font-green-sharp"><?php echo $detalle[$id_referencia]["visitas"]; ?></span></td>
                    <td class="stfechaonline tcenter"><span class=""><?php echo FormatDateTime($detalle[$id_referencia]["fecha_online"],7); ?></span></td>
                    <?php foreach ($TE[$seccion2] as $key  => $val): ?>
                    <td  class="st<?php echo $detalle[$id_referencia]["sub"][$key]; ?> tcenter"><span class="font-green-sharp"><?php echo intval($detalle[$id_referencia]["sub"][$key]["total"]);  ?></span></td>
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
        <?php endif; ?>
        <!-- End table --->
            
      
          
           
            
          </div>
        </div>
      </div>
    </div>
    <!-- End: BLOQUE CONTACTOS -->