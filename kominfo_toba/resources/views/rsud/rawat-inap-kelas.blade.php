@extends('layouts.app', ['activePage' => 'rawat_inap_kelas', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                   
                        <h4 class="card-title" align="center">Jumlah Kamar Rawat Inap Berdasarkan Kelas</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/rawat_inap_kelas2/exportpdf61" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                             <thead class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <td align="center"><b>No</td> 
                                    <td align="center"><b>VIP</td> 
                                    <td align="center"><b>Kelas 1</td>
                                    <td align="center"><b>Kelas II</td>
                                    <td align="center"><b>Kelas III</td>
                                    <td align="center"><b>Tahun</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tbl61 as $tabel61) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{number_format($tabel61 -> VIP, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel61 -> kelas1, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel61 -> kelas2, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel61 -> kelas3, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel61 -> tahun}}</td>
                                   
                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td> 
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl61 ?? '' ?? ''->links() }}
                        </div>
                        </div>
                    </div>
                    </div>
                    </html>
                </div>
                 <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">

            <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/rawat_inap_kelas1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/tenaga_dokter1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/peralatan_rumah_sakit1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/perawat_penyakit1')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/tenaga_dokter1')}}">Next</a>
            </li>
        </ul>
        </nav>
       
        
@endsection
