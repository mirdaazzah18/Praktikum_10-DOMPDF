<?php
	include ('koneksi1.php');
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$query = mysqli_query($conn,"select * from pendaftaran");
	$html='<html><hr><center><h3>Daftar Nama Pendaftar</h3></center><hr/><br/>';
	$html .='<table border="1" width="100%" style="table-layout: fixed">
		<tr>
			<td>Jenis Pendafaran</td>
			<td>Tanggal Masuk</td>
			<td>NIS</td>
			<td>Nomor Peserta Ujian</td>
			<td>Pernah Paud?</td>
			<td>Pernah TK?</td>
			<td>No. SKHUN Sebelumnya</td>
			<td>No. Ijazah Sebelumnya</td>
			<td>Hobi</td>
			<td>Cita-Cita</td>
			<td>Nama Lengkap</td>
			<td>Jenis Kelamin</td>
			<td>No. NISN</td>
			<td>No. NIK</td>
			<td>Tempat Lahir</td>
			<td>Tanggal Lahir</td>
			<td>Agama</td>
			<td>Berkebutuhan Khusus</td>
			<td>Alamat</td>
			<td>RT</td>
			<td>RW</td>
			<td>Nama Dusun</td>
			<td>Nama Kelurahan/Desa</td>
			<td>Nama Kecamatan</td>
			<td>Kode Pos</td>
			<td>Tempat Tinggal</td>
			<td>Moda Transportasi</td>
			<td>No. HP</td>
			<td>No. Telp</td>
			<td>Email Pribadi</td>
			<td>Penerima KPS/PKH/KIP</td>
			<td>No. KPS/PKH/KIP</td>
			<td>Kewarganegaraan</td>
		</tr>';
	$no=1;
	while ($row=mysqli_fetch_array($query)) {
		$html.="<tr>
		<td>".$row['JENIS_PENDAFTARAN']."</td>
		<td>".$row['TANGGAL_MASUK']."</td>
		<td>".$row['NIS']."</td>
		<td>".$row['NOMOR_PESERTA']."</td>
		<td>".$row['PAUD']."</td>
		<td>".$row['TK']."</td>
		<td>".$row['NO_SKHUN']."</td>
		<td>".$row['NO_IJAZAH']."</td>
		<td>".$row['HOBI']."</td>
		<td>".$row['CITA_CITA']."</td>
		<td>".$row['JENIS_KELAMIN']."</td>
		<td>".$row['NAMA']."</td>
		<td>".$row['NISN']."</td>
		<td>".$row['NIK']."</td>
		<td>".$row['TEMPAT_LAHIR']."</td>
		<td>".$row['TANGGAL_LAHIR']."</td>
		<td>".$row['AGAMA']."</td>
		<td>".$row['BERKEBUTUHAN_KHUSUS']."</td>
		<td>".$row['ALAMAT']."</td>
		<td>".$row['RT']."</td>
		<td>".$row['RW']."</td>
		<td>".$row['DUSUN']."</td>
		<td>".$row['KELURAHAN']."</td>
		<td>".$row['KECAMATAN']."</td>
		<td>".$row['KODE_POS']."</td>
		<td>".$row['TEMPAT_TINGGAL']."</td>
		<td>".$row['TRANSPORTASI']."</td>
		<td>".$row['NO_HP']."</td>
		<td>".$row['NO_TELP']."</td>
		<td>".$row['EMAIL']."</td>
		<td>".$row['PENERIMA_KPS']."</td>
		<td>".$row['NO_KPS']."</td>
		<td>".$row['KEWARGANEGARAAN']."</td>
		</tr>";
	}
	$html.="</html>";
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A0','landscape');
	$dompdf->render();
	$dompdf->stream('pendaftaran_siswa.pdf');
?>