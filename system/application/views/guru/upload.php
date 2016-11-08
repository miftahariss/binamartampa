<div id="kiri"><h2>Module Upload Berkas / File</h2>
<div id="isi">
<br>
<a href="<?php echo base_url(); ?>index.php/guru/tambahupload"><div class="pagingpage"><b> + Tambah File / Upload File</b></div><br /><br /></a>
<table width="750" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul File</strong></td><td><strong>Kategori</strong></td><td><strong>File</strong></td><td><strong>Pemilik</strong></td><td><strong>Tgl. Upload</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
if(count($query->result())>0){
foreach($query->result() as $t)
{
		if(($nomor%2)==0){
			$warna="#C8E862";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='".$warna."'><td align='center'>".$nomor."</td><td>".$t->judul_file."</td><td>Berkas</td><td><b><a href='".base_url()."download/".$t->nama_file."'>[ Download ]</a></b></td><td>".$t->author."</td><td>".$t->tgl_posting."</td><td>
<a href='".base_url()."index.php/guru/editupload/".$t->id_download."' title='Edit File'><img src='".base_url()."system/application/views/guru/images/edit-icon.gif' border='0'></a></td>
<td><a href='".base_url()."index.php/guru/hapusupload/".$t->id_download."' onClick=\"return confirm('Anda yakin ingin menghapus file ini?')\" title='Hapus File'><img src='".base_url()."system/application/views/guru/images/hapus-icon.gif' border='0'></a></td>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Anda belum pernah mengupload file atau berkas</td></tr>";
}
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</table><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

</div>
</div>
