<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  function __construct(){
		parent::__construct();
		if(!$this->session->userdata('Admin')){
			redirect(base_url('Sikomo/Auth')); 
		}
  } 

  public function index(){
    $this->load->view('Admin/Header');
		$this->load->view('Admin/Dashboard');
  }

  public function GantiPassword(){
    $this->db->where('Username', $this->session->userdata('Username'));
    $this->db->update('akun', array('Password' => password_hash($_POST['Password'], PASSWORD_DEFAULT)));
    if ($this->db->affected_rows()){
      echo '1';
    } else {
      echo 'Gagal Mengganti Password!';
    }
  }

	public function Komoditas(){
    $Data['Komoditas'] = $this->db->get('komoditas')->result_array();
    $this->load->view('Admin/Header');
		$this->load->view('Admin/komoditas',$Data);
  }

  public function GetTurunan($Id){
    echo $this->db->query('SELECT Turunan FROM `komoditas` WHERE Id = '.$Id)->row_array()['Turunan'];
  }

  public function Input(){
    $Foto = date('Ymd',time()).substr(password_hash('Komoditas', PASSWORD_DEFAULT),7,7);
    $Foto = str_replace("/","E",$Foto);$Foto = str_replace(".","F",$Foto);
    move_uploaded_file($_FILES['FileFoto']['tmp_name'], "Komoditas/".$Foto.".jpg");
    $_POST['Foto'] = $Foto.".jpg";
    $this->db->insert('komoditas', $_POST);
    if ($this->db->affected_rows()){
      echo '1';
    } else { 
      echo 'Gagal Input Komoditas!';
    }
  }

  public function Edit(){
    if (count($_FILES) == 0) {
      $this->db->where('Id',$_POST['Id']);
      unset($_POST['Id']);unset($_POST['FotoLama']);
      $this->db->update('komoditas', $_POST);
      if ($this->db->affected_rows()){
        echo '1';
      } else {
        echo "Gagal Update Data!";
      }  
    } else if (count($_FILES) == 1) {
      if (!empty($_POST['FotoLama'])) {
        unlink('Komoditas/'.$_POST['FotoLama']);
      }
			$NamaFile = date('Ymd',time()).substr(password_hash('Komoditas', PASSWORD_DEFAULT),7,7);
      $NamaFile = str_replace("/","E",$NamaFile);$NamaFile = str_replace(".","F",$NamaFile);
      move_uploaded_file($_FILES['Foto']['tmp_name'], "Komoditas/".$NamaFile.".jpg");
      $_POST['Foto'] = $NamaFile.".jpg";
      $this->db->where('Id',$_POST['Id']);
      unset($_POST['Id']);unset($_POST['FotoLama']);
      $this->db->update('komoditas', $_POST);
      if ($this->db->affected_rows()){
        echo '1';
      } else {
        echo 'Gagal Update Data!';
      }  
		}
  }
  
  public function Hapus(){
    $this->db->delete('komoditas', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
      unlink('Komoditas/'.$_POST['Foto']);
			echo '1';
		} else {
			echo 'Gagal Menghapus Data!';
		}
	}
}