<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Perawat Perjenis Penyakit</title>
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
		<h5>Jumlah Perawat Perjenis Penyakit</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
			<td align="center"><b>No</td> 
                                    <td align="center"><b>Perawat</td> 
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($perawatpenyakit as $pp)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
        <td align="center">{{$pp->perawat}}</td>
        <td align="center">{{$pp->jumlah}}</td>
        <td align="center">{{$pp->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $a = DB::table("rsud_perawat_jenis_perawat")->where('status', '=', 'Accepted')->get()
        ?>
     
		</tbody>
	</table>
</body>
</html>