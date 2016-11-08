<div id="content-tengah">
<?php
foreach($detail_berita->result_array() as $d)
{
	echo"<div id='judul-berita'>".$d['judul_berita']."</div>";
	echo"<div class='keterangan'>Kategori <b><i>Berita</i></b> | Diposting pada : <i>".$d['tanggal']." -|- ".$d['waktu']."</i> oleh <strong>Admin</strong><br>
	Share this article on ";
	?>
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
	<?php
	echo"</div>";
	$isi=nl2br($d['isi']);
	echo"<div id='detail'><img src='".base_url()."system/application/views/main-web/berita/".$d['gambar']."' class='image' width='150'>".$isi."</div>";
}
echo"<br><br><span class='berita-lain'><img src='".base_url()."system/application/views/main-web/images/icon-berita.png'>Baca Juga Berita Lainnya</span>";
echo"<ul>";
foreach($acak_berita->result_array() as $acak)
{
echo "<li class='li-class'><a href='".base_url()."index.php/web/berita/".$acak['id_berita']."'>".$acak['judul_berita']."</a></li>";
}
echo"</ul>";

?>
</div>