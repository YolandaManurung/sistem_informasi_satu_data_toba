@extends('layouts.app', ['activePage' => 'formulir_rekapitulasi_penyandang_masalah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Rekapitulasi Penyandang Masalah Kesejahteraan Sosial (PMKS) Yang telah menerima Pelayan/Bantuan') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="{{url('/update_status24',$tabel24->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel24->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Rastra Non PKH</th>
                                                <td>{{ $tabel24->rastra_non_PKH }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">RLTH</th>
                                                <td>{{ $tabel24->RLTH }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">KUBE</th>
                                                <td>{{ $tabel24->KUBE }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pendamping Anak Berhadapan Dengan Hukum</th>
                                                <td>{{ $tabel24->pendamping_anak_berhadapan_dengan_hukum}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">KAT</th>
                                                <td>{{ $tabel24->KAT }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">PKH</th>
                                                <td>{{ $tabel24->PKH }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">ASLUT</th>
                                                <td>{{ $tabel24->ASLUT }}</td>
                                            </tr> 
                                            <tr>
                                                <th scope="row">ASPD</th>
                                                <td>{{ $tabel24->ASPD }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">ODHA</th>
                                                <td>{{ $tabel24->ODHA }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">UEP Lansia</th>
                                                <td>{{ $tabel24->UEP_lansia }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel24->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel24->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel24->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/kesehatan_rekapitulasi_penyandang_masalah/{{$tabel24->id}}/accept24" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn  btn-primary">Accept</button>
            </form>

            <form action="/kesehatan_rekapitulasi_penyandang_masalah/{{$tabel24->id}}/reject24" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn  btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel24->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn  btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/kesehatan_rekapitulasi_penyandang_masalah/{{$tabel24->id}}/reject24" method="post" class="d-inline">
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
        </div>
   
@endsection                           