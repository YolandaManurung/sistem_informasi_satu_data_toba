<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Populasi Ternak Unggas</title>
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
		<h5>Jumlah Populasi Ternak Unggas</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td align="center"><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Ayam Buras</td>
                                    <td align="center"><b>Itik</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($ternak4 as $tern4) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tern4->kecamatan}}</td>
        <td align="center">{{number_format($tern4->ayam_buras,0,",",".")}}</td>
        <td align="center">{{number_format($tern4->itik,0,",",".")}}</td>
        <td align="center">{{$tern4->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $ternak4 = DB::table("peternakan_jumlah_populasi_ternak_unggas")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($ternak4->sum("ayam_buras"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak4->sum("itik"),0,",",".")}}</td>  
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>