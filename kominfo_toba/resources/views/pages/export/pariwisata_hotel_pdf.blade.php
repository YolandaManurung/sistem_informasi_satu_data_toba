<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Hotel dan Akomodasi</title>
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
		<h5>Jumlah Hotel dan Akomodasi</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td>
            <td align="center"><b>Kecamatan</td>
            <td align="center"><b>Nama Hotel</td>
            <td align="center"><b>Jumlah Kamar</td>
            <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwishotel as $pariwisatah) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$pariwisatah->kecamatan}}</td>
        <td align="center">{{$pariwisatah->hotel}}</td>
        <td align="center">{{$pariwisatah->jumlah_kamar}}</td>
        <td align="center">{{$pariwisatah->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $parwishotel = DB::table("pariwisata_hotel")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
									<td></td>
                                    <td align="center">{{$parwishotel->sum("jumlah_kamar")}}</td>    
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>