@extends('layouts.app', ['activePage' => 'kesehatan_jumlah_tenaga_kesehatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
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
                            <div class="carousel-item">
                            <div id="chart5"></div>   
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
     
                  
                   
                            
                        <h4 class="card-title" align="center">Jumlah Tenaga Kesehatan Menurut Kecamatan</h4>

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_tenaga_kesehatan/exportpdf26" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Tenaga Medis</td>
                                    <td><b>Tenaga Keperawatan</td>
                                    <td><b>Tenaga Kebidanan</td>
                                    <td><b>Tenaga Kefarmasian</td>
                                    <td><b>Tenaga Kesehatan Lainnya</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td></td>
                                </thead>
                                <tbody>
                                @foreach($tbl26 as $tabel26)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel26->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_medis, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_keperawatan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kebidanan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kefarmasian, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel26->tenaga_kesehatan_lainnya, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel26->tahun}}</td>
                                    <td align="center">{{$tabel26->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status26/'.$tabel26->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_tenaga_medis, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_tenaga_keperawatan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_tenaga_kebidanan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_tenaga_kefarmasian, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_tenaga_kesehatan_lainnya, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                  
                                </tbody>
                            </table>
                            {{ $tbl26->links() }} 
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/kesehatan_jumlah_dokter')}}"tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_rekapitulasi_penyandang_masalah')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_dokter')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_tenaga_kesehatan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_fasilitas_kesehatan')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_kasus_penyakit')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_akseptor_aktif')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_bayi_lahir')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_daftar_lokasi_panti')}}">8</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/kesehatan_jumlah_fasilitas_kesehatan')}}">Next</a>
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
        text: 'Jumlah Tenaga Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories26)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tenaga'
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
        name: 'Tenaga Medis',
        data: {!!json_encode($data26)!!}

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
        text: 'Jumlah Tenaga Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories26)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tenaga'
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
        name: 'Tenaga Keperawatan',
        data: {!!json_encode($data26a)!!}

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
        text: 'Jumlah Tenaga Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories26)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tenaga'
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
        name: 'Tenaga Kebidanan',
        data: {!!json_encode($data26b)!!}

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
        text: 'Jumlah Tenaga Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories26)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tenaga'
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
        name: 'Tenaga Kefarmasian',
        data: {!!json_encode($data26c)!!}

    }]
});
    </script>
@stop
@section('charts3')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Tenaga Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories26)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tenaga'
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
        name: 'Tenaga Kesehatan Lainnya',
        data: {!!json_encode($data26d)!!}

    }]
});
    </script>
@stop