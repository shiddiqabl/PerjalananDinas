<?php
if ( !defined('BASEPATH')) exit('No Direct Script Allowed');
class pangkat_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pangkat_model');
	}
	function index()
	{
		$data['daftar_pangkat'] = $this->pangkat_model->tampil_data()->result();
		$data['judul'] = 'Pengaturan Kode Pangkat';
		$this->load->view('templates/header', $data);
		$this->load->view('pangkat_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = "Tambah Kode Pangkat";
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_pangkat_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_pangkat = $this->input->post('ID_PANGKAT');
		$pangkat = $this->input->post('PANGKAT');
	
		$data = array(
				'ID_PANGKAT' => $id_pangkat,
				'PANGKAT' => $pangkat
		);
	
		$this->pangkat_model->tambah_data($data, 'pangkat');
		redirect('pangkat_controller/index');
	}
	function edit($id_pangkat)
	{
		$where = array('ID_PANGKAT' => $id_pangkat);
		$data['pangkat'] = $this->pangkat_model->edit_data($where, 'pangkat')->result();
		$data['judul'] = 'Edit Pangkat Pegawai';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_pangkat_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_pangkat = $this->input->post('ID_PANGKAT');
		$pangkat = $this->input->post('PANGKAT_EDIT');
		$data = array('PANGKAT' => $pangkat);
		$where = array('ID_PANGKAT' => $id_pangkat);
		$this->pangkat_model->update_data($where, $data, 'pangkat');
		redirect('pangkat_controller/index');
	}
	function hapus($id_pangkat)
	{
		$where = array('ID_PANGKAT' => $id_pangkat);
		$this->pangkat_model->hapus_data($where, 'pangkat');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data pangkat '.$id_pangkat.' telah dihapus</div>');
		redirect('pangkat_controller/index');
	}
}