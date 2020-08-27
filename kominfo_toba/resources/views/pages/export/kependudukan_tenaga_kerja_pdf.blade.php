<!DOCTYPE html>
<html>
<head>
	<title>Angka Partisipasi Angkatan Kerja (APAK)</title>
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
		<h5>Angka Partisipasi Angkatan Kerja (APAK)</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>                      
            <td align="center" rowspan="2"><b>No</td>
            <td align="center" rowspan="2"><b>Kelompok Umur</td>
            <td align="center" colspan="3"><b>Angkatan Kerja</td>
            <td align="center" rowspan="2"><b>Bukan Angkatan Kerja</td>
            <td align="center" rowspan="2"><b>Tenaga Kerja</td>
            <td align="center" rowspan="2"><b>APAK</td>
            <td align="center" rowspan="2"><b>Pengangguran Terbuka</td>
            <td align="center" rowspan="2"><b>Tahun</td>
            </tr>
            <tr>
            <td><b>Bekerja</td>                                  
            <td><b>Pencari Kerja</td>  
            <td><b>Angkatan Kerja</td>  
            </tr>
		</thead>
		<tbody>
			   @foreach($tenaga_kerja as $tenaga_kerja)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td align="center">{{$tenaga_kerja->kelompok_umur}}</td>
      
       <td align="center">{{number_format($tenaga_kerja->bekerja, 0, ".", ".")}}</td>
      
       <td align="center">{{number_format($tenaga_kerja->pencari_kerja, 0, ".", ".")}}</td>
      
       <td align="center">{{number_format($tenaga_kerja->angkatan_kerja, 0, ".", ".")}}</td>

       <td align="center">{{number_format($tenaga_kerja->bukan_angkatan_kerja, 0, ".", ".")}}</td>

       <td align="center">{{number_format($tenaga_kerja->tenaga_kerja, 0, ".", ".")}}</td>

       <td align="center">{{number_format($tenaga_kerja->APAK, 0, ".", ".")}}</td>

       <td align="center">{{number_format($tenaga_kerja->pengangguran_terbuka, 0, ".", ".")}}</td>
    
       <td align="center">{{$tenaga_kerja->tahun}}</td>

			</tr>
			@endforeach
   


            <?php
        $$tenaga_kerja = DB::table("kependudukan_tenaga_kerja")->where('status', '=', 'Accepted')->get()
    
      
        ?>
</tbody>
	</table>
 
</body>
</html>