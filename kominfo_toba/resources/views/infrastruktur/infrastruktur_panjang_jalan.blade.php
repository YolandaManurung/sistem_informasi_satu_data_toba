@extends('layouts.app', ['activePage' => 'infrastruktur_panjang_jalan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div> 
                            </div>
                            <div class="carousel-item">
                            <div id="chart2"></div>   
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


                        
                  
                   
                   
                   
                                    
                        <h4 class="card-title" align="center">Panjang Jalan Menurut Jenis Permukaan dan Kondisi</h4>

                        
                        <div class="col-12 text-left">
                
                <a href="/infrastruktur_panjang_jalan/exportpdf4" class="btn btn-sm btn-warning">CETAK PDF</a>          
                
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center"><b>No</b></td>
                                    <td align="center"><b>Keadaan</b></td>
                                    <td align="center"><b>Panjang Jalan</b></td>
                                
                                    <td align="center"><b>Tahun</b></td>
                                    

                                    </tr>

                                    <tr>
                                    <td align="center"></td>
                                    <td colspan="2"><b>Jenis Keadaan</b></td>
                                    </tr>

                                    @foreach($tbl46 as $tabel46)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel46->keadaan}}</td>
                                    <td align="center">{{$tabel46->panjang_jalan_keadaan}} km</td>
                                  
                                    <td align="center">{{$tabel46->tahun}}</td>
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td align="center"><b></b></td>
                                    <td colspan="2"><b>Kondisi Jalan</b></td>
                                    </tr>

                                    @foreach($tbl46 as $tabel46)
                                    <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel46->kondisi_jalan}}</td>
                                    <td align="center">{{$tabel46->panjang_jalan_kondisi_jalan}} km</td>
                                   
                                    <td align="center">{{$tabel46->tahun}}</td>
                                    <td align="center">
                                    
                                    </td>
                                    </tr>
                                    @endforeach
                          
                                </thead>
                               
                            </table>
                            {{ $tbl46->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
      </div>
        <nav aria-label="Page navigation example" align="center">
        <ul class="pagination justify-content-center" align="center">
            <li class="page-item" align="center">
            <a class="page-link" href="infrastruktur_aplikasi_opd_toba1" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_aplikasi_opd_toba1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_jembatan1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan_kabupaten1')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/infrastruktur_panjang_jalan_kabupaten1')}}">Next</a>
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
        text: 'Grafik Panjang Jalan Menurut Keadaan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories46)!!},
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
        name: 'Keadaan Jalan',
        data: {!!json_encode($data46a)!!}

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
        text: 'Panjang Jalan Menurut Kondisi Jalan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories46a)!!},
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
        name: 'Kondisi Jalan',
        data: {!!json_encode($data46b)!!}

    }]
});
   
    // });
    </script>
@stop