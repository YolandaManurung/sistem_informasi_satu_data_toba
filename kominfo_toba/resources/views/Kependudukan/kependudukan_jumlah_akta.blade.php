@extends('layouts.app', ['activePage' => 'table', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                             
                            </div>
  
                        <h4 class="card-title" align="center">Jumlah Akta Kelahiran, Perkawinan, Perceraian, dan Yang Memiliki E-KTP Menurut Kecamatan</h4>


                            
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kependudukan_jumlah_akta/exportpdf22" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Akta Kelahiran</td>
                                    <td align="center"><b>Akta Perkawinan</td>
                                    <td align="center"><b>Akta Perceraian</td>
                                    <td align="center"><b>Yang Memiliki E-KTP</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl22 as $tabel22)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel22->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel22->akta_kelahiran, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->akta_perkawinan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->akta_perceraian, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel22->yang_memiliki_ektp, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel22->tahun}}</td>
                                    <td align="center">{{$tabel22->status}}</td>
                                    
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_kelahiran, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_perkawinan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_perceraian, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_yang_memiliki_ektp, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl22->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/kependudukan_jumlah_penduduk')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/kependudukan_jumlah_penduduk')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kependudukan_jumlah_akta')}}">2</a></li>
            
            <li class="page-item disabled">
            <a class="page-link" href="">Next</a>
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
        text: 'Jumlah Akta Kelahiran Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories22)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Akta'
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
        name: 'Akta Kelahiran',
        data: {!!json_encode($data22)!!}

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
        text: 'Jumlah Akta Perkawinan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories22)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Akta'
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
        name: 'Akta Perkawinan',
        data: {!!json_encode($data22a)!!}

    }]
});
   
    // });
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
        text: 'Jumlah Akta Perceraian Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories22)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Akta'
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
        name: 'Akta Perceraian',
        data: {!!json_encode($data22b)!!}

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
        text: 'Jumlah Yang Memiliki E-KTP Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories22)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Akta'
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
        name: 'Yang Memiliki E-KTP',
        data: {!!json_encode($data22c)!!}

    }]
});
   
    // });
    </script>
@stop