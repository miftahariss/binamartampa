<?php
class Admin_model extends Model
	{
		function Admin_model()
		{
			parent::Model();
		}
		function Data_Statis()
		{
			$q=$this->db->query("select * from tbl_data left join tbl_menu on tbl_data.data_id=tbl_menu.id where tbl_data.data_id!='counter' order by tbl_data.id_data ASC");
			return $q;
		}
		function Menu_Statis()
		{
			$q=$this->db->query("select * from tbl_menu where level='1'");
			return $q;
		}			
		function getDataGambar() 
		{
			$query=$this->db->query("select * from tbl_gambar");
			return $query;
		}
		function Simpan_Data_Statis($data)
		{
			$s=$this->db->insert('tbl_data',$data);
			return $s;
		}
		function Simpan_Gambar($datainsert)
		{
			$this->db->insert('tbl_gambar',$datainsert);
		}
		function Hapus_Media($id)
		{
			$this->db->where('id_file',$id );
			$this->db->delete('tbl_gambar');
		}
		function Edit_Content($tabel,$seleksi)
		{
			$query=$this->db->query("select * from $tabel where $seleksi");
			return $query;
		}
		function Update_Content($tabel,$isi,$seleksi)
		{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
		}
		function Delete_Content($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
		}
		function Berita($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_berita order by id_berita DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Artikel($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		function Simpan_Artikel($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		function Pengumuman($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_pengumuman order by id_pengumuman DESC LIMIT $offset,$limit");
			return $q;
		}
		function Agenda($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_agenda order by id_agenda DESC LIMIT $offset,$limit");
			return $q;
		}
		function Siswa_Kelas()
		{
			$q=$this->db->query("select * from tbl_kelas group by tbl_kelas.id_kelas order by tbl_kelas.id_kelas ASC");
			return $q;
		}
		function Siswa_Per_Kelas($id)
		{
			$q=$this->db->query("select * from tbl_siswa left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas=$id order by tbl_siswa.id_siswa ASC"
			);
			return $q;
		}
		function Daftar_Pegawai($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kepegawaian order by tbl_kepegawaian.id_kepegawaian ASC LIMIT $offset,$limit");
			return $q;
		}
		function Simpan_Pegawai($in)
		{
			$this->db->trans_start();
			$this->db->query("INSERT INTO tbl_kepegawaian (nip, nama_pegawai, kelahiran, matpel, jk, status, username, password) VALUES ('".$in['nip']."', 
			'".$in['nama_pegawai']."', '".$in['kelahiran']."', '".$in['matpel']."', '".$in['jk']."', '".$in['status']."', '".$in['username']."', 
			md5( '".$in['password']."'))");
			$this->db->trans_complete();
			$sukses = TRUE;
			if ($this->db->trans_status() === FALSE)
			{
				$sukses = FALSE;
			} 
			return $sukses;
		}
		function Update_Password($in,$id)
		{
			$q=$this->db->query("update tbl_kepegawaian set password=md5('".$in."') where id_kepegawaian='".$id."'");
			return $q;
		}
		function Daftar_Polling($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_soalpolling order by id_soal_poll DESC LIMIT $offset,$limit");
			return $q;
		}
		function Tampil_Data($tabel,$id)
		{
			$q=$this->db->query("select * from ".$tabel." order by ".$id." DESC");
			return $q;
		}
		function Tampil_Data_Terbatas($tabel,$id,$join,$offset,$limit)
		{
			$q=$this->db->query("select * from ".$tabel." ".$join." order by ".$id." DESC LIMIT ".$offset.",".$limit."");
			return $q;
		}
		function Tampil_Data_Terseleksi($tabel,$id,$id_seleksi)
		{
			$q=$this->db->query("select * from ".$tabel." where ".$id." = ".$id_seleksi."");
			return $q;
		}
		function Tampil_Data_Terseleksi_Join($tabel,$id,$id_seleksi,$join)
		{
			$q=$this->db->query("select * from ".$tabel." left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where ".$id." = ".$id_seleksi."");
			return $q;
		}
		function Tampil_Cek_Absen($id_kelas,$tgl,$bln,$thn)
		{
			$q=$this->db->query("select * from tbl_absensi left join tbl_siswa on tbl_absensi.id_siswa=tbl_siswa.id_siswa where tbl_absensi.id_kelas=".$id_kelas." and tanggal=".$tgl." and bulan=".$bln." and tahun=".$thn
			."");
			return $q;
		}
		function Simpan_Data($query)
		{
			$this->db->query($query);
		}
		function Edit_Absen($id_absen)
		{
			$q=$this->db->query("select * from tbl_absensi left join (tbl_kelas,tbl_siswa) on tbl_absensi.id_kelas=tbl_kelas.id_kelas and tbl_absensi.id_siswa=tbl_siswa.id_siswa 
			where tbl_absensi.id_absensi = ".$id_absen."");
			return $q;
		}
		
	}
?>
