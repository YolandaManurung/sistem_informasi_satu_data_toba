<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Desa Blank Spot</title>
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
		<h5>Jumlah Desa Blank Spot</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td align="center"><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Data Blank Spot</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($tbl18 as $tbl18) 

			<tr>

            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tbl18->kecamatan}}</td>
        <td align="center">{{$tbl18->data_blank_spot}}</td>
        <td align="center">{{$tbl18->tahun}}</td>

			</tr>

			@endforeach

            <?php
            $tbl18 = DB::table("teknologi_jumlah_desa_blank_spot")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{$tbl18->sum("data_blank_spot")}}</td>  
                                     
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>