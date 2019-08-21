<?php $this->load->view('templates/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/css/profile.min.css">
<div class="container-fluid">
  <div class="page-content"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>">Dashboard</a> </li>
        <li> <a href="#">Mi perfil</a> </li>
        <li class="active"> <?php echo $profile->nombre; ?></li>
      </ol>
      <!-- Sidebar Toggle Button -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar"> <span class="sr-only">Toggle navigation</span> <span class="toggle-icon"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span> </button>
      <!-- Sidebar Toggle Button --> 
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
          <div class="col-md-12"> 
            
            <!-- title-->
            <div class="portlet-title">
              <div class="caption"><span class="caption-subject font-dark sbold">Mi Perfil de Usuario</span> </div>
              <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons"> </div>
              </div>
            </div>
            
            <!-- end title --> 
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar"> 
              
              <!-- PORTLET MAIN -->
              <div class="portlet light bordered"> 
                <!-- STAT 
                                                <div class="row list-separated profile-stat">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 37 </div>
                                                        <div class="uppercase profile-stat-text"> Projects </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 51 </div>
                                                        <div class="uppercase profile-stat-text"> Tasks </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 61 </div>
                                                        <div class="uppercase profile-stat-text"> Uploads </div>
                                                    </div>
                                                </div>
                                                <!-- END STAT -->
                <div class="profile-usertitle">
                  <div class="profile-usertitle-name"> <?php echo @$profile->nombre; ?></div>
                  <div class="profile-usertitle-job"> <?php echo @$profile->tipo; ?>  <?php echo @$profile->perfil_nombre; ?> <?php echo @$profile->distribuidor_nombre; ?></div>
                </div>
                <div>
                <div class="margin-top-10 profile-desc-link"> &nbsp;</div>
                <?php if (@$profile->perfil_nombre != ""): ?>
                  <div class="margin-top-20 profile-desc-link"> <i class="fa fa-user"></i> <?php echo $profile->perfil_nombre; ?> </div>
                  <?php endif; ?>
                  <?php if (@$profile->telefono != ""): ?>
                  <div class="margin-top-20 profile-desc-link"> <i class="fa fa-phone"></i> <?php echo $profile->telefono; ?> </div>
                  <?php endif; ?>
                  <?php if (@$profile->celular != ""): ?>
                  <div class="margin-top-20 profile-desc-link"> <i class="fa fa-mobile-phone"></i> <?php echo $profile->celular; ?> </div>
                  <?php endif; ?>
                  <?php if (@$profile->direccion != ""): ?>
                  <div class="margin-top-20 profile-desc-link"> <i class="fa fa-home"></i> <?php echo $profile->direccion; ?> </div>
                  <?php endif; ?>
                  <?php if (@$profile->fecha_nacimiento != "" && @$profile->fecha_nacimiento != "0000-00-00"): ?>
                  <div class="margin-top-20 profile-desc-link"> <i class="fa fa-calendar-check-o"></i> <?php echo fecha($profile->fecha_nacimiento); ?> </div>
                  <?php endif; ?>
                  
                  <div class="margin-top-40 profile-desc-link"> </div>
                </div>
              </div>
              <!-- END PORTLET MAIN --> 
            </div>
            <!-- END BEGIN PROFILE SIDEBAR --> 
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                      <div class="caption caption-md"> <i class="icon-globe theme-font hide"></i> <span class="caption-subject font-blue-madison bold uppercase">Mi Perfil</span> </div>
                      <ul class="nav nav-tabs">
                        <!-- <li class="active">
                                                                    <a href="#tab_1_1" data-toggle="tab">Información Personal</a>
                                                                </li>--> 
                        <!-- <li>
                                                                    <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                                </li>-->
                        <li class="active"> <a href="#tab_1_3" data-toggle="tab">Cambiar Clave</a> </li>
                        <!--
                                                                <li>
                                                                    <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                                                </li>
                                                                -->
                      </ul>
                    </div>
                    <div class="portlet-body">
                      <div class="tab-content"> 
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane" id="tab_1_1">
                          <form role="form" action="#">
                            <div class="form-group">
                              <label class="control-label">First Name</label>
                              <input type="text" placeholder="John" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Last Name</label>
                              <input type="text" placeholder="Doe" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Mobile Number</label>
                              <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Interests</label>
                              <input type="text" placeholder="Design, Web etc." class="form-control" />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Occupation</label>
                              <input type="text" placeholder="Web Developer" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label class="control-label">About</label>
                              <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Website Url</label>
                              <input type="text" placeholder="http://www.mywebsite.com" class="form-control" />
                            </div>
                            <div class="margiv-top-10"> <a href="javascript:;" class="btn green"> Save Changes </a> <a href="javascript:;" class="btn default"> Cancel </a> </div>
                          </form>
                        </div>
                        <!-- END PERSONAL INFO TAB --> 
                        <!-- CHANGE AVATAR TAB -->
                        <div class="tab-pane" id="tab_1_2">
                          <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod. </p>
                          <form action="#" role="form">
                            <div class="form-group">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
                                  <input type="file" name="...">
                                  </span> <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                              </div>
                              <div class="clearfix margin-top-10"> <span class="label label-danger">NOTE! </span> <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span> </div>
                            </div>
                            <div class="margin-top-10"> <a href="javascript:;" class="btn green"> Submit </a> <a href="javascript:;" class="btn default"> Cancel </a> </div>
                          </form>
                        </div>
                        <!-- END CHANGE AVATAR TAB --> 
                        <!-- CHANGE PASSWORD TAB -->
                        <div class="tab-pane active" id="tab_1_3">
                                    <?php
if (@$msg_respuesta <> "") {
?>
            <!-- note-success note-warning note-primary note-info note-danger -->
            <div class="note note-info note-shadow">
              <p> <?php echo @$LANG["nota"]; ?> <?php echo $msg_respuesta; ?> </p>
            </div>
            <?php
}

?>
                          <form action="<?php echo base_url(); ?>save/profile" id="changepassform" method="post">
                            <input type="hidden" name="action" value="changepass">
                            <div class="form-group">
                              <label class="control-label">Clave actual</label>
                              <input type="password" name="clave_actual" class="form-control" required />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Nueva Clave</label>
                              <input type="password" name="clave_nueva" class="form-control" required />
                            </div>
                            <div class="form-group">
                              <label class="control-label">Re-ingrese nueva Clave</label>
                              <input type="password"  name="clave_nueva_2" class="form-control" required />
                            </div>
                            <div class="margin-top-40">
                              <button type="submit" class="btn btn-sm blue"> Cambiar Clave </button>
                            </div>
                            
                          </form>
                        </div>
                        <!-- END CHANGE PASSWORD TAB --> 
                        <!-- PRIVACY SETTINGS TAB -->
                        <div class="tab-pane" id="tab_1_4">
                          <form action="#">
                            <table class="table table-light table-hover">
                              <tr>
                                <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                <td><div class="mt-radio-inline">
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios1" value="option1" />
                                      Yes <span></span> </label>
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios1" value="option2" checked/>
                                      No <span></span> </label>
                                  </div></td>
                              </tr>
                              <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td><div class="mt-radio-inline">
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios11" value="option1" />
                                      Yes <span></span> </label>
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios11" value="option2" checked/>
                                      No <span></span> </label>
                                  </div></td>
                              </tr>
                              <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td><div class="mt-radio-inline">
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios21" value="option1" />
                                      Yes <span></span> </label>
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios21" value="option2" checked/>
                                      No <span></span> </label>
                                  </div></td>
                              </tr>
                              <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td><div class="mt-radio-inline">
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios31" value="option1" />
                                      Yes <span></span> </label>
                                    <label class="mt-radio">
                                      <input type="radio" name="optionsRadios31" value="option2" checked/>
                                      No <span></span> </label>
                                  </div></td>
                              </tr>
                            </table>
                            <!--end profile-settings-->
                            <div class="margin-top-10"> <a href="javascript:;" class="btn red"> Save Changes </a> <a href="javascript:;" class="btn default"> Cancel </a> </div>
                          </form>
                        </div>
                        <!-- END PRIVACY SETTINGS TAB --> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE CONTENT --> 
          </div>
        </div>
        <!-- END PAGE BASE CONTENT --> 
      </div>
    </div>
  </div>
  <!-- END SIDEBAR CONTENT LAYOUT --> 
</div>
<!-- BEGIN FOOTER -->

<?php $this->load->view('templates/footer'); ?>
