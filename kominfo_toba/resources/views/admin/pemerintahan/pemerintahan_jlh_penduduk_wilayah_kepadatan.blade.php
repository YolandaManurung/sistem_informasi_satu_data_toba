@extends('layouts.app', ['activePage' => 'pemerintahan_jlh_penduduk_wilayah_kepadatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


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
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah-jlh-penduduk-luas-kepadatan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                    </div>
                        <h4 class="card-title" align = "center">Jumlah Penduduk, Luas Wilayah, dan Kepadatan Penduduk</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> --> 
                        </div>
                        <div class="col-12 text-left">
               
                <a href="/pemerintahan_jumlah_penduduk_wilayah_kepadatan/exportpdf2" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td><b>No</b></td>
                                    <td><b>Kecamatan</b></td>
                                    <td><b>Jumlah Penduduk (Jiwa)</b></td>
                                    <td><b>Luas Wilayah (ha)</b></td>
                                    <td><b>Kepadatan 
                                        <br>Penduduk</b></td>
                                    <td><b>Tahun </b></td>     
                                    <td><b>Status </b></td>
                                    <td></td>
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl44 as $tabel44)
                                <?php $i++; 
                                 ?>
                                    <tr>
                                    <td >{{$i}}</td>
                                    <td >{{$tabel44->kecamatan}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk,0,",",".")}}</td>
                                    <td >{{number_format($tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk/$tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{$tabel44->tahun}}</td>
                                    <td >{{$tabel44->status}}</td>

                                    <td>
                                    <a href="{{ url('/edit_status44/'.$tabel44->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                    <tr>
                                    <td><b></b></td>
                                    <td><b>Jumlah</b></td>
                                    <td><b>{{ number_format($jumlah_penduduk,0,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_luas_wilayah,2,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_kepadatan_penduduk,2,",",".")}}</b></td>
                                    <td><b></b></td>     
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    </tr>                               
                                </tbody>
                            </table>
                            {{ $tbl44->links() }}
                        </div>
                    </div>
                </div>
                </html>
                
                
            </div>
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/admin/pemerintahan_jlh_desa_kel')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/admin/pemerintahan_jlh_desa_kel')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pemerintahan_jlh_penduduk_wilayah_kepadatan')}}">2</a></li>
    
    <li class="page-item disabled">
      <a class="page-link" href="">Next</a>
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
        text: 'Grafik Jumlah Penduduk Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories44)!!},
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
        name: 'Desa',
        data: {!!json_encode($data44a)!!}

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
        text: 'Grafik Luas Wilayah Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories44)!!},
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
        name: 'Grafik Luas WIlayah Menurut Kecamatan',
        data: {!!json_encode($data44b)!!}

    }]
});
   
    // });
    </script>
@stop

@section('charts1')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart3', {
    title: {
        text: 'Grafik Kepadatan Penduduk Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories44)!!}
    },
    labels: {
        items: [{
            style: {
                left: '50px',
                top: '18px',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'red'
            }
        }]
    },
    series: [{
        type: 'spline',
        name: 'Kepadatan Penduduk',
        data: {!!json_encode($data44c)!!},
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
</script>

@stop

