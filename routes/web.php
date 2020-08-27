<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('/register_admin', 'AdminController@registerForm')->name('register_admin');
Route::post('/register_admins', 'AdminController@register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form_register_dinas', 'AdminController@registerdinasForm')->name('form_register_dinas');
Route::post('/register_dinas', 'AdminController@register_dinas');

Route::group(['middleware'=>'ketapang'],function (){
	Route::get('/bantuan_pemerintah_kecamatan', 'KetapangController@index1')->name('bantuan_pemerintah_kecamatan');
	Route::get('/formulir-bantuan-pemerintah-kecamatan', 'KetapangController@formulir1')->name('formulir-bantuan-pemerintah-kecamatan');	
	Route::post('/formulir/formulir-bantuan-pemerintah-kecamatan', 'KetapangController@tambah1');
	Route::get('/bantuan_pemerintah_kecamatan/hapus65/{id}','KetapangController@hapus65');
	Route::get('edit65/{id}','KetapangController@edit65')->name('edit65');
	Route::put('/update65/{id}','KetapangController@update65');
	Route::get('/bantuan_pemerintah_kecamatan1/exportpdf65','KetapangController@exportpdf65');
});

Route::group(['middleware'=>'rsud'],function (){
	Route::get('/rawat_inap_kelas', 'RSUDController@index1')->name('rawat_inap_kelas');
	Route::get('/formulir-rawat-inap-kelas', 'RSUDController@formulir1')->name('formulir-rawat-inap-kelas');	
	Route::post('/formulir/formulir-rawat-inap-kelas', 'RSUDController@tambah1');
	Route::get('/rawat_inap_kelas/hapus61/{id}','RSUDController@hapus61');
	Route::get('edit61/{id}','RSUDController@edit61')->name('edit61');
	Route::put('/update61/{id}','RSUDController@update61');
	Route::get('/rawat_inap_kelas1/exportpdf61','RSUDController@exportpdf61');

	Route::get('/tenaga_dokter', 'RSUDController@index2')->name('tenaga_dokter');
	Route::get('/formulir-tenaga-dokter', 'RSUDController@formulir2')->name('formulir-tenaga-dokter');	
	Route::post('/formulir/formulir-tenaga-dokter', 'RSUDController@tambah2');
	Route::get('/tenaga_dokter/hapus62/{id}','RSUDController@hapus62');
	Route::get('edit62/{id}','RSUDController@edit62')->name('edit62');
	Route::put('/update62/{id}','RSUDController@update62');
	Route::get('/tenaga_dokter1/exportpdf62','RSUDController@exportpdf62');

	Route::get('/peralatan_rumah_sakit', 'RSUDController@index3')->name('peralatan_rumah_sakit');
	Route::get('/formulir-peralatan-rumah-sakit', 'RSUDController@formulir3')->name('formulir-peralatan-rumah-sakit');	
	Route::post('/formulir/formulir-peralatan-rumah-sakit', 'RSUDController@tambah3');
	Route::get('/peralatan_rumah_sakit/hapus63/{id}','RSUDController@hapus63');
	Route::get('edit63/{id}','RSUDController@edit63')->name('edit63');
	Route::put('/update63/{id}','RSUDController@update63');
	Route::get('/peralatan_rumah_sakit1/exportpdf63','RSUDController@exportpdf63');

	Route::get('/perawat_penyakit', 'RSUDController@index4')->name('perawat_penyakit');
	Route::get('/formulir-perawat-penyakit', 'RSUDController@formulir4')->name('formulir-perawat-penyakit');	
	Route::post('/formulir/formulir-perawat-penyakit', 'RSUDController@tambah4');
	Route::get('/perawat_penyakit/hapus64/{id}','RSUDController@hapus64');
	Route::get('edit64/{id}','RSUDController@edit64')->name('edit64');
	Route::put('/update64/{id}','RSUDController@update64');
	Route::get('/perawat_penyakit1/exportpdf64','RSUDController@exportpdf64');
});


