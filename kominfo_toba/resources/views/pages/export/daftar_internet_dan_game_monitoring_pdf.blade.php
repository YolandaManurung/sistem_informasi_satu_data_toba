<!DOCTYPE html>
<html>
<head>
	<title>Daftar Internet/Game Net yang Dimonitoring</title>
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
		<h5>Daftar Internet/Game Net yang Dimonitoring</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>

	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center"><b>No</td>

            <td><b>Kecamatan</td>
            <td align="center"><b>Nama Internet</td>
            <td align="center"><b>Alamat</td>
            <td align="center"><b>Nama Pemilik</td>
            <td align="center"><b>Tahun</td>
			</tr>
		</thead>
		<tbody>
                                   
                                   @foreach($tbl17 as $tabel17)
                                    <tr>
                                    
                                        <td scope="row" align="center">{{$loop->iteration}}</td>
                                       
                                        <td>{{$tabel17->kecamatan}}</td>
                                        <td align="center">{{$tabel17->nama_internet}}</td>
                                        <td align="center">{{$tabel17->alamat}}</td>
                                        <td align="center">{{$tabel17->nama_pemilik}}</td>                                                                             
                                        <td align="center">{{$tabel17->tahun}}</td>
                                       
                                     
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
           
</body>
</html>