<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Wisata yang Berkunjung per Bulan</title>
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
		<h5>Jumlah Wisata yang Berkunjung per Bulan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td> 
            <td align="center"><b>Bulan</td> 
            <td align="center"><b>Wisata Asing</td>
            <td align="center"><b>Wisata Nusantara</td>
            <td ><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwis as $pariwisata)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
        <td align="center">{{$pariwisata->bulan}}</td>
        <td align="center">{{$pariwisata->wisata_asing}}</td>
        <td align="center">{{$pariwisata->wisata_nusantara}}</td>
        <td align="center">{{$pariwisata->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $a = DB::table("pariwisata_jumlah_wisata")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{$parwis->sum("wisata_asing")}}</td>    
                                    <td align="center">{{$parwis->sum("wisata_nusantara")}}</td>
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>