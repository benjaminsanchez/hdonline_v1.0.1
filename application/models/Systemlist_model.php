<?php
class SystemList_model extends CI_Model {
	
	public function get_rows($table,$where = NULL, $limit=NULL, $offset = NULL,$orderBy = NULL,$joins = NULL,$fields= NULL,$extrawhere = NULL){
		
		
		if ($fields != NULL):$count=0;$fstr='';
		
			foreach ($fields as $field):$count++;
				if ($count>1)$fstr.=",";
				$fstr.= $field;				 
			endforeach;
			$this->db->select($fstr);
		else:
			$this->db->select("*");
		endif;
		
		if (count($joins)>0):
			foreach ($joins as $key=>$val):
				$keylink = explode(",",$val);
				$str = "".$table.".".$key." = ".$keylink[0].".".$keylink[1];
				$this->db->join($keylink[0], $str, 'left');
			endforeach;
		endif;
		
		if ($orderBy):
			$this->db->order_by($orderBy);
		endif;
		if ($extrawhere):
			foreach ($extrawhere as $key=>$val):
				$this->db->where($key,$val);	
			endforeach;
		endif;
                  $this->CFG = load_class('Config', 'core')       ;
                  switch ($table):
                      case 'usuarios':
                          $eax=$table.".";
                          break;
                      case 'alertas':
                          $eax=$table.".";
                          break;
                       case 'tipos_contenidos':
                          $eax=$table.".";
                          break;
                      case 'distribuidores':
                          $eax=$table.".";
                          break;
                      case 'distribuidores_usuarios':
                          $eax=$table.".";
                          break;
                      default :
                          $eax="";
                          break;
                  endswitch;
                 $this->db->where($eax."localizacion",$this->CFG->item('_pais_'));
		$q = $this->db->get_where($table, $where , $limit, $offset);
                  $laq=$this->db->last_query();;
		//echo $this->db->last_query();
		
		return  $q->result();
	}
	
	public function sort_table($table,$countsort,$fieldkey,$id) {		
		$sql = "UPDATE ".$table." set orden = ".$this->db->escape($countsort)." WHERE $fieldkey = ".$this->db->escape($id)." ";
		 $this->db->query($sql);
	}
	
	public function get_total_rows($table,$where = NULL, $limit=NULL, $offset = NULL,$orderBy = NULL,$joins = NULL,$fields= NULL,$extrawhere = NULL){
			if ($fields != NULL):$count=0;$fstr='';
		
			foreach ($fields as $field):$count++;
				if ($count>1)$fstr.=",";
				$fstr.= $field;				 
			endforeach;
			$this->db->select($fstr);
		else:
			$this->db->select("*");
		endif;
		
		if (count($joins)>0):
			foreach ($joins as $key=>$val):
				$keylink = explode(",",$val);
				$str = "".$table.".".$key." = ".$keylink[0].".".$keylink[1];
				$this->db->join($keylink[0], $str, 'left');
			endforeach;
		endif;
		
		if ($orderBy):
			$this->db->order_by($orderBy);
		endif;
		if ($extrawhere):
			foreach ($extrawhere as $key=>$val):
				$this->db->where($key,$val);	
			endforeach;
		endif;
		$q = $this->db->get_where($table, $where , $limit, $offset);
		//echo $this->db->last_query();
		
		return $q->num_rows();
	}
	
	
	

	
}