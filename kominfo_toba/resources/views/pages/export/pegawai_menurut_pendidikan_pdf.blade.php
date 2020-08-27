<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Pegawai Negeri Sipil Menurut Pendidikan</title>
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
		<h5>Jumlah Pegawai Negeri Sipil Menurut Pendidikan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="6"><b>Pendidikan</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                </tr>
                                <tr>
                                <td align="center"><b>SD</td>                                  
                                <td align="center"><b>SMP</td>  
                                <td align="center"><b>SMA</td>  
                                <td align="center"><b>S1</td>
                                <td align="center"><b>S2</td>
                                <td align="center"><b>S3</td>  
                                </tr>
		</thead>
		<tbody>
			   @foreach($pegawai_menurut_pendidikan as $pegawai_menurut_pendidikan)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td align="center">{{$pegawai_menurut_pendidikan->tahun}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->sd, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->smp, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->sma, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->s1, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->s2, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->s3, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_pendidikan->jumlah_total, 0, ".", ".")}}</td>
 

			</tr>
			@endforeach
            <?php
        $pegawai_menurut_pendidikan = DB::table("pegawai_menurut_pendidikan")->get()

        ?>

            <tr>
        <td></td>
                            <td scope="row"><b><b>Jumlah</td><b><b>                               
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("sd"), 0, ".", ".")}}</td>    
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("smp"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("sma"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("s1"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("s2"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("s3"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_pendidikan->sum("jumlah_total"), 0, ".", ".")}}</td>
                            <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>