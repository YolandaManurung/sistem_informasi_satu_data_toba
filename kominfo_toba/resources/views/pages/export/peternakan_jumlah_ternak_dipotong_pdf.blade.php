<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</title>
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
		<h5>Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Sapi Perah</td>
                                    <td><b>Sapi Potong</td>
                                    <td><b>Kerbau</td>
                                    <td><b>Kuda</td>
                                    <td><b>Kambing</td>
                                    <td><b>Domba</td>
                                    <td><b>Babi</td>
                                    <td><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
		@foreach($ternak2 as $tern2) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td>{{$tern2->kecamatan}}</td>
        <td align="center">{{number_format($tern2->sapi_perah,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->sapi_potong,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->kerbau,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->kuda,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->kambing,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->domba,0,",",".")}}</td>
        <td align="center">{{number_format($tern2->babi,0,",",".")}}</td>
        <td align="center">{{$tern2->tahun}}</td> 
			</tr>
			@endforeach
            <?php
            $ternak2 = DB::table("peternakan_jumlah_ternak_dipotong")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>
                                    <td align="center">{{number_format($ternak2->sum("sapi_perah"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak2->sum("sapi_potong"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak2->sum("kerbau"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak2->sum("kuda"),0,",",".")}}</td>    
                                    <td align="center">{{number_format($ternak2->sum("kambing"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak2->sum("domba"),0,",",".")}}</td>  
                                    <td align="center">{{number_format($ternak2->sum("babi"),0,",",".")}}</td>   
                                    <td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>