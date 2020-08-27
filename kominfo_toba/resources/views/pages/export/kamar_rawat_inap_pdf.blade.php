<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Kamar Rawat Inap Berdasarkan Kelas</title>
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
		<h5>Jumlah Kamar Rawat Inap Berdasarkan Kelas</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
			<td align="center"><b>No</td> 
                                    <td align="center"><b>VIP</td> 
                                    <td align="center"><b>Kelas 1</td>
                                    <td align="center"><b>Kelas II</td>
                                    <td align="center"><b>Kelas III</td>
                                    <td align="center"><b>Tahun</td>
                                   
			</tr>
		</thead>
		<tbody>
		@foreach($kamarinap as $ki)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
        <td align="center">{{$ki->VIP}}</td>
        <td align="center">{{$ki->kelas1}}</td>
        <td align="center">{{$ki->kelas2}}</td>
        <td align="center">{{$ki->kelas3}}</td>
        <td align="center">{{$ki->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $a = DB::table("rsud_jumlah_kamar_rawat_inap")->where('status', '=', 'Accepted')->get()
        ?>
     
		</tbody>
	</table>
</body>
</html>