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
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
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
                            <div class="carousel-item">
                            <div id="chart9"></div>   
                            </div> 
                            <div class="carousel-item">
                            <div id="chart10"></div>   
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
                             
                           
                   
                        <h4 class="card-title" align="center">Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_penyandang_masalah/exportpdf24" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Rastra Non PKH</td>
                                    <td align="center"><b>RLTH</td>
                                    <td align="center"><b>KUBE</td>
                                    <td align="center"><b>Pendampingan Anak Berhadapan Dengan Hukum</td>
                                    <td align="center"><b>KAT</td>
                                    <td align="center"><b>PKH</td>
                                    <td align="center"><b>ASLUT</td>
                                    <td align="center"><b>ASPD</td>
                                    <td align="center"><b>ODHA</td>
                                    <td align="center"><b>UEP LANSIA</td>
                                    <td align="center"><b>Tahun</td>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl24 as $tabel24)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel24->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel24->rastra_non_PKH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->RLTH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->KUBE, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->pendamping_anak_berhadapan_dengan_hukum, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->KAT, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->PKH, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ASLUT, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ASPD, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->ODHA, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel24->UEP_lansia, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel24->tahun}}</td>
                                    
                                    
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_rastra, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_RLTH, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_KUBE, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pendamping_anak, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_KAT, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_PKH, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_ASLUT, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_ASPD, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_ODHA, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_UEP_lansia, 0, ".", ".")}}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
            
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_dokter1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_tenaga_kesehatan1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_fasilitas_kesehatan1')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_kasus_penyakit1')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_akseptor_aktif1')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_bayi_lahir1')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_daftar_lokasi_panti1')}}">8</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/kesehatan_jumlah_dokter1')}}">Next</a>
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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'Rastra Non PKH',
        data: {!!json_encode($data24)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'RLTH',
        data: {!!json_encode($data24a)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'KUBE',
        data: {!!json_encode($data24b)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'Pendamping Anak Berhadapan Dengan Hukum',
        data: {!!json_encode($data24c)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'KAT',
        data: {!!json_encode($data24d)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'PKH',
        data: {!!json_encode($data24e)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'ASLUT',
        data: {!!json_encode($data24f)!!}

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
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'ASPD',
        data: {!!json_encode($data24g)!!}

    }]
});
    </script>
@stop
@section('charts7')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart9', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'ODHA',
        data: {!!json_encode($data24h)!!}

    }]
});
    </script>
@stop
@section('charts8')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart10', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories24)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Keluarga'
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
        name: 'UEP_lansia',
        data: {!!json_encode($data24i)!!}

    }]
});
    </script>
@stop