<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OQO_model_epedidos
 *
 * @author benja
 */
class Oqo_model_epedidos extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function aprobar_epedido($param,$id) {
                
                 $this->update_epedido($param["x_email"],$param["x_acceso_epedidos"],$param["x_id_distribuidor"],$id);
                
        
                 
            
     
    }
    
    private function update_epedido($email,$acceso_epedidos,$id_distribuidor,$id) {
         $updated_data = array(
                'acceso_epedidos' => $acceso_epedidos
             );
         $this->db->where('id_distribuidor_usuario', $id);
                    $this->db->update('distribuidores_usuarios_tmp',$updated_data); 
                
                
    }
    
    public function get_epedidos_flag_dist($dist="")
    {
        
        $dist=$this->db->escape($dist);
        $query='SELECT * FROM distribuidores_usuarios WHERE email like "'.$dist.'"  AND acceso_epedidos LIKE "on" AND estado = 1';
      $query = $this->db->query($query);
      return 1;
    }
    //put your code here
}
