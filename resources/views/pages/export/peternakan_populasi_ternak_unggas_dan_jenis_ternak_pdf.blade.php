<!DOCTYPE html>
<html>
<head>
	<title>Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</title>
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
		<h5>Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Ayam Kampung</td>
                                    <td><b>Ayam Pedaging</td>
                                    <td><b>Ayam Petelor</td>
                                    <td><b>Itik / Itik Manila</td>
                                    <td><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($ternak1 as $tern1) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tern1->kecamatan}}</td>
        <td align="center">{{number_format($tern1->sapi_perah,0,",",".")}}</td>
        <td align="center">{{number_format($tern1->ayam_pedaging,0,",",".")}}</td>
        <td align="center">{{number_format($tern1->ayam_petelor,0,",",".")}}</td>
        <td align="center">{{number_format($tern1->itik_itik_manila,0,",",".")}}</td>
        <td align="center">{{$tern1->tahun}}</td> 
			</tr>
			@endforeach
            <?php
            $ternak1 = DB::table("peternakan_populasi_ternak_unggas")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($ternak1->sum("ayam_kampung"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak1->sum("ayam_pedaging"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak1->sum("ayam_petelor"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak1->sum("itik_itik_manila"),0,",",".")}}</td>    
									<td></td>
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>