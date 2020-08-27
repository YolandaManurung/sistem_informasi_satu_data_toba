<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2M, 0, ".", ".")w1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-si, 0, ".", ".")e: 9pt;
		}
	</style>
	<center>
		<h5>Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
                                    <td align="center" rowspan="2"><b>No</td>
                                    <td align="center" rowspan="2"><b>Kecamatan</td>
                                    <td align="center" rowspan="2"><b>Bayi Lahir</td>
                                    <td align="center" colspan="3"><b>BBLR/LBW</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    </tr>
                                    <tr>
                                    <td align="center"><b>Jumlah</td>                                  
                                    <td align="center"><b>Dirujuk</td>  
                                    <td align="center"><b>Giji Buruk</td>  
                                    </tr>
		</thead>
		<tbody>
			   @foreach($bayi as $bayi)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
            
       <td>{{$bayi->kecamatan}}</td>
       <td align="center">{{number_format($bayi->bayi_lahir, 0, ".", ".")}}</td>
       <td align="center">{{number_format($bayi->BBLR_jumlah, 0, ".", ".")}}</td>
       <td align="center">{{number_format($bayi->BBLR_dirujuk, 0, ".", ".")}}</td>
       <td align="center">{{number_format($bayi->BBLR_giji_buruk, 0, ".", ".")}}</td>  
       <td align="center">{{$bayi->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $bayi = DB::table("kesehatan_jumlah_bayi_bblr")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($bayi->sum("bayi_lahir"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($bayi->sum("BBLR_jumlah"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($bayi->sum("BBLR_dirujuk"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($bayi->sum("BBLR_giji_buruk"), 0, ".", ".")}}</td>
                                    <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>