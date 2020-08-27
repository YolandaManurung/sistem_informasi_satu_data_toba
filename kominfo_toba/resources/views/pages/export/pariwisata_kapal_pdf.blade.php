<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Perahu/Kapal</title>
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
		<h5>Jumlah Perahu/Kapal</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
        <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Perahu Tanpa Motor</td>
                                    <td align="center"><b>Perahu Motor Tempel</td>
                                    <td align="center"><b>Kapal Motor</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwiskapal as $pariwisatak) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$pariwisatak->kecamatan}}</td>
        <td align="center">{{$pariwisatak->perahu_tanpa_motor}}</td>
        <td align="center">{{$pariwisatak->perahu_motor_tempel}}</td>
        <td align="center">{{$pariwisatak->kapal_motor}}</td>
        <td align="center">{{$pariwisatak->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $parwiskapal = DB::table("pariwisata_jenis_kapal")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$parwiskapal->sum("perahu_tanpa_motor")}}</td>   
									<td align="center"><b><b>{{$parwiskapal->sum("perahu_motor_tempel")}}</td>
									<td align="center"><b><b>{{$parwiskapal->sum("kapal_motor")}}</td>         
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>