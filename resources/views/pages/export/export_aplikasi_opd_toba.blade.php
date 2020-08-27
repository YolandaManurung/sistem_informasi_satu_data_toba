<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi yang ada di OPD Kabupaten Toba</title>
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
		<h5>Aplikasi yang ada di OPD Kabupaten Toba</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center" >No</td>
        <td align="center" >Nama OPD</td>
        <td align="center" >Aplikasi</td>
        <td align="center" >Tahun </td>
            
        </tr>
		</thead>
		<tbody>
        @foreach($tbl45 as $tabel45)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel45->Nama_OPD}}</td>
            <td align="center">{{$tabel45->aplikasi}}</td>
            <td align="center">{{$tabel45->tahun}}</td>
            
                                    
            </tr>
            @endforeach                    
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>