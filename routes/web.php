<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\DataKaryawanController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DivisiReportController;
use App\Http\Controllers\Admin\IzinSakitKaryawanController;
use App\Http\Controllers\Admin\CutiKaryawanController;
use App\Http\Controllers\Admin\DataPribadiController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\User\LaporanController;
use App\Http\Controllers\User\PribadiController;
use App\Http\Controllers\User\DivisiKerjaController;
use App\Http\Controllers\User\IzinKerjaController;
use App\Http\Controllers\User\CutiController;
use App\Http\Controllers\User\PresensiController;



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
// Route::get('/', function () {
//     return view('welcome');


// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('admin.home');


Route::prefix('admin')->middleware('role:admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::get('/createkaryawan', 'TambahKaryawanController@create1')->name('admin.input1.createkaryawan');
    Route::post('/createkaryawan/import', 'TambahKaryawanController@import_excel')->name('admin.input1.import');
    Route::get('/informasi', 'TambahKaryawanController@informasi')->name('admin.input1.informasi');

    Route::get('/createinformasi',[InformasiController::class, 'createinformasi'])->name('admin.input2.createinformasi');
    Route::post('/createinformasi',[InformasiController::class, 'store'])->name('admin.input2.createinformasi.store');
    Route::get('/detailinformasi',[InformasiController::class, 'detailinformasi'])->name('admin.input2.detailinformasi');
    Route::get('/editinformasi/{informasi}',[InformasiController::class, 'editinformasi'])->name('admin.input2.editinformasi');
    Route::patch('/editinformasi/{id}',[InformasiController::class, 'update'])->name('admin.input2.editinformasi.update');
    Route::delete('/editinformasi/{informasi}',[InformasiController::class, 'destroy'])->name('admin.input2.detailinformasi.delete');
    
    Route::get('/karyawan',[DataKaryawanController::class, 'karyawan'])->name('admin.input3.karyawan');
    Route::post('/karyawan',[DataKaryawanController::class, 'store'])->name('admin.input3.karyawan.store');
    Route::get('/detailkaryawan',[DataKaryawanController::class, 'detailkaryawan'])->name('admin.input3.detailkaryawan');
    Route::get('/editkaryawan/{data}',[DataKaryawanController::class, 'editkaryawan'])->name('editkaryawan');
    Route::patch('/update_karyawan/{id}',[DataKaryawanController::class, 'update_karyawan'])->name('update_karyawan');
    Route::delete('/detailkaryawan/{data}',[DataKaryawanController::class, 'destroy'])->name('admin.input3.detailkaryawan.delete');

    Route::get('/laporankaryawan',[ReportController::class, 'laporan'])->name('admin.input4.laporankaryawan');
    Route::get('/editreport/{laporan}',[ReportController::class, 'editreport'])->name('editreport');
    Route::post('/update_laporan/{id}',[ReportController::class, 'update_laporan'])->name('update_laporan');
    Route::delete('/laporankaryawan/{laporan}',[ReportController::class, 'destroy'])->name('admin.input4.laporankaryawan.delete');

    Route::get('/pindahdivisi',[DivisiReportController::class, 'pindahdivisi'])->name('admin.input5.pindahdivisi');
    Route::get('/editkerja/{divisi}',[DivisiReportController::class, 'editkerja'])->name('admin.input5.editkerja');
    Route::post('/update_divisi/{id}',[DivisiReportController::class, 'update_divisi'])->name('update_divisi');
    Route::delete('/update/{divisi}',[DivisiReportController::class, 'destroy'])->name('admin.input5.pindahdivisi.delete');

    Route::get('/izinsakit',[IzinSakitKaryawanController::class, 'izinsakit'])->name('admin.input6.izinsakit');
    Route::get('/editizinsakit/{izin}',[IzinSakitKaryawanController::class, 'editizinsakit'])->name('editizinsakit');
    Route::post('/update_sakit/{id}',[IzinSakitKaryawanController::class, 'update_sakit'])->name('update_sakit');
    Route::delete('/izinsakit',[IzinSakitKaryawanController::class, 'destroy'])->name('admin.input6.izinsakit.delete');

    Route::get('/datacuti',[CutiKaryawanController::class, 'datacuti'])->name('admin.input8.datacuti');
    Route::get('/editcuti/{cuti}',[CutiKaryawanController::class, 'editcuti'])->name('editcuti');
    Route::post('/update_cuti/{id}',[CutiKaryawanController::class, 'update_cuti'])->name('update_cuti');
    Route::delete('/datacuti/{cuti}',[CutiKaryawanController::class, 'destroy'])->name('admin.input8.datacuti.delete');

    Route::get('/datapribadikaryawan',[DataPribadiController::class, 'datakaryawan'])->name('admin.input7.datapribadikaryawan');
    Route::get('/editpribadi/{pribadi}',[DataPribadiController::class, 'editpribadi'])->name('editpribadi');
    Route::post('/update/{id}',[DataPribadiController::class, 'update'])->name('update');

    Route::get('/createabsen',[AbsensiController::class, 'createabsen'])->name('admin.input10.createabsen');
    Route::post('/absenmasuk',[AbsensiController::class, 'absenmasuk'])->name('admin.input10.createabsen.absenmasuk');
    Route::post('/absenkeluar',[AbsensiController::class, 'absenkeluar'])->name('admin.input10.createabsen.absenkeluar');


});

