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
			redirect(base_url('Tamp/data_spbu'));
		}
	}

	public function data_spbu()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head-spbu');
		$this->load->view('spbu', $data);
		$this->load->view('template/foot');
	}

	public function edit($id)
	{
		$data['data'] = $this->Lok_Model->getdataById($id);
		$this->load->view('template/headform');
		$this->load->view('update-form', $data);
		$this->load->view('template/foot');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'name', 'required');
		$this->form_validation->set_rules('coord', 'koordinat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit($id);
		} else {
			$this->Lok_Model->updateData($id);
			redirect(base_url('Tamp/data_spbu'));
		}
	}

	public function delete($id)
	{
		$this->Lok_Model->hapusDatadata($id);
		redirect(base_url('Tamp/data_spbu'));
	}
}
