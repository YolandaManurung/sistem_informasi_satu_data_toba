@extends('layouts.app', ['activePage' => 'pendidikanpaud', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart">
                </div>
            
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
 
                        <h4 class="card-title" align="center">Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba</h4>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pendidikanpaud/exportpdf39" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Jumlah Paud</td>
                                    <td align="center"><b>Jumlah Guru</td>
                                    <td align="center"><b>Jumlah Murid</td>
                                    <td align="center"><b>Negeri</td>
                                    <td align="center"><b>Swasta</td>
                                    <td align="center"><b>MI/MTs</td>
                                  
                                   
                                </thead>
                                <tbody>
                                    @foreach($tbl39 as $tabel39)
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel39 -> kecamatan}}</td>
                                    <td align="center">{{$tabel39 -> tahun}}</td>
                                    <td align="center">{{number_format($tabel39->jumlah_paud, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel39->jumlah_guru, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel39->jumlah_murid, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel39->negeri, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel39->swasta, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel39->Madrasah_Ibtidaiyah_Tsanawiyah, 0, ",", ",")}}</td>
                                    
                                   
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan2,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan3,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan4,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahpendidikan5,0,",",".")}}</td>
                                </tbody>
                            </table>
                            {{ $tbl39->links() }}
                        </div> 
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
          
            <li class="page-item"><a class="page-link" href="{{url('/pendidikanpaud1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pendidikansd1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pendidikansltp1')}}">3</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pendidikansd1')}}">Next</a>
            </li>
        </ul>
        </nav>
@endsection


@section('chart')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories39)!!},
        crosshair: true,
            
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
        name: 'Jumlah Paud',
        data: {!!json_encode($data39)!!}

    }, {
        name: 'Jumlah Guru',
        data: {!!json_encode($data39a)!!}

    }, {
        name: 'Jumlah Murid',
        data: {!!json_encode($data39b)!!}

    }]
});
    </script>
@stop