Route::prefix('karyawan')->middleware('role:user')->namespace('User')->group(function () {

    Route::get('/', 'HomeController@index')->name('user.home');

    Route::get('/informasi',[LaporanController::class, 'informasi'])->name('user.input1.informasi');
    Route::get('/karyawan',[LaporanController::class, 'karyawan'])->name('user.input1.karyawan');
    Route::get('/createlaporan',[LaporanController::class, 'createlaporan'])->name('user.input1.createlaporan');
    Route::post('/createlaporan',[LaporanController::class, 'store'])->name('user.input1.createlaporan.store');
    Route::get('/detaillaporan',[LaporanController::class, 'detaillaporan'])->name('user.input1.detaillaporan');
    Route::get('/editlaporan/{laporan}',[LaporanController::class, 'editlaporan'])->name('user.input1.editlaporan');
    Route::patch('/editlaporan/{id}',[LaporanController::class, 'update'])->name('user.input1.editlaporan.update');
    Route::delete('/detaillaporan/{laporan}',[LaporanController::class, 'destroy'])->name('user.input1.detaillaporan.delete');

    Route::get('/createdata',[PribadiController::class, 'createdata'])->name('user.input2.createdata');
    Route::post('/createdata',[PribadiController::class, 'store'])->name('user.input2.createdata.store');
    Route::get('/detaildata',[PribadiController::class, 'detaildata'])->name('user.input2.detaildata');
    Route::get('/editdata/{pribadi}',[PribadiController::class, 'editdata'])->name('user.input2.editdata');
    Route::patch('/update/{id}',[PribadiController::class, 'update'])->name('user.input2.editdata.update');
    Route::delete('/detaildata/{pribadi}',[PribadiController::class, 'destroy'])->name('user.input2.detaildata.delete');

    Route::get('/createkerja',[DivisiKerjaController::class, 'createkerja'])->name('user.input3.createkerja');
    Route::post('/createkerja',[DivisiKerjaController::class, 'store'])->name('user.input3.createkerja.store');
    Route::get('/detailkerja',[DivisiKerjaController::class, 'detailkerja'])->name('user.input3.detailkerja');

    Route::get('/createizin',[IzinKerjaController::class, 'createizin'])->name('user.input4.createizin');
    Route::post('/createizin',[IzinKerjaController::class, 'store'])->name('user.input4.createizin.store');
    Route::get('/detailizin',[IzinKerjaController::class, 'detailizin'])->name('user.input4.detailizin');

    Route::get('/createcuti',[CutiController::class, 'createcuti'])->name('user.input5.createcuti');
    Route::post('/createcuti',[CutiController::class, 'store'])->name('user.input5.createcuti.store');
    Route::get('/detailcuti',[CutiController::class, 'detailcuti'])->name('user.input5.detailcuti');

    Route::get('/presensi',[PresensiController::class, 'presensi'])->name('user.input6.presensi');
 
});


