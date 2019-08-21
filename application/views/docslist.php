<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Documentos </li>
      </ol>
      <h1>Documentos</h1>
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR -->
        <div class="page-sidebar">
          <nav class="navbar" role="navigation"> 
            <!-- Brand and toggle get grouped for better mobile display --> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav margin-bottom-35">
              <li class="active"> <a href="#"> Todos</a> </li>
              <li> <a href="#"> Lista de Precio</a> </li>
              <li> <a href="#"> MT</a> </li>
              <li> <a href="#"> News</a> </li>
              <li> <a href="#"> Memos</a> </li>
              <li> <a href="#"> Fichas Técnicas</a> </li>
              <li> <a href="#"> Informes de Quiebres</a> </li>
              <li> <a href="#"> Garantía</a> </li>
              <li> <a href="#"> Lista de Precios POP </a> </li>
            </ul>
          </nav>
        </div>
        <!-- END PAGE SIDEBAR -->
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="row">
            <div class="col-md-12"> 
              
              <!-- FILTER -->
              <?php $this->load->view("templates/filters"); ?>
              <!-- END FILTER --> 
              
              <!-- BEGIN BORDERED TABLE PORTLET-->
              <div class="portlet light bordered">
                <div class="portlet-body search-page">
                  <div class="table-scrollable">
                    <table class="table table-hover table-striped table-hover">
                      <thead>
                        <tr class="bold">
                          <th> Título </th>
                          <th class="text-center"> Publicación </th>
                          <th class="text-center"> Formato </th>
                          <th class="text-center"> Peso </th>
                          <th class="text-center" > Descargar </th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="note note-success">
                          <td ><span class="label label-sm label-default label-box "> Vigente </span><br>
                            <span class="bold">Precios Oferta temporal Persianas de Exterior <br>
                            Aluminio 80mm </span></td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group ">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group ">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group ">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group dropup">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group dropup">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                        <tr>
                          <td> Precios Oferta temporal Persianas de Exterior Aluminio 80mm </td>
                          <td align="center"> 01/02/2017 </td>
                          <td align="center"> PDF </td>
                          <td algn="right"> 300Kb </td>
                          <td align="center"><button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download"></i> </button></td>
                          <td align="center"><div class="btn-group dropup">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;">Editar</a></li>
                                <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                                <li> <a href="javascript:;">Borrador</a></li>
                                <li> <a href="javascript:;">Eliminar</a></li>
                              </ul>
                            </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- START PAGINATION -->
                  <?php $this->load->view("templates/pagination"); ?>
                  <!-- END PAGINATION --> 
                </div>
              </div>
              <!-- END BORDERED TABLE PORTLET--> 
            </div>
          </div>
          <!-- END PAGE BASE CONTENT --> 
        </div>
      </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
