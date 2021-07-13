<?php
<<<<<<< HEAD
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamp extends CI_Controller {
=======
defined('BASEPATH') or exit('No direct script access allowed');

class Tamp extends CI_Controller
{
>>>>>>> d243b04 (add spbu view)

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lok_Model');
		// $this->load->model('Cir_Model');
		$this->load->library('form_validation');
	}

	public function index()
	{
<<<<<<< HEAD
		$data['data'] = $this->Lok_Model-> getloc();
		$this->load->view('template/head');
		$this->load->view('mapSPBU',$data);
		$this->load->view('template/foot');
	}
	public function formMarker()
=======
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot');
	}
	public function map2()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot2', $data);
	}
	public function map3()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot2', $data);
	}
	public function form()
>>>>>>> d243b04 (add spbu view)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('coord', 'coord', 'required');

<<<<<<< HEAD
		if($this->form_validation->run()==false){
			$this->load->view('template/head');
			$this->load->view('form');
			$this->load->view('template/foot');
		}else{
=======
		if ($this->form_validation->run() == false) {
			$this->load->view('template/headform');
			$this->load->view('form');
			$this->load->view('template/foot');
		} else {
>>>>>>> d243b04 (add spbu view)
			$this->Lok_Model->tambahDatadata();
			redirect('Tamp/form');
		}
	}
<<<<<<< HEAD
	public function tabelFormMarker()
	{
		// Halaman edit tabel marker
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot');
	}
	public function formPolyline()
	{
		// Halaman edit tabel marker
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot');
	}
	public function tabelFormPolyline()
	{
		// Halaman edit tabel marker
		$this->load->view('template/head');
		$this->load->view('index');
=======

	public function data_spbu()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head-spbu');
		$this->load->view('spbu', $data);
>>>>>>> d243b04 (add spbu view)
		$this->load->view('template/foot');
	}
}
