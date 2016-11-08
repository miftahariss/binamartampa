<div id="content-tengah">
<div id="judul-berita">Hubungi Kami</div>
<strong>Alamat</strong> : Jalan Raya Bengkak, Wongsorejo-Banyuwangi.<br />
<strong>Telpon</strong> : (0333) 510166<br />
<strong>Website</strong> : www.sman1-wongsorejo.com<br />
<strong>Mailto</strong> : info@sman1-wongsorejo.com<br /><br /><br />
<script languange="javascript">
function test(s, p) {
		s = s.nodeType == 1 ? s.value : s;
		return s == '' || new RegExp(p).test(s);
}
function isEmail(s) {
		return test(s, '^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$');
	}
function CekEmail(txt, alertid){
	var input = txt.value;
	var benar2 = isEmail(input);
	if(input=='')
		benar2=false;
  	if(benar2) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}
function CekNama(txt, alertid) {
	var input = txt.value;
	var benar1 = false;
	if(input!='')
		benar1=true;
	if(benar1) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}
function CekPesan(txt, alertid) {
	var input = txt.value;
	var benar = false;
	if(input!='')
		benar=true;
	if(benar) { 
  		document.getElementById(alertid).style.display='none';
  		document.frmguestbook.simpan.disabled=false;
  	} else {
  		document.getElementById(alertid).style.display='';
  		document.frmguestbook.simpan.disabled=true;
  	}
}
function dissabledButton() {
	document.frmguestbook.simpan.disabled=true;
}
window.onload = dissabledButton;
</script>
<form method="post" name="frmguestbook" action="<?php echo base_url(); ?>index.php/web/simpanpesan">
<table style="border:1px dashed #999999; padding-left:10px; padding-right:10px;">
<tr><td width="70">Nama</td><td width="20">:</td><td><input class="input" name="nama" type="text" value="" size="50"  onchange="javascript:CekNama(this, 'alertnama');" onblur="javascript:CekNama(this, 'alertnama');"></td></tr>
<tr><td colspan="3"><div id="alertnama" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Nama tidak diijinkan kosong</div></td>
<tr><td>Email</td><td>:</td><td><input class="input" id="idemail" name="email" type="text" value="" size="50" onchange="javascript:CekEmail(this, 'alertemail');" onblur="javascript:CekEmail(this, 'alertemail');"></td></tr>
<tr><td colspan="3"><div id="alertemail" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Email tidak valid</div></td>
<tr><td valign="top">Pesan</td><td valign="top">:</td><td><textarea name="pesan" cols="40" rows="7" class="input"  onchange="javascript:CekPesan(this, 'alertpesan');" onblur="javascript:CekPesan(this, 'alertpesan');"></textarea></td></tr>
<tr><td colspan="3"><div id="alertpesan" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Pesan tidak diijinkan kosong</div></td>
<tr><td valign="top"></td><td valign="top"></td><td><input type="submit" value="Kirim Pesan" class="poll" name="simpan" /> <input type="reset" value="Hapus" class="poll" /></td></tr>
<tr><td colspan="3"><br />
<ul>
<li class="li-class">Maaf pesan anda tidak langsung kami tampilkan karena pesan tersebut masih perlu kami administrasi terlebih dahulu.</li>
</ul>
</td></tr>
</table>
<br /><br />

<table style="border:1px dashed #999999; padding-left:10px; width:460px;">
<tr><td><strong>Hubungi Admin via YM</strong><br /><br />
<ul>
<li class="li-class"><a href = 'ymsgr:sendim?go_blind_boys'><img src="http://opi.yahoo.com/online?u=go_blind_boys&amp;m=g&amp;t=2" border=0></a></li>
</ul>
</td></tr>
</table>
</form>
</div>

