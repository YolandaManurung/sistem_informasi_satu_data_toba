<!DOCTYPE html>
<html>
<head>
	<title>Potensi dan Objek Pariwisata Kabupaten Toba</title>
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
		<h5>Potensi dan Objek Pariwisata Kabupaten Toba</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
        <td align="center"><b>No</td>
                                    <td align="center"><b>Jenis Objek Wisata</td>
                                    <td align="center"><b>Lokasi</td>
                                    <td align="center"><b>Daerah</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($parwisobjek as $pariwisatao) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$pariwisatao->jenis_objek_wisata}}</td>
        <td align="center">{{$pariwisatao->lokasi}}</td>
        <td align="center">{{$pariwisatao->daerah}}</td>
        <td align="center">{{$pariwisatao->tahun}}</td>
			</tr>
			@endforeach
            <?php
            $parwisobjek = DB::table("pariwisata_objek_wisata")->get()
        ?>
		</tbody>
	</table>
</body>
</html>