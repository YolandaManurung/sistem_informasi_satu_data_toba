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
                                    <td align="center">
                                    <a href="{{ url('/edit_status36/'.$tabel36->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
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

            <a class="page-link" href="{{url('/admin/pariwisatakapal')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisata')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatahotel')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatakapal')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisataobjek')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatakunjungan')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatarestoran')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/pariwisatakunjungan')}}">Next</a>
            </li>
        </ul>
        </nav>
       
       
        
@endsection