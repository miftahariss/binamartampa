<div id="isi">
<br>
<h1>Module Polling</h1><br />
<!-- Batas Content -->
<a href="<?php echo base_url().'index.php/adminweb/tambahsoalpoll';?>"><div class="submitButton"><b> + Tambah Soal Polling</b></div></a> 
<a href="<?php echo base_url().'index.php/adminweb/tambahjwbpoll';?>"><div class="submitButton"><b> + Tambah Jawaban Polling</b></div></a> 
<br /><br />
<table width="750" cellpadding="2" cellspacing="1" class="widget-small">
<tr align="center"><td><strong>Nomor</strong></td><td><strong>Soal Polling</strong></td><td><strong>Status</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 
$no = 1+$page;
foreach($detail->result_array() as $artikel){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $artikel['soal_poll']; ?></td>
<td><?php echo $artikel['status']; ?></td>
<?php
echo"<td>
	<a href='".base_url()."index.php/adminweb/editsoalpolling/".$artikel['id_soal_poll']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapussoalpolling/".$artikel['id_soal_poll']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
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