<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Pegawai Negeri Sipil Menurut Golongan</title>
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
		<h5>Jumlah Pegawai Negeri Sipil Menurut Golongan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="4"><b>Golongan</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                </tr>
                                <tr>
                                <td align="center"><b>I</td>                                  
                                <td align="center"><b>II</td>  
                                <td align="center"><b>III</td>  
                                <td align="center"><b>IV</td>  
                                </tr>
		</thead>
		<tbody>
			   @foreach($pegawai_menurut_golongan as $pegawai_menurut_golongan)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td align="center">{{$pegawai_menurut_golongan->tahun}}</td>
       <td align="center">{{number_format($pegawai_menurut_golongan->pendidikan1, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_golongan->pendidikan2, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_golongan->pendidikan3, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_golongan->pendidikan4, 0, ".", ".")}}</td>
       <td align="center">{{number_format($pegawai_menurut_golongan->pendidikan1+$pegawai_menurut_golongan->pendidikan2+$pegawai_menurut_golongan->pendidikan3+$pegawai_menurut_golongan->pendidikan4, 0, ".", ".")}}</td>
 

			</tr>
			@endforeach
            <?php
        $pegawai_menurut_golongan = DB::table("pegawai_menurut_golongan")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                            <td scope="row"><b><b>Jumlah</td><b><b>                               
                            <td align="center">{{number_format($pegawai_menurut_golongan->sum("pendidikan1"), 0, ".", ".")}}</td>    
                            <td align="center">{{number_format($pegawai_menurut_golongan->sum("pendidikan2"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_golongan->sum("pendidikan3"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_golongan->sum("pendidikan4"), 0, ".", ".")}}</td>
                            <td align="center">{{number_format($pegawai_menurut_golongan->sum("pendidikan1")+$pegawai_menurut_golongan->sum("pendidikan2")+$pegawai_menurut_golongan->sum("pendidikan3")+$pegawai_menurut_golongan->sum("pendidikan4"), 0, ".", ".")}}</td>
                 
        </tr>
		</tbody>
	</table>
 
</body>
</html>