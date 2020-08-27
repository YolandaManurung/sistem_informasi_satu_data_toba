@extends('layouts.app', ['activePage' => 'pegawai_yang_pindah_pensiun', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                        <div class="carousel-item">
                            <div id="chart1"></div>   
                            </div> 
                            <div class="carousel-item active">
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
                        <h4 class="card-title" align="center">Jumlah Pegawai Negeri Sipil Yang Pindah, Pensiun</h4>
                            
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pegawai_yang_pindah_pensiun/exportpdf56" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="2"><b>Pindah</td>
                                <td align="center" rowspan="2"><b>Pensiun</td>
                                
                                </tr>
                                <tr>
                                <td align="center"><b>Keluar Tobasa (org)</td>                                  
                                <td align="center"><b>Masuk Tobasa (org)</td>  
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl56 as $tabel56)
                                <?php $i++; ?>
                                <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel56->tahun}}</td>
                                    <td align="center">{{number_format($tabel56->pindah_keluar_tobasa, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel56->pindah_masuk_tobasa, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel56->pensiun, 0, ".", ".")}}</td>
                                    
                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_keluar, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_masuk, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pensiun, 0, ".", ".")}}</td>
                                    <td></td>
                                    
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl56->links() }}
                        </div>
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
            
            <li class="page-item  disabled">
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
        text: 'Jumlah Pegawai Negeri Sipil Yang Pindah, Pensiun'
    },
    subtitle: {
        text: 'Pindah'
    },
    xAxis: {
        categories: {!!json_encode($categories56)!!},
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
        name: 'Keluar Tobasa',
        data: {!!json_encode($data56)!!}

    }, {
        name: 'Masuk Tobasa',
        data: {!!json_encode($data56a)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Yang Pindah, Pensiun'
    },
    subtitle: {
        text: 'Pensiun'
    },
    xAxis: {
        categories: {!!json_encode($categories56)!!},
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
        name: 'Pensiun',
        data: {!!json_encode($data56b)!!}

    }]
});
    </script>
@stop