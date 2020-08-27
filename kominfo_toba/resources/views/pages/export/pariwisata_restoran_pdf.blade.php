<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Restoran/Rumah Makan</title>
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
		<h5>Jumlah Restoran/Rumah Makan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
        <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Restoran</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwisrestoran as $pariwisatad) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$pariwisatad->kecamatan}}</td>
        <td align="center">{{$pariwisatad->jumlah}}</td>
        <td align="center">{{$pariwisatad->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $parwisrestoran = DB::table("pariwisata_restoran")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$parwisrestoran->sum("jumlah")}}</td>   
									<td align="center"></td>         
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>