Route::group(['middleware'=>'admin'],function (){
	
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/daftar_user', 'AdminController@daftar_user')->name('daftar_user');
Route::get('/daftar_user/hapus/{id}','AdminController@hapus');

//kesehatan penyandang masalah
Route::get('/admin/kesehatan_rekapitulasi_penyandang_masalah', 'AdminController@kesehatan_index1')->name('kesehatan_rekapitulasi_penyandang_masalah1');
Route::patch('/kesehatan_rekapitulasi_penyandang_masalah/{id}/accept24','AdminController@accept24');
Route::patch('/kesehatan_rekapitulasi_penyandang_masalah/{id}/reject24','AdminController@reject24');
Route::get('edit_status24/{id}','AdminController@edit24')->name('edit_status24');
//kesehatan jumlah dokter
Route::get('/admin/kesehatan_jumlah_dokter', 'AdminController@kesehatan_index2')->name('kesehatan_jumlah_dokter1');
Route::patch('/kesehatan_jumlah_dokter/{id}/accept25','AdminController@accept25');
Route::patch('/kesehatan_jumlah_dokter/{id}/reject25','AdminController@reject25');
Route::get('edit_status25/{id}','AdminController@edit25')->name('edit_status25');
//kesehatan jumlah tenaga kesehatan
Route::get('/admin/kesehatan_jumlah_tenaga_kesehatan', 'AdminController@kesehatan_index3')->name('kesehatan_jumlah_tenaga_kesehatan1');
Route::patch('/kesehatan_jumlah_tenaga_kesehatan/{id}/accept26','AdminController@accept26');
Route::patch('/kesehatan_jumlah_tenaga_kesehatan/{id}/reject26','AdminController@reject26');
Route::get('edit_status26/{id}','AdminController@edit26')->name('edit_status26');
//kesehatan jumlah fasilitas kesehatan 
Route::get('/admin/kesehatan_jumlah_fasilitas_kesehatan', 'AdminController@kesehatan_index4')->name('kesehatan_jumlah_fasilitas_kesehatan1');
Route::patch('/kesehatan_jumlah_fasilitas_kesehatan/{id}/accept27','AdminController@accept27');
Route::patch('/kesehatan_jumlah_fasilitas_kesehatan/{id}/reject27','AdminController@reject27');
Route::get('edit_status27/{id}','AdminController@edit27')->name('edit_status27');
//kesehatan jumlah kasus penyakit
Route::get('/admin/kesehatan_jumlah_kasus_penyakit', 'AdminController@kesehatan_index5')->name('kesehatan_jumlah_kasus_penyakit1');
Route::patch('/kesehatan_jumlah_kasus_penyakit/{id}/accept28','AdminController@accept28');
Route::patch('/kesehatan_jumlah_kasus_penyakit/{id}/reject28','AdminController@reject28');
Route::get('edit_status28/{id}','AdminController@edit28')->name('edit_status28');
//kesehatan jumlah akseptor
Route::get('/admin/kesehatan_jumlah_akseptor_aktif', 'AdminController@kesehatan_index6')->name('kesehatan_jumlah_akseptor_aktif1');
Route::patch('/kesehatan_jumlah_akseptor_aktif/{id}/accept29','AdminController@accept29');
Route::patch('/kesehatan_jumlah_akseptor_aktif/{id}/reject29','AdminController@reject29');
Route::get('edit_status29/{id}','AdminController@edit29')->name('edit_status29');
//kesehatan jumlah bayi
Route::get('/admin/kesehatan_jumlah_bayi_lahir', 'AdminController@kesehatan_index7')->name('kesehatan_jumlah_bayi_lahir1');
Route::patch('/kesehatan_jumlah_bayi_lahir/{id}/accept30','AdminController@accept30');
Route::patch('/kesehatan_jumlah_bayi_lahir/{id}/reject30','AdminController@reject30');
Route::get('edit_status30/{id}','AdminController@edit30')->name('edit_status30');
//kesehatan daftar lokasi
Route::get('/admin/kesehatan_daftar_lokasi_panti', 'AdminController@kesehatan_index8')->name('kesehatan_daftar_lokasi_panti1');
Route::patch('/kesehatan_daftar_lokasi_panti/{id}/accept31','AdminController@accept31');
Route::patch('/kesehatan_daftar_lokasi_panti/{id}/reject31','AdminController@reject31');
Route::get('edit_status31/{id}','AdminController@edit31')->name('edit_status31');

//kependudukan penduduk
Route::get('/admin/kependudukan_jumlah_penduduk', 'AdminController@kependudukan_index1')->name('kependudukan_jumlah_penduduk1');
Route::patch('/kependudukan_jumlah_penduduk/{id}/accept21','AdminController@accept21');
Route::patch('/kependudukan_jumlah_penduduk/{id}/reject21','AdminController@reject21');
Route::get('edit_status21/{id}','AdminController@edit21')->name('edit_status21');
// kependudukan akta
Route::get('/admin/kependudukan_jumlah_akta', 'AdminController@kependudukan_index2')->name('kependudukan_jumlah_akta1');
Route::patch('/kependudukan_jumlah_akta/{id}/accept22','AdminController@accept22');
Route::patch('/kependudukan_jumlah_akta/{id}/reject22','AdminController@reject22');
Route::get('edit_status22/{id}','AdminController@edit22')->name('edit_status22');
  
// kependudukan tenaga kerja
Route::get('/admin/kependudukan_tenaga_kerja', 'AdminController@kependudukan_index3')->name('kependudukan_jumlah_tenaga_kerja1');
Route::patch('/kependudukan_jumlah_tenaga_kerja/{id}/accept23','AdminController@accept23');
Route::patch('/kependudukan_jumlah_tenaga_kerja/{id}/reject23','AdminController@reject23');
Route::get('edit_status23/{id}','AdminController@edit23')->name('edit_status23');

//pegawai menurut jenis kelamin
Route::get('/admin/pegawai_menurut_jenis_kelamin', 'AdminController@pegawai_index1')->name('pegawai_menurut_jenis_kelamin1');
Route::patch('/pegawai_menurut_jenis_kelamin/{id}/accept53','AdminController@accept53');
Route::patch('/pegawai_menurut_jenis_kelamin/{id}/reject53','AdminController@reject53');
Route::get('edit_status53/{id}','AdminController@edit53')->name('edit_status53');

//pegawai menurut golongan
Route::get('/admin/pegawai_menurut_golongan', 'AdminController@pegawai_index2')->name('pegawai_menurut_golongan1');
Route::patch('/pegawai_menurut_golongan/{id}/accept54','AdminController@accept54');
Route::patch('/pegawai_menurut_golongan/{id}/reject54','AdminController@reject54');
Route::get('edit_status54/{id}','AdminController@edit54')->name('edit_status54');

//pegawai menurut pendidikan
Route::get('/admin/pegawai_menurut_pendidikan', 'AdminController@pegawai_index3')->name('pegawai_menurut_pendidikan1');
Route::patch('/pegawai_menurut_pendidikan/{id}/accept55','AdminController@accept55');
Route::patch('/pegawai_menurut_pendidikan/{id}/reject55','AdminController@reject55');
Route::get('edit_status55/{id}','AdminController@edit55')->name('edit_status55');

//pegawai yang pindah pensiun
Route::get('/admin/pegawai_yang_pindah_pensiun', 'AdminController@pegawai_index4')->name('pegawai_yang_pindah_pensiun1');
Route::patch('/pegawai_yang_pindah_pensiun/{id}/accept56','AdminController@accept56');
Route::patch('/pegawai_yang_pindah_pensiun/{id}/reject56','AdminController@reject56');
Route::get('edit_status56/{id}','AdminController@edit56')->name('edit_status56');



//ketapang
Route::get('/admin/bantuan_pemerintah_kecamatan', 'AdminController@ketapang_index1')->name('admin_bantuan_pemerintah_kecamatan');
Route::patch('/bantuan_pemerintah_kecamatan/{id}/accept65','AdminController@accept65');
Route::patch('/bantuan_pemerintah_kecamatan/{id}/reject65','AdminController@reject65');
Route::get('edit_status65/{id}','AdminController@edit65')->name('edit_status65');
Route::get('/bantuan_pemerintah_kecamatan/exportpdf65','AdminController@exportpdf65');

//rsud
Route::get('/admin/rawat_inap_kelas', 'AdminController@rsud_index1')->name('admin_rawat_inap_kelas');
Route::patch('/rawat_inap_kelas/{id}/accept61','AdminController@accept61');
Route::patch('/rawat_inap_kelas/{id}/reject61','AdminController@reject61');
Route::get('edit_status61/{id}','AdminController@edit61')->name('edit_status61');
Route::get('/rawat_inap_kelas/exportpdf61','AdminController@exportpdf61');

Route::get('/admin/tenaga_dokter', 'AdminController@rsud_index2')->name('admin_tenaga_dokter');
Route::patch('/tenaga_dokter/{id}/accept62','AdminController@accept62');
Route::patch('/tenaga_dokter/{id}/reject62','AdminController@reject62');
Route::get('edit_status62/{id}','AdminController@edit62')->name('edit_status62');
Route::get('/tenaga_dokter/exportpdf62','AdminController@exportpdf62');

Route::get('/admin/peralatan_rumah_sakit', 'AdminController@rsud_index3')->name('admin_peralatan_rumah_sakit');
Route::patch('/peralatan_rumah_sakit/{id}/accept63','AdminController@accept63');
Route::patch('/peralatan_rumah_sakit/{id}/reject63','AdminController@reject63');
Route::get('edit_status63/{id}','AdminController@edit63')->name('edit_status63');
Route::get('/peralatan_rumah_sakit/exportpdf63','AdminController@exportpdf63');

Route::get('/admin/perawat_penyakit', 'AdminController@rsud_index4')->name('admin_perawat_penyakit');
Route::patch('/perawat_penyakit/{id}/accept64','AdminController@accept64');
Route::patch('/perawat_penyakit/{id}/reject64','AdminController@reject64');
Route::get('edit_status64/{id}','AdminController@edit64')->name('edit_status64');
Route::get('/perawat_penyakit/exportpdf64','AdminController@exportpdf64');

//Peternakan
Route::get('/admin/peternakan_populasi_ternak_besar', 'AdminController@peternakan_index1')->name('admin_peternakan_populasi_ternak_besar');
Route::get('/admin/peternakan_populasi_ternak_unggas_dan_jenis_ternak', 'AdminController@peternakan_index2')->name('admin_peternakan_populasi_ternak_unggas_dan_jenis_ternak');
Route::get('/admin/peternakan_jumlah_ternak_dipotong', 'AdminController@peternakan_index3')->name('admin_peternakan_jumlah_ternak_dipotong');
Route::get('/admin/peternakan_jumlah_ternak_unggas_dipotong', 'AdminController@peternakan_index4')->name('admin_peternakan_jumlah_ternak_unggas_dipotong');
Route::get('/admin/peternakan_jumlah_produksi_ternak_unggas', 'AdminController@peternakan_index5')->name('admin_peternakan_jumlah_produksi_ternak_unggas');
Route::get('/admin/peternakan_jumlah_populasi_ternak_unggas', 'AdminController@peternakan_index6')->name('admin_peternakan_jumlah_populasi_ternak_unggas');
Route::get('/admin/jumlah_penerima_bantuan_ternak', 'AdminController@peternakan_index7')->name('admin_jumlah_penerima_bantuan_ternak');
Route::get('/admin/luas_dan_produksi_kopi_dan_kakao', 'AdminController@peternakan_index8')->name('admin_luas_dan_produksi_kopi_dan_kakao');
Route::get('/admin/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit', 'AdminController@peternakan_index9')->name('admin_luas_tanaman_dan_produksi_karet_dan_kelapa_sawit');
Route::get('/admin/luas_tanaman_dan_produksi_aren_dan_kemiri', 'AdminController@peternakan_index10')->name('admin_luas_tanaman_dan_produksi_aren_dan_kemiri');
Route::get('/admin/luas_tanaman_dan_produksi_kelapa_dan_pinang', 'AdminController@peternakan_index11')->name('admin_luas_tanaman_dan_produksi_kelapa_dan_pinang');
Route::get('/admin/luas_tanaman_dan_produksi_andaliman_dan_nilam', 'AdminController@peternakan_index12')->name('admin_luas_tanaman_dan_produksi_andaliman_dan_nilam');

Route::patch('/peternakan_populasi_ternak_besar/{id}/accept1','AdminController@accept1');
Route::patch('/peternakan_populasi_ternak_besar/{id}/reject1','AdminController@reject1');
Route::get('edit_status1/{id}','AdminController@edit1')->name('edit_status1');

Route::patch('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/{id}/accept2','AdminController@accept2');
Route::patch('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/{id}/reject2','AdminController@reject2');
Route::get('edit_status2/{id}','AdminController@edit2')->name('edit_status2');

Route::patch('/peternakan_jumlah_ternak_dipotong/{id}/accept3','AdminController@accept3');
Route::patch('/peternakan_jumlah_ternak_dipotong/{id}/reject3','AdminController@reject3');
Route::get('edit_status3/{id}','AdminController@edit3')->name('edit_status3');

Route::patch('/peternakan_jumlah_ternak_unggas_dipotong/{id}/accept4','AdminController@accept4');
Route::patch('/peternakan_jumlah_ternak_unggas_dipotong/{id}/reject4','AdminController@reject4');
Route::get('edit_status4/{id}','AdminController@edit4')->name('edit_status4');

Route::patch('/peternakan_jumlah_produksi_ternak_unggas/{id}/accept5','AdminController@accept5');
Route::patch('/peternakan_jumlah_produksi_ternak_unggas/{id}/reject5','AdminController@reject5');
Route::get('edit_status5/{id}','AdminController@edit5')->name('edit_status5');

Route::patch('/peternakan_jumlah_populasi_ternak_unggas/{id}/accept6','AdminController@accept6');
Route::patch('/peternakan_jumlah_populasi_ternak_unggas/{id}/reject6','AdminController@reject6');
Route::get('edit_status6/{id}','AdminController@edit6')->name('edit_status6');


Route::patch('/jumlah_penerima_bantuan_ternak/{id}/accept7','AdminController@accept7');
Route::patch('/jumlah_penerima_bantuan_ternak/{id}/reject7','AdminController@reject7');
Route::get('edit_status7/{id}','AdminController@edit7')->name('edit_status7');

Route::patch('/luas_dan_produksi_kopi_dan_kakao/{id}/accept8','AdminController@accept8');
Route::patch('/luas_dan_produksi_kopi_dan_kakao/{id}/reject8','AdminController@reject8');
Route::get('edit_status8/{id}','AdminController@edit8')->name('edit_status8');

Route::patch('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/{id}/accept9','AdminController@accept9');
Route::patch('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/{id}/reject9','AdminController@reject9');
Route::get('edit_status9/{id}','AdminController@edit9')->name('edit_status9');


Route::patch('/luas_tanaman_dan_produksi_aren_dan_kemiri/{id}/accept10','AdminController@accept10');
Route::patch('/luas_tanaman_dan_produksi_aren_dan_kemiri/{id}/reject10','AdminController@reject10');
Route::get('edit_status10/{id}','AdminController@edit10')->name('edit_status10');

Route::patch('/luas_tanaman_dan_produksi_kelapa_dan_pinang/{id}/accept11','AdminController@accept11');
Route::patch('/luas_tanaman_dan_produksi_kelapa_dan_pinang/{id}/reject11','AdminController@reject11');
Route::get('edit_status11/{id}','AdminController@edit11')->name('edit_status11');

Route::patch('/luas_tanaman_dan_produksi_andaliman_dan_nilam/{id}/accept12','AdminController@accept12');
Route::patch('/luas_tanaman_dan_produksi_andaliman_dan_nilam/{id}/reject12','AdminController@reject12');
Route::get('edit_status12/{id}','AdminController@edit12')->name('edit_status12');


//Perindustrian

Route::get('/admin/daftar_industri_kecil_dan_menengah','AdminController@perindustrian_index1')->name('admin_jumlah_industri_dan_tenaga_kerja');                             
Route::get('/admin/jumlah_industri_dan_tenaga_kerja','AdminController@perindustrian_index2')->name('admin_daftar_industri_kecil_dan_menengah');
Route::get('/admin/jumlah_menara','AdminController@perindustrian_index3')->name('admin_jumlah_menara');
Route::get('/admin/rekapitulasi_data_menara','AdminController@perindustrian_index4')->name('admin_rekapitulasi_data_menara');
Route::get('/admin/daftar_internet_dan_game_monitoring','AdminController@perindustrian_index5')->name('admin_daftar_internet_dan_game_monitoring');
Route::get('/admin/jumlah_desa_blank_spot','AdminController@perindustrian_index6')->name('admin_jumlah_desa_blank_spot');



Route::patch('/daftar_industri_kecil_dan_menengah/{id}/accept13','AdminController@accept13');
Route::patch('/daftar_industri_kecil_dan_menengah/{id}/reject13','AdminController@reject13');
Route::get('edit_status13/{id}','AdminController@edit13')->name('edit_status13');


Route::patch('/jumlah_industri_dan_tenaga_kerja/{id}/accept14','AdminController@accept14');
Route::patch('/jumlah_industri_dan_tenaga_kerja/{id}/reject14','AdminController@reject14');
Route::get('edit_status14/{id}','AdminController@edit14')->name('edit_status14');



Route::patch('/jumlah_menara/{id}/accept15','AdminController@accept15');
Route::patch('/jumlah_menara/{id}/reject15','AdminController@reject15');
Route::get('edit_status15/{id}','AdminController@edit15')->name('edit_status15');


Route::patch('/rekapitulasi_data_menara/{id}/accept16','AdminController@accept16');
Route::patch('/rekapitulasi_data_menara/{id}/reject16','AdminController@reject16');
Route::get('edit_status16/{id}','AdminController@edit16')->name('edit_status16');

Route::patch('/daftar_internet_dan_game_monitoring/{id}/accept17','AdminController@accept17');
Route::patch('/daftar_internet_dan_game_monitoring/{id}/reject17','AdminController@reject17');
Route::get('edit_status17/{id}','AdminController@edit17')->name('edit_status17');


Route::patch('/jumlah_desa_blank_spot/{id}/accept18','AdminController@accept18');
Route::patch('/jumlah_desa_blank_spot/{id}/reject18','AdminController@reject18');
Route::get('edit_status18/{id}','AdminController@edit18')->name('edit_status18');

//lindup
Route::get('/admin/lindup_izin_lingkungan_berdasarkan_perusahaan', 'AdminController@lindup_index1')->name('lindup_izin_lingkungan_berdasarkan_perusahaan');
Route::patch('/lindup_izin_lingkungan_berdasarkan_perusahaan/{id}/accept58','AdminController@accept58');
Route::patch('/lindup_izin_lingkungan_berdasarkan_perusahaan/{id}/reject58','AdminController@reject58');
Route::get('edit_status58/{id}','AdminController@edit58')->name('edit_status58');

Route::get('/admin/lindup_jumlah_produksi_sampah', 'AdminController@lindup_index2')->name('lindup_jumlah_produksi_sampah');
Route::patch('/lindup_jumlah_produksi_sampah/{id}/accept59','AdminController@accept59');
Route::patch('/lindup_jumlah_produksi_sampah/{id}/reject59','AdminController@reject59');
Route::get('edit_status59/{id}','AdminController@edit59')->name('edit_status59');

Route::get('/admin/lindup_jenis_daur_ulang_sampah', 'AdminController@lindup_index3')->name('lindup_jenis_daur_ulang_sampah');
Route::patch('/lindup_jenis_daur_ulang_sampah/{id}/accept60','AdminController@accept60');
Route::patch('/lindup_jenis_daur_ulang_sampah/{id}/reject60','AdminController@reject60');
Route::get('edit_status60/{id}','AdminController@edit60')->name('edit_status60');

//pdam
Route::get('/admin/pdam_jumlah_pemakaian_air_bersih', 'AdminController@pdam_index1')->name('pdam_jumlah_pemakaian_air_bersih');
Route::patch('/pdam_jumlah_pemakaian_air_bersih/{id}/accept57','AdminController@accept57');
Route::patch('/pdam_jumlah_pemakaian_air_bersih/{id}/reject57','AdminController@reject57');
Route::get('edit_status57/{id}','AdminController@edit57')->name('edit_status57');

	//pemerintahan
Route::get('/admin/pemerintahan_jlh_desa_kel', 'AdminController@pemerintahan_index1')->name('admin/pemerintahan_jlh_desa_kel');
Route::patch('/pemerintahan_jlh_desa_kel/{id}/accept43','AdminController@accept43');
Route::patch('/pemerintahan_jlh_desa_kel/{id}/reject43','AdminController@reject43');
Route::get('edit_status43/{id}','AdminController@edit43')->name('edit_status43');

Route::get('/admin/pemerintahan_jlh_penduduk_wilayah_kepadatan', 'AdminController@pemerintahan_index2')->name('admin/pemerintahan_jlh_penduduk_wilayah_kepadatan');
Route::patch('/pemerintahan_jlh_penduduk_wilayah_kepadatan/{id}/accept44','AdminController@accept44');
Route::patch('/pemerintahan_jlh_penduduk_wilayah_kepadatan/{id}/reject44','AdminController@reject44');
Route::get('/edit_status44/{id}','AdminController@edit44')->name('edit_status44');

//infrastruktur
Route::get('/admin/infrastruktur_aplikasi_opd_toba', 'AdminController@infrastruktur_index1')->name('admin/infrastruktur_aplikasi_opd_toba');
Route::patch('/infrastruktur_aplikasi_opd_toba/{id}/accept45','AdminController@accept45');
Route::patch('/infrastruktur_aplikasi_opd_toba/{id}/reject45','AdminController@reject45');
Route::get('/edit_status45/{id}','AdminController@edit45')->name('edit_status45');

Route::get('/admin/infrastruktur_panjang_jalan', 'AdminController@infrastruktur_index2')->name('admin/infrastruktur_panjang_jalan');
Route::patch('/infrastruktur_panjang_jalan/{id}/accept46','AdminController@accept46');
Route::patch('/infrastruktur_panjang_jalan/{id}/reject46','AdminController@reject46');
Route::get('/edit_status46/{id}','AdminController@edit46')->name('edit_status46');

Route::get('/admin/infrastruktur_panjang_jalan_kabupaten', 'AdminController@infrastruktur_index3')->name('admin/infrastruktur_panjang_jalan_kabupaten');
Route::patch('/infrastruktur_panjang_jalan_kabupaten/{id}/accept47','AdminController@accept47');
Route::patch('/infrastruktur_panjang_jalan_kabupaten/{id}/reject47','AdminController@reject47');
Route::get('/edit_status47/{id}','AdminController@edit47')->name('edit_status47');

Route::get('/admin/infrastruktur_jembatan', 'AdminController@infrastruktur_index4')->name('admin/infrastruktur_jembatan');
Route::patch('/infrastruktur_jembatan/{id}/accept48','AdminController@accept48');
Route::patch('/infrastruktur_jembatan/{id}/reject48','AdminController@reject48');
Route::get('/edit_status48/{id}','AdminController@edit48')->name('edit_status48');

Route::get('/admin/infrastruktur_pembangunan_bersumber_dana_desa', 'AdminController@infrastruktur_index5')->name('admin/infrastruktur_pembangunan_bersumber_dana_desa');
Route::patch('/infrastruktur_pembangunan_bersumber_dana_desa/{id}/accept49','AdminController@accept49');
Route::patch('/infrastruktur_pembangunan_bersumber_dana_desa/{id}/reject49','AdminController@reject49');
Route::get('/edit_status49/{id}','AdminController@edit49')->name('edit_status49');

Route::get('/admin/infrastruktur_pembagian_penetapan_bagi_hasil_pajak', 'AdminController@infrastruktur_index6')->name('admin/infrastruktur_pembagian_penetapan_bagi_hasil_pajak');
Route::patch('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/{id}/accept50','AdminController@accept50');
Route::patch('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/{id}/reject50','AdminController@reject50');
Route::get('/edit_status50/{id}','AdminController@edit50')->name('edit_status50');

Route::get('/admin/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa', 'AdminController@infrastruktur_index7')->name('admin/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa');
Route::patch('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/{id}/accept51','AdminController@accept51');
Route::patch('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/{id}/reject51','AdminController@reject51');
Route::get('/edit_status51/{id}','AdminController@edit51')->name('edit_status51');

Route::get('/admin/infrastruktur_perhitungan_dana_desa', 'AdminController@infrastruktur_index8')->name('admin/infrastruktur_perhitungan_dana_desa');
Route::patch('/infrastruktur_perhitungan_dana_desa/{id}/accept52','AdminController@accept52');
Route::patch('/infrastruktur_perhitungan_dana_desa/{id}/reject52','AdminController@reject52');
Route::get('/edit_status52/{id}','AdminController@edit52')->name('edit_status52');



//pariwisata
Route::get('/admin/pariwisata', 'AdminController@pariwisata_index1')->name('admin_pariwisata');
Route::patch('/pariwisata/{id}/accept33','AdminController@accept33');
Route::patch('/pariwisata/{id}/reject33','AdminController@reject33');
Route::get('edit_status33/{id}','AdminController@edit33')->name('edit_status33');

Route::get('/admin/pariwisatahotel', 'AdminController@pariwisata_index2')->name('admin_pariwisatahotel');
Route::patch('/pariwisatahotel/{id}/accept34','AdminController@accept34');
Route::patch('/pariwisatahotel/{id}/reject34','AdminController@reject34');
Route::get('edit_status34/{id}','AdminController@edit34')->name('edit_status34');

Route::get('/admin/pariwisatakapal', 'AdminController@pariwisata_index3')->name('admin_pariwisatakapal');
Route::patch('/pariwisatakapal/{id}/accept35','AdminController@accept35');
Route::patch('/pariwisatakapal/{id}/reject35','AdminController@reject35');
Route::get('edit_status35/{id}','AdminController@edit35')->name('edit_status35');

Route::get('/admin/pariwisatakunjungan', 'AdminController@pariwisata_index4')->name('admin_pariwisatakunjungan');
Route::patch('/pariwisatakunjungan/{id}/accept37','AdminController@accept37');
Route::patch('/pariwisatakunjungan/{id}/reject37','AdminController@reject37');
Route::get('edit_status37/{id}','AdminController@edit37')->name('edit_status37');

Route::get('/admin/pariwisataobjek', 'AdminController@pariwisata_index5')->name('admin_pariwisataobjek');
Route::patch('/pariwisataobjek/{id}/accept36','AdminController@accept36');
Route::patch('/pariwisataobjek/{id}/reject36','AdminController@reject36');
Route::get('edit_status36/{id}','AdminController@edit36')->name('edit_status36');

Route::get('/admin/pariwisatarestoran', 'AdminController@pariwisata_index6')->name('admin_pariwisatarestoran');
Route::patch('/pariwisatarestoran/{id}/accept38','AdminController@accept38');
Route::patch('/pariwisatarestoran/{id}/reject38','AdminController@reject38');
Route::get('edit_status38/{id}','AdminController@edit38')->name('edit_status38');

//pendidikan

Route::get('/admin/pendidikanpaud', 'AdminController@pendidikan_index1')->name('admin_pendidikanpaud');
Route::patch('/pendidikanpaud/{id}/accept39','AdminController@accept39');
Route::patch('/pendidikanpaud/{id}/reject39','AdminController@reject39');
Route::get('edit_status39/{id}','AdminController@edit39')->name('edit_status39');

Route::get('/admin/pendidikansd', 'AdminController@pendidikan_index2')->name('admin_pendidikansd');
Route::patch('/pendidikansd/{id}/accept40','AdminController@accept40');
Route::patch('/pendidikansd/{id}/reject40','AdminController@reject40');
Route::get('edit_status40/{id}','AdminController@edit40')->name('edit_status40');

Route::get('/admin/pendidikansltp', 'AdminController@pendidikan_index3')->name('/admin/pendidikansltp');
Route::patch('/pendidikansltp/{id}/accept41','AdminController@accept41');
Route::patch('/pendidikansltp/{id}/reject41','AdminController@reject41');
Route::get('edit_status41/{id}','AdminController@edit41')->name('edit_status41');


//kesehatan
Route::get('/kesehatan_rekapitulasi_penyandang_masalah1','KesehatanController@kesehatan1')->name('kesehatan_rekapitulasi_penyandang_masalah1');
Route::get('/kesehatan_jumlah_dokter1','KesehatanController@kesehatan2')->name('kesehatan_jumlah_dokter1');
Route::get('/kesehatan_jumlah_tenaga_kesehatan1','KesehatanController@kesehatan3')->name('kesehatan_jumlah_tenaga_kesehatan1');
Route::get('/kesehatan_jumlah_fasilitas_kesehatan1','KesehatanController@kesehatan4')->name('kesehatan_jumlah_fasilitas_kesehatan1');
Route::get('/kesehatan_jumlah_kasus_penyakit1','KesehatanController@kesehatan5')->name('kesehatan_jumlah_kasus_penyakit1');
Route::get('/kesehatan_jumlah_akseptor_aktif1','KesehatanController@kesehatan6')->name('kesehatan_jumlah_akseptor_aktif1');
Route::get('/kesehatan_jumlah_bayi_lahir1','KesehatanController@kesehatan7')->name('kesehatan_jumlah_bayi_lahir1');
Route::get('/kesehatan_daftar_lokasi_panti1','KesehatanController@kesehatan8')->name('kesehatan_daftar_lokasi_panti1');

//kependudukan
Route::get('/kependudukan_jumlah_penduduk1','KependudukanController@kependudukan1')->name('kependudukan_jumlah_penduduk1');
Route::get('/kependudukan_jumlah_akta1','KependudukanController@kependudukan2')->name('kependudukan_jumlah_akta1');
Route::get('/kependudukan_tenaga_kerja1','KependudukanController@kependudukan3')->name('kependudukan_tenaga_kerja1');

//Peternakan
Route::get('/peternakan_populasi_ternak_besar1','PeternakanController@peternakan1')->name('peternakan_populasi_ternak_besar1');
Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak1','PeternakanController@peternakan2')->name('peternakan_populasi_ternak_unggas_dan_jenis_ternak1');
Route::get('/peternakan_jumlah_ternak_dipotong1','PeternakanController@peternakan3')->name('peternakan_jumlah_ternak_dipotong1');
Route::get('/peternakan_jumlah_ternak_unggas_dipotong1','PeternakanController@peternakan4')->name('luas_tanaman_dan_produksi_kelapa_dan_pinang1');
Route::get('/peternakan_jumlah_produksi_ternak_unggas1','PeternakanController@peternakan5')->name('peternakan_jumlah_produksi_ternak_unggas1');
Route::get('/peternakan_jumlah_populasi_ternak_unggas1','PeternakanController@peternakan6')->name('peternakan_jumlah_populasi_ternak_unggas1');
Route::get('/jumlah_penerima_bantuan_ternak1','PeternakanController@peternakan7')->name('jumlah_penerima_bantuan_ternak1');			
Route::get('/luas_dan_produksi_kopi_dan_kakao1','PeternakanController@peternakan8')->name('luas_dan_produksi_kopi_dan_kakao1');
Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit1','PeternakanController@peternakan9')->name('luas_tanaman_dan_produksi_karet_dan_kelapa_sawit1');
Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri1','PeternakanController@peternakan10')->name('luas_tanaman_dan_produksi_aren_dan_kemiri1');
Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang1','PeternakanController@peternakan11')->name('luas_tanaman_dan_produksi_kelapa_dan_pinang1');
Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam1','PeternakanController@peternakan12')->name('luas_tanaman_dan_produksi_andaliman_dan_nilam1');

//Perindustrian

Route::get('/jumlah_industri_dan_tenaga_kerja1','PerindustrianController@perindustrian1')->name('jumlah_industri_dan_tenaga_kerja1');                             
Route::get('/daftar_industri_kecil_dan_menengah1','PerindustrianController@perindustrian2')->name('daftar_industri_kecil_dan_menengah1');
Route::get('/jumlah_menara1','PerindustrianController@perindustrian3')->name('jumlah_menara1');
Route::get('/rekapitulasi_data_menara1','PerindustrianController@perindustrian4')->name('rekapitulasi_data_menara1');
Route::get('/daftar_internet_dan_game_monitoring1','PerindustrianController@perindustrian5')->name('daftar_internet_dan_game_monitoring1');
Route::get('/jumlah_desa_blank_spot1','PerindustrianController@perindustrian6')->name('jumlah_desa_blank_spot1');


Route::get('/infrastruktur_aplikasi_opd_toba/exportpdf3','InfrastrukturController@exportpdf1');
Route::get('/infrastruktur_panjang_jalan/exportpdf4','InfrastrukturController@exportpdf2');
Route::get('/infrastruktur_panjang_jalan_kabupaten/exportpdf5','InfrastrukturController@exportpdf3');
Route::get('/infrastruktur_jembatan/exportpdf6','InfrastrukturController@exportpdf4');
Route::get('/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5', 'InfrastrukturController@exportpdf5');
Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/exportpdf6', 'InfrastrukturController@exportpdf6');
Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/exportpdf7', 'InfrastrukturController@exportpdf7');
Route::get('/infrastruktur_perhitungan_dana_desa/exportpdf8', 'InfrastrukturController@exportpdf8');

Route::get('/pendidikanpaud/exportpdf39','PendidikanController@exportpdf39');
Route::get('/pendidikansd/exportpdf40','PendidikanController@exportpdf40');
Route::get('/pendidikansltp/exportpdf41','PendidikanController@exportpdf41');

Route::get('/peternakan_populasi_ternak_besar/exportpdf1','PeternakanController@exportpdf1');
Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/exportpdf2','PeternakanController@exportpdf2');
Route::get('/peternakan_jumlah_ternak_dipotong/exportpdf3','PeternakanController@exportpdf3');
Route::get('/peternakan_jumlah_ternak_unggas_dipotong/exportpdf4','PeternakanController@exportpdf4');
Route::get('/peternakan_jumlah_produksi_ternak_unggas/exportpdf5','PeternakanController@exportpdf5');
Route::get('/peternakan_jumlah_populasi_ternak_unggas/exportpdf6','PeternakanController@exportpdf6');
Route::get('/jumlah_penerima_bantuan_ternak/exportpdf7','PeternakanController@exportpdf7');
Route::get('/luas_dan_produksi_kopi_dan_kakao/exportpdf8','PeternakanController@exportpdf8');
Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/exportpdf9','PeternakanController@exportpdf9');
Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri/exportpdf10','PeternakanController@exportpdf10');
Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang/exportpdf11','PeternakanController@exportpdf11');
Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam/exportpdf12','PeternakanController@exportpdf12');

Route::get('/daftar_industri_kecil_dan_menengah/exportpdf13','PerindustrianController@exportpdf13');
Route::get('/perindustrian/exportpdf14','PerindustrianController@exportpdf14');
Route::get('/jumlah_menara/exportpdf15','PerindustrianController@exportpdf15');
Route::get('/rekapitulasi_data_menara/exportpdf16','PerindustrianController@exportpdf16');
Route::get('/daftar_internet_dan_game_monitoring/exportpdf17','PerindustrianController@exportpdf17');
Route::get('/jumlah_desa_blank_spot/exportpdf18','PerindustrianController@exportpdf18');

Route::get('/kependudukan_jumlah_penduduk/exportpdf21','KependudukanController@exportpdf21');
Route::get('/kependudukan_jumlah_akta/exportpdf22','KependudukanController@exportpdf22');
Route::get('/kependudukan_tenaga_kerja/exportpdf23','KependudukanController@exportpdf23');

Route::get('/kesehatan_penyandang_masalah/exportpdf24','KesehatanController@exportpdf24');
Route::get('/kesehatan_jumlah_dokter/exportpdf25','KesehatanController@exportpdf25');
Route::get('/kesehatan_jumlah_tenaga_kesehatan/exportpdf26','KesehatanController@exportpdf26');
Route::get('/kesehatan_jumlah_fasilitas_kesehatan/exportpdf27','KesehatanController@exportpdf27');
Route::get('/kesehatan_jumlah_kasus_penyakit/exportpdf28','KesehatanController@exportpdf28');
Route::get('/kesehatan_jumlah_akseptor_aktif/exportpdf29','KesehatanController@exportpdf29');
Route::get('/kesehatan_jumlah_bayi/exportpdf30','KesehatanController@exportpdf30');
Route::get('/kesehatan_daftar_panti_asuhan/exportpdf31','KesehatanController@exportpdf31');

Route::get('/pariwisata/exportpdf33','PariwisataController@exportpdf33');
Route::get('/pariwisatahotel/exportpdf34','PariwisataController@exportpdf34');
Route::get('/pariwisataobjek/exportpdf35','PariwisataController@exportpdf35');
Route::get('/pariwisatakapal/exportpdf36','PariwisataController@exportpdf36');
Route::get('/pariwisatakunjungan/exportpdf37','PariwisataController@exportpdf37');
Route::get('/pariwisatarestoran/exportpdf38','PariwisataController@exportpdf38');
});
	
