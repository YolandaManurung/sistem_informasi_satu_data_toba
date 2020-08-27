<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Akta Kelahiran, Perkawinan, Perceraian, dan E-KTP Menurut Kecamatan</title>
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
		<h5>Jumlah Akta Kelahiran, Perkawinan, Perceraian, dan E-KTP Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>
            <th align="center"><b>Akta Kelahiran</th>
            <th align="center"><b>Akta Perkawinan</th>
            <th align="center"><b>Akta Perceraian</th>
            <th align="center"><b>Yang Memiliki E-KTP</th>
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($akta as $akta)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>       
       <td>{{$akta->kecamatan}}</td>     
       <td align="center">{{number_format($akta->akta_kelahiran, 0, ".", ".")}}</td>     
       <td align="center">{{number_format($akta->akta_perkawinan, 0, ".", ".")}}</td>     
       <td align="center">{{number_format($akta->akta_perceraian, 0, ".", ".")}}</td>
       <td align="center">{{number_format($akta->yang_memiliki_ektp, 0, ".", ".")}}</td>    
       <td align="center">{{$akta->tahun}}</td>

			</tr>
			@endforeach
   


            <?php
        $$akta = DB::table("kependudukan_jumlah_akta")->where('status', '=', 'Accepted')->get()
        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($akta->sum("akta_kelahiran"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($akta->sum("akta_perkawinan"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($akta->sum("akta_perceraian"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($akta->sum("yang_memiliki_ektp"), 0, ".", ".")}}</td>    
                                    <td></td>                         
        </tr>
		</tbody>
	</table>
</body>
</html>