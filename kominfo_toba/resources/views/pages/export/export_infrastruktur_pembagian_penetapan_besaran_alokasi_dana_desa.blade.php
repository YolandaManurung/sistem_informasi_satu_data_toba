<!DOCTYPE html>
<html>
<head>
	<title>Pembagian Dan Penetapan Besaran Alokasi Dana Desa</title>
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
		<h5>Pembagian Dan Penetapan Besaran Alokasi Dana Desa</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center" ><b>No</b></td>
        <td align="center" ><b>Kecamatan</b></td>
        <td align="center" ><b>Nama Desa</b></td>
        <td align="center" ><b>Alokasi Dasar</b></td>
        <td align="center" ><b>Alokasi Formula</b></td>
        <td align="center" ><b>Pagu Dana Per-Desa</b></td>
        <td align="center" ><b>Tahun</b></td>
            
        </tr>
		</thead>
		<tbody>
        @foreach($tbl51 as $tabel51)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel51->kecamatan}}</td>
            <td align="center">{{$tabel51->desa}}</td>
            <td align="center">{{number_format($tabel51->alokasi_dasar,0,",",".")}}</td>
            <td align="center">{{number_format($tabel51->alokasi_formula,0,",",".")}}</td>
            <td align="center">{{number_format($tabel51->alokasi_dasar+$tabel51->alokasi_formula,0,",",".")}}</td>
            <td align="center">{{$tabel51->tahun}}</td>
                                    
            </tr>
            @endforeach    
            
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>