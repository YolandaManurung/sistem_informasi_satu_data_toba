<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Kasus Penyakit Terbanyak di Kabupaten Toba Samosir</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Jumlah Kasus Penyakit Terbanyak di Kabupaten Toba Samosir</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Jenis Penyakit</th>
            <th align="center"><b>Jumlah Kunjungan</th>
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($kasus_penyakit as $kasus_penyakit)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$kasus_penyakit->jenis_penyakit}}</td>
      
       <td align="center">{{number_format($kasus_penyakit->jumlah_kunjungan, 0, ".", ".")}}</td> 
       <td align="center">{{$kasus_penyakit->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $kasus_penyakit = DB::table("kesehatan_jumlah_kasus_penyakit_terbanyak")->where('status', '=', 'Accepted')->get()

        ?>
		</tbody>
	</table>
 
</body>
</html>