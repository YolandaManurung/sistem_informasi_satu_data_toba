@extends('layouts.app', ['activePage' => 'pariwisataedit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jumlah Kamar Rawat Inap Berdasarkan Kelas') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                        <form action="{{url('/update_status61',$tabel61->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                               
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr>
                                                <th>Jumlah Kamar VIP</th>
                                                <td>{{ $tabel61->VIP }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Kamar Kelas 1</th>
                                                <td>{{ $tabel61->kelas1 }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Kamar Kelas 2</th>
                                                <td>{{ $tabel61->kelas2 }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Kamar Kelas 3</th>
                                                <td>{{ $tabel61->Kelas3}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel61->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel61->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel61->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/rawat_inap_kelas/{{$tabel61->id}}/accept61" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/rawat_inap_kelas/{{$tabel61->id}}/reject61" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel61->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/rawat_inap_kelas/{{$tabel61->id}}/reject61" method="post" class="d-inline">
            @method('patch')
            @csrf
        <button type="submit" class="btn btn-danger">Reject</button>
        </form>
      
        </div>
        @else
        <div class="col-md-4">
        <button type="submit" class="btn btn-danger disabled"> <b>Data di Reject </b></button>
           
        @endif
        </div>
    
                </div>

                   
                </div>
            </div>
        </div>
    </div>
@endsection                           

