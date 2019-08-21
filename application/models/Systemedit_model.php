<?php
class SystemEdit_model extends CI_Model {
	
	public function load_data($table,$where = NULL){		
		
		$custom_method = "load_".$table;
		
		$q = NULL;
		if (method_exists("SystemEdit_model",$custom_method)):
			$q = $this->$custom_method($where);
		else:
			if ($where != NULL):
				$q = $this->db->get_where($table, $where);		
				
			endif;
		endif;
		//echo 	$this->db->last_query();
		
		if ($q):
			return $q->row();
		else:
			return false;
		endif;
	}
	
	public function update_data($table,$datakey,$data) {
		$this->db->where($datakey);
		if ($this->db->update($table, $data)): 
		
			return true;
		else:
			return false;
		endif; 	
	}
	
	public function multijoin_insert_data($joinkey,$datakey,$values) {
		$arrjoinkey = explode(",",$joinkey);
		$this->db->where($datakey);
		
		if ($arrjoinkey[0] != NULL && $this->db->delete($arrjoinkey[0])):
			if (count($values)>0): 
			foreach ($values as $val):
				$data = array(
				$arrjoinkey[1] => $datakey[$arrjoinkey[1]] ,
				$arrjoinkey[2] => $val
				);
				// print_r($data);
				$this->db->insert($arrjoinkey[0], $data); 
			endforeach;
			endif;
			return true;
		else:
			return false;
		endif; 	
	}
	
	public function insert_data($table,$data) {	
	//	print_r($data);
	//	die();
		if ($this->db->insert($table, $data)): 
			return true;
		else:
			return false;
		endif; 	
	}
	
	public function insert_data_return_id($table,$data) {	
	//	print_r($data);
	//	die();
		if ($this->db->insert($table, $data)): 
			return $this->db->insert_id();
		else:
		
			return false;
		endif; 	
	}
	
	public function get_field($field,$table,$where) {
		$q = $this->db->get_where($table, $where);	
		$rows =$q->num_rows();
		if ($rows>0)
			return $q->row()->$field;		
		else 
			return false;
	}
	
	
	public function get_max_field($field,$table) {
		
		if ($table != "administradores" && $table != "idiomas_sitio"):
		$this->db->select_max($field);
		
		$q = @$this->db->get($table);
	//	 echo $this->db->last_query();
		return @$q->row();		
		endif;
	}
	
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
		$q = $this->db->get_where($table, $where , $limit, $offset);
		//echo "HHH".$this->db->last_query();
		
		return  $q->result();
	} 
	
	
	
	/* EXAMPLE EXCLUSIVE CALL OR HOW SYSTEM EXTENDED */
	/*
	private function load_textos($where) {
		print_r($where);
		$sql  = "SELECT * FROM textos 
					LEFT JOIN 
					WHERE ";
		foreach ($where as $key=>$val):
			$count++;
			if ($count>1) $sql.=" AND " ;
			$sql.=" $key = ".$this->db->escape($val);
		endforeach; ;
		$q = $this->db->query($sql);
		

		return $q;	
		
	}
	*/
	
	
	

	
}