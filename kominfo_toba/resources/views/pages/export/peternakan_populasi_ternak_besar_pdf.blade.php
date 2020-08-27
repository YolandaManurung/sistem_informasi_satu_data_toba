<!DOCTYPE html>
<html>
<head>
	<title>Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</title>
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
		<h5>Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <th><b>No</th>
       
            <th align="center"><b>Kecamatan</th>

            <th align="center"><b>Sapi Perah</th>
            
            <th align="center"><b>Sapi Potong</th>
            
            <th align="center"><b>Kerbau</th>
            
            <th align="center"><b>Kuda</th>
            
            <th align="center"><b>Kambing</th>
            
            <th align="center"><b>Domba</th>
            
            <th align="center"><b>Babi</th>
            
            <th align="center"><b>Tahun</th>

			</tr>
		</thead>
		<tbody>
			   @foreach($a as $aa)
			<tr>
            <td scope="row">{{$loop->iteration}}</td>
       
       <td>{{$aa->kecamatan}}</td>
      
       <td align="center">{{number_format($aa->sapi_perah,0,",",".")}}</td>
      
       <td align="center">{{number_format($aa->sapi_potong,0,",",".")}}</td>
      
       <td align="center">{{number_format($aa->kerbau,0,",",".")}}</td>
      
       <td align="center">{{number_format($aa->kuda,0,",",".")}}</td>
 
       <td align="center">{{number_format($aa->kambing,0,",",".")}}</td>
    
       <td align="center">{{number_format($aa->domba,0,",",".")}}</td>
   
       <td align="center">{{number_format($aa->babi,0,",",".")}}</td>
    
       <td align="center">{{$aa->tahun}}</td>

			</tr>
			@endforeach
   
            <?php
        $a = DB::table("peternakan_populasi_ternak_besar")->get()
    
      
        ?>
       
            <tr>
        <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                  
                                    <td align="center">{{number_format($a->sum("sapi_perah"),0,",",".")}}</td>    
                                    <td align="center">{{number_format($a->sum("sapi_potong"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("kerbau"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("kuda"),0,",",".")}}</td>    
                                    <td align="center">{{number_format($a->sum("kambing"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("domba"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("babi"),0,",",".")}}</td>
                                    <td></td>

                                   
        </tr>


		</tbody>
	</table>
 
</body>
</html>