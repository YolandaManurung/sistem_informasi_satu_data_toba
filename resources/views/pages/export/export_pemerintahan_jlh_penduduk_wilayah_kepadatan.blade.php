<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</title>
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
		<h5>Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
            <td align="center"><b>No</b></td>
            <td align="center"><b>Kecamatan</b></td>
            <td align="center"><b>Jumlah Penduduk (Jiwa)</b></td>
            <td align="center"><b>Luas Wilayah (ha)</b></td>
            <td align="center"><b>Kepadatan 
                <br>Penduduk</b></td>
            <td align="center"><b>Tahun </b></td>     
           
            </tr>
		</thead>
		<tbody>
        @foreach($tbl44 as $tabel44)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td align="center">{{$tabel44->kecamatan}}</td>
            <td align="center">{{number_format($tabel44->Jlh_Penduduk,0,",",".")}}</td>
            <td align="center">{{number_format($tabel44->Luas_Wilayah,2,",",".")}}</td>
            <td align="center">{{number_format($tabel44->Jlh_Penduduk/$tabel44->Luas_Wilayah,2,",",".")}}</td>
            <td align="center">{{$tabel44->tahun}}</td>
            
                                    
            </tr>
            @endforeach
            <?php
            $a = DB::table("pemerintahan-jlhpendudukwilayahkepadatan")->where('status', '=', 'Accepted')->get();
            // $kepadatan_penduduk+= $a->Jlh_Penduduk/$a->Luas_Wilayah;
            ?>
            $kepadatan_penduduk+= $tabel44->Jlh_Penduduk/$tabel44->Luas_Wilayah;
            <tr>
            <td><b></b></td>
            <td align="center"><b>Jumlah</b></td>
            <td align="center"><b>{{ number_format($tabel44->sum("Jlh_Penduduk"),0,",",".")}}</b></td>
            <td align="center"><b>{{ number_format($tabel44->sum("Luas_Wilayah"),2,",",".")}}</b></td>
            <td align="center"><b></b></td>
            <td align="center"><b></b></td>
            <td align="center"><b></b></td>
           
                
                        
                                    
            </tr>                               
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>