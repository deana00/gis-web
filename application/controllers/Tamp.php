<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lok_Model');
		// $this->load->model('Cir_Model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head');
		$this->load->view('mapSPBU', $data);
		$this->load->view('template/foot');
	}
	public function form()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('coord', 'coord', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/headform');
			$this->load->view('form');
			$this->load->view('template/foot');
		} else {
			$this->Lok_Model->tambahDatadata();
			redirect('Tamp/form');
		}
	}

	public function data_spbu()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head-spbu');
		$this->load->view('spbu', $data);
		$this->load->view('template/foot');
	}

	public function update()
	{
		$data['data'] = $this->Lok_Model->getdataById();
		$this->load->view('template/head-spbu');
		$this->load->view('update-form', $data);
		$this->load->view('template/foot');
	}
}
