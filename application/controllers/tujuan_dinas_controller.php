<?php
if ( !defined('BASEPATH')) exit('No Direct Script Allowed');
class tujuan_dinas_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tujuan_dinas_model');
	}
	function index()
	{
		$data['daftar_tujuan'] = $this->tujuan_dinas_model->tampil_data()->result();
		$data['judul'] = 'Tujuan Dinas';
		$this->load->view('templates/header', $data);
		$this->load->view('tujuan_dinas_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Tujuan Dinas';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_tujuan_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_prov = $this->input->post('id_prov');
		$nama_prov = $this->input->post('nama_prov');
		
		$data = array(
				'id_prov' => $id_prov,
				'nama_prov' => $nama_prov
		);
		
		$this->tujuan_dinas_model->tambah_data($data, 'provinsi');
		redirect('tujuan_dinas_controller/index');
	}
	function edit($id_prov)
	{
		$where = array('id_prov' => $id_prov);
		$data['provinsi'] = $this->tujuan_dinas_model->edit_data($where, 'provinsi')->result();
		$data['judul'] = 'Edit Tujuan Dinas';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_tujuan_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_prov = $this->input->post('ID_PROV');
		$nama_prov = $this->input->post('NAMA_PROV_EDIT');
		
		$data = array('nama_prov' => $nama_prov);
		
		$where = array('id_prov' => $id_prov);
		$this->tujuan_dinas_model->update_data($where, $data, 'provinsi');
		redirect('tujuan_dinas_controller/index');
	}
	function hapus($id_provinsi)
	{
		$where = array('id_prov' => $id_provinsi);
		$this->tujuan_dinas_model->hapus_data($where, 'provinsi');
		redirect('tujuan_dinas_controller/index');
	}
}
?>