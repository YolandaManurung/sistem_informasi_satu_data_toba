@extends('layouts.app', ['activePage' => 'infrastruktur_perhitungan_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
                
                   
                                    
                        <h4 class="card-title" align="center">Perhitungan Dana Desa Setiap Desa Kabupaten Toba</h4>

                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_perhitungan_dana_desa/exportpdf8" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" ><b>No</b></td>
                                    <td align="center" ><b>Kecamatan</b></td>
                                    <td align="center" ><b>Nama Desa</b></td>
                                    <td align="center" ><b>Alokasi Dasar</b></td>
                                    <td align="center" ><b>Alokasi Formula</b></td>
                                    <td align="center" ><b>Pengguna Dana Desa Per-Desa</b></td>
                                    <td align="center" ><b>Tahun </b></td>
                                   
                                    </tr>                              
 
                                </thead>
                                <tbody>
                                
                                <?php $i++; 
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
                                   
                                    <?php $i++; 
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

                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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

                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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

                                    @foreach($i as $tabel52)
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                    <?php $i++; 
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
                                   <?php $i++; 
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
                            {{ $tbl52->links() }}
                        </div>
                    </div>
                </div>
               
            </div>
        
        
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_perhitungan_dana_desa1')}}">2</a></li>
           
            
            <li class="page-item disabled">
            <a class="page-link" href="{{url('/infrastruktur_perhitungan_dana_desa1')}}">Next</a>
            </li>
        </ul>
        </nav>
        
    
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perhitungan Dana Desa Setiap Desa'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories52)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Alokasi Dasar',
        data: {!!json_encode($data52a)!!}

    }, {
        name: 'Alokasi Formula',
        data: {!!json_encode($data52b)!!}

    }]
});
   
    // });
    </script>
@stop