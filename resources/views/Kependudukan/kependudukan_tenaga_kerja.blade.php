@extends('layouts.app', ['activePage' => 'kependudukan_tenaga_kerja', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                           
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div> 
                            </div>
                            <div class="carousel-item active">
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
                    
                      
                        <h4 class="card-title" align="center">Angka Partisipasi Angkatan Kerja (APAK)</h4>
                        <div class="col-12 text-right">
                             
                            </div> 
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kependudukan_tenaga_kerja/exportpdf23" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>  
                                
                                    <td align="center" rowspan="2"><b>No</td>
                                    <td align="center" rowspan="2"><b>Kelompok Umur</td>
                                    <td align="center" colspan="3"><b>Angkatan Kerja</td>
                                    <td align="center" rowspan="2"><b>Bukan Angkatan Kerja</td>
                                    <td align="center" rowspan="2"><b>Tenaga Kerja</td>
                                    <td align="center" rowspan="2"><b>APAK</td>
                                    <td align="center" rowspan="2"><b>Pengangguran Terbuka</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                   
                    
                                    </tr>
                                    <tr>
                                    <td><b>Bekerja</td>                                  
                                    <td><b>Pencari Kerja</td>  
                                    <td><b>Angkatan Kerja</td>  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl23 as $tabel23)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel23->kelompok_umur}}</td>
                                    <td align="center">{{number_format($tabel23->bekerja,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->pencari_kerja,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->angkatan_kerja,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->bukan_angkatan_kerja,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->tenaga_kerja,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->APAK,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel23->pengangguran_terbuka,0,",",".")}}</td>
                                    <td align="center">{{$tabel23->tahun}}</td>
                                   
                                    
                                    
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tbl23->links() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
@endsection
@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Angka Partisipasi Angkatan Kerja (APAK)'
    },
    subtitle: {
        text: 'Angkatan Kerja'
    },
    xAxis: {
        categories: {!!json_encode($categories23)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pekerja'
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
        name: 'Bekerja',
        data: {!!json_encode($data23)!!}
    }, {
        name: 'Pencari Kerja',
        data: {!!json_encode($data23a)!!}
    }, {
        name: 'Angkatan Kerja',
        data: {!!json_encode($data23b)!!}

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
        text: 'Angka Partisipasi Angkatan Kerja (APAK)'
    },
    subtitle: {
        text: 'APAK'
    },
    xAxis: {
        categories: {!!json_encode($categories23)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pekerja'
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
        name: 'Bukan Angkatan Kerja',
        data: {!!json_encode($data23c)!!}

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
        text: 'Angka Partisipasi Angkatan Kerja (APAK)'
    },
    subtitle: {
        text: 'APAK'
    },
    xAxis: {
        categories: {!!json_encode($categories23)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pekerja'
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
        name: 'Tenaga Kerja',
        data: {!!json_encode($data23d)!!}
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
        text: 'Angka Partisipasi Angkatan Kerja (APAK)'
    },
    subtitle: {
        text: 'APAK'
    },
    xAxis: {
        categories: {!!json_encode($categories23)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pekerja'
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
        name: 'APAK',
        data: {!!json_encode($data23e)!!}

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
        text: 'Angka Partisipasi Angkatan Kerja (APAK)'
    },
    subtitle: {
        text: 'APAK'
    },
    xAxis: {
        categories: {!!json_encode($categories23)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pekerja'
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
        name: 'Pengangguran Terbuka',
        data: {!!json_encode($data23f)!!}

    }]
});
    </script>
@stop




