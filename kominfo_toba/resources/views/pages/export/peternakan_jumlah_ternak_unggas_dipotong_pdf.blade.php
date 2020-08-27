<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</title>
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
		<h5>Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td align="center"><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Ayam Kampung</td>
                                    <td align="center"><b>Itik/Itik Manila</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($ternak3 as $tern3) 

			<tr>

            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tern3->kecamatan}}</td>
        <td align="center">{{number_format($tern3->ayam_kampung,0,",",".")}}</td>
        <td align="center">{{number_format($tern3->itik_itik_manila,0,",",".")}}</td>
        <td align="center">{{$tern3->tahun}}</td>

			</tr>

			@endforeach

            <?php
            $ternak3 = DB::table("peternakan_jumlah_ternak_unggas_dipotong")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($ternak3->sum("ayam_kampung"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak3->sum("itik_itik_manila"),0,",",".")}}</td>  
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>