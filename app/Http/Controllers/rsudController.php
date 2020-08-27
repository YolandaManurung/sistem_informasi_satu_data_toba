<?php

namespace App\Http\Controllers;
use App\Model_pemerintahan_jlh_desa_kel;
use App\Model_formulir_jlh_penduduk_wilayah_kepadatan;
use App\Model_infrastruktur_aplikasi_opd_toba;
use App\Model_infrastruktur_panjang_jalan_kabupaten;
use App\Model_infrastruktur_jembatan;
use App\Model_infrastruktur_pembangunan_bersumber_dana_desa;
use App\Model_infrastruktur_penetapan_bagi_hasil_pajak;
use App\Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa;
use App\Model_infrastruktur_perhitungan_dana_desa;
use App\pariwisata;
use App\pariwisatahotel; 
use App\pariwisatakapal;
use App\pariwisatakunjungan;
use App\pariwisataobjek;
use App\pariwisatarestoran;
//kependudukan
use App\Model_Kependudukan_jumlah_penduduk;
use App\Model_Kependudukan_jumlah_akta;
use App\Model_Kependudukan_jumlah_tenaga_kerja;
//kesehatan
use App\Model_Kesehatan_rekapitulasi_penyandang_masalah;
use App\Model_Kesehatan_jumlah_dokter;
use App\Model_Kesehatan_jumlah_tenaga_kesehatan;
use App\Model_Kesehatan_jumlah_fasilitas_kesehatan;
use App\Model_Kesehatan_jumlah_kasus_penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PariwisataController;
use App\pendidikansd;
use App\pendidikanpaud;
use App\pendidikansltp;
use App\ketapang;
use App\rawatinapkelas;
use App\tenagadokter;
use App\peralatanrumahsakit;
use App\perawatpenyakit;
use PDF;

class RSUDController extends Controller
{
    public function rsud1(Request $request)
    {
        $tbl63=DB::table('rsud_peralatan_rumah_sakit')->paginate(10);
        $tbl63a=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->paginate(10);
        $categories63 = [];
        $data63 = [];
        foreach ($tbl63a as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl64=DB::table('rsud_perawat_jenis_perawat')->paginate(10);
        $tbl64a=DB::table('rsud_perawat_jenis_perawat')->where('status', '=', 'Accepted')->paginate(10);
        $categories64 = [];
        $data64 = [];
        foreach ($tbl64a as $tabel64a){
            $categories64[] = $tabel64a->perawat;
            $data64[] = $tabel64a->jumlah;}

        $tbl62=DB::table('rsud_tenaga_medis')->paginate(10);
        $tbl62a=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
        $categories62 = [];
        $data62 = [];
        foreach ($tbl62a as $tabel62a){
            $categories62[] = $tabel62a->dokter;
            $data62[] = $tabel62a->jumlah;
        }

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);

        $tbl65=DB::table('ketapang')->paginate(10);
        $tbl65a=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }
        
