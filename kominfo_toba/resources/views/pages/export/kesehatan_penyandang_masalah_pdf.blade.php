<!DOCTYPE html>
<html>
<head>
	<title>Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2Malign="center"w1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-sialign="center"e: 9pt;
		}
	</style>
	<center>
		<h5>Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th><b>Kecamatan</th>
            <th><b>Rastra Non PKH</th>    
            <th><b>RLTH</th>
            <th><b>KUBE</th>
            <th><b>Pendamping Anak Berhadapan Dengan Hukum</th>
            <th><b>KAT</th>
            <th><b>PKH</th>
            <th><b>ASLUT</th>
            <th><b>ASPD</th>
            <th><b>ODHA</th>
            <th><b>UEP Lansia</th>
            <th><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($penyandang_masalah as $penyandang_masalah)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$penyandang_masalah->kecamatan}}</td>
      
       <td>{{number_format($penyandang_masalah->rastra_non_PKH, 0, ".", ".")}}</td>     
       <td>{{number_format($penyandang_masalah->RLTH, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->KUBE, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->pendamping_anak_berhadapan_dengan_hukum, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->KAT, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->PKH, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->ASLUT, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->ASPD, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->ODHA, 0, ".", ".")}}</td>
       <td>{{number_format($penyandang_masalah->UEP_lansia, 0, ".", ".")}}</td>
    
       <td>{{$penyandang_masalah->tahun}}</td>

			</tr>
			@endforeach
            <?php
        $penyandang_masalah = DB::table("kesehatan_penyandang_masalah_kesejahteraan_sosial")->where('status', '=', 'Accepted')->get()

        ?>

            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                 
                                    <td>{{number_format($penyandang_masalah->sum("rastra_non_PKH"), 0, ".", ".")}}</td>    
                                    <td>{{number_format($penyandang_masalah->sum("RLTH"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("KUBE"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("pendamping_anak_berhadapan_dengan_hukum"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("KAT"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("PKH"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("ASLUT"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("ASPD"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("ODHA"), 0, ".", ".")}}</td>
                                    <td>{{number_format($penyandang_masalah->sum("UEP_lansia"), 0, ".", ".")}}</td>
                                    <td></td>

        </tr>

		</tbody>
	</table>
 
</body>
</html>