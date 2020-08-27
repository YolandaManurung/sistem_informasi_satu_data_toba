<!DOCTYPE html>
<html>
<head>
	<title>Perhitungan Dana Desa Setiap Desa Kabupaten Toba</title>
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
		<h5>Perhitungan Dana Desa Setiap Desa Kabupaten Toba</h4>
		<!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5> -->
	</center>
 
  
	<!-- <table class='table table-bordered'> -->
    <table class="table table-hover table-striped">
		<thead>
			<tr>
            <td align="center" ><b>No</b></td>
            <td align="center" ><b>Kecamatan</b></td>
            <td align="center" ><b>Nama Desa</b></td>
            <td align="center" ><b>Alokasi Dasar</b></td>
            <td align="center" ><b>Alokasi Formula</b></td>
            <td align="center" ><b>Pengguna Dana Desa 
                <br>Per-Desa</b></td>
            <td align="center" ><b>Tahun </b></td>
            </tr>

           
		</thead>
		<tbody>
                                
                                <?php 
                                    $a=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Balige')->where('status', '=', 'Accepted')->get();
                                    // $total += $a['alokasi_dasar']+$a['alokasi_formula'];
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>I. Balige</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($a->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($a->sum("alokasi_formula")+$a->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($a as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                                   
                                    <?php 
                                    $b=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Laguboti')->where('status', '=', 'Accepted')->get();
                                    // $total += $b->alokasi_dasar+$b->alokasi_formula;
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>II. Laguboti</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($b->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($b->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($b->sum("alokasi_formula")+$b->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($b as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                   <!-- Habinsaran  -->

                                    <?php 
                                    $c=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Habinsaran')->where('status', '=', 'Accepted')->get();
                                    // $total += $c->alokasi_dasar+$c->alokasi_formula;
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>III. Habinsaran</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($c->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($c->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($c->sum("alokasi_formula")+$c->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($c as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Borbor -->
                                    <?php 
                                    $d=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Borbor')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>IV. Borbor</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($d->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($d->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($d->sum("alokasi_formula")+$d->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>
                                    @foreach($d as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Nassau -->
                                    <?php 
                                    $e=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Nassau')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>V. Nassau</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($e->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($e->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($e->sum("alokasi_formula")+$e->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($e as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- SIlaen -->
                                    <?php 
                                    $f=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Silaen')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>VI. Silaen</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($f->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($f->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($f->sum("alokasi_formula")+$f->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($f as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Sigumpar -->

                                    <?php 
                                    $g=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Sigumpar')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>VII. Sigumpar</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($g->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($g->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($g->sum("alokasi_formula")+$g->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($g as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Porsea -->
                                    <?php 
                                    $h=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Porsea')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>VIII. Porsea</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($h as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Pintu Pohan Meranti -->
                                    <?php 
                                    $i=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Pintu Pohan Meranti')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>IX. Pintu Pohan Meranti</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($i ?? '' as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- //Siantar Narumonda -->
                                    <?php 
                                    $j=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Siantar Narumonda')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>X. Siantar Narumonda</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($j as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Parmaksian -->
                                    <?php 
                                    $k=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Parmaksian')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XI. Parmaksian</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($k as $tabel52)
                                    <tr>
                                    <td align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Lumban Julu -->
                                    <?php 
                                    $l=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Lumban Julu')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XII. Lumban Julu</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($l as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Uluan -->
                                    <?php 
                                    $m=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Uluan')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XIII. Uluan</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($m as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Ajibata -->
                                    <?php 
                                    $n=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Ajibata')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XIV. Ajibata</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($n as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <!-- Bonatua Lunasi -->
                                    <?php 
                                    $o=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Bonatua Lunasi')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XV. Bonatua Lunasi</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($o as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                                   
                                   <!-- Tampahan -->
                                   <?php 
                                    $p=DB::table("infrastruktur-perhitungan_dana_desa")->where('kecamatan', 'Tampahan')->where('status', '=', 'Accepted')->get();
                                    ?>
                                   
                                    <tr>
                                    <td align="center"></td>
                                    <td align="center"><b>XVI. Tampahan</b></td>
                                    <td align=center><b></b></td>
                                    <td align="center">{{number_format($h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula"),0,",",".")}}</td>
                                    <td align="center">{{number_format($h->sum("alokasi_formula")+$h->sum("alokasi_dasar"),0,",",".")}}</td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    
                                    </tr>

                                    @foreach($p as $tabel52)
                                    <tr>
                                    <td  align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel52->kecamatan}}</td>
                                    <td align="center">{{$tabel52->desa}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel52->alokasi_dasar+$tabel52->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel52->tahun}}</td>
                                   
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
    </table>    
    </div>


   
 
</body>
</html>