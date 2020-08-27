<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Desa dan Kelurahan Menurut Kecamatan</title>
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
		<h5>Jumlah Desa dan Kelurahan Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center" rowspan="2"><b><b>No</b></td>
            <td align="center" rowspan="2"><b>Kecamatan</b></td>
            <td align="center" colspan="2"><b>Jumlah</b></td>
            <td align="center" rowspan="2"><b>Total</b></td>
            <td align="center" rowspan="2" ><b>Tahun </b></td> 
            </tr>
            <tr> 
            <td align="center"><b>Desa</b></td>
            <td align="center"><b>Kelurahan</b></td>
                                    
            </tr>
		</thead>
		<tbody>
			   @foreach($tbl43 as $tabel43)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel43->kecamatan}}</td>
            <td align="center">{{$tabel43->Jumlah_Desa}}</td>
            <td align="center">{{$tabel43->Jumlah_Kelurahan}}</td>
            <td align="center">{{$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan}}</td>
            <td align="center">{{$tabel43->tahun}}</td>
      
        
            </tr>
            @endforeach
            <?php
            $a = DB::table("pemerintahan-jumlahdesakel")->where('status', '=', 'Accepted')->get()
            ?>
			
            <tr>
                <td><b></b></td>
                <td align="center"><b>Jumlah</b></td>
                <td align="center"><b>{{ number_format($a->sum("Jumlah_Desa"))}}</b></td>
                <td align="center"><b>{{ number_format($a->sum("Jumlah_Kelurahan"))}}</b></td>
                <td align="center"><b>{{ number_format($a->sum("Jumlah_Desa")+$a->sum("Jumlah_Kelurahan"))}}</b></td>
                <td align="center"><b></b></td>     
                <td><b></b></td>
                <td><b></b></td>
                </tr>
		</tbody>
    </table>    
    </div>

</body>
</html>