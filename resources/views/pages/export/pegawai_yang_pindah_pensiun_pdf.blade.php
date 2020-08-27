<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Pegawai Negeri Sipil Yang Pindah, Pensiun</title>
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
		<h5>Jumlah Pegawai Negeri Sipil Yang Pindah, Pensiun</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="2"><b>Pindah</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                </tr>
                                <tr>
                                <td align="center"><b>Keluar Tobasa (org)</td>                                  
                                <td align="center"><b>Masuk Tobasa (org)</td>  
                                </tr>
		</thead>
		<tbody>
			   @foreach($pegawai_yang_pindah_pensiun as $pegawai_yang_pindah_pensiun)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td align="center">{{$pegawai_yang_pindah_pensiun->tahun}}</td>
       <td align="center">{{number_format($pegawai_yang_pindah_pensiun->pindah_keluar_tobasa, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_yang_pindah_pensiun->pindah_masuk_tobasa, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_yang_pindah_pensiun->jumlah_total, 0, ".", ".")}}</td>
			</tr>
			@endforeach
            <?php
        $pegawai_yang_pindah_pensiun = DB::table("pegawai_yang_pindah_pensiun")->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($pegawai_yang_pindah_pensiun->sum("pindah_keluar"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($pegawai_yang_pindah_pensiun->sum("pindah_masuk"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($pegawai_yang_pindah_pensiun->sum("jumlah_total"), 0, ".", ".")}}</td>
                                    <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>