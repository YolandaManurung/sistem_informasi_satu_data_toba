@extends('layouts.app', ['activePage' => 'pegawai_menurut_jenis_kelamin', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart2">
                </div>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                     
                        <h4 class="card-title" align="center">Jumlah Pegawai Negeri Sipil Menurut Jenis Kelamin</h4>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pegawai_menurut_jenis_kelamin/exportpdf53" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead class="table">
                                <thead class="thead-dark">
                                <tr>  
                                
                                <td align="center" rowspan="2"><b>No</td>
                                <td align="center" rowspan="2"><b>Tahun</td>
                                <td align="center" colspan="2"><b>Jenis Kelamin</td>
                                <td align="center" rowspan="2"><b>Jumlah/Total</td>
                                <td align="center" rowspan="2"><b>Status</td>
                                <td></td>
                                </tr>
                                <tr>
                                <td align="center"><b>Laki-laki</td>                                  
                                <td align="center"><b>Perempuan</td>  
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl53 as $tabel53)
                                <?php $i++; ?>
                                <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel53->tahun}}</td>
                                    <td align="center">{{number_format($tabel53->laki_laki, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel53->perempuan, 0, ".", ".")}}</td>
                                    <td align="center">{{number_format($tabel53->laki_laki+$tabel53->perempuan, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel53->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status53/'.$tabel53->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>

                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pns_lk, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pns_pr, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_pns_lk+$jumlah_pns_pr, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl53->links() }}
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
            
            <li class="page-item"><a class="page-link" href="{{url('/admin/pegawai_menurut_jenis_kelamin')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pegawai_menurut_golongan')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pegawai_menurut_pendidikan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pegawai_yang_pindah_pensiun')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/pegawai_menurut_golongan')}}">Next</a>
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
        text: 'Jumlah Pegawai Negeri Sipil Menurut Jenis Kelamin'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories53)!!},
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
        name: 'Laki-laki',
        data: {!!json_encode($data53)!!}

    }, {
        name: 'Perempuan',
        data: {!!json_encode($data53a)!!}

    }]
});
    </script>
@stop