<?php

class Web extends Controller {

	function Web()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','user_agent'));
		$this->load->plugin();
		$this->load->model('Web_model');
		session_start();	
	}
	
	function index()
	{
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/isi_index',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
	}
	function data()
	{
		$data=array();
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$id_ekskul = substr($id,0,1);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["detail"] = $this->Web_model->Data_Statis($id);
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["berita_home"] = $this->Web_model->Berita_Home();
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		//jika memilih menu pengumuman
		if($id=="9"){
					$page=$this->uri->segment(4);
					$limit=8;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$data["semua"] = $this->Web_model->Semua_Pengumuman($limit,$offset);
					$tot_hal = $this->Web_model->Total_Pengumuman();
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/semua_pengumuman',$data);
		}
		else if($id=="10"){
					$page=$this->uri->segment(4);
					$limit=4;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$data["semua"] = $this->Web_model->Semua_Agenda($limit,$offset);
					$tot_hal = $this->Web_model->Total_Agenda();
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/semua_agenda',$data);
		}
		//jika memilih menu download
		else if($id=="11"){
					$page=$this->uri->segment(4);
					$limit=7;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$data["semua"] = $this->Web_model->Semua_Download($limit,$offset);
					$tot_hal = $this->Web_model->Total_Download();
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/semua_download',$data);
		}
		//jika memilih menu guru
		else if($id=="3.4"){
					$page=$this->uri->segment(4);
					$limit=7;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$status="guru";
					$data["guru"] = $this->Web_model->Kepegawaian($limit,$offset,$status);
					$tot_hal = $this->Web_model->Total_Kepegawaian($status);
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/guru',$data);
		}
		//jika memilih menu pegawai
		else if($id=="3.5"){
					$page=$this->uri->segment(4);
					$limit=7;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$status="pegawai";
					$data["pegawai"] = $this->Web_model->Kepegawaian($limit,$offset,$status);
					$tot_hal = $this->Web_model->Total_Kepegawaian($status);
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/pegawai',$data);
		}
		//jika memilih menu indexs berita
		else if($id=="7"){
					$page=$this->uri->segment(4);
					$limit=5;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$data["berita"] = $this->Web_model->Semua_Berita($limit,$offset);
					$tot_hal = $this->Web_model->Total_Berita();
						$config['base_url'] = base_url() . '/index.php/web/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/semua_berita',$data);
		}
		//jika memilih menu galeri
		else if($id=="8"){
					$page=$this->uri->segment(4);
					$limit=12;
					if(!$page):
					$offset = 0;
					else:
					$offset = $page;
					endif;
					$data["album"] = $this->Web_model->Album_Galeri($limit,$offset);
					$tot_hal = $this->Web_model->Total_Album();
						$config['base_url'] = base_url() . '/index.php/guru/data/'.$id.'/';
						$config['total_rows'] = $tot_hal->num_rows();
						$config['per_page'] = $limit;
						$config['uri_segment'] = 4;
						$config['first_link'] = 'Awal';
						$config['last_link'] = 'Akhir';
						$config['next_link'] = 'Selanjutnya';
						$config['prev_link'] = 'Sebelumnya';
						$this->pagination->initialize($config);
					$data["paginator"] =$this->pagination->create_links();
					$this->load->view('main-web/album_galeri',$data);
		}
		//jika memilih menu ekstrakurikuler
		else if($id_ekskul=="6"){
		$data["detail"] = $this->Web_model->Data_Statis($id);
		$this->load->view('main-web/ekstrakurikuler',$data);
		}
		//jika memilih menu absensi
		else if($id=="5.1"){
		$this->load->view('main-web/data_statis',$data);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/akademik'>";
		}
		//jika memilih menu absensi
		else if($id=="4.1"){
			$data["kls"] = $this->Web_model->Kelas();
			$this->load->view('main-web/siswa',$data);
		}
		//jika memilih menu data siswa
		else if($id=="5.1"){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/akademik'>";
		}
		else{
					$this->load->view('main-web/data_statis',$data);
		}
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
	}
	function berita()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["detail_berita"] = $this->Web_model->Detail_Berita($id);
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$data["acak_berita"] = $this->Web_model->Berita_Acak($id);
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/detail_berita',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
	}	
	function hasilpolling()
	{
      	$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		setcookie("poling", "sudah poling", time() + 3600 * 24);
		if (isset($_COOKIE["poling"])) {
   		?>
			<script type="text/javascript">
				alert("Maaf, anda sudah mengisi polling ini!!! Setiap hari, hanya bisa mengisi satu kali. Silahkan vote kembali besok.");
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/web/lihathasil'>";
 		}
 		else{
		$this->Web_model->Update_Polling($pilih);
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/hasil_polling',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
		}
	}
		
	function lihathasil()
	{
      	$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		setcookie("poling", "sudah poling", time() + 3600 * 24);
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/hasil_polling',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
		}
	function rekapsiswa()
	{
		$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		setcookie("poling", "sudah poling", time() + 3600 * 24);
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$data["kelas"] = $this->input->post('kls');
		$data["kls"] = $this->Web_model->Kelas();
		$data["siswa"] = $this->Web_model->Nama_Siswa($data["kelas"]);
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/rekap_siswa',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
		}
	function galeri()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$page=$this->uri->segment(4);
		$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->Web_model->Total_Galeri($id);
			$config['base_url'] = base_url() . '/index.php/web/galeri/'.$id.'/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["detail_galeri"] = $this->Web_model->Detail_Galeri($id,$offset,$limit);
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/detail_galeri',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
	}	
	
	function contact()
	{
      	$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/contact',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
	}
//==========================================Memakai Highslide Javascript===========================================
	function detailagenda()
	{
		$id_agenda='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_agenda='';
		}
		else
		{
    			$id_agenda = $this->uri->segment(3);
		}
		$data['detail']=$this->Web_model->Detail_Agenda($id_agenda);
		$this->load->view('main-web/detail_agenda',$data);
	}
	function detailpengumuman()
	{
		$id_pengumuman='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_pengumuman='';
		}
		else
		{
    			$id_pengumuman = $this->uri->segment(3);
		}
		$data['detail']=$this->Web_model->Detail_Pengumuman($id_pengumuman);
		$this->load->view('main-web/detail_pengumuman',$data);
	}
	function simpanpesan()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$pesan=$this->input->post('pesan');
		if(empty($nama) || empty($email) || empty($pesan))
		{
			?>
				<script type="text/javascript">
					alert("Field belum lengkap...!!!\nSilahkan ulangi lagi...!!!");
				</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/web/contact'>";
		}
		else{
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$t = mdate($tgl,$time);
			$j = mdate($jam,$time);
			$tj = "".$t."-".$j."";
			$datainsert = array(
				'id_pesan' => NULL,		
				'nama' => $nama,
				'email' => $email,
				'pesan' => $pesan,
				'status' => 'N',
				'tgl_posting' => $tj
			);
		   $this->Web_model->Insert_Pesan($datainsert);
			?>
				<script type="text/javascript">
					alert("Terima kasih atas kunjungan dan pesan dari anda.");
				</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function login()
	{
		$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$this->load->view('main-web/bg_atas',$data);
		$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/login',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_bawah',$data);
		
	}
	function masuklogin()
	{
		$username = $this->input->post('user');
		$pwd = $this->input->post('pass');
		$hasil = $this->Web_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama_pegawai."|".$items->status;
				$tanda=$items->status;
			}
			$_SESSION['username_belajar']=$session_username;
			if($tanda=="admin"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb'>";
			}
			else if($tanda=="guru"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru'>";
			}
			else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru'>";
			}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/web/login'>";
		}
	}
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