Route::group(['middleware'=>'pegawai'],function (){
	//pegawai menurut jenis kelamin
	Route::get('/pegawai_menurut_jenis_kelamin', 'PegawaiController@index1')->name('pegawai_menurut_jenis_kelamin');
	Route::get('/tambah_pegawai_menurut_jenis_kelamin', 'PegawaiController@formulir53')->name('tambah_pegawai_menurut_jenis_kelamin');
	Route::post('/formulir/pegawai_menurut_jenis_kelamin', 'PegawaiController@tambah53');
	Route::get('/pegawai_menurut_jenis_kelamin/hapus53/{id}','PegawaiController@hapus53');
	Route::get('edit53/{id}','PegawaiController@edit53')->name('edit53');
	Route::put('/update53/{id}','PegawaiController@update53');
	Route::get('/pegawai_menurut_jenis_kelamin/exportpdf53','PegawaiController@exportpdf53');
 
	//pegawai menurut golongan
	Route::get('/pegawai_menurut_golongan', 'PegawaiController@index2')->name('pegawai_menurut_golongan');
	Route::get('/tambah_pegawai_menurut_golongan', 'PegawaiController@formulir54')->name('tambah_pegawai_menurut_golongan');
	Route::post('/formulir/pegawai_menurut_golongan', 'PegawaiController@tambah54');
	Route::get('/pegawai_menurut_golongan/hapus54/{id}','PegawaiController@hapus54');
	Route::get('edit54/{id}','PegawaiController@edit54')->name('edit54');
	Route::put('/update54/{id}','PegawaiController@update54');
	Route::get('/pegawai_menurut_golongan/exportpdf54','PegawaiController@exportpdf54');

	//pegawai menurut pendidikan
	Route::get('/pegawai_menurut_pendidikan', 'PegawaiController@index3')->name('pegawai_menurut_pendidikan');
	Route::get('/tambah_pegawai_menurut_pendidikan', 'PegawaiController@formulir55')->name('tambah_pegawai_menurut_pendidikan');
	Route::post('/formulir/pegawai_menurut_pendidikan', 'PegawaiController@tambah55');
	Route::get('/pegawai_menurut_pendidikan/hapus55/{id}','PegawaiController@hapus55');
	Route::get('edit55/{id}','PegawaiController@edit55')->name('edit55');
	Route::put('/update55/{id}','PegawaiController@update55');
	Route::get('/pegawai_menurut_pendidikan/exportpdf55','PegawaiController@exportpdf55');
 
	//pegawai yang pindah pensiun
	Route::get('/pegawai_yang_pindah_pensiun', 'PegawaiController@index4')->name('pegawai_yang_pindah_pensiun');
	Route::get('/tambah_pegawai_yang_pindah_pensiun', 'PegawaiController@formulir56')->name('tambah_pegawai_yang_pindah_pensiun');
	Route::post('/formulir/pegawai_yang_pindah_pensiun', 'PegawaiController@tambah56');
	Route::get('/pegawai_yang_pindah_pensiun/hapus56/{id}','PegawaiController@hapus56');
	Route::get('edit56/{id}','PegawaiController@edit56')->name('edit56');
	Route::put('/update56/{id}','PegawaiController@update56');
	Route::get('/pegawai_yang_pindah_pensiun/exportpdf56','PegawaiController@exportpdf56');

});
    

