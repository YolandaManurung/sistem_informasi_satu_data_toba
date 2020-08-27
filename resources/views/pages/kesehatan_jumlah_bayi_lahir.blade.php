@extends('layouts.app', ['activePage' => 'kesehatan_rekapitulasi_penyandang_masalah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div id="chart1"></div> 
                            </div>
                            <div class="carousel-item">
                            <div id="chart2"></div> 
                            </div>
                            <div class="carousel-item">
                            <div id="chart3"></div>   
                            </div> 
                            <div class="carousel-item">
                            <div id="chart4"></div>   
                            </div> 
                               
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_bayi_lahir')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                      
                        <h4 class="card-title" align="center">Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)</h4>


                            
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_bayi/exportpdf30" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <td align="center" rowspan="2"><b>No</td>
                                    <td align="center" rowspan="2"><b>Kecamatan</td>
                                    <td align="center" rowspan="2"><b>Bayi Lahir</td>
                                    <td align="center" colspan="3"><b>BBLR/LBW</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td  rowspan="2">Aksi</td>
                                    </tr>
                                    <tr>
                                    <td align="center"><b>Jumlah</td>                                  
                                    <td align="center"><b>Dirujuk</td>  
                                    <td align="center"><b>Giji Buruk</td>  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl30 as $tabel30)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel30->kecamatan}}</td>
                                    <td align="center">{{$tabel30->bayi_lahir}}</td>
                                    <td align="center">{{number_format($tabel30->BBLR_jumlah, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel30->BBLR_dirujuk, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel30->BBLR_giji_buruk, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel30->tahun}}</td>
                                    <td align="center">{{$tabel30->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit30/'.$tabel30->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp

                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/kesehatan_jumlah_bayi_lahir/hapus30/{{ $tabel30->id }}">Hapus</a>      
                            
                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah/Total</td>
                                    <td align="center"><b><b>{{number_format($jumlah_bayi_lahir, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_BBLR_jumlah, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_BBLR_dirujuk, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_BBLR_giji_buruk, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl30->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="/kesehatan_jumlah_akseptor_aktif" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_dokter')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_tenaga_kesehatan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_fasilitas_kesehatan')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_kasus_penyakit')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_akseptor_aktif')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_bayi_lahir')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_daftar_lokasi_panti')}}">8</a></li>
            
            
            <li class="page-item">
            <a class="page-link" href="{{url('/kesehatan_daftar_lokasi_panti')}}">Next</a>
            </li>
        </ul>
        </nav>
    
@endsection
@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories30)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Bayi'
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
        name: 'Bayi Lahir',
        data: {!!json_encode($data30)!!}

    }]
});
    </script>
@stop

@section('charts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)'
    },
    subtitle: {
        text: 'BBLR/LBW'
    },
    xAxis: {
        categories: {!!json_encode($categories30)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Bayi'
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
        name: 'BBLR/LBW Jumlah',
        data: {!!json_encode($data30a)!!}

    }]
});
    </script>
@stop

@section('charts1')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)'
    },
    subtitle: {
        text: 'BBLR/LBW'
    },
    xAxis: {
        categories: {!!json_encode($categories30)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Bayi'
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
        name: 'BBLR/LBW Dirujuk',
        data: {!!json_encode($data30b)!!}
    }]
});
    </script>
@stop

@section('charts2')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Bayi Lahir, Bayi Berat Badan Lahir Rendah (BBLR)'
    },
    subtitle: {
        text: 'BBLR/LBW'
    },
    xAxis: {
        categories: {!!json_encode($categories30)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Bayi'
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
        name: 'BBLR/LBW Giji Buruk',
        data: {!!json_encode($data30c)!!}

    }]
});
    </script>
@stop


