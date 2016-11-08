<div id="isi">
<h1>Module Galeri</h1><br />
<!-- Batas Content -->
<a href="<?php echo base_url().'index.php/adminweb/galeri';?>"><div class="submitButton"><b> + Tambah Album Foto</b></div></a> 
<a href="<?php echo base_url().'index.php/adminweb/tambahfoto';?>"><div class="submitButton"><b> + Tambah Foto Kegiatan</b></div></a> 
<br /><br /><br />

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanfoto" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" ><td width="150">Nama Album</td><td width="10" align="center">:</td><td>
<select name="album" class="input">
<?php
foreach($album->result_array() as $a)
{
echo "<option value='".$a['id_album']."'>".$a['nama_album']."</option>";
}
?>
</select>
</td></tr>
<td width="150">Cari File</td><td width="10" align="center">:</td><td><input type="file" class="input" name="userfile" size="50" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Upload Foto" class="input" /> <input type="reset" value="Ulang Pengisian" class="input" /></td></tr>
</table>
</form> 
<br />

<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Nama Album Galeri</strong></td><td><strong>Nama File</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 
$no = 1+$page;
foreach($foto->result_array() as $artikel){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $artikel['nama_album']; ?></td>
<td><?php echo $artikel['foto_besar']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/adminweb/hapusfoto/".$artikel['id_foto']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
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