Route::group(['middleware'=>'pemerintahan'],function (){
	// Route::get('{page_pemerintahan}', ['as' => 'page.pemerintahan', 'uses' => 'PemerintahanController@index1']);
	Route::get('/pemerintahan_jlh_desa_kel', 'PemerintahanController@index1')->name('pemerintahan_jlh_desa_kel');
	Route::get('/home', 'PemerintahanController@index1')->name('home');
	Route::get('/pemerintahan_jlh_penduduk_wilayah_kepadatan', 'PemerintahanController@index2')->name('pemerintahan_jlh_penduduk_wilayah_kepadatan');
	// Route::get('/pemerintahan_formulir-jlh-penduduk-wilayah-kepadatan', 'PemerintahanController@index2')->name('pemerintahan_jlh_penduduk_wilayah_kepadatan');
	// // Route::get('/pemerintahan_formulir-jlh-desa-kel', 'PemerintahanController@tambah1')->name('pemerintahan_formulir-jlh-desa-kel');
	
	Route::get('edit43/{id}','PemerintahanController@edit1')->name('edit43');
	Route::put('/update43/{id}','PemerintahanController@update1');

	Route::get('/tambah-jlh-desa-kelurahan', 'PemerintahanController@formulir1')->name('tambah-jlh-desa-kelurahan');
	Route::post('/formulir/tambah-jlh-desa-kelurahan', 'PemerintahanController@tambah1');
	Route::get('/desa-kelurahan/hapus/{id}','PemerintahanController@hapus1');
	Route::get('/pemerintahan/cari','PemerintahanController@cari');
	//edit
	
	Route::get('edit44/{id}','PemerintahanController@edit2')->name('edit44');
	Route::put('/update44/{id}','PemerintahanController@update2');

	Route::get('/tambah-jlh-penduduk-luas-kepadatan', 'PemerintahanController@formulir2')->name('tambah-jlh-penduduk-luas-kepadatan');
	Route::post('/formulir/tambah-jlh-penduduk-wilayah-kepadatan', 'PemerintahanController@tambah2');
	Route::get('/jlh-penduduk-wilayah-kepadatan/hapus/{id}','PemerintahanController@hapus2');
	
	//Convert PDF
	Route::get('/pemerintahan_jlh_desa_kel/exportpdf1','PemerintahanController@exportpdf1');
	Route::get('/pemerintahan_jumlah_penduduk_wilayah_kepadatan/exportpdf2','PemerintahanController@exportpdf2');


	//search
	Route::get('/pemerintahan1/cari','PemerintahanController@cari1');

});

Route::group(['middleware'=>'kependudukan'],function (){
	Route::get('/kependudukan_jumlah_penduduk', 'KependudukanController@index1')->name('kependudukan_jumlah_penduduk');
	

	Route::get('/home', 'HomeController@KependudukanHome');
	Route::get('/tambah_jumlah_penduduk', 'KependudukanController@formulir21')->name('tambah_jumlah_penduduk');
	Route::post('/formulir/tambah_jumlah_penduduk', 'KependudukanController@tambah21');
	Route::get('/kependudukan_jumlah_penduduk/hapus21/{id}','KependudukanController@hapus21');
	Route::get('edit21/{id}','KependudukanController@edit21')->name('edit21');
	Route::put('/update21/{id}','KependudukanController@update21');
	Route::get('/kependudukan_jumlah_penduduk/exportpdf21','KependudukanController@exportpdf21');

	//kependudukan jumlah akta
	Route::get('/kependudukan_jumlah_akta', 'KependudukanController@index2')->name('kependudukan_jumlah_akta');
	Route::get('/tambah_jumlah_akta', 'KependudukanController@formulir22')->name('tambah_jumlah_akta');
	Route::post('/formulir/tambah_jumlah_akta', 'KependudukanController@tambah22');
	Route::get('/kependudukan_jumlah_akta/hapus22/{id}','KependudukanController@hapus22');
	Route::get('edit22/{id}','KependudukanController@edit22')->name('edit22');
	Route::put('/update22/{id}','KependudukanController@update22');
	Route::get('/kependudukan_jumlah_akta/exportpdf22','KependudukanController@exportpdf22');


	//kependudukan tenaga kerja 
	Route::get('/kependudukan_tenaga_kerja', 'KependudukanController@index3')->name('kependudukan_tenaga_kerja');
	Route::get('/tambah_jumlah_kerja', 'KependudukanController@formulir23')->name('tambah_jumlah_kerja');
	Route::post('/formulir/jumlah_tenaga_kerja', 'KependudukanController@tambah23');
	Route::get('/kependudukan_tenaga_kerja/hapus23/{id}','KependudukanController@hapus23');
	Route::get('edit23/{id}','KependudukanController@edit23')->name('edit23');
	Route::put('/update23/{id}','KependudukanController@update23');
	Route::get('/kependudukan_tenaga_kerja/exportpdf23','KependudukanController@exportpdf23');

});

