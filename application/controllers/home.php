<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('data_pegawai_model');
		$this->load->model('daftar_prov_model');
		$this->load->model('daftar_kota_model');
		$this->load->model('daftar_kec_model');
		$this->load->model('status_lokasi_model');
		$this->load->model('alat_angkut_model');
		$this->load->library('word');
	}
	
	function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['daftar_kota'] = $this->daftar_kota_model->tampil_kota_arr();
			$data['daftar_kec'] = $this->daftar_kec_model->tampil_kec_arr();
			$data['perjalanan_dinas'] = $this->home_model->tampil_data()->result();
			$data['judul']= 'Home';
			$this->load->view('templates/header', $data);
			$this->load->view('home_view', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//If no session, rediret to login page
			redirect('login', 'refresh');
		}
	}
	function perjalanan_selesai_batal()
	{
		$data['daftar_kota'] = $this->daftar_kota_model->tampil_kota_arr();
		$data['daftar_kec'] = $this->daftar_kec_model->tampil_kec_arr();
		$data['perjalanan_dinas'] = $this->home_model->tampil_data_selesai()->result();
		$data['judul'] = 'Daftar Perjalanan Dinas Selesai dan Batal';
		$this->load->view('templates/header', $data);
		$this->load->view('home_view', $data);
		$this->load->view('templates/footer');
	}	
	function tambah_perjalanan()
	{
		$data['daftar_pegawai'] = $this->data_pegawai_model->tampil_data()->result();
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		$data['daftar_lokasi'] = $this->status_lokasi_model->tampil_data()->result();
		$data['daftar_angkutan'] = $this->alat_angkut_model->tampil_data()->result();
		$data['judul'] = 'Tambah Perjalanan Dinas';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_perjalanan_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah_cek()
	{
		$id_perjalanan = $this->input->post('id_perjalanan');
		$nip = $this->input->post('NIP_perjalanan');
		$id_status= $this->input->post('id_status_perjalanan');
		$id_prov_pd = $this->input->post('id_prov_perjalanan');
		$id_kota_pd = $this->input->post('id_kota_pd');
		$id_kec_pd = $this->input->post('id_kec_pd');		
		$id_tujuan = $id_prov_pd.$id_kota_pd.$id_kec_pd;
		//$tgl_berangkat = $this->input->post('tgl_berangkat');
		//$tgl_kembali = $this->input->post('tgl_kembali');		
		$tgl_berangkat = str_replace("/", "-", $this->input->post('tgl_berangkat'));
		$tgl_kembali = str_replace("/", "-", $this->input->post('tgl_kembali'));
		$id_angkut = $this->input->post('ID_Angkut_PD');
		$maksud_pd = $this->input->post('maksud_pd');
		
		
		$jumlah_hari = $this->hitung_hari($tgl_berangkat, $tgl_kembali);
		$lanjut = $this->cek_bentrok($tgl_berangkat, $tgl_kembali, $nip);
		
		if($lanjut !== FALSE)
		{
			//$data['uh_perjalanan'] = $this->hitung_uh($jumlah_hari, $id_prov, $id_status);
			//$data['up_perjalanan'] = $this->hitung_up($jumlah_hari, $id_prov, $nip);
			
			$data['id_perjalanan'] = $id_perjalanan;
			$data['tgl_berangkat'] = $tgl_berangkat;
			$data['tgl_kembali'] = $tgl_kembali;
			$data['lama_perjalanan'] = $jumlah_hari;
			$data['id_tujuan'] = $id_tujuan;
			$data['maksud_pd'] = $maksud_pd;
			$data['daftar_kota'] = $this->daftar_kota_model->tampil_kota_arr();
			$data['daftar_kec'] = $this->daftar_kec_model->tampil_kec_arr();
			$data['nip'] = $this->data_pegawai_model->edit_data($nip, 'data_pegawai')->row();
			$where_angkut = array('ID_ANGKUT' => $id_angkut);
			$data['alat_angkut'] = $this->alat_angkut_model->edit_data($where_angkut, 'alat_angkut')->row();
			//$where_prov = array('id_prov' => $id_prov);
			//$data['id_prov'] = $this->tujuan_dinas_model->edit_data($where_prov, 'provinsi')->row();
			$where_stat = array('id_status' => $id_status);
			$data['id_status'] = $this->status_lokasi_model->edit_data($where_stat, 'status_lokasi')->row();
			
			$data['judul'] = 'Cek Input';
			$this->load->view('templates/header', $data);
			$this->load->view('cek_perjalanan_view', $data);
			$this->load->view('templates/footer');				
		}else{
			redirect('home/index');
		}
	}
	
	function hitung_hari($tgl_berangkat, $tgl_kembali)
	{
		$rencana_berangkat = new DateTime(str_replace("/","-",$tgl_berangkat));
		$rencana_kembali = new DateTime(str_replace("/","-",$tgl_kembali));
		
		$beda_hari = $rencana_berangkat->diff($rencana_kembali)->days;
		$jumlah_hari = $beda_hari + 1;
		return $jumlah_hari;
		
	}		
	
	function cek_bentrok($tgl_berangkat, $tgl_kembali, $nip)
	{
		$daftar_tanggal = $this->home_model->ambil_tanggal($nip)->result();
		$jumlah_hari = $this->hitung_hari($tgl_berangkat, $tgl_kembali);
		
		//$rencana_berangkat = new DateTime($tgl_berangkat);
		//$rencana_kembali = new DateTime($tgl_kembali);		
		$rencana_berangkat = new DateTime(str_replace("/","-",$tgl_berangkat));
		$rencana_kembali = new DateTime(str_replace("/","-",$tgl_kembali));
		//$beda_hari = date_diff($rencana_berangkat, $rencana_kembali);
		//$beda_hari = $beda_hari->format("%R%a days");
		$beda_hari = $rencana_berangkat->diff($rencana_kembali)->days;
	
		foreach($daftar_tanggal as $row)
		{
			$daftar_berangkat = new DateTime($row->tgl_berangkat);
			$daftar_kembali = new DateTime($row->tgl_kembali);
			
			if(($rencana_berangkat >= $daftar_berangkat) && ($rencana_berangkat <= $daftar_kembali))
			{
				return FALSE;
			}else if(($rencana_kembali >= $daftar_berangkat) && ($rencana_kembali <= $daftar_kembali))
			{
				return FALSE;
			}else if(($daftar_berangkat >= $rencana_berangkat) && ($daftar_berangkat <= $rencana_kembali)){
				return FALSE;
			}else if(($daftar_kembali >= $rencana_berangkat) && ($daftar_kembali <= $rencana_kembali)){
				return FALSE;
			}
		}
	}
	
	function tambah_action()
	{		
		$id_perjalanan = $this->input->post('id_perjalanan');		
		$nip = $this->input->post('NIP_perjalanan');
		$id_status= $this->input->post('id_status_perjalanan');
		$id_tujuan = $this->input->post('id_tujuan_perjalanan');		
		//$tgl_berangkat = $this->input->post('tgl_berangkat');
		$tgl_berangkat = date('Y-m-d',strtotime($this->input->post('tgl_berangkat')));
		$tgl_kembali =  date('Y-m-d',strtotime($this->input->post('tgl_kembali')));
		$lama_perjalanan = $this->input->post('lama_perjalanan');
		$alat_angkut = $this->input->post('alat_angkut_pd');
		$maksud_pd = $this->input->post('maksud_pd');
		$status_pd = 'TERENCANA';
				
		/*
		$daftar_tanggal = $this->home_model->ambil_tanggal($nip)->result();
		
		$rencana_berangkat = new DateTime($tgl_berangkat);
		$rencana_kembali = new DateTime($tgl_kembali);
		
		foreach($daftar_tanggal as $row)
		{
			$daftar_berangkat = new DateTime($row->tgl_berangkat);
			$daftar_kembali = new DateTime($row->tgl_kembali);
			
			if(($rencana_berangkat >= $daftar_berangkat) && ($rencana_berangkat <= $daftar_kembali))
			{
				$lanjut = 'BATAL';
			}else if(($rencana_kembali >= $daftar_berangkat) && ($rencana_kembali <= $daftar_kembali))
			{
				$lanjut = 'BATAL';
			}
		} return $lanjut; */		

		$data = array(
				'ID_PERJALANAN' => $id_perjalanan,
				'NIP' => $nip,
				'ID_STATUS' => $id_status,
				'ID_TUJUAN' => $id_tujuan,				
				'TGL_BERANGKAT' => $tgl_berangkat,
				'TGL_KEMBALI' => $tgl_kembali,
				'LAMA_PERJALANAN' => $lama_perjalanan,
				'ID_ANGKUT' => $alat_angkut,
				'MAKSUD_PD' => $maksud_pd,
				'STATUS_PD' => $status_pd);		
		$this->home_model->input_data($data, 'perjalanan_dinas');
		redirect('home/index');		
	}	
	function edit($id_perjalanan)
	{
		//$where = array('id_perjalanan' => $id_perjalanan);
		$data['daftar_pegawai'] = $this->data_pegawai_model->tampil_data()->result();
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		$data['daftar_lokasi'] = $this->status_lokasi_model->tampil_data()->result();
		$data['daftar_angkut'] = $this->alat_angkut_model->tampil_data()->result();
		$data['daftar_prov'] = $this->daftar_prov_model->tampil_prov_arr();
		$data['daftar_kota'] = $this->daftar_kota_model->tampil_kota_arr();
		$data['daftar_kec'] = $this->daftar_kec_model->tampil_kec_arr();
		$data['dinas_edit'] = $this->home_model->edit_data($id_perjalanan, 'perjalanan_dinas')->result();
		$data['dinas_satu_edit'] = $this->home_model->edit_satu_data($id_perjalanan, 'perjalanan_dinas')->row();
		$data['judul'] = 'Edit Perjalanan';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_perjalanan_view', $data);
		$this->load->view('templates/footer');
	}
	function cek_edit_perjalanan()
	{
		$id_perjalanan = $this->input->post('id_perjalanan');
		$nip = $this->input->post('nip_perjalanan_edit');
		$id_status_edit= $this->input->post('id_status_edit');
		$id_prov_edit = $this->input->post('id_prov_perjalanan_edit');
		$id_kota_edit = $this->input->post('id_kota_perjalanan_edit');
		$id_kec_edit = $this->input->post('id_kec_perjalanan_edit');
		$id_tujuan_edit = $id_prov_edit.$id_kota_edit.$id_kec_edit;
		$tgl_berangkat_lama = $this->input->post('tgl_berangkat_lama');
		$tgl_kembali_lama = $this->input->post('tgl_kembali_lama');
		$tgl_berangkat = str_replace("/", "-", $this->input->post('tgl_berangkat_edit'));
		$tgl_kembali = str_replace("/", "-", $this->input->post('tgl_kembali_edit'));		
		//$tgl_berangkat = $this->input->post('tgl_berangkat_edit');
		//$tgl_kembali = $this->input->post('tgl_kembali_edit');
		$id_angkut_edit = $this->input->post('alat_angkut_edit');
		$maksud_pd_edit = $this->input->post('maksud_pd_edit');
		$status_pd = $this->input->post('status_pd_edit');
		
		$lanjut = $this->cek_bentrok_edit($tgl_berangkat, $tgl_kembali,$tgl_berangkat_lama, $tgl_kembali_lama, $nip);
		$jumlah_hari = $this->hitung_hari($tgl_berangkat, $tgl_kembali);
		
		if($lanjut !== FALSE)
		{				
			$data['id_perjalanan'] = $id_perjalanan;
			$data['tgl_berangkat'] = $tgl_berangkat;
			$data['tgl_kembali'] = $tgl_kembali;
			$data['status_pd'] = $status_pd;
			$data['lama_perjalanan'] = $jumlah_hari;
			$data['maksud_pd'] = $maksud_pd_edit;
			$data['id_tujuan'] = $id_tujuan_edit;
			$data['daftar_kota'] = $this->daftar_kota_model->tampil_kota_arr();
			$data['daftar_kec'] = $this->daftar_kec_model->tampil_kec_arr();
			$data['nip'] = $this->data_pegawai_model->edit_data($nip, 'data_pegawai')->row();			
			$where_angkut = array('ID_ANGKUT' => $id_angkut_edit);
			$data['alat_angkut'] = $this->alat_angkut_model->edit_data($where_angkut, 'alat_angkut')->row();
			$where_stat = array('id_status' => $id_status_edit);
			$data['id_status'] = $this->status_lokasi_model->edit_data($where_stat, 'status_lokasi')->row();
				
			$data['judul'] = 'Cek Edit Data';
			$this->load->view('templates/header', $data);
			$this->load->view('cek_edit_perjalanan_view', $data);
			$this->load->view('templates/footer');
		
		}else{
			redirect('home/index');
		}
	}
	
	function cek_bentrok_edit($tgl_berangkat, $tgl_kembali, $tgl_berangkat_lama, $tgl_kembali_lama, $nip)
	{		
		$daftar_tanggal = $this->home_model->ambil_tanggal_edit($nip, $tgl_berangkat_lama, $tgl_kembali_lama)->result();
	
		//$rencana_berangkat = new DateTime($tgl_berangkat);
		//$rencana_kembali = new DateTime($tgl_kembali);
		$rencana_berangkat = new DateTime(str_replace("/","-",$tgl_berangkat));
		$rencana_kembali = new DateTime(str_replace("/","-",$tgl_kembali));
		//$beda_hari = date_diff($rencana_berangkat, $rencana_kembali);
		//$beda_hari = $beda_hari->format("%R%a days");
		$beda_hari = $rencana_berangkat->diff($rencana_kembali)->days;
	
		foreach($daftar_tanggal as $row)
		{
			$daftar_berangkat = new DateTime($row->tgl_berangkat);
			$daftar_kembali = new DateTime($row->tgl_kembali);
				
			if(($rencana_berangkat >= $daftar_berangkat) && ($rencana_berangkat <= $daftar_kembali))
			{
				return FALSE;
			}else if(($rencana_kembali >= $daftar_berangkat) && ($rencana_kembali <= $daftar_kembali))
			{
				return FALSE;
			}else if(($daftar_berangkat >= $rencana_berangkat) && ($daftar_berangkat <= $rencana_kembali)){
				return FALSE;
			}else if(($daftar_kembali >= $rencana_berangkat) && ($daftar_kembali <= $rencana_kembali)){
				return FALSE;
			}			
			
			/*for($i= 0; $i <= $beda_hari; $i++){
				if(($rencana_berangkat == $daftar_berangkat) || ($rencana_berangkat == $daftar_kembali)){
					return FALSE;
				}else $rencana_berangkat->modify('+1 day');
			}*/
		}
	}
	
	function update()
	{
		$id_perjalanan_edit = $this->input->post('id_perjalanan');
		$nip_edit = $this->input->post('nip_perjalanan_edit');		
		$id_status_edit = $this->input->post('id_status_perjalanan_edit');
		$id_tujuan_edit = $this->input->post('id_tujuan_perjalanan_edit');		
		$tgl_berangkat_edit = date('Y-m-d',strtotime($this->input->post('tgl_berangkat_edit')));
		$tgl_kembali_edit =  date('Y-m-d',strtotime($this->input->post('tgl_kembali_edit')));		
		//$tgl_berangkat_edit = $this->input->post('tgl_berangkat_edit');
		//$tgl_kembali_edit = $this->input->post('tgl_kembali_edit');
		$lama_perjalanan_edit = $this->input->post('lama_perjalanan_edit');
		$alat_angkut_edit = $this->input->post('alat_angkut_edit');
		$maksud_pd_edit = $this->input->post('maksud_pd_edit');
		$status_pd_edit = $this->input->post('status_pd_edit');
			
		$data = array(
				'NIP' => $nip_edit,								
				'ID_STATUS' => $id_status_edit,
				'ID_TUJUAN' => $id_tujuan_edit,
				'TGL_BERANGKAT' => $tgl_berangkat_edit,
				'TGL_KEMBALI' => $tgl_kembali_edit,
				'LAMA_PERJALANAN' => $lama_perjalanan_edit,
				'ID_ANGKUT' => $alat_angkut_edit,
				'MAKSUD_PD' => $maksud_pd_edit,
				'STATUS_PD' => $status_pd_edit
		);
		$where = array(
				'ID_PERJALANAN' => $id_perjalanan_edit
		);
		$this->home_model->update_data($where, $data, 'perjalanan_dinas');
		redirect('home/index');
	}
	function hapus($id_perjalanan)
	{
		$where = array('id_perjalanan' => $id_perjalanan);
		$this->home_model->hapus_data($where, 'perjalanan_dinas');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data perjalanan dinas dengan kode '.$id_perjalanan.' telah dihapus</div>');
		redirect('home/index');
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
	
	
	function print_pd($id_perjalanan)
	{				
		//Ambil data kota dan kecamatan
		$daftar_kota_arr = $this->daftar_kota_model->tampil_kota_arr();
		$daftar_kec_arr = $this->daftar_kec_model->tampil_kec_arr();
		//Ambil data perjalanan bentuk array dan object
		$data_pd = $this->home_model->ambil_data_surat($id_perjalanan, 'perjalanan_dinas')->row_array();
		$data_pd_obj = $this->home_model->ambil_data_surat($id_perjalanan, 'perjalanan_dinas')->row();
		//Ambil data pegawai
		$nip_pegawai = $data_pd['NIP'];
		$data_pegawai = $this->data_pegawai_model->edit_data($nip_pegawai, 'data_pegawai')->row_array();
		//Buat variabel		
		$nama_pd = $data_pd['NAMA'];
		$jabatan_pd = $data_pd['JABATAN'];
		$pangkat_pd = $data_pegawai['PANGKAT'];
		$status_pd = $data_pd['STATUS'];
		if ($data_pd_obj->ID_STATUS == 'S1')
		{
			$nama_tujuan_pd = 'Kecamatan '.$daftar_kec_arr[substr($data_pd_obj->ID_TUJUAN, 10, 5)];
		}else
		{
			$nama_tujuan_pd = 'Kota '.$daftar_kota_arr[substr($data_pd_obj->ID_TUJUAN, 5, 5)];	
		}
		$kendaraan_pd = $data_pd['TIPE_ANGKUT_PD'];
		$tanggal_berangkat_pd = $data_pd['tgl_berangkat'];
		$tanggal_kembali_pd = $data_pd['tgl_kembali'];
		$lama_pd = $data_pd['lama_perjalanan'];
		$maksud_pd = $data_pd['MAKSUD_PD'];
		
		
		
		/*$PHPWord = $this->word;
		$document = $PHPWord->loadTemplate('templateSurat.docx');
		$document->setValue('nama_pd', $nama_pd);
		$document->save('test_surat.docx');*/
		
		//$templatefile = 'application/controllers/templateSticker.docx';
		$PHPWord = $this->word;
		$document = $PHPWord->loadTemplate('application/controllers/templateSurat.docx');
		$document->setValue('nama_pd', $nama_pd);
		$document->setValue('pangkat_pd', $pangkat_pd);	
		$document->setValue('jabatan_pd', $jabatan_pd);
		$document->setValue('status_pd', $status_pd);
		$document->setValue('tujuan_pd', $nama_tujuan_pd);
		$document->setValue('kendaraan_pd', $kendaraan_pd);
		$document->setValue('tgl_berangkat_pd', $tanggal_berangkat_pd);
		$document->setValue('tgl_kembali_pd', $tanggal_kembali_pd);		
		$document->setValue('maksud_pd', $maksud_pd);
		$document->setValue('lama_pd', $lama_pd);
		
		$filename = 'SPPD-'.$id_perjalanan.'.docx'; //save our document as this file name
		$document->save($filename);
		header('Content-Description: File Transfer');
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename='.basename($filename));
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.filesize($filename));
		readfile($filename);
		
		/*header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('php://output');*/		
	}
	/*function hitung_uh($jumlah_hari, $id_prov, $id_status)
	 {
	 $uh_tujuan = $this->home_model->ambil_uh($id_prov, $id_status)->row();
	 $total_uh = $jumlah_hari * $uh_tujuan->nominal;
	 return $total_uh;
	 }
	
	 function hitung_up($jumlah_hari, $id_prov, $nip)
	 {
	 $pangkat_pegawai = $this->data_pegawai_model->edit_data($nip, 'data_pegawai')->row();
	 $where_pangkat = $pangkat_pegawai->ID_PANGKAT;
	 $up_tujuan = $this->home_model->ambil_up($id_prov, $where_pangkat)->row();
	 $total_up = $jumlah_hari * $up_tujuan->nominal;
	 return $total_up;
	 }*/
}
