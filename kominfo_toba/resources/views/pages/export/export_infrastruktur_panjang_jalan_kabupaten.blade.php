<!DOCTYPE html>
<html>
<head>
	<title>Panjang Jalan Kabupaten Menurut Kecamatan</title>
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
		<h5>Panjang Jalan Kabupaten Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center" ><b>No</b></td>
            <td align="center" ><b>Kecamatan</b></td>
            <td align="center" ><b>Panjang Jalan</b></td>
            <td align="center" ><b>%</b></td>
            <td align="center"><b>Tahun</b></td>
            </tr>
            
		</thead>
		<tbody>
                 @foreach($tbl47 as $tabel47)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel47->kecamatan}}</td>
            <td align="center">{{number_format($tabel47->panjang_jalan,2,",",".")}}</td>
            <td align="center">{{number_format($tabel47->panjang_jalan/$tabel47->sum("panjang_jalan")*100,2,",",".")}}</td>
            <td align="center">{{$tabel47->tahun}}</td>

            </tr>
            @endforeach
            <?php
            $a = DB::table("pemerintahan-jumlahdesakel")->get()
            ?>
			<tr>
                <td align="center" ><b></b></td>
                <td align="center" ><b>Jumlah</b></td>
                <td align="center" ><b>{{number_format($tabel47->sum("panjang_jalan"),2,",",".")}}</b></td>
                <td align="center" ><b>100</b></td>
                <td colspan="3" align="center" ><b></b></td>
                                    
            </tr>
		</tbody>
    </table>    
    </div>


   
 
</body>
</html>