<!DOCTYPE html>
<html>
<head>
	<title>Izin Lingkungan Berdasarkan Jenis Perusahaan</title>
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
		<h5>Izin Lingkungan Berdasarkan Jenis Perusahaan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center"><b><b>No</b></td>
        <td align="center"><b>Nama Perusahaan</b></td>
        <td align="center"><b>Amdal</b></td>
        <td align="center"><b>UKL/UPL</b></td>
        <td align="center"><b>SPPL </b></td> 
        <td align="center"><b>Jumlah </b></td> 
        <td align="center"><b>Tahun </b></td> 
           
            </tr>
		</thead>
		<tbody>
        @foreach($tbl58 as $tabel58)
        <tr>
        <td align="center" >{{$loop->iteration}}</td>
        <td align="center">{{$tabel58->nama_perusahaan}}</td>
        <td align="center">{{$tabel58->amdal}}</td>
        <td align="center">{{$tabel58->ukl_upl}}</td>
        <td align="center">{{$tabel58->sppl}}</td>
        <td align="center">{{$tabel58->jumlah}}</td>
        <td align="center">{{$tabel58->tahun}}</td>
            </tr>
            @endforeach
                                        
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>