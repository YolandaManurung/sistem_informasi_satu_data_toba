@extends('layouts.app', ['activePage' => 'edit_jumlah_fasilitas_kesehatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
            @if(session('error'))
            <div class="alert alert-error">
            {{ session('error') }}
            </div>
            @endif

            @if(count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Perhatian !!!</strong>
            <br>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-0">{{ __('Jumlah Fasilitas Kesehatan Menurut Kecamatan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status27',$tabel27->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel27->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Rumah Sakit</th>
                                                <td>{{ $tabel27->rumah_sakit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rumah Bersalin</th>
                                                <td>{{ $tabel27->rumah_bersalin }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Puskesmas</th>
                                                <td>{{ $tabel27->puskesmas}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Puskesmas Pembantu</th>
                                                <td>{{ $tabel27->puskesmas_pembantu}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poskesdes</th>
                                                <td>{{ $tabel27->poskesdes}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Balai Kesehatan</th>
                                                <td>{{ $tabel27->balai_kesehatan}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Polindes</th>
                                                <td>{{ $tabel27->polindes}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Apotek</th>
                                                <td>{{ $tabel27->apotek}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Toko Obat</th>
                                                <td>{{ $tabel27->toko_obat}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel27->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel27->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
    
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel27->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/kesehatan_jumlah_fasilitas_kesehatan/{{$tabel27->id}}/accept27" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn  btn-primary">Accept</button>
            </form>

            <form action="/kesehatan_jumlah_fasilitas_kesehatan/{{$tabel27->id}}/reject27" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel27->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/kesehatan_jumlah_fasilitas_kesehatan/{{$tabel27->id}}/reject27" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn  btn-danger">Reject</button>
        </form>
        <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn  btn-danger disabled"> <b>Data di Reject </b></button>
            <!-- <a href="{{url('/admin_pemerintahan_jlh_desa_kel')}}" class="card-link">Kembali</a> -->
        @endif
        </div>
    
                </div>

                </div>
            </div>
       
    
@endsection                           