<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Fasilitas Kesehatan Menurut Kecamatan</title>
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
		<h5>Jumlah Fasilitas Kesehatan Menurut Kecamatan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>
            <th align="center"><b>Rumah Sakit</th>
            <th align="center"><b>Rumah Bersalin</th>
            <th align="center"><b>Puskesmas</th>
            <th align="center"><b>Puskesmas Pembantu</th>
            <th align="center"><b>Poskesdes</th>
            <th align="center"><b>Klinik/Balai Kesehatan</th>
            <th align="center"><b>Polindes</th>
            <th align="center"><b>Apotek</th>
            <th align="center"><b>Toko Obat</th>
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($fasilitas_kesehatan as $fasilitas_kesehatan)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$fasilitas_kesehatan->kecamatan}}</td>
      
       <td align="center">{{number_format($fasilitas_kesehatan->rumah_sakit, 0, ".", ".")}}</td>
       <td align="center">{{number_format($fasilitas_kesehatan->rumah_bersalin, 0, ".", ".")}}</td>
       <td align="center">{{number_format($fasilitas_kesehatan->puskesmas, 0, ".", ".")}}</td>
       <td align="center">{{number_format($fasilitas_kesehatan->puskesmas_pembantu, 0, ".", ".")}}</td>
       <td align="center">{{number_format($fasilitas_kesehatan->poskesdes, 0, ".", ".")}}</td>  
       <td align="center">{{number_format($fasilitas_kesehatan->balai_kesehatan, 0, ".", ".")}}</td>  
       <td align="center">{{number_format($fasilitas_kesehatan->polindes, 0, ".", ".")}}</td>  
       <td align="center">{{number_format($fasilitas_kesehatan->apotek, 0, ".", ".")}}</td>  
       <td align="center">{{number_format($fasilitas_kesehatan->toko_obat, 0, ".", ".")}}</td>  
       <td align="center">{{$fasilitas_kesehatan->tahun}}</td>
       
			</tr>
			@endforeach
            <?php
        $fasilitas_kesehatan = DB::table("kesehatan_jumlah_fasilitas_kesehatan")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("rumah_sakit"), 0, ".", ".")}}</td>    
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("rumah_bersalin"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("puskesmas"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("puskesmas_pembantu"), 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("poskesdes"), 0, ".", ".")}}</td> 
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("balai_kesehatan"), 0, ".", ".")}}</td> 
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("polindes"), 0, ".", ".")}}</td>  
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("apotek"), 0, ".", ".")}}</td> 
                                    <td align="center">{{number_format($fasilitas_kesehatan->sum("toko_obat"), 0, ".", ".")}}</td> 


                                    <td></td>                   
        </tr>
		</tbody>
	</table>
 
</body>
</html>