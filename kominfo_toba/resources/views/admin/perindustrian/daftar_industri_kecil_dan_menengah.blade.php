@extends('layouts.app', ['activePage' => 'daftar_industri_kecil_dan_menengah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-12"> 
                    <div class="card strpied-tabled-witd align="center"-hover">
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
                            <div id="charts"></div> 
                            </div>

                            <div class="carousel-item">
                            <div id="charts1"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts2"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts3"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts4"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts5"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts6"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts7"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts8"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts9"></div>   
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




                       
                        <h4 class="card-title" align="center">Daftar Industri Kecil dan Menengah Kab. Toba Samosir</h4>


                            
                        <div class="card-body table-full-widtd align="center" table-responsive" >
                            <table class="table table-hover table-striped">
                            <a href="/daftar_industri_kecil_dan_menengah/exportpdf13" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                <tr>
                                    <td rowspan="2"><b>No</td>
                                    <td rowspan="2"><b>Kecamatan</td>
                                    <td align="center" colspan="2"><b>Pangan</td>
                                    <td align="center" colspan="2"><b>Sandang dan Kulit</td>
                                    <td align="center" colspan="2"><b>Kimia dan Bahan Bangunan</td>
                                    <td align="center" colspan="2"><b>Kerajinan Umum</td>
                                    <td align="center" colspan="2"><b>Logam/Metal</td>
                                    <td align="center" colspan="2"><b>Jumlah/Total</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td></td>
                                    <td></td>
                                   
                                    </tr>

                                <tr>
                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                           
                      
                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                    <td align="center" ><b>Unit</td>
                                    <td align="center"><b>Tenaga Kerja</td>

                                </tr>
                                </thead>
                                   
                               
                                <tbody>
                                @foreach($tbl13 as $tabel13)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>                                    
                                        <td>{{$tabel13->kecamatan}}</td>
                                        <td align="center">{{number_format($tabel13->pangan_unit,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->pangan_tenaga_kerja,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->sandang_dan_kulit_unit,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->sandang_dan_kulit_tenaga_kerja,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->kimia_dan_bahan_bangunan_unit,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->kimia_dan_bahan_bangunan_tenaga_kerja,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->kerajinan_umum_unit,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->kerajinan_umum_tenaga_kerja,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->logam_metal_unit,0,",",".")}}</td>
                                        <td align="center">{{number_format($tabel13->logam_metal_tenaga_kerja,0,",",".")}}</td>

                                        <td align="center">{{number_format($tabel13->pangan_unit + $tabel13->sandang_dan_kulit_unit + $tabel13->kimia_dan_bahan_bangunan_unit + $tabel13->kerajinan_umum_unit + $tabel13->logam_metal_unit)}}</td>
                                        <td align="center">{{number_format($tabel13->pangan_tenaga_kerja + $tabel13->sandang_dan_kulit_tenaga_kerja + $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13->kerajinan_umum_tenaga_kerja + $tabel13->logam_metal_tenaga_kerja)}}</td>
                                        <td align="center">{{$tabel13->tahun}}</td>
                                        <td align="center">{{$tabel13->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit_status13/'.$tabel13->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                         
                    </td>

                  
                                    </tr>
                                    @endforeach
                                   
                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td></b></b>
                                    <td align="center"><b><b> {{number_format($jumlah55,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah56,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah57,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah58,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah59,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah60,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah61,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah62,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah63,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah64,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah65,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b> {{number_format($jumlah66,0,",",".")}}</td><b><b>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>



        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="{{url('/admin/daftar_industri_kecil_dan_menengah')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/admin/daftar_industri_kecil_dan_menengah')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/jumlah_industri_dan_tenaga_kerja')}}">2</a></li>
   

    <li class="page-item">
      <a class="page-link" href="{{url('/admin/jumlah_industri_dan_tenaga_kerja')}}">Next</a>
    </li>
  </ul>
</nav>



    </div>
@endsection

@section('charts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Pangan (Unit)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Pangan (Unit)',
        data: {!!json_encode($data13)!!}

    }
    
    ]
});
    
    </script>
@stop



@section('charts1')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Pangan (Tenaga Kerja)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Pangan (Tenaga Kerja)',
        data: {!!json_encode($data13a)!!}

    }
    
    ]
});
    
    </script>
@stop


@section('charts2')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Sandang dan Kulit (Unit)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Sandang dan Kulit (Unit)',
        data: {!!json_encode($data13b)!!}

    }
    
    ]
});
    
    </script>
@stop

@section('charts3')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Sandang dan Kulit (Tenaga Kerja)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Sandang dan Kulit (Tenaga Kerja)',
        data: {!!json_encode($data13c)!!}

    }
    
    ]
});
    
    </script>
@stop

@section('charts4')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Kimia dan Bahan Bangunan (Unit)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Kimia dan Bahan Bangunan (Unit)',
        data: {!!json_encode($data13d)!!}
    }
    
    ]
});
    
    </script>
@stop

@section('charts5')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Kimia dan Bahan Bangunan (Tenaga Kerja)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Kimia dan Bahan Bangunan (Tenaga Kerja)',
        data: {!!json_encode($data13e)!!}

    }
    
    ]
});
    
    </script>
@stop

@section('charts6')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Kerajinan Umum (Unit)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Kerajinan Umum (Unit)',
        data: {!!json_encode($data13f)!!}

    }
    
    ]
});
    
    </script>
@stop

@section('charts7')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts7', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Kerajinan Umum (Tenaga Kerja)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Kerajinan Umum (Tenaga Kerja)',
        data: {!!json_encode($data13g)!!}

    }
    
    ]
});
    
    </script>
@stop

@section('charts8')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts8', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Logam/Metal (Unit)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Logam/Metal (Unit)',
        data: {!!json_encode($data13h)!!}


    }
    
    ]
});
    
    </script>
@stop

@section('charts9')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts9', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Daftar Industri Logam/Metal (Tenaga Kerja)'
    },
    subtitle: {
        text: 'Kab. Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories13)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
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
        name: 'Logam/Metal (Tenaga Kerja)',
        data: {!!json_encode($data13i)!!}

    }
    
    ]
});
    
    </script>
@stop