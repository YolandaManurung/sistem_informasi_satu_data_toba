@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                     
                        <h4 class="card-title" align="center">Potensi dan Objek Pariwisata Kabupaten Toba</h4>


                          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisataobjek/exportpdf35" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Jenis Objek Wisata</td>
                                    <td align="center"><b>Lokasi</td>
                                    <td align="center"><b>Daerah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl36 as $tabel36) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel36 -> jenis_objek_wisata}}</td>
                                    <td align="center">{{$tabel36 -> lokasi}}</td>
                                    <td align="center">{{$tabel36 -> daerah}}</td>
                                    <td align="center">{{$tabel36 -> tahun}}</td>
                                    <td align="center">{{$tabel36 -> status}}</td>
                                  
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tbl36->links() }}
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
         <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/pariwisatakapal1')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/pariwisata1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek1')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan1')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran1')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pariwisatakunjungan1')}}">Next</a>
            </li>
        </ul>
        </nav>
    
@endsection