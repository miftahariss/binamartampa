<?php

class Akademik extends Controller {

	function Akademik()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library();
		$this->load->plugin();
		$this->load->model('Akademik_model');
		session_start();	
	}
	
	function index()
	{
		$data=array();
		$data["menu"] = $this->Akademik_model->Menu_Atas();
		$data["menu_bawah"] = $this->Akademik_model->Menu_Bawah();
		$data["kls"] = $this->Akademik_model->Kelas();
		$this->load->view('akademik/bg_atas',$data);
		$this->load->view('akademik/isi_index',$data);
		$this->load->view('akademik/bg_bawah');
	}
	function rekapabsen()
	{
		$data=array();
		$id_siswa="";
		$data["menu"] = $this->Akademik_model->Menu_Atas();
		$data["menu_bawah"] = $this->Akademik_model->Menu_Bawah();
		$data["kelas"] = $this->input->post('kls');
		$data["bulan"] = $this->input->post('bln');
		$data["tahun"] = $this->input->post('thn');
		$data["kls"] = $this->Akademik_model->Kelas();
		$data["siswa"] = $this->Akademik_model->Nama_Siswa($data["kelas"]);
		foreach($data["siswa"]->result_array() as $f)
		{
			$id_siswa=$f["id_siswa"];
		}
		if($id_siswa!="")
		{
			$data["hsl"] = $this->Akademik_model->Rekap_Absen($data["kelas"],$data["bulan"],$data["tahun"],$id_siswa);
		}
		else{
		?>
		<script type="text/javascript">
		alert("Klik tombol Lihat Absensi..!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/akademik'>";
		}
		$this->load->view('akademik/bg_atas',$data);
		$this->load->view('akademik/rekap_absen',$data);
		$this->load->view('akademik/bg_bawah');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
