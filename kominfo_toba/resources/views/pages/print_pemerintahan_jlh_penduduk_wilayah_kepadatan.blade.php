<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
  
</head>
<body>
<div class="container">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    
                                    <td><b>Kecamatan</b></td>
                                    <td><b>Jumlah Penduduk (Jiwa)</b></td>
                                    <td><b>Luas Wilayah (ha)</b></td>
                                    <td><b>Kepadatan 
                                        <br>Penduduk</b></td>
                                    <td><b>Tahun </b></td>     
                                    <td><b>Status </b></td>
                                    
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl44c as $tabel44)
                                
                                    <tr>
                                  
                                    <td >{{$tabel44->kecamatan}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk,0,",",".")}}</td>
                                    <td >{{number_format($tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{number_format($tabel44->Jlh_Penduduk/$tabel44->Luas_Wilayah,2,",",".")}}</td>
                                    <td >{{$tabel44->tahun}}</td>
                                    <td >{{$tabel44->status}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                   
                                    <td><b>Jumlah</b></td>
                                    <td><b>{{ number_format($jumlah_penduduk,0,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_luas_wilayah,2,",",".")}}</b></td>
                                    <td><b>{{ number_format($jumlah_kepadatan_penduduk,2,",",".")}}</b></td>
                                    <td><b></b></td>     
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    </tr>                               
                                </tbody>
                            </table> 
                        </div>                      
@endsection

</body>
</html>


