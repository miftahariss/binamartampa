<div id="isi">
<br>
<h1>Module Polling</h1><br />
<!-- Batas Content -->
<a href="<?php echo base_url().'index.php/adminweb/tambahsoalpoll';?>"><div class="submitButton"><b> + Tambah Soal Polling</b></div></a> 
<a href="<?php echo base_url().'index.php/adminweb/tambahjwbpoll';?>"><div class="submitButton"><b> + Tambah Jawaban Polling</b></div></a> 
<br /><br />
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpansoalpoll">
<tr><td><strong>Soal Polling</strong></td><td>:</td><td><input type="text" name="soal" class="input" size="60" /></td></tr>
<tr><td><strong>Status</strong></td><td>:</td><td>
<select name="status" class="input">
<option value="N">Tidak Aktif</option><option value="Y">Aktif</option>
</select>
</td></tr>
<tr><td></td><td></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /></td></tr>
</form>
</table>
<br />
<!-- Batas content bawah -->
</div>