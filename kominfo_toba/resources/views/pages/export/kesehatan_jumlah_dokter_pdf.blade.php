<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Dokter Menurut Unit Kerja</title>
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
		<h5>Jumlah Dokter Menurut Unit Kerja</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
                                    <td align="center" rowspan="2"><b>ID</td>
                                    <td align="center" rowspan="2"><b>Unit Kerja</td>
                                    <td align="center" colspan="3"><b>Dokter</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    </tr>
                                    <tr>
                                    <td>Umum</td>                                  
                                    <td>Gigi</td>  
                                    <td>Spesialis</td>  
                                    </tr>
		</thead>
		<tbody>
			   @foreach($dokter as $dokter)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$dokter->unit_kerja}}</td>
      
       <td align="center">{{$dokter->dokter_umum}}</td>   

       <td align="center">{{$dokter->dokter_gigi}}</td>

       <td align="center">{{$dokter->dokter_spesialis}}</td>
       
       <td align="center">{{$dokter->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $dokter = DB::table("kesehatan_jumlah_dokter")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{$dokter->sum("dokter_umum")}}</td>    
                                    <td align="center">{{$dokter->sum("dokter_gigi")}}</td>
                                    <td align="center">{{$dokter->sum("dokter_spesialis")}}</td>
                                    <td></td>    

                                

                                   
        </tr>

        
    


		</tbody>
	</table>
 
</body>
</html>