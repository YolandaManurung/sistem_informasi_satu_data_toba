<!DOCTYPE html>
<html>
<head>
	<title>Pembangunan Yang Bersumber Dari Dana Desa</title>
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
		<h5>Pembangunan Yang Bersumber Dari Dana Desa</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center" >No</td>
            <td align="center" >Kecamatan</td>
            <td align="center" >Desa</td>
            <td align="center" >Irigasi</td>
            <td align="center" >Jalan Desa</td>
            <td align="center" >Jumlah (Km/m)</td>
            <td align="center" >Keterangan</td>
            <td align="center" >Tahun </td>
            </tr>
            
		</thead>
		<tbody>
                 @foreach($tbl49 as $tabel49)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel49->kecamatan}}</td>
            <td align="center">{{$tabel49->desa}}</td>
            <td align="center">{{$tabel49->irigasi}}</td>
            <td align="center">{{$tabel49->jalan_desa}}</td>
            <td align="center">{{$tabel49->jumlah}}</td>
            <td align="center">{{$tabel49->keterangan}}</td>
            <td align="center">{{$tabel49->tahun}}</td>

            </tr>
            @endforeach
		</tbody>
    </table>    
    </div>

</body>
</html>