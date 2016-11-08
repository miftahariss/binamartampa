<?php
class Akademik_model extends Model
	{
		function Akademik_model()
		{
			parent::Model();
		}
		function Kelas()
		{
			$q=$this->db->query("select * from tbl_kelas order by id_kelas ASC");
			return $q;
		}
		function Rekap_Absen($kls,$bln,$thn,$id_sis)
		{
			$q=$this->db->query("select count(*) as jml from tbl_absensi left join (tbl_siswa, tbl_kelas) on tbl_absensi.id_siswa=tbl_siswa.id_siswa and tbl_absensi.id_kelas=tbl_kelas.id_kelas where tbl_absensi.id_kelas='$kls' and tbl_absensi.bulan='$bln' and tbl_absensi.tahun='$thn' and tbl_absensi.id_siswa='$id_sis'");
			return $q;
		}
		function Rekap_Absen_Siswa($kls,$bln,$thn,$id_sis,$st)
		{
			$q=$this->db->query("select count(*) as jml from tbl_absensi left join (tbl_siswa, tbl_kelas) on tbl_absensi.id_siswa=tbl_siswa.id_siswa and tbl_absensi.id_kelas=tbl_kelas.id_kelas where tbl_absensi.id_kelas='$kls' and tbl_absensi.bulan='$bln' and tbl_absensi.tahun='$thn' and tbl_absensi.id_siswa='$id_sis' $st");
			return $q;
		}
		function Nama_Siswa($kls)
		{
			$q=$this->db->query("select * from tbl_siswa left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas='$kls' order by tbl_siswa.id_siswa ASC");
			return $q;
		}
		function Menu_Atas()
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='0' and level='0'");
			return $q;
		}
		function Sub_Menu_Atas($id_parent,$level)
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='$id_parent' and level='$level'");
			return $q;
		}
		function Menu_Bawah()
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='0' and level=10");
			return $q;
		}
	}
?>
