<div id="content-tengah">
<div id="judul-berita">List Download File/Berkas</div>
<div id="galeri">
<?php
echo"Share this article on :";
	?>
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
	<?php
	echo"<br><br>";
foreach($semua->result_array() as $b)
{
echo "<div id='download'><img src='".base_url()."system/application/views/main-web/images/download.png' border='0' class='image2'>
<table>
<tr><td width='70'><b>File</b></td><td width='10'> : </td><td>".$b['judul_file']."</td></tr>
<tr><td><b>Tanggal</b></td><td> : </td><td>".$b['tgl_posting']."</td></tr>
<tr><td><b>Oleh</b></td><td> : </td><td>".$b['nama_pegawai']."</td></tr>
<tr><td></td><td></td><td><a href='".base_url()."download/".$b['nama_file']."'><span class='submitButton2'>Download File</span></a></td></tr>
</table>
</div>";
}
?>
</div>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