Route::group(['middleware'=>'kesehatan'],function (){
	//kesehatan rekapitulasi penyandang masalah
	Route::get('/kesehatan_rekapitulasi_penyandang_masalah', 'KesehatanController@index1')->name('kesehatan_rekapitulasi_penyandang_masalah');
	Route::get('/home', 'HomeController@KesehatanHome');
	Route::get('/tambah_rekapitulasi_penyandang_masalah', 'KesehatanController@formulir24')->name('tambah_rekapitulasi_penyandang_masalah');
	Route::post('/formulir/rekapitulasi_penyandang_masalah', 'KesehatanController@tambah24');
	Route::get('/kesehatan_rekapitulasi_penyandang_masalah/hapus24/{id}','KesehatanController@hapus24');
	Route::get('edit24/{id}','KesehatanController@edit24')->name('edit24');
	Route::put('/update24/{id}','KesehatanController@update24');
	

	//kesehatan jumlah dokter
	Route::get('/kesehatan_jumlah_dokter', 'KesehatanController@index2')->name('kesehatan_jumlah_dokter');
	Route::get('/tambah_jumlah_dokter', 'KesehatanController@formulir25')->name('tambah_jumlah_dokter');
	Route::post('/formulir/jumlah_dokter', 'KesehatanController@tambah25');
	Route::get('/kesehatan_jumlah_dokter/hapus25/{id}','KesehatanController@hapus25');
	Route::get('edit25/{id}','KesehatanController@edit25')->name('edit25');
	Route::put('/update25/{id}','KesehatanController@update25');
	
	//kesehatan jumlah tenaga kesehatan
	Route::get('/kesehatan_jumlah_tenaga_kesehatan', 'KesehatanController@index3')->name('kesehatan_jumlah_tenaga_kesehatan');
	Route::get('/tambah_jumlah_tenaga_kesehatan', 'KesehatanController@formulir26')->name('kesehatan_jumlah_tenaga_kesehatan');
	Route::post('/formulir/jumlah_tenaga_kesehatan', 'KesehatanController@tambah26');
	Route::get('/kesehatan_jumlah_tenaga_kesehatan/hapus26/{id}','KesehatanController@hapus26');
	Route::get('edit26/{id}','KesehatanController@edit26')->name('kesehatan_jumlah_tenaga_kesehatan');
	Route::put('/update26/{id}','KesehatanController@update26');

	

	//kesehatan jumlah fasilitas kesehatan
	Route::get('/kesehatan_jumlah_fasilitas_kesehatan', 'KesehatanController@index4')->name('kesehatan_jumlah_fasilitas_kesehatan');
	Route::get('/tambah_jumlah_fasilitas_kesehatan', 'KesehatanController@formulir27')->name('tambah_jumlah_fasilitas_kesehatan');
	Route::post('/formulir/jumlah_fasilitas_kesehatan', 'KesehatanController@tambah27');
	Route::get('/kesehatan_jumlah_fasilitas_kesehatan/hapus27/{id}','KesehatanController@hapus27');
	Route::get('edit27/{id}','KesehatanController@edit27')->name('edit27');
	Route::put('/update27/{id}','KesehatanController@update27');
	

	//kesehatan jumlah kasus penyakit
	Route::get('/kesehatan_jumlah_kasus_penyakit', 'KesehatanController@index5')->name('kesehatan_jumlah_kasus_penyakit');
	Route::get('/tambah_jumlah_kasus_penyakit', 'KesehatanController@formulir28')->name('tambah_jumlah_kasus_penyakit');
	Route::post('/formulir/jumlah_kasus_penyakit', 'KesehatanController@tambah28');
	Route::get('//kesehatan_jumlah_kasus_penyakit/hapus28/{id}','KesehatanController@hapus28');
	Route::get('edit28/{id}','KesehatanController@edit28')->name('edit28');
	Route::put('/update28/{id}','KesehatanController@update28');
	
 

	//kesehatan jumlah akseptor
	Route::get('/kesehatan_jumlah_akseptor_aktif', 'KesehatanController@index6')->name('kesehatan_jumlah_akseptor_aktif');
	Route::get('/tambah_jumlah_akseptor', 'KesehatanController@formulir29')->name('tambah_jumlah_akseptor');
	Route::post('/formulir/jumlah_akseptor', 'KesehatanController@tambah29');
	Route::get('/kesehatan_jumlah_akseptor_aktif/hapus29/{id}','KesehatanController@hapus29');
	Route::get('edit29/{id}','KesehatanController@edit29')->name('edit29');
	Route::put('/update29/{id}','KesehatanController@update29');
	

	//kesehatan jumlah bayi lahir BBLR
	Route::get('/kesehatan_jumlah_bayi_lahir', 'KesehatanController@index7')->name('kesehatan_jumlah_bayi_lahir');
	Route::get('/tambah_jumlah_bayi_lahir', 'KesehatanController@formulir30')->name('tambah_jumlah_bayi_lahir');
	Route::post('/formulir/jumlah_bayi_lahir_bblr', 'KesehatanController@tambah30');
	Route::get('/kesehatan_jumlah_bayi_lahir/hapus30/{id}','KesehatanController@hapus30');
	Route::get('edit30/{id}','KesehatanController@edit30')->name('edit30');
	Route::put('/update30/{id}','KesehatanController@update30');
	

	//kesehatan daftar panti asuhan
	Route::get('/kesehatan_daftar_lokasi_panti', 'KesehatanController@index8')->name('kesehatan_daftar_lokasi_panti');
	Route::get('/tambah_daftar_panti_asuhan', 'KesehatanController@formulir31')->name('tambah_daftar_panti_asuhan');
	Route::post('/formulir/daftar_panti_asuhan', 'KesehatanController@tambah31');
	Route::get('/kesehatan_daftar_lokasi_panti/hapus31/{id}','KesehatanController@hapus31');
	Route::get('edit31/{id}','KesehatanController@edit31')->name('edit31');
	Route::put('/update31/{id}','KesehatanController@update31');

	Route::get('/kesehatan_penyandang_masalah/exportpdf24','KesehatanController@exportpdf24');
	Route::get('/kesehatan_jumlah_dokter/exportpdf25','KesehatanController@exportpdf25');
	Route::get('/kesehatan_jumlah_tenaga_kesehatan/exportpdf26','KesehatanController@exportpdf26');
	Route::get('/kesehatan_jumlah_fasilitas_kesehatan/exportpdf27','KesehatanController@exportpdf27');
	Route::get('/kesehatan_jumlah_kasus_penyakit/exportpdf28','KesehatanController@exportpdf28');
	Route::get('/kesehatan_jumlah_akseptor_aktif/exportpdf29','KesehatanController@exportpdf29');
	Route::get('/kesehatan_jumlah_bayi/exportpdf30','KesehatanController@exportpdf30');
	Route::get('/kesehatan_daftar_panti_asuhan/exportpdf31','KesehatanController@exportpdf31');
    
    
});

Route::group(['middleware'=>'pariwisata'],function (){
	
	Route::get('/pariwisata', 'PariwisataController@index1')->name('pariwisata');
	Route::get('/home', 'HomeController@PariwisataHome');
	Route::post('/formulir/formulir-pariwisata-jumlah-wisata', 'PariwisataController@tambah1');
	Route::get('/formulir-pariwisata-jumlah-wisata', 'PariwisataController@formulir1')->name('formulir-pariwisata-jumlah-wisata');	
	Route::get('/pariwisata/hapus33/{id}','PariwisataController@hapus33');
	Route::get('/edit33/{id}','PariwisataController@edit33')->name('edit33');
	Route::put('/update33/{id}','PariwisataController@update33');
	
	
	Route::get('/pariwisatahotel', 'PariwisataController@index2')->name('pariwisatahotel');
	Route::get('/formulir-pariwisata-hotel', 'PariwisataController@formulir2')->name('formulir-pariwisata-hotel');	
	Route::post('/formulir/formulir-pariwisata-hotel', 'PariwisataController@tambah2');
	Route::get('/pariwisata/hapus35/{id}','PariwisataController@hapus35');
	Route::get('/edit34/{id}','PariwisataController@edit34')->name('edit34');
	Route::put('/update34/{id}','PariwisataController@update34');
	
	
	Route::get('/pariwisatakapal', 'PariwisataController@index3')->name('pariwisatakapal');
	Route::get('/formulir-pariwisata-jenis-kapal', 'PariwisataController@formulir3')->name('formulir-pariwisata-jenis-kapal');	
	Route::post('/formulir/formulir-pariwisata-jenis-kapal', 'PariwisataController@tambah3');
	Route::get('/pariwisata/hapus37/{id}','PariwisataController@hapus37');
	Route::get('/edit36/{id}','PariwisataController@edit36')->name('edit36');
	Route::put('/update36/{id}','PariwisataController@update36');
	
	
	Route::get('/pariwisataobjek', 'PariwisataController@index4')->name('pariwisataobjek');
	Route::get('/formulir-pariwisata-objek', 'PariwisataController@formulir4')->name('formulir-pariwisata-objek');	
	Route::post('/formulir/formulir-pariwisata-objek', 'PariwisataController@tambah4');
	Route::get('/pariwisata/hapus34/{id}','PariwisataController@hapus34');
	Route::get('/edit35/{id}','PariwisataController@edit35')->name('edit35');
	Route::put('/update35/{id}','PariwisataController@update35');
	
	Route::get('/pariwisatakunjungan', 'PariwisataController@index5')->name('pariwisatakunjungan');
	Route::get('/formulir-pariwisata-kunjungan', 'PariwisataController@formulir5')->name('formulir-pariwisata-kunjungan');	
	Route::post('/formulir/formulir-pariwisata-kunjungan', 'PariwisataController@tambah5');
	Route::get('/pariwisata/hapus36/{id}','PariwisataController@hapus36');
	Route::get('/edit37/{id}','PariwisataController@edit37')->name('edit37');
	Route::put('/update37/{id}','PariwisataController@update37');
		
	Route::get('/pariwisatarestoran', 'PariwisataController@index6')->name('pariwisatarestoran');
	Route::get('/formulir-pariwisata-restoran', 'PariwisataController@formulir6')->name('formulir-pariwisata-restoran');	
	Route::post('/formulir/formulir-pariwisata-restoran', 'PariwisataController@tambah6');
	Route::get('/pariwisata/hapus38/{id}','PariwisataController@hapus38');
	Route::get('edit38/{id}','PariwisataController@edit38')->name('edit38');
	Route::put('/update38/{id}','PariwisataController@update38');
	Route::get('/pariwisata/exportpdf33','PariwisataController@exportpdf33');

	Route::get('/pariwisatahotel/exportpdf34','PariwisataController@exportpdf34');
	Route::get('/pariwisataobjek/exportpdf35','PariwisataController@exportpdf35');
	Route::get('/pariwisatakapal/exportpdf36','PariwisataController@exportpdf36');
	Route::get('/pariwisatakunjungan/exportpdf37','PariwisataController@exportpdf37');
	Route::get('/pariwisatarestoran/exportpdf38','PariwisataController@exportpdf38');

});

Route::group(['middleware'=>'pendidikan'],function (){
	Route::get('/pendidikanpaud', 'PendidikanController@index1')->name('pendidikanpaud');
	Route::get('/home', 'HomeController@PendidikanHome');
	Route::get('/formulir-pendidikan-paud', 'PendidikanController@formulir7')->name('formulir-pendidikan-paud');	
	Route::post('/formulir/formulir-pendidikan-paud', 'PendidikanController@tambah7');
	Route::get('/pariwisata/hapus39/{id}','PendidikanController@hapus39');
	Route::get('edit39/{id}','PendidikanController@edit39')->name('edit39');
	Route::put('/update39/{id}','PendidikanController@update39');
	

	
	Route::get('/pendidikansd', 'PendidikanController@index2')->name('pendidikansd');
	Route::get('/formulir-pendidikan-sd', 'PendidikanController@formulir8')->name('formulir-pendidikan-sd');	
	Route::post('/formulir/formulir-pendidikan-sd', 'PendidikanController@tambah8');
	Route::get('/pariwisata/hapus40/{id}','PendidikanController@hapus40');
	Route::get('edit40/{id}','PendidikanController@edit40')->name('edit40');
	Route::put('/update40/{id}','PendidikanController@update40');

	Route::get('/pendidikansltp', 'PendidikanController@index3')->name('pendidikansltp');
	Route::get('/formulir-pendidikan-sltp', 'PendidikanController@formulir9')->name('formulir-pendidikan-sltp');	
	Route::post('/formulir/formulir-pendidikan-sltp', 'PendidikanController@tambah9');
	Route::get('/pariwisata/hapus41/{id}','PendidikanController@hapus41');
	Route::get('edit41/{id}','PendidikanController@edit41')->name('edit41')->name('edit41');
	Route::put('/update41/{id}','PendidikanController@update41');
	
	
	
});

