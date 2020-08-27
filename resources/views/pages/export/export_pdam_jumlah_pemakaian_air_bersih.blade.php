<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Pemakaian Air Bersih dalam Per Rumah Tangga</title>
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
		<h5>Jumlah Pemakaian Air Bersih dalam Per Rumah Tangga</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
            <td align="center"><b><b>No</b></td>
            <td align="center"><b>Pemakaian Air Bersih/Jamban</b></td>
            <td align="center"><b>Jumlah</b></td>
            <td align="center"><b>Tahun </b></td>   
           
            </tr>
		</thead>
		<tbody>
        @foreach($tbl57 as $tabel57)
        <tr>
        <td align="center" >{{$loop->iteration}}</td>
        <td align="center">{{$tabel57->pemakaian_air_bersih}}</td>
        <td align="center">{{$tabel57->jumlah}}</td>
        <td align="center">{{$tabel57->tahun}}</td>
                               
            </tr>
            @endforeach
                                        
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>