<?php
class SystemDelete_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Global_model');		
		require_once(APPPATH.'libraries/Globals.php');
		if (@$this->nativesession->get('HD_ONLINE_status')!="login"):
			@ob_end_clean();
			redirect('/login', 'location', 302);
			exit();
		endif;
		$this->load->model('Systemdelete_model');
		$this->load->config('crud');
		
	}
	
	public function load_data($table,$where = NULL){	
		if ($this->common->check_access($this->data["current_access"],$this->data,$table)) {	
			$custom_method = "load_".$table;
			if (method_exists("SystemDelete_model",$custom_method)):
				$q = $this->$custom_method($where);
			else:
				$q = $this->db->get_where($table, $where);		
			endif;
			return $q->row();
		}
	}
	
	public function delete_data($table,$datakey) {
		$this->db->where($datakey);
		if ($this->db->delete($table)):
		// 	die($this->db->last_query()); 
			return true;
		else:
			return false;
		endif; 	
	}
	
	public function get_field($field,$table,$where) {
		$q = $this->db->get_where($table, $where);		
		return $q->row();		
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