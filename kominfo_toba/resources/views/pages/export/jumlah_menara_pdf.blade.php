<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Menara Menurut Kecamatan</title>
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
		<h5>Jumlah Menara Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td align="center"><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Menara</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($tbl15 as $tbl15) 

			<tr>

            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tbl15->kecamatan}}</td>
        <td align="center">{{$tbl15->jumlah_menara}}</td>
        <td align="center">{{$tbl15->tahun}}</td>

			</tr>

			@endforeach

            <?php
            $tbl15 = DB::table("teknologi_jumlah_menara")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{$tbl15->sum("jumlah_menara")}}</td>  
                                     
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>