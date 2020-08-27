<!DOCTYPE html>
<html>
<head>
	<title>Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir</title>
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
		<h5>Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th scope="col">No</th>
                                    <td align="center"><b>Nama Panti</td>
                                    <td align="center"><b>Alamat</td>
                                    <td align="center"><b>Pimpinan</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Jumlah Penghuni</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
			   @foreach($panti_asuhan as $panti_asuhan)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
             
       <td align="center">{{$panti_asuhan->nama_panti}}</td>
       <td align="center">{{$panti_asuhan->alamat}}</td>
       <td align="center">{{$panti_asuhan->pimpinan}}</td>
       <td align="center">{{$panti_asuhan->terdaftar}}</td>
       <td align="center">{{$panti_asuhan->jumlah_penghuni}}</td>  
       <td align="center">{{$panti_asuhan->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $panti_asuhan = DB::table("kesehatan_daftar_panti_asuhan")->where('status', '=', 'Accepted')->get()

        ?>
		</tbody>
	</table>
 
</body>
</html>