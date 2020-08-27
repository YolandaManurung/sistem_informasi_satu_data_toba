<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Pegawai Negeri Sipil Menurut Jenis Kelamin</title>
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
		<h5>Jumlah Pegawai Negeri Sipil Menurut Jenis Kelamin</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="2"><b>Jenis Kelamin</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                </tr>
                                <tr>
                                <td align="center"><b>Laki-laki</td>                                  
                                <td align="center"><b>Perempuan</td>  
                                </tr>
		</thead>
		<tbody>
			   @foreach($pegawai_menurut_jenis_kelamin as $pegawai_menurut_jenis_kelamin)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td align="center">{{$pegawai_menurut_jenis_kelamin->tahun}}</td>
       <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->laki_laki, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->perempuan, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->laki_laki+$pegawai_menurut_jenis_kelamin->perempuan, 0, ".", ".")}}</td>


			</tr>
			@endforeach
            <?php
        $pegawai_menurut_jenis_kelamin = DB::table("pegawai_menurut_jenis_kelamin")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->sum("laki_laki"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->sum("perempuan"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($pegawai_menurut_jenis_kelamin->sum("laki_laki")+$pegawai_menurut_jenis_kelamin->sum("perempuan"), 0, ".", ".")}}</td>
               
        </tr>
		</tbody>
	</table>
 
</body>
</html>