Route::group(['middleware'=>'peternakan'],function (){
	Route::get('/a', 'HomeController@a')->name('a');
	Route::get('/peternakan_populasi_ternak_besar', 'PeternakanController@index1')->name('peternakan_populasi_ternak_besar');
	Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak', 'PeternakanController@index2')->name('peternakan_populasi_ternak_unggas_dan_jenis_ternak');
	Route::get('/peternakan_jumlah_ternak_dipotong', 'PeternakanController@index3')->name('peternakan_jumlah_ternak_dipotong');
	Route::get('/peternakan_jumlah_ternak_unggas_dipotong', 'PeternakanController@index4')->name('peternakan_jumlah_ternak_unggas_dipotong');
	Route::get('/peternakan_jumlah_produksi_ternak_unggas', 'PeternakanController@index5')->name('peternakan_jumlah_produksi_ternak_unggas');
	Route::get('/peternakan_jumlah_populasi_ternak_unggas', 'PeternakanController@index6')->name('peternakan_jumlah_populasi_ternak_unggas');
	Route::get('/jumlah_penerima_bantuan_ternak', 'PeternakanController@index7')->name('jumlah_penerima_bantuan_ternak');
	Route::get('/luas_dan_produksi_kopi_dan_kakao', 'PeternakanController@index8')->name('luas_dan_produksi_kopi_dan_kakao');
	Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit', 'PeternakanController@index9')->name('luas_tanaman_dan_produksi_karet_dan_kelapa_sawit');
	Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri', 'PeternakanController@index10')->name('luas_tanaman_dan_produksi_aren_dan_kemiri');
	Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang', 'PeternakanController@index11')->name('luas_tanaman_dan_produksi_kelapa_dan_pinang');
	Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam', 'PeternakanController@index12')->name('luas_tanaman_dan_produksi_andaliman_dan_nilam');

	Route::get('/tambah_populasi_ternak_besar','PeternakanController@formulir1')->name('tambah_populasi_ternak_besar');
	Route::post('/formulir/tambah_populasi_ternak_besar','PeternakanController@tambah1');
	Route::get('/peternakan_populasi_ternak_besar/hapus1/{id}','PeternakanController@hapus1');
	Route::get('/edit1/{id}','PeternakanController@edit1')->name('edit1/{id}');
	Route::put('/update1/{id}','PeternakanController@update1');
	

	//Populasi Ternak Unggas dan Jenis Ternak (Ekor)
	Route::get('/tambah_populasi_ternak_unggas','PeternakanController@formulir2')->name('tambah_populasi_ternak_unggas');
	Route::post('/formulir/tambah_populasi_ternak_unggas','PeternakanController@tambah2');

	Route::get('/edit2/{id}','PeternakanController@edit2')->name('edit2/{id}');
	Route::put('/update2/{id}','PeternakanController@update2');
	Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/hapus2/{id}','PeternakanController@hapus2');
	
	

	
	//Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak
	Route::get('/tambah_jumlah_ternak_dipotong','PeternakanController@formulir3')->name('tambah_jumlah_ternak_dipotong');
	Route::post('/formulir/tambah_jumlah_ternak_dipotong','PeternakanController@tambah3');
	Route::get('/edit3/{id}','PeternakanController@edit3')->name('edit3/{id}');
	Route::put('/update3/{id}','PeternakanController@update3');
	Route::get('/peternakan_jumlah_ternak_dipotong/hapus3/{id}','PeternakanController@hapus3');
	
	//Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak
	Route::get('/tambah_jumlah_ternak_unggas_dipotong','PeternakanController@formulir4')->name('tambah_jumlah_ternak_unggas_dipotong');
	Route::post('/formulir/tambah_jumlah_ternak_unggas_dipotong','PeternakanController@tambah4');
	Route::get('/edit4/{id}','PeternakanController@edit4')->name('/edit4/{id}');
	Route::put('/update4/{id}','PeternakanController@update4');
	Route::get('/peternakan_jumlah_ternak_unggas_dipotong/hapus4/{id}','PeternakanController@hapus4');
	

	//Jumlah Produksi Ternak Unggas
	Route::get('/tambah_jumlah_produksi_ternak_unggas','PeternakanController@formulir5')->name('tambah_jumlah_produksi_ternak_unggas');
	Route::post('/formulir/tambah_jumlah_produksi_ternak_unggas','PeternakanController@tambah5');
	Route::get('/edit5/{id}','PeternakanController@edit5')->name('edit5/{id}');
	Route::put('/update5/{id}','PeternakanController@update5');
	Route::get('/peternakan_jumlah_produksi_ternak_unggas/hapus5/{id}','PeternakanController@hapus5');
	

	//Jumlah Produksi Ternak Unggas
	Route::get('/tambah_jumlah_populasi_ternak_unggas','PeternakanController@formulir6')->name('tambah_jumlah_populasi_ternak_unggas');
	Route::post('/formulir/tambah_jumlah_populasi_ternak_unggas','PeternakanController@tambah6');
	Route::get('/edit6/{id}','PeternakanController@edit6')->name('edit6/{id}');
	Route::put('/update6/{id}','PeternakanController@update6');
	Route::get('/peternakan_jumlah_populasi_ternak_unggas/hapus6/{id}','PeternakanController@hapus6');
	

	//Jumlah Penerima Kelompok Bantuan Ternak
	Route::get('/tambah_jumlah_penerima_bantuan_ternak','PeternakanController@formulir7')->name('tambah_jumlah_penerima_bantuan_ternak');
	Route::post('/formulir/tambah_jumlah_penerima_bantuan_ternak','PeternakanController@tambah7');
	Route::get('/edit7/{id}','PeternakanController@edit7')->name('edit7/{id}');
	Route::put('/update7/{id}','PeternakanController@update7');
	Route::get('/jumlah_penerima_bantuan_ternak/hapus7/{id}','PeternakanController@hapus7');
	


	//Jumlah Luas Tanaman dan Produksi Kopi dan Kakao Tanaman Perkebunan Rakyat
	Route::get('/tambah_luas_dan_produksi_kopi_dan_kakao','PeternakanController@formulir8')->name('tambah_luas_dan_produksi_kopi_dan_kakao');
	Route::post('/formulir/tambah_luas_dan_produksi_kopi_dan_kakao','PeternakanController@tambah8');
	Route::get('/edit8/{id}','PeternakanController@edit8')->name('edit8/{id}');
	Route::put('/update8/{id}','PeternakanController@update8');
	Route::get('/luas_dan_produksi_kopi_dan_kakao/hapus8/{id}','PeternakanController@hapus8');

	

	//Jumlah Luas Tanaman dan Produksi Karet dan Kelapa Sawit Tanaman Perkebunan Rakyat
	Route::get('/tambah_luas_tanaman_dan_produksi_karet_dan_kelapa_sawit','PeternakanController@formulir9')->name('tambah_luas_tanaman_dan_produksi_karet_dan_kelapa_sawit');
	Route::post('/formulir/tambah_luas_tanaman_dan_produksi_karet_dan_kelapa_sawit','PeternakanController@tambah9');
	Route::get('/edit9/{id}','PeternakanController@edit9')->name('edit9/{id}');
	Route::put('/update9/{id}','PeternakanController@update9');
	Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/hapus9/{id}','PeternakanController@hapus9');
	
	//Jumlah Luas Tanaman dan Produksi Aren dan Kemiri Tanaman Perkebunan Rakyat
	Route::get('/tambah_luas_tanaman_dan_produksi_aren_dan_kemiri','PeternakanController@formulir10')->name('tambah_luas_tanaman_dan_produksi_aren_dan_kemiri');
	Route::post('/formulir/tambah_luas_tanaman_dan_produksi_aren_dan_kemiri','PeternakanController@tambah10');
	Route::get('/edit10/{id}','PeternakanController@edit10')->name('edit10/{id}');
	Route::put('/update10/{id}','PeternakanController@update10');
	Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri/hapus10/{id}','PeternakanController@hapus10');
	
	//Jumlah Luas Tanaman dan Produksi Kelapa dan Pinang Tanaman Perkebunan Rakyat
	Route::get('/tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang','PeternakanController@formulir11')->name('tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang');
	Route::post('/formulir/tambah_luas_tanaman_dan_produksi_kelapa_dan_pinang','PeternakanController@tambah11');
	Route::get('/edit11/{id}','PeternakanController@edit11')->name('edit11/{id}');
	Route::put('/update11/{id}','PeternakanController@update11');
	Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang/hapus11/{id}','PeternakanController@hapus11');
	
	//Jumlah Luas Tanaman dan Produksi Andaliman dan Nilam Tanaman Perkebunan Rakyat
	Route::get('/tambah_luas_tanaman_dan_produksi_andaliman_dan_nilam','PeternakanController@formulir12')->name('tambah_luas_tanaman_dan_produksi_andaliman_dan_nilam');
	Route::post('/formulir/tambah_luas_tanaman_dan_produksi_andaliman_dan_nilam','PeternakanController@tambah12');
	Route::get('/edit12/{id}','PeternakanController@edit12')->name('edit12/{id}');
	Route::put('/update12/{id}','PeternakanController@update12');
	Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam/hapus12/{id}','PeternakanController@hapus12');

	Route::get('/peternakan_populasi_ternak_besar/exportpdf1','PeternakanController@exportpdf1');
	Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/exportpdf2','PeternakanController@exportpdf2');
	Route::get('/peternakan_jumlah_ternak_dipotong/exportpdf3','PeternakanController@exportpdf3');
	Route::get('/peternakan_jumlah_ternak_unggas_dipotong/exportpdf4','PeternakanController@exportpdf4');
	Route::get('/peternakan_jumlah_produksi_ternak_unggas/exportpdf5','PeternakanController@exportpdf5');
	Route::get('/peternakan_jumlah_populasi_ternak_unggas/exportpdf6','PeternakanController@exportpdf6');
	Route::get('/jumlah_penerima_bantuan_ternak/exportpdf7','PeternakanController@exportpdf7');
	Route::get('/luas_dan_produksi_kopi_dan_kakao/exportpdf8','PeternakanController@exportpdf8');
	Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/exportpdf9','PeternakanController@exportpdf9');
	Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri/exportpdf10','PeternakanController@exportpdf10');
	Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang/exportpdf11','PeternakanController@exportpdf11');
	Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam/exportpdf12','PeternakanController@exportpdf12');

	
});

Route::group(['middleware'=>'perindustrian'],function (){
    Route::get('/daftar_industri_kecil_dan_menengah', 'PerindustrianController@index1')->name('daftar_industri_kecil_dan_menengah');
	Route::get('/jumlah_industri_dan_tenaga_kerja', 'PerindustrianController@index2')->name('jumlah_industri_dan_tenaga_kerja');
	
	Route::get('/jumlah_menara', 'PerindustrianController@index3')->name('jumlah_menara');
	Route::get('/rekapitulasi_data_menara', 'PerindustrianController@index4')->name('rekapitulasi_data_menara');
	Route::get('/daftar_internet_dan_game_monitoring', 'PerindustrianController@index5')->name('daftar_internet_dan_game_monitoring');
	Route::get('/jumlah_desa_blank_spot', 'PerindustrianController@index6')->name('jumlah_desa_blank_spot');
	



//perindustrian teknologi

	Route::get('/home', 'HomeController@PerindustrianHome');
	
	//Daftar Industri Kecil dan Menengah Kab. Toba Samosir
	Route::get('/tambah_daftar_industri_kecil_dan_menengah','PerindustrianController@formulir13')->name('tambah_daftar_industri_kecil_dan_menengah');
	Route::post('/formulir/tambah_daftar_industri_kecil_dan_menengah','PerindustrianController@tambah13');
	Route::get('edit13/{id}','PerindustrianController@edit13')->name('edit13/{id}');
	Route::put('/update13/{id}','PerindustrianController@update13');
	Route::get('/daftar_industri_kecil_dan_menengah/hapus13/{id}','PerindustrianController@hapus13');
	

	//Jumlah Industri Kecil dan Menengah menurut Kecamatan
	Route::get('/tambah_jumlah_industri_dan_tenaga_kerja','PerindustrianController@formulir14')->name('tambah_jumlah_industri_dan_tenaga_kerja');
	Route::post('/formulir/tambah_jumlah_industri_dan_tenaga_kerja','PerindustrianController@tambah14');
	Route::get('edit14/{id}','PerindustrianController@edit14')->name('edit14/{id}');
	Route::put('/update14/{id}','PerindustrianController@update14');
	Route::get('/jumlah_industri_dan_tenaga_kerja/hapus14/{id}','PerindustrianController@hapus14');
	


	//Jumlah Menara Menurut Kecamatan
	Route::get('/tambah_jumlah_menara','PerindustrianController@formulir15')->name('tambah_jumlah_menara');
	Route::post('/formulir/tambah_jumlah_menara','PerindustrianController@tambah15');
	Route::get('edit15/{id}','PerindustrianController@edit15')->name('edit15/{id}');
	Route::put('/update15/{id}','PerindustrianController@update15');
	Route::get('/jumlah_menara/hapus15/{id}','PerindustrianController@hapus15');
	


	//Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir
	Route::get('/tambah_rekapitulasi_data_menara','PerindustrianController@formulir16')->name('tambah_rekapitulasi_data_menara');
	Route::post('/formulir/tambah_rekapitulasi_data_menara','PerindustrianController@tambah16');
	Route::get('edit16/{id}','PerindustrianController@edit16')->name('edit16/{id}');
	Route::put('/update16/{id}','PerindustrianController@update16');
	Route::get('/rekapitulasi_data_menara/hapus16/{id}','PerindustrianController@hapus16');
	

	//Daftar Internet/Game Net yang dimonitoring
	Route::get('/tambah_daftar_internet_dan_game_monitoring','PerindustrianController@formulir17')->name('tambah_daftar_internet_dan_game_monitoring');
	Route::post('/formulir/tambah_daftar_internet_dan_game_monitoring','PerindustrianController@tambah17');
	Route::get('edit17/{id}','PerindustrianController@edit17')->name('edit17/{id}');
	Route::put('/update17/{id}','PerindustrianController@update17');
	Route::get('/daftar_internet_dan_game_monitoring/hapus17/{id}','PerindustrianController@hapus17');
	

	//Jumlah Desa Blank Spot
	Route::get('/tambah_jumlah_desa_blank_spot','PerindustrianController@formulir18')->name('tambah_jumlah_desa_blank_spot');
	Route::post('/formulir/tambah_jumlah_desa_blank_spot','PerindustrianController@tambah18');
	Route::get('edit18/{id}','PerindustrianController@edit18')->name('edit18/{id}');
	Route::put('/update18/{id}','PerindustrianController@update18');
	Route::get('/jumlah_desa_blank_spot/hapus18/{id}','PerindustrianController@hapus18');

	Route::get('/daftar_industri_kecil_dan_menengah/exportpdf13','PerindustrianController@exportpdf13');
	Route::get('/perindustrian/exportpdf14','PerindustrianController@exportpdf14');
	Route::get('/jumlah_menara/exportpdf15','PerindustrianController@exportpdf15');
	Route::get('/rekapitulasi_data_menara/exportpdf16','PerindustrianController@exportpdf16');
	Route::get('/daftar_internet_dan_game_monitoring/exportpdf17','PerindustrianController@exportpdf17');
	Route::get('/jumlah_desa_blank_spot/exportpdf18','PerindustrianController@exportpdf18');


    
});

