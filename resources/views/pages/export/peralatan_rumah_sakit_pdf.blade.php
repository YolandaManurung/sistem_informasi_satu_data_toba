<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Peralatan Rumah Sakit</title>
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
		<h5>Jumlah Peralatan Rumah Sakit</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
			<td align="center"><b>No</td> 
                                    <td align="center"><b>Jenis Peralatan Rumah Sakit</td> 
                                    <td align="center"><b>Jumlah/Orang</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($peralatanrumahsakit as $prs)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
        <td align="center">{{$prs->jenis_peralatan_rumah_sakit}}</td>
        <td align="center">{{$prs->jumlah}}</td>
        <td align="center">{{$prs->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $a = DB::table("rsud_peralatan_rumah_sakit")->where('status', '=', 'Accepted')->get()
        ?>
     
		</tbody>
	</table>
</body>
</html>