        $categories65 = [];
        $data65 = [];
        foreach ($tbl65a as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }
        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->where('status', '=', 'Accepted')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);

        $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        // $data39c = [];
        // $data39d = [];
        // $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            // $data39c[] = $tabel39a->negeri;
            // $data39d[] = $tabel39a->swasta;
            // $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }
        //dd($data39);

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
        $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl52 as $tabel44b){
            $categories52[] = $tabel44b->kecamatan;
            $data52a[] = $tabel44b->alokasi_dasar;
            $data52b[] = $tabel44b->alokasi_formula;
            $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }

        if($request->has('cari')){
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
        }

      
            return view("rsud.rawat-inap-kelas",  compact('ketapang','tbl65','categories65','data65','tbl61',
            'tbl62','categories62','data62','tbl63','categories63','data63','tbl64','categories64','data64','tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data40','data40a','data40b','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b',
            'categories43','categories44','categories48','categories47', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }

    public function rsud2(Request $request)
    {
        $tbl63=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->paginate(10);
         $categories63 = [];
        $data63 = [];
        foreach ($tbl63 as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl64=DB::table('rsud_perawat_jenis_perawat')->where('status', '=', 'Accepted')->paginate(10);
        $categories64 = [];
        $data64 = [];
        foreach ($tbl64 as $tabel64a){
            $categories64[] = $tabel64a->perawat;
            $data64[] = $tabel64a->jumlah;}


        $tbl62=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
        $categories62 = [];
        $data62 = [];
        foreach ($tbl62 as $tabel62a){
            $categories62[] = $tabel62a->dokter;
            $data62[] = $tabel62a->jumlah;
        }

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);

        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }
        
        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }
        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->where('status', '=', 'Accepted')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);

        $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        // $data39c = [];
        // $data39d = [];
        // $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            // $data39c[] = $tabel39a->negeri;
            // $data39d[] = $tabel39a->swasta;
            // $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }
        //dd($data39);

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
        $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl52 as $tabel44b){
            $categories52[] = $tabel44b->kecamatan;
            $data52a[] = $tabel44b->alokasi_dasar;
            $data52b[] = $tabel44b->alokasi_formula;
            $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }

        if($request->has('cari')){
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
        }

      
            return view("rsud.tenaga_dokter",  compact('ketapang','tbl65','categories65','data65','tbl61',
            'tbl62','categories62','data62','tbl63','categories63','data63','tbl64','categories64','data64','tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data40','data40a','data40b','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b',
            'categories43','categories44','categories48','categories47', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }

public function rsud3(Request $request)
    {
        $tbl63=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->paginate(10);
         $categories63 = [];
        $data63 = [];
        foreach ($tbl63 as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl64=DB::table('rsud_perawat_jenis_perawat')->where('status', '=', 'Accepted')->paginate(10);
        $categories64 = [];
        $data64 = [];
        foreach ($tbl64 as $tabel64a){
            $categories64[] = $tabel64a->perawat;
            $data64[] = $tabel64a->jumlah;}


        $tbl62=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
        $categories62 = [];
        $data62 = [];
        foreach ($tbl62 as $tabel62a){
            $categories62[] = $tabel62a->dokter;
            $data62[] = $tabel62a->jumlah;
        }

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);

        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }
        
        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }
        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->where('status', '=', 'Accepted')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);

        $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        // $data39c = [];
        // $data39d = [];
        // $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            // $data39c[] = $tabel39a->negeri;
            // $data39d[] = $tabel39a->swasta;
            // $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }
        //dd($data39);

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
        $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl52 as $tabel44b){
            $categories52[] = $tabel44b->kecamatan;
            $data52a[] = $tabel44b->alokasi_dasar;
            $data52b[] = $tabel44b->alokasi_formula;
            $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }

        if($request->has('cari')){
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
        }

      
            return view("rsud.peralatan_rumah_sakit",  compact('ketapang','tbl65','categories65','data65','tbl61',
            'tbl62','categories62','data62','tbl63','categories63','data63','tbl64','categories64','data64','tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data40','data40a','data40b','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b',
            'categories43','categories44','categories48','categories47', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }

public function rsud4(Request $request)
    {$tbl63=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->paginate(10);
         $categories63 = [];
        $data63 = [];
        foreach ($tbl63 as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl64=DB::table('rsud_perawat_jenis_perawat')->where('status', '=', 'Accepted')->paginate(10);
        $categories64 = [];
        $data64 = [];
        foreach ($tbl64 as $tabel64a){
            $categories64[] = $tabel64a->perawat;
            $data64[] = $tabel64a->jumlah;}


        $tbl62=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
        $categories62 = [];
        $data62 = [];
        foreach ($tbl62 as $tabel62a){
            $categories62[] = $tabel62a->dokter;
            $data62[] = $tabel62a->jumlah;
        }

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);

        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }
        
        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }
        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->where('status', '=', 'Accepted')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);

        $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        // $data39c = [];
        // $data39d = [];
        // $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            // $data39c[] = $tabel39a->negeri;
            // $data39d[] = $tabel39a->swasta;
            // $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }
        //dd($data39);

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
        $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl52 as $tabel44b){
            $categories52[] = $tabel44b->kecamatan;
            $data52a[] = $tabel44b->alokasi_dasar;
            $data52b[] = $tabel44b->alokasi_formula;
            $data52c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }

        if($request->has('cari')){
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::where('kecamatan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $tabel2 = \App\Model_pemerintahan_jlh_desa_kel::all();        
        }

      
            return view("rsud.perawat_penyakit",  compact('ketapang','tbl65','categories65','data65','tbl61',
            'tbl62','categories62','data62','tbl63','categories63','data63','tbl64','categories64','data64','tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data40','data40a','data40b','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b',
            'categories43','categories44','categories48','categories47', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }


     public function index1(Request $request)

    {
        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->paginate(10);
       
        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }


        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }

        


        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);
 $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        $data39c = [];
        $data39d = [];
        $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            $data39c[] = $tabel39a->negeri;
            $data39d[] = $tabel39a->swasta;
            $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
       $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        $data40c = [];
        $data40d = [];
        $data40e = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
            $data40c[] = $tabel40a->negeri; 
            $data40d[] = $tabel40a->swasta;
            $data40e[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $categories41 = []; 
        $data41 = [];
        $data41a = [];
        $data41b = [];
        $data41c = [];
        $data41d = [];
        $data41e = [];
        foreach ($tbl41 as $tabel41a){
            $categories41[] = $tabel41a->kecamatan;
            $data41[] = $tabel41a->jumlah_sltp;
            $data41a[] = $tabel41a->jumlah_guru;
            $data41b[] = $tabel41a->jumlah_murid;
            $data41c[] = $tabel41a->negeri;
            $data41d[] = $tabel41a->swasta;
            $data41e[] = $tabel41a->Madrasah_Ibtidaiyah_Tsanawiyah;
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $categories46 = [];
        $categories46a = [];
        $data46a = [];
        $data46b = [];
        foreach ($tbl46 as $tabel44b){
            $categories46[] = $tabel44b->keadaan;
            $categories46a[] = $tabel44b->kondisi_jalan;
            $data46a[] = $tabel44b->panjang_jalan_keadaan;
            $data46b[] = $tabel44b->panjang_jalan_kondisi_jalan;
            
        }
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){ 
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->groupBy('kecamatan')->get();
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl53 as $tabel52){
            $categories52[] = $tabel52->kecamatan;
            $data52a[] = $tabel52->alokasi_dasar;
            $data52b[] = $tabel52->alokasi_formula;
            $data52c[] = $tabel52->alokasi_dasar+$tabel52->alokasi_formula;
        }
            return view("pages.rawat-inap-kelas",  compact('ketapang','tbl65','categories65','data65','tbl61',
            
            
            
            
            
            
            
            
            
            
            
            'tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data39c','data39d','data39e','data40','data40a','data40b','data40c','data40d','data40e','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b', 'data46a', 'data46b','categories41','data41','data41a','data41b','data41c','data41d','data41e',
            'categories43','categories44','categories48','categories47','categories46', 'categories46a', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }
}
public function formulir1(){
            return view("pages.formulir-rawat-inap-kelas");
}

public function tambah1(Request $request)
    {
        rawatinapkelas::create(['VIP'=> $request->VIP, 'kelas1'=>$request->kelas1,
        'kelas2' => $request->kelas2, 'kelas3'=>$request->kelas3,
        'tahun'=>$request->tahun]);
        return back()->withStatus(__('Data Berhasil Disimpan'));
    }

    public function hapus61($id)
{
	DB::table('rsud_jumlah_kamar_rawat_inap')->where('id',$id)->delete();
	return redirect('/rawat_inap_kelas');
}

    public function edit61($id)
    {
            $tabel61 = rawatinapkelas::FindOrFail($id);
            return view('pages.edit.rawat_inap_kelas_edit',compact('tabel61'));
    }

    public function update61(Request $request, $id){
        $this->validate($request,[ 
            'VIP'=>'required',
            'kelas1'=>'required',
            'kelas2'=>'required',
            'kelas3'=>'required',
            'tahun'=>'required',
            'status'=>'required',
        ]);
        $input_data=$request->all();
        rawatinapkelas::where('id',$id)->update([
            'VIP'=>$input_data['VIP'],
            'kelas1'=>$input_data['kelas1'],
            'kelas2'=>$input_data['kelas2'],
            'kelas3'=>$input_data['kelas3'],
            'tahun'=>$input_data['tahun'],
            'status'=>$input_data['status']]);
        return redirect('/rawat_inap_kelas')->with('message','Update already Update!');
    }

    public function exportpdf61()
    {
        $kamarinap = rawatinapkelas::all()->where('status','=','Accepted');
        $pdf = PDF::loadView('pages.export.kamar_rawat_inap_pdf', ['kamarinap' => $kamarinap]);
        return $pdf->download('kamar_rawat_inap.pdf');
    }

    public function index2(Request $request)

    {
        $tbl62=DB::table('rsud_tenaga_medis')->paginate(10);
        $tbl62a=DB::table('rsud_tenaga_medis')->where('status','=','Accepted')->get();
        $categories62 = [];
        $data62 = [];
        foreach ($tbl62a as $tabel62a){
            $categories62[] = $tabel62a->dokter;
            $data62[] = $tabel62a->jumlah;
        }

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->paginate(10);
       
        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }


        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }

        


        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);
 $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        $data39c = [];
        $data39d = [];
        $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            $data39c[] = $tabel39a->negeri;
            $data39d[] = $tabel39a->swasta;
            $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
       $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        $data40c = [];
        $data40d = [];
        $data40e = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
            $data40c[] = $tabel40a->negeri; 
            $data40d[] = $tabel40a->swasta;
            $data40e[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $categories41 = []; 
        $data41 = [];
        $data41a = [];
        $data41b = [];
        $data41c = [];
        $data41d = [];
        $data41e = [];
        foreach ($tbl41 as $tabel41a){
            $categories41[] = $tabel41a->kecamatan;
            $data41[] = $tabel41a->jumlah_sltp;
            $data41a[] = $tabel41a->jumlah_guru;
            $data41b[] = $tabel41a->jumlah_murid;
            $data41c[] = $tabel41a->negeri;
            $data41d[] = $tabel41a->swasta;
            $data41e[] = $tabel41a->Madrasah_Ibtidaiyah_Tsanawiyah;
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $categories46 = [];
        $categories46a = [];
        $data46a = [];
        $data46b = [];
        foreach ($tbl46 as $tabel44b){
            $categories46[] = $tabel44b->keadaan;
            $categories46a[] = $tabel44b->kondisi_jalan;
            $data46a[] = $tabel44b->panjang_jalan_keadaan;
            $data46b[] = $tabel44b->panjang_jalan_kondisi_jalan;
            
        }
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){ 
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->groupBy('kecamatan')->get();
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl53 as $tabel52){
            $categories52[] = $tabel52->kecamatan;
            $data52a[] = $tabel52->alokasi_dasar;
            $data52b[] = $tabel52->alokasi_formula;
            $data52c[] = $tabel52->alokasi_dasar+$tabel52->alokasi_formula;
        }
            return view("pages.tenaga_dokter",  compact('ketapang','tbl65','categories65','data65','tbl61','tbl62','categories62','data62','tbl62a',
            
            
            
            
            
            
            
            
            
            
            
            'tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data39c','data39d','data39e','data40','data40a','data40b','data40c','data40d','data40e','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b', 'data46a', 'data46b','categories41','data41','data41a','data41b','data41c','data41d','data41e',
            'categories43','categories44','categories48','categories47','categories46', 'categories46a', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }
}
public function formulir2(){
            return view("pages.formulir-tenaga-dokter");
}

public function tambah2(Request $request)
    {
        tenagadokter::create(['dokter'=> $request->dokter, 'jumlah'=>$request->jumlah,
        'tahun'=>$request->tahun]);
        return back()->withStatus(__('Data Berhasil Disimpan'));
    }

    public function hapus62($id)
{
	DB::table('rsud_tenaga_medis')->where('id',$id)->delete();
	return redirect('/tenaga_dokter');
}

    public function edit62($id)
    {
            $tabel62 = tenagadokter::FindOrFail($id);
            return view('pages.edit.tenaga_dokter_edit',compact('tabel62'));
    }

    public function update62(Request $request, $id){
        $this->validate($request,[ 
            'dokter'=>'required',
            'jumlah'=>'required',
            'tahun'=>'required',
            'status'=>'required',
        ]);
        $input_data=$request->all();
        tenagadokter::where('id',$id)->update([
            'dokter'=>$input_data['dokter'],
            'jumlah'=>$input_data['jumlah'],
            'tahun'=>$input_data['tahun'],
            'status'=>$input_data['status']]);
        return redirect('/tenaga_dokter')->with('message','Update already Update!');
    }

    public function exportpdf62()
    {
        $tenagamedis = tenagadokter::all()->where('status','=','Accepted');
        $pdf = PDF::loadView('pages.export.tenaga_medis_pdf', ['tenagamedis' => $tenagamedis]);
        return $pdf->download('tenaga_medis.pdf');
    }

     public function index3(Request $request)

    {
        $tbl63=DB::table('rsud_peralatan_rumah_sakit')->paginate(10);
        $tbl63a=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->get();
        $categories63 = [];
        $data63 = [];
        foreach ($tbl63a as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl62=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
       

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);
       
        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }


        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }

        


        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);
 $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        $data39c = [];
        $data39d = [];
        $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            $data39c[] = $tabel39a->negeri;
            $data39d[] = $tabel39a->swasta;
            $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
       $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        $data40c = [];
        $data40d = [];
        $data40e = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
            $data40c[] = $tabel40a->negeri; 
            $data40d[] = $tabel40a->swasta;
            $data40e[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $categories41 = []; 
        $data41 = [];
        $data41a = [];
        $data41b = [];
        $data41c = [];
        $data41d = [];
        $data41e = [];
        foreach ($tbl41 as $tabel41a){
            $categories41[] = $tabel41a->kecamatan;
            $data41[] = $tabel41a->jumlah_sltp;
            $data41a[] = $tabel41a->jumlah_guru;
            $data41b[] = $tabel41a->jumlah_murid;
            $data41c[] = $tabel41a->negeri;
            $data41d[] = $tabel41a->swasta;
            $data41e[] = $tabel41a->Madrasah_Ibtidaiyah_Tsanawiyah;
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $categories46 = [];
        $categories46a = [];
        $data46a = [];
        $data46b = [];
        foreach ($tbl46 as $tabel44b){
            $categories46[] = $tabel44b->keadaan;
            $categories46a[] = $tabel44b->kondisi_jalan;
            $data46a[] = $tabel44b->panjang_jalan_keadaan;
            $data46b[] = $tabel44b->panjang_jalan_kondisi_jalan;
            
        }
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){ 
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->groupBy('kecamatan')->get();
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl53 as $tabel52){
            $categories52[] = $tabel52->kecamatan;
            $data52a[] = $tabel52->alokasi_dasar;
            $data52b[] = $tabel52->alokasi_formula;
            $data52c[] = $tabel52->alokasi_dasar+$tabel52->alokasi_formula;
        }
            return view("pages.peralatan_rumah_sakit",  compact('tbl63a','tbl63','ketapang','tbl65','categories65','data65','tbl61','tbl62','categories63','data63',
            
            
            
            
            
            
            
            
            
            
            
            'tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data39c','data39d','data39e','data40','data40a','data40b','data40c','data40d','data40e','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b', 'data46a', 'data46b','categories41','data41','data41a','data41b','data41c','data41d','data41e',
            'categories43','categories44','categories48','categories47','categories46', 'categories46a', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }
}
public function formulir3(){
            return view("pages.formulir-peralatan-rumah-sakit");
}

public function tambah3(Request $request)
    {
        peralatanrumahsakit::create(['jenis_peralatan_rumah_sakit'=> $request->jenis_peralatan_rumah_sakit, 'jumlah'=>$request->jumlah,
        'tahun'=>$request->tahun]);
        return back()->withStatus(__('Data Berhasil Disimpan'));
    }

    public function hapus63($id)
{
	DB::table('rsud_peralatan_rumah_sakit')->where('id',$id)->delete();
	return redirect('/peralatan_rumah_sakit');
}

    public function edit63($id)
    {
            $tabel63 = peralatanrumahsakit::FindOrFail($id);
            return view('pages.edit.peralatan_rumah_sakit_edit',compact('tabel63'));
    }

    public function update63(Request $request, $id){
        $this->validate($request,[ 
            'jenis_peralatan_rumah_sakit'=>'required',
            'jumlah'=>'required',
            'tahun'=>'required',
            'status'=>'required',
        ]);
        $input_data=$request->all();
        peralatanrumahsakit::where('id',$id)->update([
            'jenis_peralatan_rumah_sakit'=>$input_data['jenis_peralatan_rumah_sakit'],
            'jumlah'=>$input_data['jumlah'],
            'tahun'=>$input_data['tahun'],
            'status'=>$input_data['status']]);
        return redirect('/peralatan_rumah_sakit')->with('message','Update already Update!');
    }

    public function exportpdf63()
    {
        $peralatanrumahsakit = peralatanrumahsakit::all()->where('status','=','Accepted');
        $pdf = PDF::loadView('pages.export.peralatan_rumah_sakit_pdf', ['peralatanrumahsakit' => $peralatanrumahsakit]);
        return $pdf->download('peralatan_rumah_sakit.pdf');
    }

    public function index4(Request $request)

    {
        $tbl64=DB::table('rsud_perawat_jenis_perawat')->paginate(10);
        $tbl64a=DB::table('rsud_perawat_jenis_perawat')->where('status', '=', 'Accepted')->get();
        $categories64 = [];
        $data64 = [];
        foreach ($tbl64a as $tabel64a){
            $categories64[] = $tabel64a->perawat;
            $data64[] = $tabel64a->jumlah;}

        $tbl63=DB::table('rsud_peralatan_rumah_sakit')->paginate(10);
        $tbl63a=DB::table('rsud_peralatan_rumah_sakit')->where('status', '=', 'Accepted')->get();
        $categories63 = [];
        $data63 = [];
        foreach ($tbl63a as $tabel63a){
            $categories63[] = $tabel63a->jenis_peralatan_rumah_sakit;
            $data63[] = $tabel63a->jumlah;
        }

        $tbl62=DB::table('rsud_tenaga_medis')->where('status', '=', 'Accepted')->paginate(10);
       

        $tbl61=DB::table('rsud_jumlah_kamar_rawat_inap')->where('status', '=', 'Accepted')->paginate(10);
       
        $tbl65=DB::table('ketapang')->where('status', '=', 'Accepted')->paginate(10);
        $ketapang=0;
        foreach ($tbl65 as $tabel65){
            $ketapang+=$tabel65->jumlah;
        }


        $categories65 = [];
        $data65 = [];
        foreach ($tbl65 as $tabel65a){
            $categories65[] = $tabel65a->jenis_bantuan;
            $data65[] = $tabel65a->jumlah;
        }

        


        $i=0;

        //peternakan dan teknologi
        $tbl1=DB::table('peternakan_populasi_ternak_besar')->get();


        $categories1a = [];
        $data1a1 = [];
        $data1a2 = [];
        $data1a3 = [];
        $data1a4 = [];
        $data1a5 = [];
        $data1a6 = [];
        $data1a7 = [];
        

      
        foreach ($tbl1 as $tabel1a){
            $categories1a[] = $tabel1a->kecamatan;
            $data1a1[] = $tabel1a->sapi_perah;
            $data1a2[] = $tabel1a->sapi_potong;
            $data1a3[] = $tabel1a->kerbau;
            $data1a4[] = $tabel1a->kuda;
            $data1a5[] = $tabel1a->kambing;
            $data1a6[] = $tabel1a->domba;
            $data1a7[] = $tabel1a->babi;
            
        }



        $jumlah1=0;
        foreach ($tbl1 as $tabel1){
            $jumlah1+=$tabel1->sapi_perah;
        }

        $jumlah2=0;
        foreach ($tbl1 as $tabel1a){
            $jumlah2+=$tabel1a->sapi_potong;
        }

        $jumlah3=0;
        foreach ($tbl1 as $tabel1b){
            $jumlah3+=$tabel1b->kerbau;
        }

        $jumlah4=0;
        foreach ($tbl1 as $tabel1c){
            $jumlah4+=$tabel1c->kuda;
        }

        $jumlah5=0;
        foreach ($tbl1 as $tabel1d){
            $jumlah5+=$tabel1d->kambing;
        }

        $jumlah6=0;
        foreach ($tbl1 as $tabel1e){
            $jumlah6+=$tabel1e->domba;
        }

        $jumlah7=0;
        foreach ($tbl1 as $tabel1f){
            $jumlah7+=$tabel1f->babi;
        }

        $i=0;
        $tbl2=DB::table('peternakan_populasi_ternak_unggas')->get();


        $categories1 = [];
        $data1 = [];
        $data1a = [];
        $data1b = [];
        $data1c  = [];
        

      
        foreach ($tbl2 as $tabel2a){
            $categories1[] = $tabel2a->kecamatan;
            $data1[] = $tabel2a->ayam_kampung;
            $data1a[] = $tabel2a->ayam_pedaging;
            $data1b[] = $tabel2a->ayam_petelor;
            $data1c[] = $tabel2a->itik_itik_manila;
            
         
        }

        $jumlah8=0;
        foreach ($tbl2 as $tabel2){
            $jumlah8+=$tabel2->ayam_kampung;
        }

        $jumlah9=0;
        foreach ($tbl2 as $tabel2a){
            $jumlah9+=$tabel2a->ayam_pedaging;
        }

        $jumlah10=0;
        foreach ($tbl2 as $tabel2b){
            $jumlah10+=$tabel2b->ayam_petelor;
        }

        $jumlah11=0;
        foreach ($tbl2 as $tabel2c){
            $jumlah11+=$tabel2c->itik_itik_manila;
        }

        $i=0;
        $tbl3=DB::table('peternakan_jumlah_ternak_dipotong')->get();

        $categories3 = [];
        $data3 = [];
        $data3a = [];
        $data3b = [];
        $data3c = [];
        $data3d = [];
        $data3e = [];
        $data3f = [];
        

      
        foreach ($tbl3 as $tabel3){
            $categories1a[] = $tabel3->kecamatan;
            $data3[] = $tabel3->sapi_perah;
            $data3a[] = $tabel3->sapi_potong;
            $data3b[] = $tabel3->kerbau;
            $data3c[] = $tabel3->kuda;
            $data3d[] = $tabel3->kambing;
            $data3e[] = $tabel3->domba;
            $data3f[] = $tabel3->babi;
            
        }



        $jumlah12=0;
        foreach ($tbl3 as $tabel3){
            $jumlah12+=$tabel3->sapi_perah;
        }

        $jumlah13=0;
        foreach ($tbl3 as $tabel3a){
            $jumlah13+=$tabel3a->sapi_potong;
        }

        $jumlah14=0;
        foreach ($tbl3 as $tabel3b){
            $jumlah14+=$tabel3b->kerbau;
        }

        $jumlah15=0;
        foreach ($tbl3 as $tabel3c){
            $jumlah15+=$tabel3c->kuda;
        }

        
        $jumlah16=0;
        foreach ($tbl3 as $tabel3d){
            $jumlah16+=$tabel3d->kambing;
        }

        $jumlah17=0;
        foreach ($tbl3 as $tabel3e){
            $jumlah17+=$tabel3e->domba;
        }

        
        $jumlah18=0;
        foreach ($tbl3 as $tabel3f){
            $jumlah18+=$tabel3f->babi;
        }

        $tbl4=DB::table('peternakan_jumlah_ternak_unggas_dipotong')->get();
        
        $categories4 = [];
        $data4 = [];
        $data4a = [];
       
        

      
        foreach ($tbl4 as $tabel4){
            $categories4[] = $tabel4->kecamatan;
            $data4[] = $tabel4->ayam_kampung;
            $data4a[] = $tabel4->itik_itik_manila;
       
            
         
        }




        $jumlah19=0;
        foreach ($tbl4 as $tabel4){
            $jumlah19+=$tabel4->ayam_kampung;
        }
      
       
        $jumlah20=0;
        foreach ($tbl4 as $tabel4a){
            $jumlah20+=$tabel4a->itik_itik_manila;
        }

        $i=0;
        $tbl5=DB::table('peternakan_jumlah_produksi_ternak_unggas')->get();

        $categories5 = [];
        $data5 = [];
        $data5a = [];
        
      
        foreach ($tbl5 as $tabel5){
            $categories5[] = $tabel5->kecamatan;
            $data5[] = $tabel5->ayam_buras;
            $data5a[] = $tabel5->itik;
    
            
        }

        
        $jumlah21=0;
        foreach ($tbl5 as $tabel5){
            $jumlah21+=$tabel5->ayam_buras;
        }

        $jumlah22=0;
        foreach ($tbl5 as $tabel5a){
            $jumlah22+=$tabel5a->itik;
        }

        $i=0;
        $tbl6=DB::table('peternakan_jumlah_populasi_ternak_unggas')->get();

        $categories6 = [];
        $data6 = [];
        $data6a = [];
        
      
        foreach ($tbl6 as $tabel6){
            $categories6[] = $tabel6->kecamatan;
            $data6[] = $tabel6->ayam_buras;
            $data6a[] = $tabel6->itik;
    
            
        }
        
        $jumlah23=0;
        foreach ($tbl6 as $tabel6){
            $jumlah23+=$tabel6->ayam_buras;
        }

        $jumlah24=0;
        foreach ($tbl6 as $tabel6a){
            $jumlah24+=$tabel6a->itik;
        }


        $tbl7=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Babi')->get();

        $jumlahpenerima_kelompok_babi=0;
        $jumlahpenerima_ternak_babi=0;
        foreach ($tbl7 as $tabel7a){
            $jumlahpenerima_kelompok_babi+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_babi+=$tabel7a->jumlah_ternak;
        }

        $tbl7a=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kerbau')->get();

        $jumlahpenerima_kelompok_kerbau=0;
        $jumlahpenerima_ternak_kerbau=0;
        foreach ($tbl7a as $tabel7a){
            $jumlahpenerima_kelompok_kerbau+=$tabel7a->jumlah_kelompok;
            $jumlahpenerima_ternak_kerbau+=$tabel7a->jumlah_ternak;
        }

        $tbl7b=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Sapi')->get();

        $jumlahpenerima_kelompok_sapi=0;
        $jumlahpenerima_ternak_sapi=0;
        foreach ($tbl7b as $tabel7b){
            $jumlahpenerima_kelompok_sapi+=$tabel7b->jumlah_kelompok;
            $jumlahpenerima_ternak_sapi+=$tabel7b->jumlah_ternak;
        }


        $tbl7c=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Ayam')->get();

        $jumlahpenerima_kelompok_ayam=0;
        $jumlahpenerima_ternak_ayam=0;
        foreach ($tbl7c as $tabel7c){
            $jumlahpenerima_kelompok_ayam+=$tabel7c->jumlah_kelompok;
            $jumlahpenerima_ternak_ayam+=$tabel7c->jumlah_ternak;
        }

        $tbl7d=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Itik')->get();

        $jumlahpenerima_kelompok_itik=0;
        $jumlahpenerima_ternak_itik=0;
        foreach ($tbl7d as $tabel7d){
            $jumlahpenerima_kelompok_itik+=$tabel7d->jumlah_kelompok;
            $jumlahpenerima_ternak_itik+=$tabel7d->jumlah_ternak;
        }

        $tbl7e=DB::table('penerima_kelompok_bantuan_ternak')->where ('kategori', 'Penerima Ternak Kambing')->get();

        $jumlahpenerima_kelompok_kambing=0;
        $jumlahpenerima_ternak_kambing=0;
        foreach ($tbl7e as $tabel7e){
            $jumlahpenerima_kelompok_kambing+=$tabel7e->jumlah_kelompok;
            $jumlahpenerima_ternak_kambing+=$tabel7e->jumlah_ternak;
        }

     
        $i=0;
        $tbl8=DB::table('perkebunan_luas_dan_produksi_kopi_dan_kakao')->get();

        $categories8 = [];
        $data8 = [];
        $data8a = [];
        $data8b = [];
        $data8c = [];
        $data8d = [];
        $data8e = [];
       
        
      
        foreach ($tbl8 as $tabel8){
            $categories8[] = $tabel8->kecamatan;
            $data8[] = $tabel8->luas_areal_kopi;
            $data8a[] = $tabel8->produksi_kopi;
            $data8b[] = $tabel8->produktivitas_kopi;
            $data8c[] = $tabel8->luas_areal_kakao;
            $data8d[] = $tabel8->produksi_kakao;
            $data8e[] = $tabel8->produktivitas_kakao;
            
        }
        
        $jumlah25=0;
        foreach ($tbl8 as $tabel8){
            $jumlah25+=$tabel8->luas_areal_kopi;
        }

        $jumlah26=0;
        foreach ($tbl8 as $tabel8a){
            $jumlah26+=$tabel8a->produksi_kopi;
        }

        $jumlah27=0;
        foreach ($tbl8 as $tabel8b){
            $jumlah27+=$tabel8b->produktivitas_kopi;
        }

        $jumlah28=0;
        foreach ($tbl8 as $tabel8c){
            $jumlah28+=$tabel8c->luas_areal_kakao;
        }

        $jumlah29=0;
        foreach ($tbl8 as $tabel8d){
            $jumlah29+=$tabel8d->produksi_kakao;
        }

        $jumlah30=0;
        foreach ($tbl8 as $tabel8e){
            $jumlah30+=$tabel8e->produktivitas_kakao;
        }

        $i=0;
        $tbl9=DB::table('perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit')->get();

        $categories9 = [];
        $data9 = [];
        $data9a = [];
        $data9b = [];
        $data9c = [];
        $data9d = [];
        $data9e = [];
       
        
      
        foreach ($tbl9 as $tabel9){
            $categories9[] = $tabel9->kecamatan;
            $data9[] = $tabel9->luas_areal_karet;
            $data9a[] = $tabel9->produksi_karet;
            $data9b[] = $tabel9->produktivitas_karet;
            $data9c[] = $tabel9->luas_areal_kelapa_sawit;
            $data9d[] = $tabel9->produksi_kelapa_sawit;
            $data9e[] = $tabel9->produktivitas_kelapa_sawit;
            
        }
        
        $jumlah31=0;
        foreach ($tbl9 as $tabel9){
            $jumlah31+=$tabel9->luas_areal_karet;
        }

        $jumlah32=0;
        foreach ($tbl9 as $tabel9a){
            $jumlah32+=$tabel9a->produksi_karet;
        }

        $jumlah33=0;
        foreach ($tbl9 as $tabel9b){
            $jumlah33+=$tabel9b->produktivitas_karet;
        }

        
        $jumlah34=0;
        foreach ($tbl9 as $tabel9c){
            $jumlah34+=$tabel9c->luas_areal_kelapa_sawit;
        }

          
        $jumlah35=0;
        foreach ($tbl9 as $tabel9d){
            $jumlah35+=$tabel9d->produksi_kelapa_sawit;
        }

        $jumlah36=0;
        foreach ($tbl9 as $tabel9e){
            $jumlah36+=$tabel9e->produktivitas_kelapa_sawit;
        }

        $i=0;
        $tbl10=DB::table('perkebunan_luas_dan_produksi_aren_dan_kemiri')->get();

        
        $categories10 = [];
        $data10 = [];
        $data10a = [];
        $data10b = [];
        $data10c = [];
        $data10d = [];
        $data10e = [];
       
        
      
        foreach ($tbl10 as $tabel10){
            $categories10[] = $tabel10->kecamatan;
            $data10[] = $tabel10->luas_areal_aren;
            $data10a[] = $tabel10->produksi_aren;
            $data10b[] = $tabel10->produktivitas_aren;
            $data10c[] = $tabel10->luas_areal_kemiri;
            $data10d[] = $tabel10->produksi_kemiri;
            $data10e[] = $tabel10->produktivitas_kemiri;
            
        }

        $jumlah37=0;
        foreach ($tbl10 as $tabel10){
            $jumlah37+=$tabel10->luas_areal_aren;
        }

        $jumlah38=0;
        foreach ($tbl10 as $tabel10a){
            $jumlah38+=$tabel10a->produksi_aren;
        }

        $jumlah39=0;
        foreach ($tbl10 as $tabel10b){
            $jumlah39+=$tabel10b->produktivitas_aren;
        }

        $jumlah40=0;
        foreach ($tbl10 as $tabel10c){
            $jumlah40+=$tabel10c->luas_areal_kemiri;
        }

        $jumlah41=0;
        foreach ($tbl10 as $tabel10d){
            $jumlah41+=$tabel10d->produksi_kemiri;
        }

        
        $jumlah42=0;
        foreach ($tbl10 as $tabel10e){
            $jumlah42+=$tabel10e->produktivitas_kemiri;
        }

        $i=0;
        $tbl11=DB::table('perkebunan_luas_dan_produksi_kelapa_dan_pinang')->get();

        $categories11 = [];
        $data11 = [];
        $data11a = [];
        $data11b = [];
        $data11c = [];
        $data11d = [];
        $data11e = [];
       
        
      
        foreach ($tbl11 as $tabel11){
            $categories11[] = $tabel11->kecamatan;
            $data11[] = $tabel11->luas_areal_kelapa;
            $data11a[] = $tabel11->produksi_kelapa;
            $data11b[] = $tabel11->produktivitas_kelapa;
            $data11c[] = $tabel11->luas_areal_pinang;
            $data11d[] = $tabel11->produksi_pinang;
            $data11e[] = $tabel11->produktivitas_pinang;
            
        }


        $jumlah43=0;
        foreach ($tbl11 as $tabel11){
            $jumlah43+=$tabel11->luas_areal_kelapa;
        }

        $jumlah44=0;
        foreach ($tbl11 as $tabel11a){
            $jumlah44+=$tabel11a->produksi_kelapa;
        }

        $jumlah45=0;
        foreach ($tbl11 as $tabel11b){
            $jumlah45+=$tabel11b->produktivitas_kelapa;
        }

        $jumlah46=0;
        foreach ($tbl11 as $tabel11c){
            $jumlah46+=$tabel11c->luas_areal_pinang;
        }

        
        $jumlah47=0;
        foreach ($tbl11 as $tabel11d){
            $jumlah47+=$tabel11d->produksi_pinang;
        }

        $jumlah48=0;
        foreach ($tbl11 as $tabel11e){
            $jumlah48+=$tabel11e->produktivitas_pinang;
        }


        $i=0;
        $tbl12=DB::table('perkebunan_luas_dan_produksi_andaliman_dan_nilam')->get();

        $categories12 = [];
        $data12 = [];
        $data12a = [];
        $data12b = [];
        $data12c = [];
        $data12d = [];
        $data12e = [];
       
        
      
        foreach ($tbl12 as $tabel12){
            $categories12[] = $tabel12->kecamatan;
            $data12[] = $tabel12->luas_areal_andaliman;
            $data12a[] = $tabel12->produksi_andaliman;
            $data12b[] = $tabel12->produktivitas_andaliman;
            $data12c[] = $tabel12->luas_areal_nilam;
            $data12d[] = $tabel12->produksi_nilam;
            $data12e[] = $tabel12->produktivitas_nilam;
            
        }

        $jumlah49=0;
        foreach ($tbl12 as $tabel12){
            $jumlah49+=$tabel12->luas_areal_andaliman;
        }

        
        $jumlah50=0;
        foreach ($tbl12 as $tabel12a){
            $jumlah50+=$tabel12a->produksi_andaliman;
        }

        $jumlah51=0;
        foreach ($tbl12 as $tabel12b){
            $jumlah51+=$tabel12b->produktivitas_andaliman;
        }

        $jumlah52=0;
        foreach ($tbl12 as $tabel12c){
            $jumlah52+=$tabel12c->luas_areal_nilam;
        }

        $jumlah53=0;
        foreach ($tbl12 as $tabel12d){
            $jumlah53+=$tabel12d->produksi_nilam;
        }

        $jumlah54=0;
        foreach ($tbl12 as $tabel12e){
            $jumlah54+=$tabel12e->produktivitas_nilam;
        }

        $i=0;
        $tbl13=DB::table('perindustrian_industri_kecil_dan_menengah')->get();

        $categories13 = [];
        $data13 = [];
        $data13a = [];
        $data13b = [];
        $data13c = [];
        $data13d = [];
        $data13e = [];
        $data13f = [];
        $data13g = [];
        $data13h = [];
        $data13i = [];
       
        
      
        foreach ($tbl13 as $tabel13){
            $categories13[] = $tabel13->kecamatan;
            $data13[] = $tabel13->pangan_unit;
            $data13a[] = $tabel13->pangan_tenaga_kerja;
            $data13b[] = $tabel13->sandang_dan_kulit_unit;
            $data13c[] = $tabel13->sandang_dan_kulit_tenaga_kerja;
            $data13d[] = $tabel13->kimia_dan_bahan_bangunan_unit;
            $data13e[] = $tabel13->kimia_dan_bahan_bangunan_tenaga_kerja;
            $data13f[] = $tabel13->kerajinan_umum_unit;
            $data13g[] = $tabel13->kerajinan_umum_tenaga_kerja;
            $data13h[] = $tabel13->logam_metal_unit;
            $data13i[] = $tabel13->logam_metal_unit;
            
            
        }

        $jumlah55=0;
        foreach ($tbl13 as $tabel13){
            $jumlah55+=$tabel13->pangan_unit;
        }

        
        $jumlah56=0;
        foreach ($tbl13 as $tabel13a){
            $jumlah56+=$tabel13a->pangan_tenaga_kerja;
        }

        $jumlah57=0;
        foreach ($tbl13 as $tabel13b){
            $jumlah57+=$tabel13b->sandang_dan_kulit_unit;
        }

        $jumlah58=0;
        foreach ($tbl13 as $tabel13c){
            $jumlah58+=$tabel13c->sandang_dan_kulit_tenaga_kerja;
        }

        
        $jumlah59=0;
        foreach ($tbl13 as $tabel13d){
            $jumlah59+=$tabel13d->kimia_dan_bahan_bangunan_unit;
        }

        $jumlah60=0;
        foreach ($tbl13 as $tabel13e){
            $jumlah60+=$tabel13e->kimia_dan_bahan_bangunan_tenaga_kerja;
        }

        $jumlah61=0;
        foreach ($tbl13 as $tabel13f){
            $jumlah61+=$tabel13f->kerajinan_umum_unit;
        }

        $jumlah62=0;
        foreach ($tbl13 as $tabel13g){
            $jumlah62+=$tabel13g->kerajinan_umum_tenaga_kerja;
        }

        $jumlah63=0;
        foreach ($tbl13 as $tabel13h){
            $jumlah63+=$tabel13h->logam_metal_unit;
        }

        $jumlah64=0;
        foreach ($tbl13 as $tabel13i){
            $jumlah64+=$tabel13i->logam_metal_tenaga_kerja;
        }

        $jumlah65=0;
        foreach ($tbl13 as $tabel13j){
            $jumlah65+=$tabel13j->pangan_unit + $tabel13j->sandang_dan_kulit_unit + $tabel13j->kimia_dan_bahan_bangunan_unit + $tabel13j->kerajinan_umum_unit + $tabel13j->logam_metal_unit;
        }

        $jumlah66=0;
        foreach ($tbl13 as $tabel13k){
            $jumlah66+=$tabel13k->pangan_tenaga_kerja + $tabel13k->sandang_dan_kulit_tenaga_kerja + $tabel13k->kimia_dan_bahan_bangunan_tenaga_kerja + $tabel13k->kerajinan_umum_tenaga_kerja + $tabel13k->logam_metal_tenaga_kerja;
        }

        $i=0;
        $tbl14=DB::table('perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah')->get();     
        $categories14 = [];
        $data14 = [];
        $data14a = [];
        foreach ($tbl14 as $tabel14a){
            $categories14[] = $tabel14a->kecamatan;
            $data14[] = $tabel14a->industri_kecil_dan_menengah;
            $data14a[] = $tabel14a->tenaga_kerja;
        }

        $jumlah67=0;
        foreach ($tbl14 as $tabel14){
            $jumlah67+=$tabel14->industri_kecil_dan_menengah;
        }

        $jumlah68=0;
        foreach ($tbl14 as $tabel14a){
            $jumlah68+=$tabel14a->tenaga_kerja;
        }

        $i=0;
        $tbl15=DB::table('teknologi_jumlah_menara')->get();

        $categories15 = [];
        $data15 = [];
       
        foreach ($tbl15 as $tabel15){
            $categories15[] = $tabel15->kecamatan;
            $data15[] = $tabel15->jumlah_menara;
          
        }
       
        $jumlah69=0;
        foreach ($tbl15 as $tabel15){
            $jumlah69+=$tabel15->jumlah_menara;
        }




        $tbl16=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Tampahan')->get();
        $tbl16a=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Balige')->get();
        $tbl16b=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Laguboti')->get();
        $tbl16c=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Sigumpar')->get();
        $tbl16d=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Silaen')->get();
        $tbl16e=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Habinsaran')->get();
        $tbl16f=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Borbor')->get();
        $tbl16g=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Nassau')->get();
        $tbl16h=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Siantar Narumonda')->get();
        $tbl16i=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Porsea')->get();
        $tbl16j=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Parmaksian')->get();
        $tbl16k=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Pintu Pohan Meranti')->get();
        $tbl16l=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Uluan')->get();
        $tbl16m=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Lumban Julu')->get();
        $tbl16n=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Bonatua Lunasi')->get();
        $tbl16o=DB::table('teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara')->where ('kategori_kecamatan', 'Kec. Ajibata')->get();

 




        $tbl17=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Tampahan')->get();
        $tbl17a=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Balige')->get();
        $tbl17b=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Laguboti')->get();
        $tbl17c=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Sigumpar')->get();
        $tbl17d=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Silaen')->get();
        $tbl17e=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Habinsaran')->get();
        $tbl17f=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Borbor')->get();
        $tbl17g=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Nassau')->get();
        $tbl17h=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Siantar Narumonda')->get();
        $tbl17i=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Porsea')->get();
        $tbl17j=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Parmaksian')->get();
        $tbl17k=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Pintu Pohan Meranti')->get();
        $tbl17l=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Uluan')->get();
        $tbl17m=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Lumban Julu')->get();
        $tbl17n=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Bonatua Lunasi')->get();
        $tbl17o=DB::table('teknologi_daftar_internet_game_monitoring')->where ('kecamatan', 'Kecamatan Ajibata')->get();


        $i=0;
        $tbl18=DB::table('teknologi_jumlah_desa_blank_spot')->get();


        $categories18 = [];
        $data18 = [];
      
       
        
      
        foreach ($tbl18 as $tabel18){
            $categories18[] = $tabel18->kecamatan;
            $data18[] = $tabel18->data_blank_spot;
           
            
        }

        $jumlah70=0;
        foreach ($tbl18 as $tabel18){
            $jumlah70+=$tabel18->data_blank_spot;
        }

        //kependudukan dan kesehataan
        $tbl21=DB::table('kependudukan_jumlah_penduduk')->get();
        $jumlah_laki_laki=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_laki_laki+=$tabel21->laki_laki;
        }
        $jumlah_perempuan=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_perempuan+=$tabel21->perempuan;
        }
        $jumlah_total=0;
        foreach ($tbl21 as $tabel21){
            $jumlah_total+=$tabel21->laki_laki+$tabel21->perempuan;
        }
        $categories21 = [];
        $data21 = [];
        $data21a = [];
        foreach ($tbl21 as $tabel21){
            $categories21[] = $tabel21->kecamatan;
            $data21[] = $tabel21->laki_laki;
            $data21a[] = $tabel21->perempuan;
        }

        //kependudukan jumlah akta 
        $tbl22=DB::table('kependudukan_jumlah_akta')->get();
        $jumlah_kelahiran=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_kelahiran+=$tabel22->akta_kelahiran;
        }
        $jumlah_perkawinan=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perkawinan+=$tabel22->akta_perkawinan;
        }
        $jumlah_perceraian=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_perceraian+=$tabel22->akta_perceraian;
        }
        $jumlah_yang_memiliki_ektp=0;
        foreach ($tbl22 as $tabel22){
            $jumlah_yang_memiliki_ektp+=$tabel22->yang_memiliki_ektp;
        }
        
        //tenaga kerja
        $tbl23=DB::table('kependudukan_tenaga_kerja')->get();

        //kesehatan rekapitulasi penyandang masalah kesejahteraan sosial
        $tbl24=DB::table('kesehatan_penyandang_masalah_kesejahteraan_sosial')->get();
        $jumlah_rastra=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_rastra+=$tabel24->rastra_non_PKH;
        }
        $jumlah_RLTH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_RLTH+=$tabel24->RLTH;
        }
        $jumlah_KUBE=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KUBE+=$tabel24->KUBE;
        }
        $jumlah_pendamping_anak=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_pendamping_anak+=$tabel24->pendamping_anak_berhadapan_dengan_hukum;
        }
        $jumlah_KAT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_KAT+=$tabel24->KAT;
        }
        $jumlah_PKH=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_PKH+=$tabel24->PKH;
        }
        $jumlah_ASLUT=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASLUT+=$tabel24->ASLUT;
        }
        $jumlah_ASPD=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ASPD+=$tabel24->ASPD;
        }
        $jumlah_ODHA=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_ODHA+=$tabel24->ODHA;
        }
        $jumlah_UEP_lansia=0;
        foreach ($tbl24 as $tabel24){
            $jumlah_UEP_lansia+=$tabel24->UEP_lansia;
        }

       //kesehatan jumlah dokter
        $tbl25=DB::table('kesehatan_jumlah_dokter')->get();
        $jumlah_dokter_umum=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_umum+=$tabel25->dokter_umum;
        }
        $jumlah_dokter_gigi=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_gigi+=$tabel25->dokter_gigi;
        }
        $jumlah_dokter_spesialis=0;
        foreach ($tbl25 as $tabel25){
            $jumlah_dokter_spesialis+=$tabel25->dokter_spesialis;
        }
        $categories25 = [];
        $data25 = [];
        $data25a = [];
        $data25b = [];
        foreach ($tbl25 as $tabel25){
            $categories25[] = $tabel25->unit_kerja;
            $data25[] = $tabel25->dokter_umum;
            $data25a[] = $tabel25->dokter_gigi;
            $data25b[] = $tabel25->dokter_spesialis;
        }
        //kesehatan jumlah tenaga ksesehatan
        $tbl26=DB::table('kesehatan_jumlah_tenaga_kesehatan')->get();
        $jumlah_tenaga_medis=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_medis+=$tabel26->tenaga_medis;
        }
        $jumlah_tenaga_keperawatan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_keperawatan+=$tabel26->tenaga_keperawatan;
        }
        $jumlah_tenaga_kebidanan=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kebidanan+=$tabel26->tenaga_kebidanan;
        }
        $jumlah_tenaga_kefarmasian=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kefarmasian+=$tabel26->tenaga_kefarmasian;
        }
        $jumlah_tenaga_kesehatan_lainnya=0;
        foreach ($tbl26 as $tabel26){
            $jumlah_tenaga_kesehatan_lainnya+=$tabel26->tenaga_kesehatan_lainnya;
        }
        //kesehatan jumlah fasilitas kesehatan
        $tbl27=DB::table('kesehatan_jumlah_fasilitas_kesehatan')->get();
        $jumlah_rumah_sakit=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_sakit+=$tabel27->rumah_sakit;
        }
        $jumlah_rumah_bersalin=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_rumah_bersalin+=$tabel27->rumah_bersalin;
        }
        $jumlah_puskesmas=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas+=$tabel27->puskesmas;
        }
        $jumlah_puskesmas_pembantu=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_puskesmas_pembantu+=$tabel27->puskesmas_pembantu;
        }
        $jumlah_poskesdes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_poskesdes+=$tabel27->poskesdes;
        }
        $jumlah_balai_kesehatan=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_balai_kesehatan+=$tabel27->balai_kesehatan;
        }
        $jumlah_polindes=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_polindes+=$tabel27->polindes;
        }
        $jumlah_apotek=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_apotek+=$tabel27->apotek;
        }
        $jumlah_toko_obat=0;
        foreach ($tbl27 as $tabel27){
            $jumlah_toko_obat+=$tabel27->toko_obat;
        }
        //kesehatan jumlah kasus penyakit
        $tbl28=DB::table('kesehatan_jumlah_kasus_penyakit_terbanyak')->get();
        $categories28 = [];
        $data28 = [];
        foreach ($tbl28 as $tabel28){
            $categories28[] = $tabel28->jenis_penyakit;
            $data28[] = $tabel28->jumlah_kunjungan;
        }

        //kesehatan jumlah akseptor
        $tbl29=DB::table('kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi')->get();
        $jumlah_iud=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_iud+=$tabel29->iud;
        }
        $jumlah_mow=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mow+=$tabel29->mow;
        }
        $jumlah_mop=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_mop+=$tabel29->mop;
        }
        $jumlah_implant=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_implant+=$tabel29->implant;
        }
        $jumlah_suntik=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_suntik+=$tabel29->suntik;
        }
        $jumlah_pil=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_pil+=$tabel29->pil;
        }
        $jumlah_kondom=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_kondom+=$tabel29->kondom;
        }
        $jumlah_jumlah_akseptor=0;
        foreach ($tbl29 as $tabel29){
            $jumlah_jumlah_akseptor+=$tabel29->jumlah;
        }
        //kesehatan jumlah bayi lahir
        $tbl30=DB::table('kesehatan_jumlah_bayi_bblr')->get();
        $jumlah_bayi_lahir=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_bayi_lahir+=$tabel30->bayi_lahir;
        }
        $jumlah_BBLR_jumlah=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_jumlah+=$tabel30->BBLR_jumlah;
        }
        $jumlah_BBLR_dirujuk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_dirujuk+=$tabel30->BBLR_dirujuk;
        }
        $jumlah_BBLR_giji_buruk=0;
        foreach ($tbl30 as $tabel30){
            $jumlah_BBLR_giji_buruk+=$tabel30->BBLR_giji_buruk;
        }

        //kesehatan daftar panti asuhan
        $tbl31=DB::table('kesehatan_daftar_panti_asuhan')->get();


        //pendidikan dan pariwisata

        $tbl33=DB::table('pariwisata_jumlah_wisata')->paginate(10);
        $jumlahpariwisata=0;
        foreach ($tbl33 as $tabel33){
            $jumlahpariwisata+=$tabel33->wisata_asing;
        }

        $categories33 = [];
        $data33 = [];
        $data33a = [];
        foreach ($tbl33 as $tabel33a){
            $categories33[] = $tabel33a->bulan;
            $data33[] = $tabel33a->wisata_asing*100;
            $data33a[] = $tabel33a->wisata_nusantara;
        }

        $jumlahnusantara=0;
        foreach ($tbl33 as $tabel33a){
            $jumlahnusantara+=$tabel33a->wisata_nusantara;
        }

        $tbl34=DB::table('pariwisata_hotel')->paginate(10);
        
        $jumlahkamar=0;
        foreach ($tbl34 as $tabel34){
            $jumlahkamar+=$tabel34->jumlah_kamar;
        }

        $tbl35=DB::table('pariwisata_jenis_kapal')->paginate(10);
        $jumlahkapal=0;
        foreach ($tbl35 as $tabel35){
            $jumlahkapal+=$tabel35->perahu_tanpa_motor;
        }
        $jumlahkapal1=0;
        foreach ($tbl35 as $tabel35a){
            $jumlahkapal1+=$tabel35a->perahu_motor_tempel;
        }$jumlahkapal2=0;
        foreach ($tbl35 as $tabel35b){
            $jumlahkapal2+=$tabel35b->kapal_motor;
        }

        $categories35 = [];
        $data35 = [];
        $data35a = [];
        $data35b = [];
        foreach ($tbl35 as $tabel35a){
            $categories35[] = $tabel35a->kecamatan;
            $data35[] = $tabel35a->perahu_tanpa_motor;
            $data35a[] = $tabel35a->perahu_motor_tempel;
            $data35b[] = $tabel35a->kapal_motor;
        }

        $tbl36=DB::table('pariwisata_objek_wisata')->paginate(10);
        $tbl37=DB::table('pariwisata_kunjungan_kapal')->paginate(10);
        $jumlahkunjungan=0;
        foreach ($tbl37 as $tabel37){
            $jumlahkunjungan+=$tabel37->jumlah_kapal;
        }

        $jumlahkunjungan1=0;
        foreach ($tbl37 as $tabel37a){
            $jumlahkunjungan1+=$tabel37a->jumlah_penumpang;
        }

        $jumlahkunjungan2=0;
        foreach ($tbl37 as $tabel37b){
            $jumlahkunjungan2+=$tabel37b->jumlah_barang;
        }

        $categories34 = [];
        $data34 = [];
        $data34a = [];
        $data34b = [];
        foreach ($tbl37 as $tabel37a){
            $categories34[] = $tabel37a->kecamatan;
            $data34[] = $tabel37a->jumlah_kapal*10;
            $data34a[] = $tabel37a->jumlah_penumpang*10;
            $data34b[] = $tabel37a->jumlah_barang*10;
        }

        $tbl38=DB::table('pariwisata_restoran')->paginate(10);
        $jumlahrestoran=0;
        foreach ($tbl38 as $tabel38){
            $jumlahrestoran+=$tabel38->jumlah;
        }

        $categories38 = [];
        $data38 = [];
        foreach ($tbl38 as $tabel38a){
            $categories38[] = $tabel38a->kecamatan;
            $data38[] = $tabel38a->jumlah;
        }
        //pendidikan
        $tbl39=DB::table('pendidikan_paud')->paginate(10);
 $categories39 = [];
        $data39 = [];
        $data39a = [];
        $data39b = [];
        $data39c = [];
        $data39d = [];
        $data39e = [];
        foreach ($tbl39 as $tabel39a){
            $categories39[] = $tabel39a->kecamatan;
            $data39[] = $tabel39a->jumlah_paud;
            $data39a[] = $tabel39a->jumlah_guru;
            $data39b[] = $tabel39a->jumlah_murid;
            $data39c[] = $tabel39a->negeri;
            $data39d[] = $tabel39a->swasta;
            $data39e[] = $tabel39a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $jumlahpendidikan=0;
        foreach ($tbl39 as $tabel39){
            $jumlahpendidikan+=$tabel39->jumlah_paud;
        }
        $jumlahpendidikan1=0;
        foreach ($tbl39 as $tabel39a){
            $jumlahpendidikan1+=$tabel39a->jumlah_guru;
        }
        $jumlahpendidikan2=0;
        foreach ($tbl39 as $tabel39b){
            $jumlahpendidikan2+=$tabel39b->jumlah_murid;
        }
        $jumlahpendidikan3=0;
        foreach ($tbl39 as $tabel39c){
            $jumlahpendidikan3+=$tabel39c->negeri;
        }
        $jumlahpendidikan4=0;
        foreach ($tbl39 as $tabel39d){
            $jumlahpendidikan4+=$tabel39d->swasta;
        }
        $jumlahpendidikan5=0;
        foreach ($tbl39 as $tabel39e){
            $jumlahpendidikan5+=$tabel39e->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $tbl40=DB::table('pendidikan_sd')->paginate(10);
       $categories40 = [];
        $data40 = [];
        $data40a = [];
        $data40b = [];
        $data40c = [];
        $data40d = [];
        $data40e = [];
        foreach ($tbl40 as $tabel40a){
            $categories40[] = $tabel40a->kecamatan;
            $data40[] = $tabel40a->jumlah_sd;
            $data40a[] = $tabel40a->jumlah_guru;
            $data40b[] = $tabel40a->jumlah_murid;
            $data40c[] = $tabel40a->negeri; 
            $data40d[] = $tabel40a->swasta;
            $data40e[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;
        }

        $categories36 = [];
        $data36 = [];
        $data36a = [];
        $data36b = [];
        foreach ($tbl40 as $tabel40a){
            $categories36[] = $tabel40a->kecamatan;
            $data36[] = $tabel40a->negeri;
            $data36a[] = $tabel40a->swasta;
            $data36b[] = $tabel40a->Madrasah_Ibtidaiyah_Tsanawiyah;}

        $jumlahsd=0;
        foreach ($tbl40 as $tabel40){
            $jumlahsd+=$tabel40->jumlah_sd;
        }
        $jumlahsd1=0;
        foreach ($tbl40 as $tabel40a){
            $jumlahsd1+=$tabel40a->jumlah_guru;
        }
        $jumlahsd2=0;
        foreach ($tbl40 as $tabel40b){
            $jumlahsd2+=$tabel40b->jumlah_murid;
        }
        $jumlahsd3=0;
        foreach ($tbl40 as $tabel40c){
            $jumlahsd3+=$tabel40c->negeri;
        }
        $jumlahsd4=0;
        foreach ($tbl40 as $tabel40d){
            $jumlahsd4+=$tabel40d->swasta;
        }
        $jumlahsd5=0;
        foreach ($tbl40 as $tabel40e){
            $jumlahsd5+=$tabel40e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        $tbl41=DB::table('pendidikan_sltp')->paginate(10);
        $categories41 = []; 
        $data41 = [];
        $data41a = [];
        $data41b = [];
        $data41c = [];
        $data41d = [];
        $data41e = [];
        foreach ($tbl41 as $tabel41a){
            $categories41[] = $tabel41a->kecamatan;
            $data41[] = $tabel41a->jumlah_sltp;
            $data41a[] = $tabel41a->jumlah_guru;
            $data41b[] = $tabel41a->jumlah_murid;
            $data41c[] = $tabel41a->negeri;
            $data41d[] = $tabel41a->swasta;
            $data41e[] = $tabel41a->Madrasah_Ibtidaiyah_Tsanawiyah;
        $jumlahsltp=0;
        foreach ($tbl41 as $tabel41){
            $jumlahsltp+=$tabel41->jumlah_sltp;
        }
        $jumlahsltp1=0;
        foreach ($tbl41 as $tabel41a){
            $jumlahsltp1+=$tabel40a->jumlah_guru;
        }
        $jumlahsltp2=0;
        foreach ($tbl41 as $tabel41b){
            $jumlahsltp2+=$tabel41b->jumlah_murid;
        }
        $jumlahsltp3=0;
        foreach ($tbl41 as $tabel41c){
            $jumlahsltp3+=$tabel41c->negeri;
        }
        $jumlahsltp4=0;
        foreach ($tbl41 as $tabel41d){
            $jumlahsltp4+=$tabel41d->swasta;
        }
        $jumlahsltp5=0;
        foreach ($tbl41 as $tabel41e){
            $jumlahsltp5+=$tabel41e->Madrasah_Ibtidaiyah_Tsanawiyah;}


        //pemerintahan dan infrastrukur

        $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        // $tbl43=DB::table('pemerintahan-jumlahdesakel')->paginate(10);
        $jumlah_desa=0;
        $jumlah_kelurahan=0;
        $jumlah_total=0;
        foreach ($tbl43 as $tabel43){
        $jumlah_desa+=$tabel43->Jumlah_Desa;
        $jumlah_kelurahan+=$tabel43->Jumlah_Kelurahan;
        $jumlah_total+=$tabel43->Jumlah_Desa+$tabel43->Jumlah_Kelurahan;
        }
        $categories43 = [];
        $data43a = [];
        $data43b = [];
        foreach ($tbl43 as $tabel43a){
            $categories43[] = $tabel43a->kecamatan;
            $data43a[] = $tabel43a->Jumlah_Desa;
            $data43b[] = $tabel43a->Jumlah_Kelurahan;
        }
        
    
        $tbl44=DB::table('pemerintahan-jlhpendudukwilayahkepadatan')->paginate(10);
        $tbl44c=DB::table('pemerintahan-jlhpendudukwilayahkepadatan');
        $jumlah_penduduk=0;
        $jumlah_luas_wilayah=0;
        $jumlah_kepadatan_penduduk=0;
        foreach ($tbl44 as $tabel44a){
        $jumlah_penduduk+=$tabel44a->Jlh_Penduduk;
        $jumlah_luas_wilayah+=$tabel44a->Luas_Wilayah;
        $jumlah_kepadatan_penduduk+=$tabel44a->Jlh_Penduduk/$tabel44a->Luas_Wilayah;
        }

        $categories44 = [];
        $data44a = [];
        $data44b = [];
        $data44c = [];
        foreach ($tbl44 as $tabel44b){
            $categories44[] = $tabel44b->kecamatan;
            $data44a[] = $tabel44b->Jlh_Penduduk;
            $data44b[] = $tabel44b->Luas_Wilayah;
            $data44c[] = $tabel44b->Jlh_Penduduk/$tabel44b->Luas_Wilayah;
        }
       
        $tbl45=DB::table('infrastruktur-aplikasiopdtoba')->paginate(10);
        $tbl46=DB::table('infrastruktur-panjangjalan')->paginate(10);
        $categories46 = [];
        $categories46a = [];
        $data46a = [];
        $data46b = [];
        foreach ($tbl46 as $tabel44b){
            $categories46[] = $tabel44b->keadaan;
            $categories46a[] = $tabel44b->kondisi_jalan;
            $data46a[] = $tabel44b->panjang_jalan_keadaan;
            $data46b[] = $tabel44b->panjang_jalan_kondisi_jalan;
            
        }
        $tbl47=DB::table('infrastruktur-panjangjalankabupaten')->paginate(10);
        $jumlah_panjang_jalan=0;
        foreach ($tbl47 as $tabel47){
            $jumlah_panjang_jalan+=$tabel47->panjang_jalan;
        }
        $categories47 = [];
        $data47a = [];
        foreach ($tbl47 as $tabel44b){
            $categories47[] = $tabel44b->kecamatan;
            $data47a[] = $tabel44b->panjang_jalan;
        }


        $tbl48=DB::table('infrastruktur-jembatan')->paginate(10);
        $categories48 = [];
        $data48a = [];
        foreach ($tbl48 as $tabel44b){
            $categories48[] = $tabel44b->keadaan;
            $data48a[] = $tabel44b->jumlah_jembatan;
        }
        $tbl49=DB::table('infrastruktur-pembangunanbersumberdanadesa')->paginate(10);
        $tbl50=DB::table('infrastruktur-pembagianpenetapanbagihasilpajak')->paginate(10);
        $tbl51=DB::table('infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa')->paginate(10);
        $tbl51a=Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa::select('kecamatan')->groupBy('kecamatan')->get();
        $categories51 = [];
        $data51a = [];
        $data51b = [];
        $data51c = [];
        foreach ($tbl51a as $tabel44b){
            $categories51[] = $tabel44b->kecamatan;
            $data51a[] = $tabel44b->alokasi_dasar;
            $data51b[] = $tabel44b->alokasi_formula;
            $data51c[] = $tabel44b->alokasi_dasar+$tabel44b->alokasi_formula;
        }
        $tbl52=DB::table('infrastruktur-perhitungan_dana_desa')->orderBy('kecamatan','asc')->paginate(10);
       
       
        $jumlah_alokasi_formula=0;
        foreach ($tbl52 as $tabel52){
            $jumlah_alokasi_formula+=$tabel52->alokasi_formula;
        }

        $jumlah_pengguna_dana_desa=0;
        foreach ($tbl52 as $tabel53a){ 
            $jumlah_pengguna_dana_desa=$tabel53a->alokasi_formula+$tabel53a->alokasi_dasar;
        }
        $tbl53=DB::table('infrastruktur-perhitungan_dana_desa')->groupBy('kecamatan')->get();
        $categories52 = [];
        $data52a = [];
        $data52b = [];
        $data52c = [];
        foreach ($tbl53 as $tabel52){
            $categories52[] = $tabel52->kecamatan;
            $data52a[] = $tabel52->alokasi_dasar;
            $data52b[] = $tabel52->alokasi_formula;
            $data52c[] = $tabel52->alokasi_dasar+$tabel52->alokasi_formula;
        }
            return view("pages.perawat_penyakit",  compact('tbl63a','tbl63','ketapang','tbl65','categories65','data65','tbl61','tbl62','categories63','data63',
            'tbl64','categories64','tbl64a','data64',
            'tbl1', 'jumlah1', 'i', 'tbl2', 'jumlah2', 'tbl3', 'jumlah3', 'tbl4', 'jumlah4', 'tbl5', 'jumlah5', 'tbl6', 'jumlah6', 'tbl7', 'jumlah7','tbl8', 'jumlah8', 
            'tbl9', 'jumlah9', 'jumlah10', 'jumlah11', 'tbl10', 'tbl11', 'tbl12', 'tbl13', 'tbl14', 'tbl15', 'tbl16', 'tbl17', 'tbl18', 'jumlah12', 'jumlah13', 'jumlah14', 'jumlah15', 
            'jumlah16', 'tbl16a', 'tbl16b', 'tbl16c', 'tbl16d', 'tbl16e', 'tbl16f', 'tbl16g', 'tbl16h', 'tbl16i', 'tbl16j', 'tbl16k', 'tbl16l', 'tbl16m', 'tbl16n', 'tbl16o',
            'jumlah17', 'tbl17a', 'tbl17b', 'tbl17c', 'tbl17d', 'tbl17e', 'tbl17f', 'tbl17g', 'tbl17h', 'tbl17i', 'tbl17j', 'tbl17k', 'tbl17l', 'tbl17m', 'tbl17n', 'tbl17o',
            'jumlah18', 'jumlah19', 'jumlah20', 'jumlah21', 'jumlah22', 'jumlah23', 'jumlah24', 'jumlah25', 'jumlah26', 'jumlah27', 'jumlah28', 'jumlah29', 'jumlah30',
            'jumlah31','jumlah32', 'jumlah33', 'jumlah34', 'jumlah35', 'jumlah36', 'jumlah37', 'jumlah38', 'jumlah39', 'jumlah40', 'jumlah41', 'jumlah42', 'jumlah43', 'jumlah44', 'jumlah45', 'jumlah46',
            'jumlah47', 'jumlah48', 'jumlah49', 'jumlah50', 'jumlah51', 'jumlah52', 'jumlah53', 'jumlah54', 'jumlah55', 'jumlah56', 'jumlah57', 'jumlah58', 'jumlah59', 'jumlah60', 'jumlah61', 'jumlah62', 'jumlah63','jumlah64', 
            'jumlah65', 'jumlah66', 'jumlah67', 'jumlah68', 'jumlah69', 'jumlah70',
            'jumlahpenerima_kelompok_babi', 'jumlahpenerima_ternak_babi', 'tbl7a', 'jumlahpenerima_kelompok_kerbau', 'jumlahpenerima_ternak_kerbau', 'tbl7b', 'jumlahpenerima_kelompok_sapi', 'jumlahpenerima_ternak_sapi',
            'tbl7c', 'jumlahpenerima_kelompok_ayam', 'jumlahpenerima_ternak_ayam',
            'tbl7d', 'jumlahpenerima_kelompok_itik', 'jumlahpenerima_ternak_itik',
            'tbl7e', 'jumlahpenerima_kelompok_kambing', 'jumlahpenerima_ternak_kambing',
            'categories1a', 'data1a1', 'data1a2', 'data1a3', 'data1a4', 'data1a5', 'data1a6', 'data1a7',
            'categories1', 'data1', 'data1a', 'data1b', 'data1c', 
            'categories3', 'data3', 'data3a', 'data3b', 'data3c', 'data3d', 'data3e', 'data3f',
            'categories4', 'data4', 'data4a', 
            'categories5', 'data5', 'data5a', 
            'categories6', 'data6', 'data6a', 
            'categories8', 'data8', 'data8a', 'data8b', 'data8c', 'data8d', 'data8e',
            'categories9', 'data9', 'data9a', 'data9b', 'data9c', 'data9d', 'data9e',
            'categories10', 'data10', 'data10a', 'data10b', 'data10c', 'data10d', 'data10e',
            'categories11', 'data11', 'data11a', 'data11b', 'data11c', 'data11d', 'data11e',
            'categories12', 'data12', 'data12a', 'data12b', 'data12c', 'data12d', 'data12e',
            'categories13', 'data13', 'data13a', 'data13b', 'data13c', 'data13d', 'data13e', 'data13f', 'data13g', 'data13h', 'data13i',
            'categories14', 'data14', 'data14a',
            'categories15', 'data15',
            'categories18', 'data18',
            'tbl21','i', 'tbl22', 'tbl23', 'tbl24', 'tbl25', 'tbl26', 'tbl27', 'tbl28', 'tbl29','tbl30', 'tbl31',
            'jumlah_kelahiran', 'jumlah_perkawinan', 'jumlah_perceraian', 'jumlah_yang_memiliki_ektp',
            'jumlah_laki_laki', 'jumlah_perempuan', 'jumlah_total', 'jumlah_rastra', 'jumlah_RLTH', 
            'jumlah_KUBE', 'jumlah_pendamping_anak', 'jumlah_KAT', 'jumlah_PKH', 'jumlah_ASLUT', 
            'jumlah_ASPD', 'jumlah_ODHA', 'jumlah_UEP_lansia','jumlah_dokter_umum', 'jumlah_dokter_gigi',
            'jumlah_dokter_spesialis','jumlah_tenaga_medis', 'jumlah_tenaga_keperawatan', 
            'jumlah_tenaga_kebidanan','jumlah_tenaga_kefarmasian', 'jumlah_tenaga_kesehatan_lainnya', 
            'jumlah_rumah_sakit', 'jumlah_rumah_bersalin','jumlah_puskesmas', 'jumlah_puskesmas_pembantu',
            'jumlah_poskesdes', 'jumlah_balai_kesehatan', 'jumlah_polindes', 'jumlah_apotek',
            'jumlah_toko_obat', 'jumlah_iud', 'jumlah_mow', 'jumlah_mop', 'jumlah_implant', 'jumlah_suntik', 
            'jumlah_pil', 'jumlah_kondom', 'jumlah_jumlah_akseptor', 'jumlah_bayi_lahir', 'jumlah_BBLR_jumlah',
            'jumlah_BBLR_dirujuk', 'jumlah_BBLR_giji_buruk', 'categories21','data21', 'data21a','categories25','data25',
            'data25a', 'data25b', 'categories28','data28',
            'categories40','categories36','categories38','categories39','categories33','categories34','categories35','jumlahrestoran','jumlahkapal'
            ,'jumlahkapal1','jumlahkapal2','jumlahkunjungan','jumlahkunjungan1','jumlahkunjungan2','jumlahkamar','jumlahnusantara','jumlahpariwisata','tbl33', 
            'i', 'tbl34','tbl35','tbl36','tbl37','tbl38','tbl39','tbl40','tbl41','jumlahpendidikan','jumlahpendidikan1','jumlahpendidikan2','jumlahpendidikan3',
            'jumlahpendidikan4','jumlahpendidikan5','jumlahsd','jumlahsd1','jumlahsd2','jumlahsd3','jumlahsd4','jumlahsd5','jumlahsltp','jumlahsltp1',
            'jumlahsltp2','jumlahsltp3','jumlahsltp4','jumlahsltp5','data33','data33a','data34','data34a','data34b','data35','data35a','data35b','data38'
        ,'data39','data39a','data39b','data39c','data39d','data39e','data40','data40a','data40b','data40c','data40d','data40e','data36','data36a','data36b','jumlah_panjang_jalan','tbl44c','data43a','data43b','data44c','data44a',
            'data44b', 'data46a', 'data46b','categories41','data41','data41a','data41b','data41c','data41d','data41e',
            'categories43','categories44','categories48','categories47','categories46', 'categories46a', 'categories51','categories52', 'data51a', 'data51b', 'data51c','data52a', 'data52b', 'data52c',
            'data47a', 'data48a','jumlah_total','jumlah_kelurahan',
            'jumlah_desa','jumlah_kepadatan_penduduk','jumlah_luas_wilayah',
            'jumlah_penduduk','tbl43', 'i', 'tbl44', 'tbl45', 'tbl46', 
            'tbl47', 'tbl48', 'tbl49', 'tbl50', 'tbl51', 'tbl52', 'jumlah_alokasi_formula', 
            'jumlah_pengguna_dana_desa', 'tabel2'));
        
    }
}

public function formulir4(){
            return view("pages.formulir-perawat-penyakit");
}

public function tambah4(Request $request)
    {
        perawatpenyakit::create(['perawat'=> $request->perawat, 'jumlah'=>$request->jumlah,
        'tahun'=>$request->tahun]);
        return redirect('/perawat_penyakit');
    }

    public function hapus64($id)
{
	DB::table('rsud_perawat_jenis_perawat')->where('id',$id)->delete();
	return redirect('/perawat_penyakit');
}

    public function edit64($id)
    {
            $tabel64 = perawatpenyakit::FindOrFail($id);
            return view('pages.edit.perawat_penyakit_edit',compact('tabel64'));
    }

    public function update64(Request $request, $id){
        $this->validate($request,[ 
            'perawat'=>'required',
            'jumlah'=>'required',
            'tahun'=>'required',
            'status'=>'required',
        ]);
        $input_data=$request->all();
        perawatpenyakit::where('id',$id)->update([
            'perawat'=>$input_data['perawat'],
            'jumlah'=>$input_data['jumlah'],
            'tahun'=>$input_data['tahun'],
            'status'=>$input_data['status']]);
        return redirect('/perawat_penyakit')->with('message','Update already Update!');
    }

    public function exportpdf64()
    {
        $perawatpenyakit = perawatpenyakit::all()->where('status','=','Accepted');
        $pdf = PDF::loadView('pages.export.perawat_perjenis_penyakit_pdf', ['perawatpenyakit' => $perawatpenyakit]);
        return $pdf->download('perawat-perjenis-penyakit.pdf');
    }

}
