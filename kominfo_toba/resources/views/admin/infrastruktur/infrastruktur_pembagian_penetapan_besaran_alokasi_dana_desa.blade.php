@extends('layouts.app', ['activePage' => 'infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
               
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

                        
                                    
                        <h4 class="card-title" align="center">Pembagian Dan Penetapan Besaran Alokasi Dana Desa</h4>


                          
                        <div class="col-12 text-left">
                
                <a href="/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/exportpdf7" class="btn btn-sm btn-warning">CETAK PDF</a>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" ><b>No</b></td>
                                    <td align="center" ><b>Kecamatan</b></td>
                                    <td align="center" ><b>Nama Desa</b></td>
                                    <td align="center" ><b>Alokasi Dasar</b></td>
                                    <td align="center" ><b>Alokasi Formula</b></td>
                                    <td align="center" ><b>Pagu Dana Per-Desa</b></td>
                                    <td align="center" ><b>Tahun</b></td>
                                   
                                    </tr>
   
                            </thead>
                            <tbody>
                            @foreach($tbl51 as $tabel51)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel51->kecamatan}}</td>
                                    <td align="center">{{$tabel51->desa}}</td>
                                    <td align="center">{{number_format($tabel51->alokasi_dasar,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel51->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel51->alokasi_dasar+$tabel51->alokasi_formula,0,",",".")}}</td>
                                    <td align="center">{{$tabel51->tahun}}</td>
                                    <td align="center">{{$tabel51->status}}</td>
                                   
                                    <td align="center">
                                    <a href="{{ url('/edit_status51/'.$tabel51->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                            {{ $tbl51->links() }}
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
            </li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/infrastruktur_perhitungan_dana_desa')}}">2</a></li>
           
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/infrastruktur_perhitungan_dana_desa')}}">Next</a>
            </li>
        </ul>
        </nav>
        </div>
   
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart2', {
    title: {
        text: 'Jumlah Penduduk, Luas Wilayah, dan kepadatan Penduduk'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories51)!!}
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
        type: 'column',
        name: 'Alokasi Dasar',
        data:  {!!json_encode($data51a)!!}
    }, {
        type: 'column',
        name: 'Alokasi Formula',
        data: {!!json_encode($data51b)!!}
    }, {
        type: 'spline',
        name: 'Pagu Dana Per Desa',
        data: {!!json_encode($data51c)!!},
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
</script>

@stop

