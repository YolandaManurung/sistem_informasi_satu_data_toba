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
                        
                   
                    
                   
                    
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah-jlh-desa-kelurahan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                    </div>
 
                        <h4 class="card-title" align="center">Jumlah Desa dan Kelurahan Menurut Kecamatan</h4>
                    
                    <a href="/pemerintahan_jlh_desa_kel/exportpdf1" class="btn btn-sm btn-warning">CETAK PDF</a>          
                   
                    
                        <div class="card-body table-full-width table-responsive" >
                            <table class="table table-hover table-striped" id="datatables">
                                <thead>
                                
                                    <tr>
                                    <td align="center" rowspan="2"><b><b>No</b></td>
                                    <td align="center" rowspan="2"><b>Kecamatan</b></td>

                                    <td align="center" colspan="2"><b>Jumlah</b></td>

                                    <td align="center" rowspan="2"><b>Total</b></td>
                                    <td align="center" rowspan="2" ><b>Tahun </b></td> 
                                    
                                    <td align="center" rowspan="2" ><b>Status </b></td>
                                    <td rowspan="2"><b>Aksi</b></td>      
                                  
                                    </tr>
                       
                            
                        
                                   

                                    <tr> 
                                    <td align="center"><b>Desa</b></td>
                                    <td align="center"><b>Kelurahan</b></td>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl43 as $tabel43)
                                
                                    <tr>
                                    <td align="center" scope="row">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel43->kecamatan}}</td>
                                    <td align="center">{{$tabel43->Jumlah_Desa}}</td>
                                    <td align="center">{{$tabel43->Jumlah_Kelurahan}}</td>
                                   
                                    <td align="center">{{$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan}}</td>
                                    <td align="center">{{$tabel43->tahun}}</td>
                                    
                                    <td align="center">{{$tabel43->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit43/'.$tabel43->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/desa-kelurahan/hapus/{{ $tabel43->id }}">Hapus</a> 
                                    
                                    </td>
                                   
                                    </tr>
                                    
                                @endforeach
                                <tr>
                                    <td><b></b></td>
                                    <td align="center"><b>Jumlah</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_desa,0,",",".")}}</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_kelurahan,0,",",".")}}</b></td>
                                    <td align="center"><b>{{ number_format($jumlah_total,0,",",".")}}</b></td>
                                    <td align="center"><b></b></td>     
                                    <td><b></b></td>
                                    <td><b></b></td>
                                </tr>
                                </tbody>
                            </table>
                            {{ $tbl43->links() }}
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
            
            <li class="page-item"><a class="page-link" href="{{url('/pemerintahan_jlh_desa_kel')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pemerintahan_jlh_penduduk_wilayah_kepadatan')}}">2</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pemerintahan_jlh_penduduk_wilayah_kepadatan')}}">Next</a>
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
        text: 'Jumlah Desa Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories43)!!},
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
        data: {!!json_encode($data43a)!!}

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
        text: 'Jumlah Kelurahan Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories43)!!},
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
        name: 'Kelurahan',
        data: {!!json_encode($data43b)!!}

    }]
});
   
    // });
    </script>
@stop