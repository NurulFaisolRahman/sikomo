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
	
	public function Auth(){
		$this->load->view('Auth');
	}

	public function CekAuth(){
		$Akun = $this->db->get_where('akun', array('Username' => $_POST['Username']))->row_array();
		if (isset($Akun) > 0) {
      if (password_verify($_POST['Password'], $Akun['Password'])) {
        $Session = array('Admin' => true, 
                         'Username' => $Akun['Username']);
        $this->session->set_userdata($Session);
        echo '1';
      } else { 
        echo "Password Salah!";
      }
    } else {
			echo "Username Salah!";
		}
	}
	
	public function SignOut(){
		$this->session->sess_destroy();
		redirect(base_url('Sikomo/Auth'));
  }
}
