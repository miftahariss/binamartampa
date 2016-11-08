<div id="isi">
<h1>Module Galeri</h1><br />
<!-- Batas Content -->
<a href="<?php echo base_url().'index.php/adminweb/tambahfoto';?>"><div class="submitButton"><b> + Tambah Foto Kegiatan</b></div></a> 
<br /><br /><br />

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanalbum">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" ><td width="150">Nama Album</td><td width="10" align="center">:</td><td><input type="text" name="nama" class="input" size="40" /></td><td><input type="submit" value="Simpan Album" class="input" /> <input type="reset" value="Ulang Pengisian" class="input" /></td></tr>
</table>
</form> 
<br />

<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Nama Album Galeri</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 
$no = 1+$page;
foreach($album->result_array() as $artikel){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $artikel['nama_album']; ?></td>
<?php
echo"<td>
	<a href='".base_url()."index.php/adminweb/editalbum/".$artikel['id_album']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapusalbum/".$artikel['id_album']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  
?>
</table><br />
<?php echo $paginator;?>
<!-- Batas content bawah -->
</div>