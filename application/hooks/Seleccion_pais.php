<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seleccion_pais
 *
 * @author Benjamin Sanchez Cardenas / OQO Digital
 */
class Seleccion_pais  {
    
    
    public function __construct($param=null) {
        $this->CFG = load_class('Config', 'core')       ;
        $this->init()                                   ;
    } private function init() {
        $basefolder         =   ''             ; 
     
        define("SERVER",$_SERVER['DOCUMENT_ROOT']);
        define("UPLOAD_FOLDER", 'uploads');
        define("EW_DATE_SEPARATOR","-"); 
        define("DEFAULT_DATE_FORMAT","dd-mm-yyyy");

        $burl       =   'http://'.$_SERVER['SERVER_NAME'].$basefolder."/"       ;
        $el_logo    =   'assets/custom/img/logo.png'                        ;
        $el_logo_w  =   'assets/custom/img/logo-white.png'                  ;
        $this->CFG
                ->set_item( 'base_url',$burl)
                ->set_item( 'abs_path',SERVER.$basefolder)
                ->set_item( 'base_upload_fldr',$basefolder.UPLOAD_FOLDER)
                ->set_item( 'upload_folder',UPLOAD_FOLDER)
                ->set_item( 'titleadmin','HunterDouglas Online')
                ->set_item( 'logoadmin',$this->CFG->item('base_url').$el_logo)
                ->set_item( 'logoadmin-white',$this->CFG->item('base_url').$el_logo_w)
                ->set_item( 'ext_video','|mp4|avi|asf|mov|m4v|wmv')
                ->set_item( 'ext_image','|jpg|png|gif|bmp')
                ->set_item( 'tablas_permitidas',$this->tablas_permitidas())
                ;
        }
    
        private function tablas_permitidas() {
            
         return ['OQOTABLA_TEST',
                'administradores',
                'alertas',
                'alertas_contenidos',
                'categorias',
                'categorias_tipo',
                'distribuidores',
                'distribuidores_usuarios',
                'distribuidores_usuarios_tmp',
                'eventos','eventos_sesiones',
                'idiomas_sistema',
                'idiomas_sitio',
                'incentivos',
                'material_pop',
                'novedades',
                'parametros',
                'perfiles',
                'perfiles_usuarios',
                'promociones',
                'promociones_documentos',
                'secciones',
                'slider_home',
                'tipos_contenidos',
                'usuarios',
                'zonas_geograficas'
                ];
        }
        
        
        
        
        
        
function RequestHook($param=null){
        
      
       $this->CFG
               ->set_item
               (
                            '_pais_',
                            $this->_g_pais()
               )             
        ;


     
    } private function _g_pais()
                                  {
        
        if($_SERVER['SERVER_NAME'] == 'des.ar.hunterdouglasonline.cl') : 
            return 'ar';
        endif;
        
        
                                     $eax =   explode('.',$_SERVER['SERVER_NAME'] )   ;
                                     $ecx =   count($eax) - 1                         ;
                                     $eax =   $eax[$ecx]                              ;
            
                                     return $eax                                      ;
                                  }
    
}
