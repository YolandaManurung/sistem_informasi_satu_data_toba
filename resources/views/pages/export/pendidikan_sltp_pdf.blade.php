<!DOCTYPE html>
<html>
<head>
	<title>Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</title>
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
		<h5>Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
        <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Jumlah SLTP</td>
                                    <td align="center"><b>Jumlah Guru</td>
                                    <td align="center"><b>Jumlah Murid</td>
                                    <td align="center"><b>Negeri</td>
                                    <td align="center"><b>Swasta</td>
                                    <td align="center"><b>MI/MTs</td>
			</tr>
		</thead>
		<tbody>
		@foreach($pendidikant as $pent) 
			<tr>
            <td scope="row" align="center">{{$loop->iteration}}</td>
        <td align="center">{{$pent->kecamatan}}</td>
        <td align="center">{{$pent->tahun}}</td>
        <td align="center">{{$pent->jumlah_sltp}}</td>
        <td align="center">{{$pent->jumlah_guru}}</td>
        <td align="center">{{$pent->jumlah_murid}}</td>
        <td align="center">{{$pent->negeri}}</td>
        <td align="center">{{$pent->swasta}}</td>
        <td align="center">{{$pent->Madrasah_Ibtidaiyah_Tsanawiyah}}</td>
			</tr>
			@endforeach
            <?php 
            $pendidikant = DB::table("pendidikan_sltp")->get()
        ?>
        <tr>
        <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td><b><b>   
									<td align="center"></td>      
                                    <td align="center"><b><b>{{$pent->sum("jumlah_sltp")}}</td>  
                                    <td align="center"><b><b>{{$pent->sum("jumlah_guru")}}</td>  
                                    <td align="center"><b><b>{{$pent->sum("jumlah_murid")}}</td>  
                                    <td align="center"><b><b>{{$pent->sum("negeri")}}</td>  
                                    <td align="center"><b><b>{{$pent->sum("swasta")}}</td>  
                                    <td align="center"><b><b>{{$pent->sum("Madrasah_Ibtidaiyah_Tsanawiyah")}}</td>   
									<td></td>
        </tr>
		</tbody>
	</table>
</body>
</html>