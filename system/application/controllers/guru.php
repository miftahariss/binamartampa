<?php

class Guru extends Controller {

	function Guru()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		$this->load->plugin();
		$this->load->model(array('Guru_model','Web_model'));
		session_start();
	}
	
	function index()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('guru/bg_atas',$data);
			$this->load->view('guru/bg_menu');
			$this->load->view('guru/isi_index',$data);
			$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function absensi()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$data["kls"] = $this->Guru_model->Kelas();
			if($data["status"]=="guru"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('guru/bg_atas',$data);
			$this->load->view('guru/bg_menu');
			$this->load->view('guru/absensi',$data);
			$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function inputabsensi()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$data["id_kls"]=$this->input->post('kls');
		$data["tgl"]=$this->input->post('tgl');
		$data["bln"]=$this->input->post('bln');
		$data["thn"]=$this->input->post('thn');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$data["kls"] = $this->Guru_model->Kelas();
		$data["nama_siswa"] = $this->Guru_model->Nama_Siswa($data["id_kls"]);
			if($data["status"]=="guru"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('guru/bg_atas',$data);
			$this->load->view('guru/bg_menu');
			$this->load->view('guru/input_absensi',$data);
			$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpaninput()
	{
		$simpan=$this->input->post('simpan');
		$pecah1=explode("|",$simpan);
		$datadetail=array();
		$data=array();
		$data["tgl"]=$this->input->post('tgl');
		$data["bln"]=$this->input->post('bln');
		$data["thn"]=$this->input->post('thn');
		$kelas=$this->input->post('kelas');
		$jumlah=count($pecah1);
		$sis = $this->Guru_model->Nama_Siswa($kelas);
		$jum = $sis->num_rows();
		for($i=0;$i<count($pecah1);$i++)
		{
		$pecah2=explode("_",$pecah1[$i]);
		$datadetail['id_siswa'][]=$pecah2[0];
		$datadetail['id_kelas'][]=$pecah2[1];
		$datadetail['absen'][]=$pecah2[2];
		}
		$string="insert into tbl_absensi (id_siswa,id_kelas,absen,tanggal,bulan,tahun) values";
		$akhir="";
		for($i=0;$i<$jum;$i++)
		{	
			if($akhir==""){
			$akhir="(".$datadetail['id_siswa'][$i].",".$datadetail['id_kelas'][$i].",'".$datadetail['absen'][$i]."','".$data['tgl']."','".$data['bln']."','".$data['thn']."')";
			}
			else{
			$akhir.=",(".$datadetail['id_siswa'][$i].",".$datadetail['id_kelas'][$i].",'".$datadetail['absen'][$i]."','".$data['tgl']."','".$data['bln']."','".$data['thn']."')";
			}
		}
		
		if($jumlah<$jum)
		{
		?>
		<style>
		body{
		background-color:#fff;
		color:#fff;
		}
		</style>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/absensi'>";
			?>
			<script type="text/javascript">
				alert("ERROR...!!! Mohon centang semua absen...!!!");
			</script>
			<?php
		}
		else{
		$query = $string.$akhir.';';
		$this->Guru_model->Simpan_Data($query);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/absensi'>";
		}
	
	}
	
	function password()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('guru/bg_atas',$data);
			$this->load->view('guru/bg_menu');
			$this->load->view('guru/password',$data);
			$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatepassword()
	{
		
		$data = array();
		$pass = $this->input->post('password');
		$passlama = $this->input->post('passwordlama');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			$hasil = $this->Web_model->Data_Login($data['username'],$passlama);
			if(count($hasil->result()) <= 0)
			{
				?>
				<script type="text/javascript">
					alert('Password lama yang anda masukkan SALAH..!!!');
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/password'>";
			}
			else if($pass!="")
			{
				$this->Guru_model->Update_Password($data['username'],$pass);
				?>
				<script type="text/javascript">
					alert('Berhasil mengubah password..!!!');
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/password'>";
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/'>";
			}
			else
			{
				?>
				<script type="text/javascript">
					alert('Gagal mengubah password..!!!');
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/password'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function upload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$page=$this->uri->segment(3);
				$limit_ti=15;
				if(!$page):
				$offset_ti = 0;
				else:
				$offset_ti = $page;
				endif;
				$data["query"]=$this->Guru_model->Tampil_File($data["username"],$limit_ti,$offset_ti);
				$tot_hal = $this->Guru_model->Total_File($data["username"]);
				$config['base_url'] = base_url() . '/index.php/guru/upload/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit_ti;
				$config['uri_segment'] = 3;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$data["page"] = $page;
				$data["paginator"]=$this->pagination->create_links();
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/upload',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/tambah_upload',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanupload()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$in["tgl_posting"] = mdate($tgl,$time);
			$in["judul_file"]=$this->input->post('judul');
			$in["author"]=$data["username"];
			$acak=rand(00000000000,99999999999);
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ubah=$acak.$nama_murni; //tanpa ekstensi
			$config["file_name"]=$ubah; //dengan eekstensi
			$in["nama_file"]=$acak.$nm;
			$config['upload_path'] = './download/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '50000';
			$config['max_width'] = '1200';
			$config['max_height'] = '1200';						
			$this->load->library('upload', $config);
		
			if(!$this->upload->do_upload())
			{
			 echo $this->upload->display_errors();
			}
			else {
			$this->Guru_model->Simpan_Upload($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/upload'>";
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$id='';	
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($data["status"]=="guru"){
				$this->Guru_model->Delete_Upload($id);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/upload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$id='';	
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($data["status"]=="guru"){
				$data["tanggal"] = mdate($datestring, $time);
				$data["kategori"]=$this->Guru_model->Edit_Upload($id,$data["username"]);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/edit_upload',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateupload()
	{
		$in=array();
		$in2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$config['upload_path'] = './download/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in2["nama_file"]=$acak.$nm;					
				$this->load->library('upload', $config);
		
				if(empty($_FILES['userfile']['name'])){
					$in["judul_file"]=$this->input->post('judul');
					$in["id_download"]=$this->input->post('id_download');
					$this->Guru_model->Update_Upload($in);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/upload'>";
					
				}
				else{
					if(!$this->upload->do_upload())
					{
					 echo $this->upload->display_errors();
					}
					else {
					$in2["judul_file"]=$this->input->post('judul');
					$in2["id_download"]=$this->input->post('id_download');
					$this->Guru_model->Update_Upload($in2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/upload'>";
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function pengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$page=$this->uri->segment(3);
				$limit_ti=15;
				if(!$page):
				$offset_ti = 0;
				else:
				$offset_ti = $page;
				endif;
				$data["query"]=$this->Guru_model->Tampil_Pengumuman($data["username"],$limit_ti,$offset_ti);
				$tot_hal = $this->Guru_model->Total_Pengumuman($data["username"]);
				$config['base_url'] = base_url() . '/index.php/guru/pengumuman/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit_ti;
				$config['uri_segment'] = 3;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$data["page"] = $page;
				$data["paginator"]=$this->pagination->create_links();
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/pengumuman',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahpengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/tambah_pengumuman',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanpengumuman()
	{
		$data = array();
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data2["tanggal"] = mdate($tgl,$time);
				$data2["judul_pengumuman"]=$this->input->post('judul');
				$data2["isi"]=$this->input->post('isi');
				$data2["penulis"]=$data["username"];
				$this->Guru_model->Simpan_Pengumuman($data2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuspengumuman()
	{
		$data = array();
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$id='';	
				if ($this->uri->segment(3) === FALSE)
				{
						$id='';
				}
				else
				{
						$id = $this->uri->segment(3);
				}
				$this->Guru_model->Delete_Pengumuman($id);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editpengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$id='';	
				if ($this->uri->segment(3) === FALSE)
				{
						$id='';
				}
				else
				{
						$id = $this->uri->segment(3);
				}
				$data["kategori"]=$this->Guru_model->Edit_Pengumuman($id,$data["username"]);
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('guru/bg_atas',$data);
				$this->load->view('guru/bg_menu');
				$this->load->view('guru/edit_pengumuman',$data);
				$this->load->view('guru/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatepengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="guru"){
				$in["judul_pengumuman"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi');
				$in["id_pengumuman"]=$this->input->post('id_pengumuman');
				$in["penulis"]=$data["username"];
				$this->Guru_model->Update_Pengumuman($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	
//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce($selectcategory=null) {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	} 	
}








?>
