<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Model_orders extends CI_Model{

	public function view_beverages(){
		$data = array();
		$query2 = $this->db->get('tblbeverages');
		$res = $query2->result();
		return $res;
	}

	public function show_beveragesId($data){

		$this->db->select('beveragesId, beveragesDescription, price');
		$this->db->from('tblbeverages');
		$this->db->where('beveragesId', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	

	public function get_beverages($id, $data){
		$this->db->where('beveragesId',$id);
		$this->db->update('tblbeverages',$data);
	}

}