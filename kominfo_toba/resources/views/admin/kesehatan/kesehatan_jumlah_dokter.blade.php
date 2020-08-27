@extends('layouts.app', ['activePage' => 'kesehatan_jumlah_dokter', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart2">
                </div>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                    <div class="col-12 text-right">     
                            </div>
                   
                        <h4 class="card-title" align="center">Jumlah Dokter Menurut Unit Kerja</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_dokter/exportpdf25" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <td align="center" rowspan="2"><b>No</td>
                                    <td align="center" rowspan="2"><b>Unit Kerja</td>
                                    <td align="center" colspan="3"><b>Dokter</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                    <td align="center" rowspan="2"><b>Status</td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td>Umum</td>                                  
                                    <td>Gigi</td>  
                                    <td>Spesialis</td>  
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl25 as $tabel25)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel25->unit_kerja}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_umum, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_gigi, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel25->dokter_spesialis, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel25->tahun}}</td>
                                    <td align="center">{{$tabel25->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status25/'.$tabel25->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_umum}}</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_gigi}}</td>
                                    <td align="center"><b><b>{{$jumlah_dokter_spesialis}}</td>
                                    <td></td>
                                    
                                </tbody>
                            </table>
                            {{ $tbl25->links() }} 
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/kesehatan_rekapitulasi_penyandang_masalah')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_rekapitulasi_penyandang_masalah')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_dokter')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_tenaga_kesehatan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_fasilitas_kesehatan')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_kasus_penyakit')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_akseptor_aktif')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_jumlah_bayi_lahir')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/kesehatan_daftar_lokasi_panti')}}">8</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/kesehatan_jumlah_tenaga_kesehatan')}}">Next</a>
            </li>
        </ul>
        </nav>
    </div>
@endsection
@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Dokter Menurut Unit Kerja'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories25)!!},
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
        name: 'Dokter Umum',
        data: {!!json_encode($data25)!!}

    }, {
        name: 'Dokter Gigi',
        data: {!!json_encode($data25a)!!}
    }, {
        name: 'Dokter Spesialis',
        data: {!!json_encode($data25b)!!}

    }]
});
    </script>
@stop