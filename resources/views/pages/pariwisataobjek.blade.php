@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

                      <div class="col-12 text-right">
                                <a href="{{url('formulir-pariwisata-objek')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                        </div>

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
                                    <td><b>Aksi</td>
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
                                    <td>
                                            <a href="{{ url('/edit35/'.$tabel36->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                        <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus34/{{ $tabel36->id }}" >Hapus</a>
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

            <a class="page-link" href="{{url('/pariwisatakapal')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
           <li class="page-item"><a class="page-link" href="{{url('/pariwisata')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pariwisatakunjungan')}}">Next</a>
            </li>
        </ul>
        </nav>
       
       
        
@endsection