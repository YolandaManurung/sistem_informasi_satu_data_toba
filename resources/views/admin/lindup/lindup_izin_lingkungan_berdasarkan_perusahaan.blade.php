@extends('layouts.app', ['activePage' => 'pemerintahan_jlh_desa_kel', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


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
                        
 
                        <h4 class="card-title" align="center">Izin Lingkungan Berdasarkan Jenis Perusahaan</h4>
                    
                    <a href="/lindup_izin_lingkungan_berdasarkan_perusahaan/exportpdf58" class="btn btn-sm btn-warning">CETAK PDF</a>          
                   
                    
                        <div class="card-body table-full-width table-responsive" >
                            <table class="table table-hover table-striped" id="datatables">
                                <thead>
                                    <tr>
                                    <td align="center" ><b><b>No</b></td>
                                    <td align="center" ><b>Nama Perusahaan</b></td>
                                    <td align="center" ><b>Amdal</b></td>
                                    <td align="center" ><b>UKL/UPL</b></td>
                                    <td align="center"  ><b>SPPL </b></td> 
                                    <td align="center"  ><b>Jumlah </b></td> 
                                    <td align="center"  ><b>Tahun </b></td>
                                    <td align="center"  ><b>Status </b></td> 
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl58 as $tabel58)
                              
                                    <tr>
                                    <td align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel58->nama_perusahaan}}</td>
                                    <td align="center">{{$tabel58->amdal}}</td>
                                    <td align="center">{{$tabel58->ukl_upl}}</td>
                                    <td align="center">{{$tabel58->sppl}}</td>
                                    <td align="center">{{$tabel58->jumlah}}</td>
                                    <td align="center">{{$tabel58->tahun}}</td>
                                    <td align="center">{{$tabel58->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status58/'.$tabel58->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                            {{ $tbl58->links() }}
                        </div>
                        
                        
                    </div>
                </div>
              
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/admin/lindup_izin_lingkungan_berdasarkan_perusahaan')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/lindup_jumlah_produksi_sampah')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/lindup_jenis_daur_ulang_sampah')}}">3</a></li>
    
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/lindup_jumlah_produksi_sampah')}}">Next</a>
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
        text: 'Izin Lingkungan Berdasarkan Jenis Perusahaan (Amdal)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories58)!!},
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
        name: 'Amdal',
        data: {!!json_encode($data58a)!!}

    }]
});
   
    // });
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
        text: 'Izin Lingkungan Berdasarkan Jenis Perusahaan (UKL/UPL)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories58)!!},
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
        name: 'UKL/UPL',
        data: {!!json_encode($data58b)!!}

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
        text: 'Izin Lingkungan Berdasarkan Jenis Perusahaan (SPPL)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories58)!!},
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
        name: 'SPPL',
        data: {!!json_encode($data58c)!!}

    }]
});
   
    // });
    </script>
@stop