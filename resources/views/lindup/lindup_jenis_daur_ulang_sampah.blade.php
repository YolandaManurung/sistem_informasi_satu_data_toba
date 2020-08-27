@extends('layouts.app', ['activePage' => 'lindup_izin_lingkungan_berdasarkan_perusahaan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                                          
                   
                        <h4 class="card-title" align = "center">Jenis Daur Ulang Sampah</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> --> 
                        </div>
                        <div class="col-12 text-left">
               
                        <a href="/lindup_jenis_daur_ulang_sampah/exportpdf60" class="btn btn-sm btn-warning">CETAK PDF</a> 
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" ><b>No</b></td>
                                    <td align="center"><b>Kecamatan</b></td>
                                    <td align="center"><b>Daur Ulang</b></td>
                                    <td align="center"><b>Ton</b></td>
                                    <td align="center"><b>Produksi</b></td>
                                    <td align="center"><b>Tahun </b></td>     
                                   
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl60 as $tabel60)
                                
                                    <tr>
                                    <td align="center" >{{$loop->iteration}}</td>
                                    <td align="center" >{{$tabel60->kecamatan}}</td>
                                    <td align="center" >{{$tabel60->daur_ulang}}</td>
                                    <td align="center" >{{$tabel60->ton}}</td>
                                    <td align="center" >{{$tabel60->produksi}}</td>
                                    <td align="center" >{{$tabel60->tahun}}</td>

                                    <td align="center">
                                   
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                                            
                                </tbody>
                            </table>
                            {{ $tbl60->links() }}
                        </div>
                    </div>
                </div>
                </html>
                
                
            </div>
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/lindup_jumlah_produksi_sampah1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jumlah_produksi_sampah1')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jenis_daur_ulang_sampah1')}}">3</a></li>
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
        categories: {!!json_encode($categories60)!!},
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
        pointFormat: '<tr><td align="center" style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td align="center" style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
        data: {!!json_encode($data60a)!!}

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
        categories: {!!json_encode($categories60)!!},
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
        pointFormat: '<tr><td align="center" style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td align="center" style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
        data: {!!json_encode($data60b)!!}

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
        categories: {!!json_encode($categories60)!!}
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
        data: {!!json_encode($data60c)!!},
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
</script>

@stop

