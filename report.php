<?php
	include ('koneksi.php');
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$query = mysqli_query($conn,"select * from tb_siswa");
	$html='<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
	$html .='<table border="1" width="100%">
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>kelas</th>
			<th>alamat</th>
		</tr>';
	$no=1;
	while ($row=mysqli_fetch_array($query)) {
		$html.="<tr>
		<td>".$no."</td>
		<td>".$row['nama']."</td>
		<td>".$row['kelas']."</td>
		<td>".$row['alamat']."</td>
		</tr>";
		$no++;
	}
	$html.="</html>";
	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4','potrait');
	$dompdf->render();
	$dompdf->stream('laporan_siswa.pdf');
?>