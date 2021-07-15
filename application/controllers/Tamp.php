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

	// Map
	public function index()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$line['line'] = $this->Lok_Model->getline();
		$this->load->view('template/head');
		$this->load->view('mapSPBU', $data);
		$this->load->view('mapSPBU', $line);
		$this->load->view('template/foot');
	}

	// Form Marker
	public function form()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('coord', 'coord', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/head-form');
			$this->load->view('form');
			$this->load->view('template/foot');
		} else {
			$this->Lok_Model->tambahDatadata();
			redirect(base_url('Tamp/data_spbu'));
		}
	}

	// Table Marker
	public function data_spbu()
	{
		$data['data'] = $this->Lok_Model->getloc();
		$this->load->view('template/head-spbu');
		$this->load->view('spbu', $data);
		$this->load->view('template/foot');
	}

	//Edit Marker
	public function edit($id)
	{
		$data['data'] = $this->Lok_Model->getdataById($id);
		$this->load->view('template/head-form');
		$this->load->view('update-form', $data);
		$this->load->view('template/foot');
	}

	//Update Marker
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

	//Delete Marker
	public function delete($id)
	{
		$this->Lok_Model->hapusDatadata($id);
		redirect(base_url('Tamp/data_spbu'));
	}

	//Line
	public function formLine()
	{
		$this->form_validation->set_rules('nama_line', 'nama line', 'required');
		$this->form_validation->set_rules('coordinate', 'koordinat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/head-formline');
			$this->load->view('form-line');
			$this->load->view('template/foot');
		} else {
			$this->Lok_Model->tambahLine();
			redirect(base_url('Tamp/dataLine'));
		}
	}

	public function dataLine()
	{
		$line['line'] = $this->Lok_Model->getline();
		$this->load->view('template/head-dataline');
		$this->load->view('lines', $line);
		$this->load->view('template/foot');
	}

	public function edit_line($id)
	{
		$line['line'] = $this->Lok_Model->getLineById($id);
		$this->load->view('template/head-form');
		$this->load->view('update-form-line', $line);
		$this->load->view('template/foot');
	}

	public function update_line($id)
	{
		$this->form_validation->set_rules('nama_line', 'nama line', 'required');
		$this->form_validation->set_rules('coordinate', 'koordinat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit_line($id);
		} else {
			$this->Lok_Model->updateLine($id);
			redirect(base_url('Tamp/dataLine'));
		}
	}

	public function delete_line($id)
	{
		$this->Lok_Model->hapusLine($id);
		redirect(base_url('Tamp/dataLine'));
	}
}
