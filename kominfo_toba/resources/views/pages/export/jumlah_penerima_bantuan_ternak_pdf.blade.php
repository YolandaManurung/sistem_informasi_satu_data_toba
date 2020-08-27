<!DOCTYPE html>
<html>
<head>
	<title>Jumlah Penerima Kelompok Bantuan Ternak</title>
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
		<h5>Jumlah Penerima Kelompok Bantuan Ternak</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td>
            <td align="center"><b>Kategori</td>
                                    <td align="center"><b>Lokasi Penerima Bantuan Kelompok/Kecamatan</td>
                                    <td align="center"><b>Desa/Kelurahan</td>
                                    <td align="center"><b>Jumlah Kelompok</td>
                                    <td align="center"><b>Jumlah Ternak</td>
                                    <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>

                                   
                                   @foreach($tbl7 as $tabel7)
                                    <tr>
                                   
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel7->kategori}}</td>
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td> {{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                       
                                     
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
           
</body>
</html>