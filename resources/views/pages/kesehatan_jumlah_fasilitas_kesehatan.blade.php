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
                                <a href="{{url('/tambah_jumlah_fasilitas_kesehatan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                         </div>
                    
                        <h4 class="card-title" align="center">Jumlah Fasilitas Kesehatan Menurut Kecamatan</h4>
  
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/kesehatan_jumlah_fasilitas_kesehatan/exportpdf27" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <th scope="col">No</th>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Rumah Sakit</td>
                                    <td align="center"><b>Rumah Bersalin</td>
                                    <td align="center"><b>Puskesmas</td>
                                    <td align="center"><b>Puskesmas Pembantu</td>
                                    <td align="center"><b>Poskesdes</td>
                                    <td align="center"><b>Klinik/Balai Kesehatan</td>
                                    <td align="center"><b>Polindes</td>
                                    <td align="center"><b>Apotek</td>
                                    <td align="center"><b>Toko Obat</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl27 as $tabel27)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel27->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel27->rumah_sakit, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->rumah_bersalin, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->puskesmas, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->puskesmas_pembantu, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->poskesdes, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->balai_kesehatan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->polindes, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->apotek, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->toko_obat, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel27->tahun)}}</td>
                                    <td align="center">{{$tabel27->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit27/'.$tabel27->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp

                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/kesehatan_jumlah_fasilitas_kesehatan/hapus27/{{ $tabel27->id }}">Hapus</a>      
                                </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_rumah_sakit, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_rumah_bersalin, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_puskesmas, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_puskesmas_pembantu, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_poskesdes, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_balai_kesehatan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_polindes, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_apotek, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_toko_obat, 0, ".", ".")}}</td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl27->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="/kesehatan_jumlah_tenaga_kesehatan" tabindex="-1" aria-disabled="true">Previous</a>
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
            <a class="page-link" href="{{url('/kesehatan_jumlah_kasus_penyakit')}}">Next</a>
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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Rumah Sakit',
        data: {!!json_encode($data27)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Rumah Bersalin',
        data: {!!json_encode($data27a)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Puskesmas',
        data: {!!json_encode($data27b)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Puskesmas Pembantu',
        data: {!!json_encode($data27c)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Poskesdes',
        data: {!!json_encode($data27d)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Balai Kesehatan',
        data: {!!json_encode($data27e)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Polindes',
        data: {!!json_encode($data27f)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Apotek',
        data: {!!json_encode($data27g)!!}

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
        text: 'Jumlah Fasilitas Kesehatan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories27)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unit'
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
        name: 'Toko Obat',
        data: {!!json_encode($data27h)!!}

    }]
});
    </script>
@stop