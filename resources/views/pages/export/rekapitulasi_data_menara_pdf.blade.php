<!DOCTYPE html>
<html>
<head>
	<title>Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</title>
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
		<h5>Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td>
            <td><b>Kecamatan</td>
            <td align="center"><b>Alamat Site</td>
            <td align="center"><b>IMB</td>
            <td align="center"><b>Tinggi Menara</td>
            <td align="center"><b>Pemilik</td>
            <td align="center"><b>Pengguna</td>
            <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
                                   
                                   @foreach($tbl16 as $tabel16)
                                    <tr>
                                    
                                        <td scope="row" align="center">{{$loop->iteration}}</td>
                                        <td>{{$tabel16->kategori_kecamatan}}</td>
                                        <td align="center">{{$tabel16->kecamatan}}</td>
                                        <td align="center">{{$tabel16->imb}}</td>
                                        <td align="center">{{$tabel16->tinggi_menara}}</td>
                                        <td align="center">{{$tabel16->pemilik}}</td>
                                        <td align="center">{{$tabel16->pengguna}}</td>
                                      
                                        <td align="center">{{$tabel16->tahun}}</td>
                                       
                                     
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
           
</body>
</html>