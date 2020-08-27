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
                                    <td align="center"><b>Jenis Bantuan</td> 
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Desa</td>
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Keterangan</td>
			</tr>
		</thead>
		<tbody>
		@foreach($ketapang as $ktp)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
        <td align="center">{{$ktp->jenis_bantuan}}</td>
        <td align="center">{{$ktp->kecamatan}}</td>
        <td align="center">{{$ktp->desa}}</td>
        <td align="center">{{$ktp->jumlah}}</td>
        <td align="center">{{$ktp->tahun}}</td>
        <td align="center">{{$ktp->keterangan}}</td>
			</tr>
			@endforeach
            <?php
            $a = DB::table("ketapang")->where('status', '=', 'Accepted')->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
									<td></td>
									<td></td>
                                    <td align="center">{{$ketapang->sum("jumlah")}}</td>    
                                    <td></td>
									<td></td>
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>