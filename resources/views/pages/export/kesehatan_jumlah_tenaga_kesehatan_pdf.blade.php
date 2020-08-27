<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Tenaga Kesehatan Menurut Kecamatan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2M number_format(w1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-si number_format(e: 9pt;
		}
	</style>
	<center>
		<h5>Jumlah Tenaga Kesehatan Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>

            <th align="center"><b>Tenaga Medis</th>
            <th align="center"><b>Tenaga Keperawatan</th>
            <th align="center"><b>Tenaga Kebidanan</th>
            <th align="center"><b>Tenaga Kefarmasian</th>
            <th align="center"><b>Tenaga Kesehatan Lainnya</th>
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($tenaga_kesehatan as $tenaga_kesehatan)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$tenaga_kesehatan->kecamatan}}</td>
      
       <td align="center">{{number_format($tenaga_kesehatan->tenaga_medis, 0, ".", ".")}}</td>
       <td align="center">{{number_format($tenaga_kesehatan->tenaga_keperawatan, 0, ".", ".")}}</td>
       <td align="center">{{number_format($tenaga_kesehatan->tenaga_kebidanan, 0, ".", ".")}}</td>
       <td align="center">{{number_format($tenaga_kesehatan->tenaga_kefarmasian, 0, ".", ".")}}</td>
       <td align="center">{{number_format($tenaga_kesehatan->tenaga_kesehatan_lainnya, 0, ".", ".")}}</td>  
       <td align="center">{{$tenaga_kesehatan->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $tenaga_kesehatan = DB::table("kesehatan_jumlah_tenaga_kesehatan")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($tenaga_kesehatan->sum("tenaga_medis"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($tenaga_kesehatan->sum("tenaga_keperawatan"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tenaga_kesehatan->sum("tenaga_kebidanan"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tenaga_kesehatan->sum("tenaga_kefarmasian"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tenaga_kesehatan->sum("tenaga_kesehatan_lainnya"), 0, ".", ".")}}</td>  
                                    <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>