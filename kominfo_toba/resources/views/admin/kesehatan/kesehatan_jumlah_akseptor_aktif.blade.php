@extends('layouts.app', ['activePage' => 'kesehatan_jumlah_akseptor_aktif', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
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
                            <div class="carousel-item">
                            <div id="chart6"></div>   
                            </div> 
                            <div class="carousel-item">
                            <div id="chart7"></div>   
                            </div> 
                            <div class="carousel-item">
                            <div id="chart8"></div>   
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
                  
                    
            
                      
                        <h4 class="card-title" align="center">Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai</h4>


                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_akseptor_aktif/exportpdf29" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>IUD</td>
                                    <td align="center"><b>MOW</td>
                                    <td align="center"><b>MOP</td>
                                    <td align="center"><b>Implant</td>
                                    <td align="center"><b>Suntik</td>
                                    <td align="center"><b>Pil</td>
                                    <td align="center"><b>Kondom</td>
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td></td>
                            </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl29 as $tabel29)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel29->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel29->iud, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->mow, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->mop, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->implant, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->suntik, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->pil, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->kondom, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel29->jumlah, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel29->tahun}}</td>
                                    <td align="center">{{$tabel29->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status29/'.$tabel29->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                  
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_iud, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_mow, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_mop, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_implant, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_suntik, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pil, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_kondom, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_jumlah_akseptor, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                 
                                </tbody>
                            </table>
                            {{ $tbl29->links() }} 
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/kesehatan_jumlah_kasus_penyakit')}}" tabindex="-1" aria-disabled="true">Previous</a>
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
            <a class="page-link" href="{{url('/admin/kesehatan_jumlah_bayi_lahir')}}">Next</a>
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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'IUD',
        data: {!!json_encode($data29)!!}

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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'MOW',
        data: {!!json_encode($data29a)!!}

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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'MOP',
        data: {!!json_encode($data29b)!!}

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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'Implant',
        data: {!!json_encode($data29c)!!}

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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'Suntik',
        data: {!!json_encode($data29d)!!}

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
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'Pil',
        data: {!!json_encode($data29e)!!}

    }]
});
    </script>
@stop
@section('charts5')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart7', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'Kondom',
        data: {!!json_encode($data29f)!!}

    }]
});
    </script>
@stop
@section('charts6')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart8', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Akseptor Aktif Menurut Kecamatan dan Jenis Alat Kontrsepsi yang Dipakai'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories29)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Buah'
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
        name: 'Jumlah',
        data: {!!json_encode($data29g)!!}

    }]
});
    </script>
@stop
