<!DOCTYPE html>
<html>
<head>
	<title>Pembagian dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa</title>
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
		<h5>Pembagian dan Penetapan Bagi Hasil Pajak Daerah Kepada Pemerintah Desa</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>
        <td align="center" rowspan="3"><b>No</b></td>
        <td align="center" rowspan="3"><b>Kecamatan</b></td>
        <td align="center" rowspan="3"><b>Nama Desa</b></td>
        <td align="center" rowspan="3"><b>Alokasi Dasar</b></td>
        <td align="center" colspan="3"><b>Alokasi Berdasarkan Formula</b></td>
        <td align="center" rowspan="3"><b>Pagu Bagi Hasil Pajak Per-Desa</b></td>
        <td align="center" rowspan="3"><b>Tahun</b></td>
           
        </tr>

        <tr>
                                    <td align="center" colspan ="2"><b>Jumlah PBB</b></td>
                                    <td align="center"><b>Alokasi Formula</b></td>
                                    </tr>

                                    <tr>
                                    <td align="center" ><b>Realisasi PBB</b></td>
                                    <td align="center"><b>Bobot</b></td>
                                    </tr>

                                    
                                    <tr>
                                    <td align="center"> <b> </b></td>
                                    <td colspan="3" align="center"> <b> Bagi Hasil Pajak Per-Desa </b></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    </tr>
		</thead>
		<tbody>
        @foreach($tbl50 as $tabel50)
                                   
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel50->kecamatan}}</td>
                                    <td align="center">{{$tabel50->desa}}</td>
                                    <td align="center">{{ number_format($tabel50->alokasi_dasar,1,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->realisasi_PBB,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->bobot,4,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel50->pagu_bagi,0,",",".")}}</td>
                                    <td align="center">{{$tabel50->tahun}}</td>
                                   
                                    </tr>
                                    @endforeach
            
            </tr>                               
            </tbody>		  
    </table>    
    </div>


   
 
</body>
</html>