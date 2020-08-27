<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir</title>
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
		<h5>Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>

            <th align="center"><b>Laki-laki</th>
            
            <th align="center"><b>Perempuan</th>
            
            <th align="center"><b>Total</th>

            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($penduduk as $penduduk)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$penduduk->kecamatan}}</td>
      
       <td align="center">{{number_format($penduduk->laki_laki, 0, ".", ".")}}</td>
      
       <td align="center">{{number_format($penduduk->perempuan, 0, ".", ".")}}</td>
      
       <td align="center">{{number_format($penduduk->laki_laki+$penduduk->perempuan, 0, ".", ".")}}</td>
    
       <td align="center">{{$penduduk->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $penduduk = DB::table("kependudukan_jumlah_penduduk")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($penduduk->sum("laki_laki"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($penduduk->sum("perempuan"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($penduduk->sum("laki_laki")+$penduduk->sum("perempuan"), 0, ".", ".")}}</td>
                                    <td></td>    
                                    <td></td>
        </tr>

        
    


		</tbody>
	</table>
 
</body>
</html>