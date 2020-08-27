@extends('layouts.app', ['activePage' => 'pendidikanedit', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                                    <h4 class="mb-0">{{ __('Jumlah Paud, Murid, Guru, serta Lembaga Kabupaten Toba') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                        <form action="{{url('/update_status39',$tabel39->id)}}" method="post" class="account-form">                   
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field('PUT')}}
                                <table  class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Kecamatan</th>
                                                <td>{{ $tabel39->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tahun</th>
                                                <td>{{ $tabel39->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Paud</th>
                                                <td>{{ $tabel39->jumlah_paud }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Guru</th>
                                                <td>{{ $tabel39->jumlah_guru }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Murid</th>
                                                <td>{{ $tabel39->jumlah_murid}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Negeri</th>
                                                <td>{{ $tabel39->negeri }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah Swasta</th>
                                                <td>{{ $tabel39->swasta }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jumlah MI/MTs</th>
                                                <td>{{ $tabel39->Madrasah_Ibtidaiyah_Tsanawiyah}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $tabel39->status}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                
                            
                                
                            </form>
                            <hr class="my-4" />
                            
                        </div>
        @if($tabel39->status=='Requested')
        <div class="footer"> 
        <div class="col-md-4">
            <form action="/pendidikanpaud/{{$tabel39->id}}/accept39" method="post" class="d-inline">
            @method('patch')
             @csrf
            <button type="submit" class="btn btn-primary">Accept</button>
            </form>

            <form action="/pendidikanpaud/{{$tabel39->id}}/reject39" method="post" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
        @elseif($tabel39->status=='Accepted')
        <div class="col-md-5">
        <button type="submit" class="btn btn-primary disabled"> <b> Sudah Di Accepted </b></button>
        <form action="/pendidikanpaud/{{$tabel39->id}}/reject39" method="post" class="d-inline">
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


