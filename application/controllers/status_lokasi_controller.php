<?php 
if ( !defined('BASEPATH')) exit('No Direct Script Allowed');
class status_lokasi_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('status_lokasi_model');
	}
	function index()
	{
		$data['daftar_status'] = $this->status_lokasi_model->tampil_data()->result();
		$data['judul'] = 'Status Lokasi';
		$this->load->view('templates/header', $data);
		$this->load->view('status_lokasi_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Status Lokasi';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_status_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_status = $this->input->post('ID_STATUS');
		$status = $this->input->post('STATUS');
	
		$data = array(
				'ID_STATUS' => $id_status,
				'STATUS' => $status
		);
	
		$this->status_lokasi_model->tambah_data($data, 'status_lokasi');
		redirect('status_lokasi_controller/index');
	}
	function edit($id_status)
	{
		$where = array('ID_STATUS' => $id_status);
		$data['status_lokasi'] = $this->status_lokasi_model->edit_data($where, 'status_lokasi')->result();
		$data['judul'] = 'Edit Status Lokasi Tujuan Dinas';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_status_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_status = $this->input->post('ID_STATUS');
		$status = $this->input->post('STATUS_EDIT');
		
		$data = array('STATUS' => $status);
		
		$where = array('ID_STATUS' => $id_status);
		$this->status_lokasi_model->update_data($where, $data, 'status_lokasi');
		redirect('status_lokasi_controller/index');
	}
	function hapus($id_status)
	{
		$where = array('ID_STATUS' => $id_status);
		$this->status_lokasi_model->hapus_data($where, 'status_lokasi');
		redirect('status_lokasi_controller/index');
	}
}
?>