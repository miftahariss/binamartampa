<?php
class Guru_model extends Model
	{
		function Guru_model()
		{
			parent::Model();
		}
		function Kelas()
		{
			$q=$this->db->query("select * from tbl_kelas order by id_kelas ASC");
			return $q;
		}
		function Nama_Siswa($kls)
		{
			$q=$this->db->query("select * from tbl_siswa left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas='$kls' order by tbl_siswa.id_siswa 
			ASC");
			return $q;
		}
		function Simpan_Data($query)
		{
			$this->db->query($query);
		}
		function Cek_Pass($usr,$pwd)
		{
			$q = $this->db->query("select password where username='$usr' and password='$pwd'");
			return $q;
		}
		function Update_Password($usr,$pwd)
		{
			$this->db->query("update tbl_kepegawaian set password=md5('$pwd') where username='$usr'");
		}
		function Tampil_File($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tbl_download where author='$username' LIMIT $ofset,$limit");
			return $t;
		}
		function Total_File($username)
		{
			$t=$this->db->query("select * from tbl_download where author='$username'");
			return $t;
		}
		function Simpan_Upload($in)
		{
			$kat=$this->db->insert('tbl_download',$in);
			return $kat;
		}
		function Delete_Upload($id)
		{
			$this->db->where('id_download',$id);
			$this->db->delete('tbl_download');
		}
		function Edit_Upload($id,$username)
		{
			$t=$this->db->query("select * from tbl_download where author='$username' AND id_download='$id'");
			return $t;
		}
		function Update_Upload($in)
		{
			$this->db->where('id_download',$in['id_download']);
			$this->db->update('tbl_download',$in);
		}
		function Tampil_Pengumuman($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tbl_pengumuman where penulis='$username' LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Pengumuman($username)
		{
			$t=$this->db->query("select * from tbl_pengumuman where penulis='$username'");
			return $t;
		}
		function Simpan_Pengumuman($in)
		{
			$kat=$this->db->insert('tbl_pengumuman',$in);
			return $kat;
		}
		function Delete_Pengumuman($id)
		{
			$this->db->where('id_pengumuman',$id);
			$this->db->delete('tbl_pengumuman');
		}
		function Edit_Pengumuman($id,$username)
		{
			$ed=$this->db->query("select * from tbl_pengumuman where penulis='$username' and id_pengumuman='$id'");
			return $ed;
		}
		function Update_Pengumuman($in)
		{
			$this->db->where('id_pengumuman',$in['id_pengumuman']);
			$this->db->update('tbl_pengumuman',$in);
		}
	}
?>
