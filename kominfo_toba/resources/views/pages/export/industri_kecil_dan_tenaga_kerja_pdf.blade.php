<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah menurut Kecamatan</title>
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
		<h5>Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Industri Kecil dan Menengah</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		

		@foreach($industri1 as $ind1) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$ind1->kecamatan}}</td>
        <td align="center">{{number_format($ind1->industri_kecil_dan_menengah,0,",",".")}}</td>
        <td align="center">{{number_format($ind1->tenaga_kerja,0,",",".")}}</td>
        <td align="center">{{$ind1->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $industri1 = DB::table("perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($industri1->sum("industri_kecil_dan_menengah"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($industri1->sum("tenaga_kerja"),0,",",".")}}</td>    
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>