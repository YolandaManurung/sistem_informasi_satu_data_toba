@extends('layouts.app', ['activePage' => 'pegawai_menurut_pendidikan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <div class="carousel-item">
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
                            <div class="carousel-item">
                            <div id="chart6"></div>   
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
                        <h4 class="card-title" align="center">Jumlah Pegawai Negeri Sipil Menurut Pendidikan</h4>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pegawai_menurut_pendidikan/exportpdf55" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <thead>
                                <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="6"><b>Pendidikan</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                
                                </tr>
                                <tr>
                                <td align="center"><b>SD</td>                                  
                                <td align="center"><b>SMP</td> 
                                <td align="center"><b>SMA</td> 
                                <td align="center"><b>S1</td>  
                                <td align="center"><b>S2</td>
                                <td align="center"><b>S3</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl55 as $tabel55)
                                <?php $i++; ?>
                                <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel55->tahun}}</td>
                                    <td align="center">{{number_format($tabel55->sd,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel55->smp,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel55->sma,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel55->s1,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel55->s2,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel55->s3,0,",",".")}}</td>
                                    <td align="center">{{$tabel55->tahun}}</td>
                                    
                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_sd, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_smp, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_sma, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_s1, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_s2, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_s3, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_total_pendidikan, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                   
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl55->links() }}
                        </div>
                    </div>
                </div>
                </div>
                </div>
               
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/pegawai_menurut_pendidikan1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_jenis_kelamin1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_golongan1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_pendidikan1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_yang_pindah_pensiun1')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pegawai_yang_pindah_pensiun1')}}">Next</a>
            </li>
        </ul>
        </nav>
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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'SD',
        data: {!!json_encode($data55)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'SMP',
        data: {!!json_encode($data55a)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'SMA',
        data: {!!json_encode($data55b)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'S1',
        data: {!!json_encode($data55c)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'S2',
        data: {!!json_encode($data55d)!!}

    }]
});
    </script>
@stop
@section('charts4')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Pegawai Negeri Sipil Menurut Pendidikan'
    },
    subtitle: {
        text: 'Pendidikan'
    },
    xAxis: {
        categories: {!!json_encode($categories55)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pegawai Negeri Sipil'
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
        name: 'S3',
        data: {!!json_encode($data55e)!!}

    }]
});
    </script>
@stop