Route::group(['middleware'=>'infrastruktur'],function (){
	Route::get('/infrastruktur_aplikasi_opd_toba', 'InfrastrukturController@index1')->name('infrastruktur_aplikasi_opd_toba');
	Route::get('/infrastruktur_panjang_jalan','InfrastrukturController@index2')->name('infrastruktur_panjang_jalan');
	Route::get('/infrastruktur_panjang_jalan_kabupaten','InfrastrukturController@index3')->name('infrastruktur_panjang_jalan_kabupaten');
	Route::get('/infrastruktur_jembatan','InfrastrukturController@index4')->name('infrastruktur_jembatan');
	Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak','InfrastrukturController@index5')->name('infrastruktur_pembagian_penetapan_bagi_hasil_pajak');
	Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa','InfrastrukturController@index6')->name('infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa');
	Route::get('/infrastruktur_pembangunan_bersumber_dana_desa','InfrastrukturController@index7')->name('infrastruktur_pembangunan_bersumber_dana_desa');
	Route::get('/infrastruktur_perhitungan_dana_desa','InfrastrukturController@index8')->name('infrastruktur_perhitungan_dana_desa');
	
	Route::get('/home', 'HomeController@infrastrukturHome')->name('infrastruktur.home');
	Route::get('/infrastruktur_panjang_jalan', 'InfrastrukturController@index2')->name('infrastruktur_panjang_jalan');
	Route::get('/infrastruktur_panjang_jalan_kabupaten', 'InfrastrukturController@index3')->name('infrastruktur_panjang_jalan_kabupaten');
	Route::get('/infrastruktur_jembatan', 'InfrastrukturController@index4')->name('infrastruktur_jembatan');

	Route::get('/tambah-aplikasi-opd-toba', 'InfrastrukturController@formulir1')->name('tambah-aplikasi-opd-toba');
	Route::post('/formulir/tambah-aplikasi-opd-toba', 'InfrastrukturController@tambah1');
	Route::get('/jlh-aplikasi-opd-toba/hapus/{id}','InfrastrukturController@hapus1');
	
	//edit
	Route::get('edit45/{id}','InfrastrukturController@edit1')->name('edit45');
	Route::put('/update45/{id}','InfrastrukturController@update1');

	Route::get('/tambah-panjang-jalan', 'InfrastrukturController@formulir2')->name('tambah-panjang-jalan');
	Route::post('/formulir/tambah-panjang-jalan', 'InfrastrukturController@tambah2');
	Route::get('/panjang-jalan/hapus/{id}','InfrastrukturController@hapus2');
	
	//edit
	Route::get('edit46/{id}','InfrastrukturController@edit2')->name('edit46');
	Route::put('/update46/{id}','InfrastrukturController@update2');
	

	Route::get('/tambah-panjang-jalan-kabupaten', 'InfrastrukturController@formulir3')->name('tambah-aplikasi-panjang-jalan-kabupaten');
	Route::post('/formulir/tambah-panjang-jalan-kabupaten', 'InfrastrukturController@tambah3');
	Route::get('/panjang-jalan-kabupaten/hapus/{id}','InfrastrukturController@hapus3');

	//edit
	Route::get('edit47/{id}','InfrastrukturController@edit3')->name('edit47');
	Route::put('/update47/{id}','InfrastrukturController@update3');

	Route::get('/tambah-jembatan', 'InfrastrukturController@formulir4')->name('tambah-jembatan');
	Route::post('/formulir/tambah-jembatan', 'InfrastrukturController@tambah4');
	Route::get('/jembatan/hapus/{id}','InfrastrukturController@hapus4');
	//edit
	Route::get('edit48/{id}','InfrastrukturController@edit4')->name('edit48');
	Route::put('/update48/{id}','InfrastrukturController@update4');

	Route::get('/tambah-pembangunanbersumberdanadesa', 'InfrastrukturController@formulir5')->name('tambah-pembangunanbersumberdanadesa');
	Route::post('/formulir/tambah-pembangunanbersumberdanadesa', 'InfrastrukturController@tambah5');
	Route::get('/pembangunanbersumberdanadesa/hapus/{id}','InfrastrukturController@hapus5');

	//edit
	Route::get('edit49/{id}','InfrastrukturController@edit5')->name('edit49');
	Route::put('/update49/{id}','InfrastrukturController@update5');


	Route::get('/tambah-pembagianpenetapanbagihasilpajak', 'InfrastrukturController@formulir6')->name('tambah-pembagianpenetapanbagihasilpajak');
	Route::post('/formulir/tambah-pembagianpenetapanbagihasilpajak', 'InfrastrukturController@tambah6');
	Route::get('/pembagianpenetapanbagihasilpajak/hapus/{id}','InfrastrukturController@hapus6');

	//edit
	Route::get('edit50/{id}','InfrastrukturController@edit6')->name('edit50');
	Route::put('/update50/{id}','InfrastrukturController@update6');

	Route::get('/tambah-pembagian-penetapan-besaran-alokasi-dana-desa', 'InfrastrukturController@formulir7')->name('tambah-pembagian-penetapan-besaran-alokasi-dana-desa');
	Route::post('//formulir/tambah-pembagian-penetapan-besaran-alokasi-dana-desa', 'InfrastrukturController@tambah7');
	Route::get('/pembagian-penetapan-besaran-alokasi-dana-desa/hapus/{id}','InfrastrukturController@hapus7');

	//edit
	Route::get('edit51/{id}','InfrastrukturController@edit7')->name('edit51');
	Route::put('/update51/{id}','InfrastrukturController@update7');

	Route::get('/tambah-penghitungan-dana-desa', 'InfrastrukturController@formulir8')->name('tambah-penghitungan-dana-desa');
	Route::post('formulir/tambah-penghitungan-dana-desa', 'InfrastrukturController@tambah8');
	Route::get('/penghitungan-dana-desa/hapus/{id}','InfrastrukturController@hapus8');

	//edit
	Route::get('edit52/{id}','InfrastrukturController@edit8')->name('edit52');
	Route::put('/update52/{id}','InfrastrukturController@update8');

	Route::get('/infrastruktur_aplikasi_opd_toba/exportpdf3','InfrastrukturController@exportpdf1');
	Route::get('/infrastruktur_panjang_jalan/exportpdf4','InfrastrukturController@exportpdf2');
	Route::get('/infrastruktur_panjang_jalan_kabupaten/exportpdf5','InfrastrukturController@exportpdf3');
	Route::get('/infrastruktur_jembatan/exportpdf6','InfrastrukturController@exportpdf4');
	Route::get('/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5', 'InfrastrukturController@exportpdf5');
	Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/exportpdf6', 'InfrastrukturController@exportpdf6');
	Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/exportpdf7', 'InfrastrukturController@exportpdf7');
	Route::get('/infrastruktur_perhitungan_dana_desa/exportpdf8', 'InfrastrukturController@exportpdf8');


	
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::post('profile', 'ProfileController@update_foto');
});

Route::group(['middleware' => 'LingkunganHidup'], function () {
	
Route::get('/lindup_izin_lingkungan_berdasarkan_perusahaan', 'LindupController@index1')->name('lindup_izin_lingkungan_berdasarkan_perusahaan');
Route::get('/lindup_jumlah_produksi_sampah', 'LindupController@index2')->name('lindup_jumlah_produksi_sampah');
Route::get('/lindup_jenis_daur_ulang_sampah', 'LindupController@index3')->name('lindup_jenis_daur_ulang_sampah_sampah');

Route::get('edit58/{id}','LindupController@edit1')->name('edit58');
Route::put('/update58/{id}','LindupController@update1');

Route::get('edit59/{id}','LindupController@edit2')->name('edit59');
Route::put('/update59/{id}','LindupController@update2');

Route::get('edit60/{id}','LindupController@edit3')->name('edit60');
Route::put('/update60/{id}','LindupController@update3');

Route::get('/tambah-lindup_izin_lingkungan_berdasarkan_perusahaan', 'LindupController@formulir1')->name('tambah-lindup_izin_lingkungan_berdasarkan_perusahaan');
Route::post('/formulir/lindup_izin_lingkungan_berdasarkan_perusahaan', 'LindupController@tambah1');
Route::get('/lindup_izin_lingkungan_berdasarkan_perusahaan/hapus/{id}','LindupController@hapus1');

Route::get('/tambah-lindup_jumlah_produksi_sampah', 'LindupController@formulir2')->name('tambah-lindup_jumlah_produksi_sampah');
Route::post('/formulir/lindup_jumlah_produksi_sampah', 'LindupController@tambah2');
Route::get('/lindup_jumlah_produksi_sampah/hapus/{id}','LindupController@hapus2');

Route::get('/tambah-lindup_jenis_daur_ulang_sampah', 'LindupController@formulir3')->name('tambah-lindup_jenis_daur_ulang_sampah');
Route::post('/formulir/lindup_jenis_daur_ulang_sampah', 'LindupController@tambah3');
Route::get('/lindup_jenis_daur_ulang_sampah/hapus/{id}','LindupController@hapus3');
});

Route::group(['middleware' => 'pdam'], function () {

Route::get('/pdam_jumlah_pemakaian_air_bersih', 'PDAMController@index1')->name('pdam_jumlah_pemakaian_air_bersih');
Route::get('edit57/{id}','PDAMController@edit1')->name('edit57');
Route::put('/update57/{id}','PDAMController@update1');

Route::get('/tambah-pdam_jumlah_pemakaian_air_bersih', 'PDAMController@formulir1')->name('tambah-pdam_jumlah_pemakaian_air_bersih');
Route::post('/formulir/pdam_jumlah_pemakaian_air_bersih', 'PDAMController@tambah1');
Route::get('/pdam_jumlah_pemakaian_air_bersih/hapus/{id}','PDAMController@hapus1');
});


