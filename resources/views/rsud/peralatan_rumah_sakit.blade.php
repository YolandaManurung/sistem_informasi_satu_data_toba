@extends('layouts.app', ['activePage' => 'peralatan_rumah_sakit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')   

 <div class="content">
        <div class="container-fluid">
          <div class="row">
                 <div class="col-md-12"> 
                    <div class="card strpied-tabled-witd align="center"-hover">
                        <div class="card-header ">
                <div id="chart">
                </div>
                        <h4 class="card-title" align="center">Jumlah Peralatan Rumah Sakit</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/peralatan_rumah_sakit2/exportpdf63" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                             <thead class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <td align="center"><b>No</td> 
                                    <td align="center"><b>Jenis Peralatan Rumah Sakit</td> 
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tbl63 as $tabel63) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel63 -> jenis_peralatan_rumah_sakit}}</td>
                                    <td align="center">{{number_format($tabel63 -> jumlah,0,",",".")}}</td>
                                    <td align="center">{{$tabel63 -> tahun}}</td>
                                   
                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl63 ?? '' ?? ''->links() }}
                        </div>
                        </div>
                    </div>
                    </div>
                    </html>
                </div>
                </div>
        
                 <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/tenaga_dokter1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
        <li class="page-item"><a class="page-link" href="{{url('/rawat_inap_kelas1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/tenaga_dokter1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/peralatan_rumah_sakit1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/perawat_penyakit1')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/perawat_penyakit1')}}">Next</a>
            </li>
        </ul>
        </nav>
      
@endsection


@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Peralatan Rumah Sakit'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories63)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peralatan Rumah Sakit'
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
        name: 'Jenis Peralatan Rumah Sakit',
        data: {!!json_encode($data63)!!}

    }] 
});
    </script>
@stop
