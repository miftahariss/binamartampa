<div id="content-tengah">
	<div id="berita-utama">
		<div id="berita-main">
			<h3>Selamat Datang di Website SMK Kesehatan Bina Martapura</h3>
			<h2>Media Sistem Informasi Akademik Online <strong>SMK Kesehatan Bina Martapura</strong></h2>
			<img src="<?php echo base_url(); ?>system/application/views/main-web/images/icon.png" class="image" width="70"/>Sambutan
		</div>
	</div>
	<div id="title-isi">Berita Terbaru</div>
	<?php
	foreach($berita_home->result_array() as $b)
	{
	$isi=substr($b['isi'],0,230);
	echo'<div class="list-berita"><img src='.base_url().'system/application/views/main-web/berita/'.$b['gambar'].' width="60" class="image"><h1>'.$b['judul_berita'].'
	<h2>Kategori <b>Berita</b> -'. $b['tanggal'].' -|- '.$b['waktu'].' WIB</h2>'.$isi.'.... <a href="'.base_url().'index.php/web/berita/'.$b["id_berita"].'">[Baca Selengkapnya]</a>
	</div>';
	}
	?>
	<a href="<?php echo base_url(); ?>index.php/web/data/7"><div class="submitButton">Lihat Semua Berita</div></a>
</div>