Route::group(['middleware' => 'auth'], function () {
	
//pemerintahan
Route::get('/pemerintahan_jlh_desa_kel1', 'PemerintahanController@pemerintahan1')->name('pemerintahan_jlh_desa_kel1');
Route::get('/pemerintahan_jlh_penduduk_wilayah_kepadatan1', 'PemerintahanController@pemerintahan2')->name('pemerintahan_jlh_penduduk_wilayah_kepadatan1');

//pdam
Route::get('/pdam_jumlah_pemakaian_air_bersih1', 'PDAMController@pdam1')->name('pdam_jumlah_pemakaian_air_bersih1');

//lindup
Route::get('/lindup_izin_lingkungan_berdasarkan_perusahaan1', 'LindupController@lindup1')->name('lindup_izin_lingkungan_berdasarkan_perusahaan1');
Route::get('/lindup_jumlah_produksi_sampah1', 'LindupController@lindup2')->name('lindup_jumlah_produksi_sampah1');
Route::get('/lindup_jenis_daur_ulang_sampah1', 'LindupController@lindup3')->name('lindup_jenis_daur_ulang_sampah1');
//infrastruktur
Route::get('/infrastruktur_aplikasi_opd_toba1','InfrastrukturController@infrastruktur1')->name('infrastruktur_aplikasi_opd_toba1');
Route::get('/infrastruktur_panjang_jalan1','InfrastrukturController@infrastruktur2')->name('infrastruktur_panjang_jalan1');
Route::get('/infrastruktur_panjang_jalan_kabupaten1','InfrastrukturController@infrastruktur3')->name('infrastruktur_panjang_jalan_kabupaten1');
Route::get('/infrastruktur_jembatan1','InfrastrukturController@infrastruktur4')->name('infrastruktur_jembatan1');
Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak1','InfrastrukturController@infrastruktur5')->name('infrastruktur_pembagian_penetapan_bagi_hasil_pajak1');
Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa1','InfrastrukturController@infrastruktur6')->name('infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa1');
Route::get('/infrastruktur_pembangunan_bersumber_dana_desa1','InfrastrukturController@infrastruktur7')->name('infrastruktur_pembangunan_bersumber_dana_desa1');
Route::get('/infrastruktur_perhitungan_dana_desa1','InfrastrukturController@infrastruktur8')->name('infrastruktur_perhitungan_dana_desa1');

//pendidikan
Route::get('/pendidikanpaud1','PendidikanController@pendidikan1')->name('pendidikanpaud1');
Route::get('/pendidikansd1','PendidikanController@pendidikan2')->name('pendidikansd1');
Route::get('/pendidikansltp1','PendidikanController@pendidikan3')->name('pendidikansltp1');

//kesehatan
Route::get('/kesehatan_rekapitulasi_penyandang_masalah1','KesehatanController@kesehatan1')->name('kesehatan_rekapitulasi_penyandang_masalah1');
Route::get('/kesehatan_jumlah_dokter1','KesehatanController@kesehatan2')->name('kesehatan_jumlah_dokter1');
Route::get('/kesehatan_jumlah_tenaga_kesehatan1','KesehatanController@kesehatan3')->name('kesehatan_jumlah_tenaga_kesehatan1');
Route::get('/kesehatan_jumlah_fasilitas_kesehatan1','KesehatanController@kesehatan4')->name('kesehatan_jumlah_fasilitas_kesehatan1');
Route::get('/kesehatan_jumlah_kasus_penyakit1','KesehatanController@kesehatan5')->name('kesehatan_jumlah_kasus_penyakit1');
Route::get('/kesehatan_jumlah_akseptor_aktif1','KesehatanController@kesehatan6')->name('kesehatan_jumlah_akseptor_aktif1');
Route::get('/kesehatan_jumlah_bayi_lahir1','KesehatanController@kesehatan7')->name('kesehatan_jumlah_bayi_lahir1');
Route::get('/kesehatan_daftar_lokasi_panti1','KesehatanController@kesehatan8')->name('kesehatan_daftar_lokasi_panti1');

//kependudukan
Route::get('/kependudukan_jumlah_penduduk1','KependudukanController@kependudukan1')->name('kependudukan_jumlah_penduduk1');
Route::get('/kependudukan_jumlah_akta1','KependudukanController@kependudukan2')->name('kependudukan_jumlah_akta1');
Route::get('/kependudukan_tenaga_kerja1','KependudukanController@kependudukan3')->name('kependudukan_tenaga_kerja1');

//pegawai
Route::get('/pegawai_menurut_jenis_kelamin1','PegawaiController@pegawai1')->name('pegawai_menurut_jenis_kelamin1');
Route::get('/pegawai_menurut_golongan1','PegawaiController@pegawai2')->name('pegawai_menurut_golongan1');
Route::get('/pegawai_menurut_pendidikan1','PegawaiController@pegawai3')->name('pegawai_menurut_pendidikan1');
Route::get('/pegawai_yang_pindah_pensiun1','PegawaiController@pegawai4')->name('pegawai_yang_pindah_pensiun1');

//Peternakan
Route::get('/peternakan_populasi_ternak_besar1','PeternakanController@peternakan1')->name('peternakan_populasi_ternak_besar1');
Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak1','PeternakanController@peternakan2')->name('peternakan_populasi_ternak_unggas_dan_jenis_ternak1');
Route::get('/peternakan_jumlah_ternak_dipotong1','PeternakanController@peternakan3')->name('peternakan_jumlah_ternak_dipotong1');
Route::get('/peternakan_jumlah_ternak_unggas_dipotong1','PeternakanController@peternakan4')->name('luas_tanaman_dan_produksi_kelapa_dan_pinang1');
Route::get('/peternakan_jumlah_produksi_ternak_unggas1','PeternakanController@peternakan5')->name('peternakan_jumlah_produksi_ternak_unggas1');
Route::get('/peternakan_jumlah_populasi_ternak_unggas1','PeternakanController@peternakan6')->name('peternakan_jumlah_populasi_ternak_unggas1');
Route::get('/jumlah_penerima_bantuan_ternak1','PeternakanController@peternakan7')->name('jumlah_penerima_bantuan_ternak1');			
Route::get('/luas_dan_produksi_kopi_dan_kakao1','PeternakanController@peternakan8')->name('luas_dan_produksi_kopi_dan_kakao1');
Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit1','PeternakanController@peternakan9')->name('luas_tanaman_dan_produksi_karet_dan_kelapa_sawit1');
Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri1','PeternakanController@peternakan10')->name('luas_tanaman_dan_produksi_aren_dan_kemiri1');
Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang1','PeternakanController@peternakan11')->name('luas_tanaman_dan_produksi_kelapa_dan_pinang1');
Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam1','PeternakanController@peternakan12')->name('luas_tanaman_dan_produksi_andaliman_dan_nilam1');

//Perindustrian

Route::get('/jumlah_industri_dan_tenaga_kerja1','PerindustrianController@perindustrian1')->name('jumlah_industri_dan_tenaga_kerja1');                             
Route::get('/daftar_industri_kecil_dan_menengah1','PerindustrianController@perindustrian2')->name('daftar_industri_kecil_dan_menengah1');
Route::get('/jumlah_menara1','PerindustrianController@perindustrian3')->name('jumlah_menara1');
Route::get('/rekapitulasi_data_menara1','PerindustrianController@perindustrian4')->name('rekapitulasi_data_menara1');
Route::get('/daftar_internet_dan_game_monitoring1','PerindustrianController@perindustrian5')->name('daftar_internet_dan_game_monitoring1');
Route::get('/jumlah_desa_blank_spot1','PerindustrianController@perindustrian6')->name('jumlah_desa_blank_spot1');

//pariwisata
Route::get('/pariwisata1','PariwisataController@pariwisata1')->name('pariwisata1');
Route::get('/pariwisataobjek1','PariwisataController@pariwisata2')->name('pariwisataobjek1');
Route::get('/pariwisatahotel1','PariwisataController@pariwisata3')->name('pariwisatahotel1');
Route::get('/pariwisatakunjungan1','PariwisataController@pariwisata4')->name('pariwisatakunjungan1');
Route::get('/pariwisatakapal1','PariwisataController@pariwisata5')->name('pariwisatakapal1');
Route::get('/pariwisatarestoran1','PariwisataController@pariwisata6')->name('pariwisatarestoran1');

Route::get('/pemerintahan_jlh_desa_kel/exportpdf1','PemerintahanController@exportpdf1');
Route::get('/pemerintahan_jumlah_penduduk_wilayah_kepadatan/exportpdf2','PemerintahanController@exportpdf2');
	

Route::get('/infrastruktur_aplikasi_opd_toba/exportpdf3','InfrastrukturController@exportpdf1');
Route::get('/infrastruktur_panjang_jalan/exportpdf4','InfrastrukturController@exportpdf2');
Route::get('/infrastruktur_panjang_jalan_kabupaten/exportpdf5','InfrastrukturController@exportpdf3');
Route::get('/infrastruktur_jembatan/exportpdf6','InfrastrukturController@exportpdf4');
Route::get('/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5', 'InfrastrukturController@exportpdf5');
Route::get('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak/exportpdf6', 'InfrastrukturController@exportpdf6');
Route::get('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa/exportpdf7', 'InfrastrukturController@exportpdf7');
Route::get('/infrastruktur_perhitungan_dana_desa/exportpdf8', 'InfrastrukturController@exportpdf8');

Route::get('/pendidikanpaud/exportpdf39','PendidikanController@exportpdf39');
Route::get('/pendidikansd/exportpdf40','PendidikanController@exportpdf40');
Route::get('/pendidikansltp/exportpdf41','PendidikanController@exportpdf41');

Route::get('/peternakan_populasi_ternak_besar/exportpdf1','PeternakanController@exportpdf1');
Route::get('/peternakan_populasi_ternak_unggas_dan_jenis_ternak/exportpdf2','PeternakanController@exportpdf2');
Route::get('/peternakan_jumlah_ternak_dipotong/exportpdf3','PeternakanController@exportpdf3');
Route::get('/peternakan_jumlah_ternak_unggas_dipotong/exportpdf4','PeternakanController@exportpdf4');
Route::get('/peternakan_jumlah_produksi_ternak_unggas/exportpdf5','PeternakanController@exportpdf5');
Route::get('/peternakan_jumlah_populasi_ternak_unggas/exportpdf6','PeternakanController@exportpdf6');
Route::get('/jumlah_penerima_bantuan_ternak/exportpdf7','PeternakanController@exportpdf7');
Route::get('/luas_dan_produksi_kopi_dan_kakao/exportpdf8','PeternakanController@exportpdf8');
Route::get('/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit/exportpdf9','PeternakanController@exportpdf9');
Route::get('/luas_tanaman_dan_produksi_aren_dan_kemiri/exportpdf10','PeternakanController@exportpdf10');
Route::get('/luas_tanaman_dan_produksi_kelapa_dan_pinang/exportpdf11','PeternakanController@exportpdf11');
Route::get('/luas_tanaman_dan_produksi_andaliman_dan_nilam/exportpdf12','PeternakanController@exportpdf12');

Route::get('/daftar_industri_kecil_dan_menengah/exportpdf13','PerindustrianController@exportpdf13');
Route::get('/perindustrian/exportpdf14','PerindustrianController@exportpdf14');
Route::get('/jumlah_menara/exportpdf15','PerindustrianController@exportpdf15');
Route::get('/rekapitulasi_data_menara/exportpdf16','PerindustrianController@exportpdf16');
Route::get('/daftar_internet_dan_game_monitoring/exportpdf17','PerindustrianController@exportpdf17');
Route::get('/jumlah_desa_blank_spot/exportpdf18','PerindustrianController@exportpdf18');


Route::get('/pariwisata/exportpdf33','PariwisataController@exportpdf33');
Route::get('/pariwisatahotel/exportpdf34','PariwisataController@exportpdf34');
Route::get('/pariwisataobjek/exportpdf35','PariwisataController@exportpdf35');
Route::get('/pariwisatakapal/exportpdf36','PariwisataController@exportpdf36');
Route::get('/pariwisatakunjungan/exportpdf37','PariwisataController@exportpdf37');
Route::get('/pariwisatarestoran/exportpdf38','PariwisataController@exportpdf38');


Route::get('/pdam_jumlah_pemakaian_air_bersih/exportpdf57','PDAMController@exportpdf1');
Route::get('/lindup_izin_lingkungan_berdasarkan_perusahaan/exportpdf58','LindupController@exportpdf1');
Route::get('/lindup_jumlah_produksi_sampah/exportpdf59','LindupController@exportpdf2');
Route::get('/lindup_jenis_daur_ulang_sampah/exportpdf60','LindupController@exportpdf3');


//ketapang
Route::get('/bantuan_pemerintah_kecamatan1','ketapangController@ketapang1')->name('bantuan_pemerintah_kecamatan1');
Route::get('/bantuan_pemerintah_kecamatan2/exportpdf65','KetapangController@exportpdf65');


//rsud
Route::get('/rawat_inap_kelas1','rsudController@rsud1')->name('rawat_inap_kelas1');
Route::get('/tenaga_dokter1','rsudController@rsud2')->name('tenaga_dokter1');
Route::get('/peralatan_rumah_sakit1','rsudController@rsud3')->name('peralatan_rumah_sakit1');
Route::get('/perawat_penyakit1','rsudController@rsud4')->name('perawat_penyakit1');
Route::get('/rawat_inap_kelas2/exportpdf61','RSUDController@exportpdf61');
Route::get('/tenaga_dokter2/exportpdf62','RSUDController@exportpdf62');
Route::get('/peralatan_rumah_sakit2/exportpdf63','RSUDController@exportpdf63');
Route::get('/perawat_penyakit2/exportpdf64','RSUDController@exportpdf64');

//export kependudukan kesehatan pegawai 
Route::get('/kependudukan_jumlah_penduduk/exportpdf21','KependudukanController@exportpdf21');
Route::get('/kependudukan_jumlah_akta/exportpdf22','KependudukanController@exportpdf22');
Route::get('/kependudukan_tenaga_kerja/exportpdf23','KependudukanController@exportpdf23');

Route::get('/kesehatan_penyandang_masalah/exportpdf24','KesehatanController@exportpdf24');
Route::get('/kesehatan_jumlah_dokter/exportpdf25','KesehatanController@exportpdf25');
Route::get('/kesehatan_jumlah_tenaga_kesehatan/exportpdf26','KesehatanController@exportpdf26');
Route::get('/kesehatan_jumlah_fasilitas_kesehatan/exportpdf27','KesehatanController@exportpdf27');
Route::get('/kesehatan_jumlah_kasus_penyakit/exportpdf28','KesehatanController@exportpdf28');
Route::get('/kesehatan_jumlah_akseptor_aktif/exportpdf29','KesehatanController@exportpdf29');
Route::get('/kesehatan_jumlah_bayi/exportpdf30','KesehatanController@exportpdf30');
Route::get('/kesehatan_daftar_panti_asuhan/exportpdf31','KesehatanController@exportpdf31');

Route::get('/pegawai_menurut_jenis_kelamin/exportpdf53','PegawaiController@exportpdf53');
Route::get('/pegawai_menurut_golongan/exportpdf54','PegawaiController@exportpdf54');
Route::get('/pegawai_menurut_pendidikan/exportpdf55','PegawaiController@exportpdf55');
Route::get('/pegawai_yang_pindah_pensiun/exportpdf56','PegawaiController@exportpdf56');

});

