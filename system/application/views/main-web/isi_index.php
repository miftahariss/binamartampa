<div id="content-tengah">
	<div id="berita-utama">
		<div id="berita-main">
			<h3>Selamat Datang di Website SMK Bina Marta</h3>
			<h2>Media Sistem Informasi Akademik Online <strong>SMK Bina Marta</strong></h2>
			<img src="<?php echo base_url(); ?>system/application/views/main-web/images/icon.png" class="image" width="70"/>Kami Menyambut baik terbitnya Website SMAN 1 Wongsorejo yang baru , dengan harapan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. Sebaliknya orangtua dapat mengakses informasi tentang kegiatan akademik dan non akademik putra - puterinya di sekolah ini. Dengan fasilitas ini Siswa dapat mengakses berbagai informasi pembelajaran dan informasi akademik.
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

