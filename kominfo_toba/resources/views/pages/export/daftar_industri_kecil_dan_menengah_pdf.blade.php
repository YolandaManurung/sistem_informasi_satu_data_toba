<!DOCTYPE html>
<html>
<head>
	<title>Daftar Industri Kecil dan Menengah Kab. Toba Samosir</title>
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
		<h5>Daftar Industri Kecil dan Menengah Kab. Toba Samosir</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
        <tr>

                             <td rowspan="2"><b>No</td>
                            <td rowspan="2"><b>Kecamatan</td>
                            <td align="center" colspan="2"><b>Pangan</td>
                            <td align="center" colspan="2"><b>Sandang dan Kulit</td>
                            <td align="center" colspan="2"><b>Kimia dan Bahan Bangunan</td>
                            <td align="center" colspan="2"><b>Kerajinan Umum</td>
                            <td align="center" colspan="2"><b>Logam/Metal</td>
                            <td align="center" colspan="2"><b>Jumlah/Total</td>
                            <td align="center" rowspan="2"><b>Tahun</td>
                          
                          
        </tr>

                                <tr>
                                <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                           
                      
                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                                </tr>
                                </thead>
	
		<tbody>
		@foreach($tbl13 as $tbl13) 
			<tr>
           
            <td scope="row" align="center">{{$loop->iteration}}</td>                                    
            <td>{{$tbl13->kecamatan}}</td>
            <td align="center"> {{number_format($tbl13->pangan_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->pangan_tenaga_kerja,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->sandang_dan_kulit_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->sandang_dan_kulit_tenaga_kerja,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->kimia_dan_bahan_bangunan_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->kimia_dan_bahan_bangunan_tenaga_kerja,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->kerajinan_umum_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->kerajinan_umum_tenaga_kerja,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->logam_metal_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->logam_metal_tenaga_kerja,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->pangan_unit + $tbl13->sandang_dan_kulit_unit + $tbl13->kimia_dan_bahan_bangunan_unit + $tbl13->kerajinan_umum_unit + $tbl13->logam_metal_unit,0,",",".")}}</td>
            <td align="center"> {{number_format($tbl13->pangan_tenaga_kerja + $tbl13->sandang_dan_kulit_tenaga_kerja + $tbl13->kimia_dan_bahan_bangunan_tenaga_kerja + $tbl13->kerajinan_umum_tenaga_kerja + $tbl13->logam_metal_tenaga_kerja,0,",",".")}}</td>

            
            <td align="center">{{$tbl13->tahun}}</td>
           
         
          
			</tr>
			@endforeach
            <?php
            $tabel13 = DB::table("perindustrian_industri_kecil_dan_menengah")->get()
        ?>
        <tr>
        <td></td>
                <td scope="row"><b><b>TOTAL</td><b><b>
                <td align="center">  {{number_format($tabel13->sum("pangan_unit"),0,",",".")}}</td>
                <td align="center">  {{number_format($tabel13->sum("pangan_tenaga_kerja"),0,",",".")}}</td>
                <td align="center">  {{number_format($tabel13->sum("sandang_dan_kulit_unit"),0,",",".")}}</td>  
                <td align="center">  {{number_format($tabel13->sum("sandang_dan_kulit_tenaga_kerja"),0,",",".")}}</td> 
                <td align="center">  {{number_format($tabel13->sum("kimia_dan_bahan_bangunan_unit"),0,",",".")}}</td>  
                <td align="center">  {{number_format($tabel13->sum("kimia_dan_bahan_bangunan_tenaga_kerja"),0,",",".")}}</td>
                <td align="center">  {{number_format($tabel13->sum("kerajinan_umum_unit"),0,",",".")}}</td>  
                <td align="center">  {{number_format($tabel13->sum("kerajinan_umum_tenaga_kerja"),0,",",".")}}</td> 
                <td align="center">  {{number_format($tabel13->sum("logam_metal_unit"),0,",",".")}}</td>  
                <td align="center">  {{number_format($tabel13->sum("logam_metal_tenaga_kerja"),0,",",".")}}</td>
                <td align="center">  {{number_format($tabel13->sum("jumlah_unit"),0,",",".")}}</td>
            <td align="center">  {{number_format($tabel13->sum("jumlah_tenaga_kerja"),0,",",".")}}</td>
  
				<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>