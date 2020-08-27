<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2Mnumber_format(w1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-sinumber_format(e: 9pt;
		}
	</style>
	<center>
		<h5>Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>
            <th align="center"><b>IUD</th>
            <th align="center"><b>MOW</th>
            <th align="center"><b>MOP</th>
            <th align="center"><b>Implant</th>
            <th align="center"><b>Suntik</th>
            <th align="center"><b>Pil</th>
            <th align="center"><b>Kondom</th>
            <th align="center"><b>Jumlah</th>
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($akseptor_aktif as $akseptor_aktif)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$akseptor_aktif->kecamatan}}</td>
       <td align="center">{{number_format($akseptor_aktif->iud, 0, ".", ".")}}</td>
       <td align="center">{{number_format($akseptor_aktif->mow, 0, ".", ".")}}</td>
       <td align="center">{{number_format($akseptor_aktif->mop, 0, ".", ".")}}</td>
       <td align="center">{{number_format($akseptor_aktif->implant, 0, ".", ".")}}</td>
       <td align="center">{{number_format($akseptor_aktif->suntik, 0, ".", ".")}}</td> 
       <td align="center">{{number_format($akseptor_aktif->pil, 0, ".", ".")}}</td> 
       <td align="center">{{number_format($akseptor_aktif->kondom, 0, ".", ".")}}</td> 
       <td align="center">{{number_format($akseptor_aktif->jumlah, 0, ".", ".")}}</td> 
       <td align="center">{{$akseptor_aktif->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $akseptor_aktif = DB::table("kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($akseptor_aktif->sum("iud"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($akseptor_aktif->sum("mow"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($akseptor_aktif->sum("mop"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($akseptor_aktif->sum("implant"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($akseptor_aktif->sum("suntik"), 0, ".", ".")}}</td>  
                                    <td align="center">{{number_format($akseptor_aktif->sum("pil"), 0, ".", ".")}}</td>  
                                    <td align="center">{{number_format($akseptor_aktif->sum("kondom"), 0, ".", ".")}}</td>  
                                    <td align="center">{{number_format($akseptor_aktif->sum("jumlah"), 0, ".", ".")}}</td>  
                                    <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>