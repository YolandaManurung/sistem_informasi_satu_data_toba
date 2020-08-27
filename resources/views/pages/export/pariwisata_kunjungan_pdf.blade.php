<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Kunjungan Kapal Penumpang Beserta Barang dan Angkutan</title>
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
		<h5>Jumlah Kunjungan Kapal Penumpang Beserta Barang dan Angkutan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
        <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Kapal</td>
                                    <td align="center"><b>Jumlah Penumpang</td>
                                    <td align="center"><b>Jumlah Barang</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwiskunjungan as $parwiskun) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$parwiskun->kecamatan}}</td>
        <td align="center">{{$parwiskun->jumlah_kapal}}</td>
        <td align="center">{{$parwiskun->jumlah_penumpang}}</td>
        <td align="center">{{$parwiskun->jumlah_barang}}</td>
        <td align="center">{{$parwiskun->tahun}}</td>
		<td></td>
			</tr>
			@endforeach
            <?php
            $parwiskunjungan = DB::table("pariwisata_kunjungan_kapal")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$parwiskunjungan->sum("jumlah_kapal")}}</td>   
									<td align="center"><b><b>{{$parwiskunjungan->sum("jumlah_penumpang")}}</td>
									<td align="center"><b><b>{{$parwiskunjungan->sum("jumlah_barang")}}</td>         
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>