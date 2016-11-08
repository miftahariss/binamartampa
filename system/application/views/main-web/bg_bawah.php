<div style="clear: both; width:100%; height: 10px;"></div>
<div id="list-bawah">
<div id="sub-list-bawah">
<div id="title-list-bawah">GALERI KEGIATAN TERBARU</div>
<div id="isi-list-bawah">
<?php
foreach($cuplikan_galeri->result_array() as $b)
{
echo "<a href='".base_url()."system/application/views/main-web/galeri/".$b['foto_besar']."'"; ?>

onclick="return hs.expand(this,
			{wrapperClassName: 'borderless floating-caption', dimmingOpacity: 0.75, align: 'center'})"
<?php
			
			echo"><div id='album-besar2'><div id='sub-album2'><img src='".base_url()."system/application/views/main-web/galeri/thumb/".$b['foto_kecil']."' border='0' width='90' title='".$b['nama_album']."'></div></div></a>";
}
?>
<ul>
<li class="li-class">Lihat koleksi foto-foto kegiatan yang lainnya. <a href="<?php echo base_url(); ?>index.php/web/data/8"><span class="submitButton2">Lihat Galeri Kegiatan</span></a></li>
</ul>
</div>
<div id="tutup-list-bawah"></div>
</div>
<div id="sub-list-bawah">
<div id="title-list-bawah">BERGABUNG DENGAN GROUP KAMI DI FACEBOOK</div>
<div id="isi-list-bawah">
<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FSMK-Kesehatan-Bina-Marta-Martapura-1513312688995451&amp;width=450&amp;colorscheme=light&amp;connections=7&amp;stream=false&amp;header=false&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:200px;" allowTransparency="true"></iframe>
</div>
<div id="tutup-list-bawah"></div>
</div>
</div>
<div id="footer">

<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
Copyright &copy; <?php echo date('Y'); ?> SMK BINA MARTA. All Rights Reserved.</div>
</div>
</body>
</html>
