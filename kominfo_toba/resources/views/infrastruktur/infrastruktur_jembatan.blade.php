@extends('layouts.app', ['activePage' => 'infrastruktur_jembatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
               
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                
                   
                    
                        <h4 class="card-title" align="center">Jembatan Menurut Status dan Keadaan</h4>

                       
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_jembatan/exportpdf6" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr align="center">
                                    <td align="center" ><b>No</b></td>
                                    <td align="center" ><b>Keadaan</b></td>
                                    <td align="center" ><b>Jumlah Jembatan</b></td>
                                    
                                    <td align="center"><b>Tahun</b></td>
                                   
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl48 as $tabel48)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel48->keadaan}}</td>
                                    <td align="center">{{$tabel48->jumlah_jembatan}} unit</td>
                                  
                                    <td align="center">{{$tabel48->tahun}}</td>

                                    <td>
                                   
                                    </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                            {{ $tbl48->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="infrastruktur_panjang_jalan_kabupaten1" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_aplikasi_opd_toba1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_jembatan1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan_kabupaten1')}}">4</a></li>
            
            <li class="page-item disabled">
            <a class="page-link" href="">Next</a>
            </li>
        </ul>
        </nav>
      
      
    
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jembatan Menurut Status dan Keadaan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories48)!!},
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
        name: 'Keadaan Jembatan',
        data: {!!json_encode($data48a)!!}

    }]
});
    
    </script>
@stop