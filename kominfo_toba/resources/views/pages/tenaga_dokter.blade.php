
@extends('layouts.app', ['activePage' => 'tenaga_dokter', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')

    <div class="content">
        <div class="container-fluid">
             <div class="row"><div class="col-md-12">
                <div id="chart">
                </div>

                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        
                    <div class="col-12 text-right">
                                <a href="{{url('formulir-tenaga-dokter')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                
                        <h4 class="card-title" align="center">Jumlah Tenaga Medis (Dokter) berdasarkan Jenis Penyakit</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/tenaga_dokter1/exportpdf62" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                             <thead class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <td align="center"><b>No</td> 
                                    <td align="center"><b>Dokter</td> 
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tbl62 as $tabel62) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel62 -> dokter}}</td>
                                    <td align="center">{{number_format($tabel62 -> jumlah,0,",",".")}}</td>
                                    <td align="center">{{$tabel62 -> tahun}}</td>
                                    <td align="center">{{$tabel62 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit62/'.$tabel62->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/tenaga-dokter/hapus62/{{ $tabel62->id }}" >Hapus</a>
                    </td>
                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl62 ?? '' ?? ''->links() }}
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

            <a class="page-link" href="{{url('/rawat_inap_kelas')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/rawat_inap_kelas')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/tenaga_dokter')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/peralatan_rumah_sakit')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/perawat_penyakit')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/peralatan_rumah_sakit')}}">Next</a>
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
        text: 'Jumlah Tenaga Medis (Dokter) berdasarkan Jenis Penyakit'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories62)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Tenaga Medis'
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
        name: 'Dokter',
        data: {!!json_encode($data62)!!}

    }] 
});
    </script>
@stop
