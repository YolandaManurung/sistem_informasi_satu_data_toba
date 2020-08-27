<!DOCTYPE html>
<html>
<head>
	<title>Jenis Daur Ulang Sampah</title>
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
		<h5>Jenis Daur Ulang Sampah</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center"><b>No</b></td>
        <td align="center"><b>Kecamatan</b></td>
        <td align="center"><b>Daur Ulang</b></td>
        <td align="center"><b>Ton</b></td>
        <td align="center"><b>Produksi</b></td>
        <td align="center"><b>Tahun </b></td>     
           
            </tr>
		</thead>
		<tbody>
        @foreach($tbl60 as $tabel60)
        <tr>
        <td align="center">{{$loop->iteration}}</td>
        <td align="center">{{$tabel60->kecamatan}}</td>
        <td align="center">{{$tabel60->daur_ulang}}</td>
        <td align="center">{{$tabel60->ton}}</td>
        <td align="center">{{$tabel60->produksi}}</td>
        <td align="center">{{$tabel60->tahun}}</td>
            </tr>
            @endforeach
                                        
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>