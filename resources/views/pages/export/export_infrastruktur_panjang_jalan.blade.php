<!DOCTYPE html>
<html>
<head>
	<title>Panjang Jalan Menurut Jenis Permukaan dan Kondisi</title>
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
		<h5>Panjang Jalan Menurut Jenis Permukaan dan Kondisi</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center"><b>No</b></td>
        <td align="center"><b>Keadaan</b></td>
        <td align="center"><b>Panjang Jalan</b></td>
        <td align="center"><b>Tahun</b></td>
            
        </tr>
		</thead>
		<tbody>
        @foreach($tbl46 as $tabel46)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel46->keadaan}}</td>
            <td align="center">{{$tabel46->panjang_jalan_keadaan}} km</td>
            <td align="center">{{$tabel46->tahun}}</td>
            
                                    
            </tr>
            @endforeach    
            
            <tr>
            <td align="center"><b></b></td>
            <td colspan="2"><b>Kondisi Jalan</b></td>
            </tr>

            @foreach($tbl46 as $tabel46)
                <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td align="center">{{$tabel46->kondisi_jalan}}</td>
                <td align="center">{{$tabel46->panjang_jalan_kondisi_jalan}} km</td>
                <td align="center">{{$tabel46->tahun}}</td>
            @endforeach
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>