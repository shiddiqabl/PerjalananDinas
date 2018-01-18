<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class data_pegawai_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_pegawai_model');
		$this->load->model('pangkat_model');
	}
	function index()
	{
		$data['judul'] = 'Data Pegawai';
		$data['daftar_pegawai']=$this->data_pegawai_model->tampil_data()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('data_pegawai_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Data Baru';
		$data['daftar_pangkat'] = $this->pangkat_model->tampil_data()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('input_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$nip = $this->input->post('NIP');
		$nama = $this->input->post('NAMA');
		$jabatan = $this->input->post('JABATAN');
		$id_pangkat = $this->input->post('ID_PANGKAT');
		
		$data = array(
				'NIP' => $nip,
				'NAMA' => $nama,
				'JABATAN' => $jabatan,
				'ID_PANGKAT' => $id_pangkat
		);
		$this->data_pegawai_model->input_data($data);
		redirect('data_pegawai_controller/index');
	}
	function edit($nip)
	{
		//$where = array('NIP' => $nip);
		$data['daftar_pangkat'] = $this->pangkat_model->tampil_data()->result();
		$data['pegawai'] = $this->data_pegawai_model->edit_data($nip, 'data_pegawai')->result();		
		$data['judul'] = 'Edit Data Pegawai';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_data_pegawai_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$nip = $this->input->post('NIP');
		$nama = $this->input->post('NAMA_EDIT');
		$jabatan = $this->input->post('JABATAN_EDIT');
		$id_pangkat = $this->input->post('ID_PANGKAT_EDIT');
		$data = array(
				'NAMA' => $nama,
				'JABATAN' => $jabatan,
				'ID_PANGKAT' => $id_pangkat
		);
		$where = array(
				'NIP' => $nip
		);
		$this->data_pegawai_model->update_data($where, $data, 'data_pegawai');
		redirect('data_pegawai_controller/index');
	}
	function hapus($nip)
	{
		$where = array('NIP' => $nip);
		$this->data_pegawai_model->hapus_data($where, 'data_pegawai');
		redirect('data_pegawai_controller/index');
	}
}
?>