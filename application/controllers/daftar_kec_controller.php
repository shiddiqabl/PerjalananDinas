<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class daftar_kec_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('daftar_kec_model');
		$this->load->model('daftar_prov_model');
		$this->load->model('daftar_kota_model');
	}
	function index()
	{
		$data['daftar_kecamatan'] = $this->daftar_kec_model->tampil_data()->result();
		$data['judul'] = 'Daftar Kecamatan';
		$this->load->view('templates/header', $data);
		$this->load->view('daftar_kec_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Kecamatan Baru';
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		$data['daftar_kota'] = $this->daftar_kota_model->tampil_data()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_kec_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_kec	 = $this->input->post('id_kecamatan');
		$id_prov = $this->input->post('ID_Prov');
		$id_kota = $this->input->post('id_kota');		
		$nama_kec = $this->input->post('nama_kecamatan');
	
		$data = array(
				'ID_KEC'  => $id_kec,
				'ID_PROV' => $id_prov,
				'ID_KOTA' => $id_kota,
				'NAMA_KEC' => $nama_kec
		);
	
		$this->daftar_kec_model->tambah_data($data, 'daftar_kec');
		redirect('daftar_kec_controller/index');
	}
	function ambil_kec($id_kota)
	{
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->daftar_kec_model->ambil_kec_arr($id_kota)));
	}
	function edit($id_kec)
	{
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		$data['daftar_kec'] = $this->daftar_kec_model->edit_data($id_kec, 'daftar_kec')->result();
		$data['judul'] = 'Edit Data Kecamatan';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_kec_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_kec = $this->input->post('ID_KEC_EDIT');
		$id_prov_edit = $this->input->post('ID_PROV_EDIT');
		$id_kota_edit = $this->input->post('ID_KOTA_EDIT');		
		$nama_kec_edit = $this->input->post('NAMA_KEC_EDIT');
	
		$data = array(				
				'ID_PROV' => $id_prov_edit,
				'ID_KOTA' => $id_kota_edit,
				'NAMA_KEC' => $nama_kec_edit
		);
		$where = array(
				'ID_KEC' => $id_kec
		);
		$this->daftar_kec_model->update_data($where, $data, 'daftar_kec');
		redirect('daftar_kec_controller/index');
	}
	function hapus($id_kec)
	{
		$where = array('ID_KEC' => $id_kec);
		$this->daftar_kec_model->hapus_data($where, 'daftar_kec');
		redirect('daftar_kec_controller/index');
	}
}