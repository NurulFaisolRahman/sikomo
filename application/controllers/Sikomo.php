<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sikomo extends CI_Controller {

	public function index(){
		$Data['Komoditas'] = $this->db->query("SELECT Id,Nama,Foto FROM `komoditas`")->result_array();
		$this->load->view('index',$Data);
	}

	public function GetKomoditas($Id){
    echo json_encode($this->db->get_where('komoditas', array('Id' => $Id))->row_array());
  }
}
