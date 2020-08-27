@extends('layouts.app', ['activePage' => 'pegawai_menurut_golongan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                <a href="{{url('/tambah_pegawai_menurut_golongan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                        </div>
                    <h4 class="card-title" align="center">Jumlah Pegawai Negeri Sipil Menurut Golongan</h4>
                   
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pegawai_menurut_golongan/exportpdf54" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                
                                <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="4"><b>Golongan</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                <td align="center" rowspan="2"><b>Status</td>
                                <td rowspan="2"><b>Aksi</td>
                                </tr>
                                <tr>
                                <td align="center"><b>I</td>                                  
                                <td align="center"><b>II</td> 
                                <td align="center"><b>III</td> 
                                <td align="center"><b>IV</td>  
                                </tr>
                                </thead>
                              
                                <tbody>
                                @foreach($tbl54 as $tabel54)
                                <?php $i++; ?>
                                <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel54->tahun}}</td>
                                    <td align="center">{{number_format($tabel54->pendidikan1, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel54->pendidikan2, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel54->pendidikan3, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel54->pendidikan4, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel54->pendidikan1+$tabel54->pendidikan2+$tabel54->pendidikan3+$tabel54->pendidikan4, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel54->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit54/'.$tabel54->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pegawai_menurut_golongan/hapus54/{{ $tabel54->id }}" >Hapus</a>
                    </td>
                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_1, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_2, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_3, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_4, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_total, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl54->links() }}
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
              
  
        

        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/pegawai_menurut_jenis_kelamin')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_jenis_kelamin')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_golongan')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_menurut_pendidikan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pegawai_yang_pindah_pensiun')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pegawai_menurut_pendidikan')}}">Next</a>
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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Golongan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories54)!!},
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
        name: 'Pendidikan I',
        data: {!!json_encode($data54)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Golongan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories54)!!},
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
        name: 'Pendidikan II',
        data: {!!json_encode($data54a)!!}
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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Golongan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories54)!!},
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
        name: 'Pendidikan III',
        data: {!!json_encode($data54b)!!}

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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Golongan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories54)!!},
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
        name: 'Pendidikan IV',
        data: {!!json_encode($data54c)!!}

    }]
});
    </script>
@stop