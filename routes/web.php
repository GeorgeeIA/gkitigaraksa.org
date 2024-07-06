<?php

use App\Http\Controllers\Admin\AtestasiController as AdminAtestasiController;
use App\Http\Controllers\Admin\AtestasiMasukController as AdminAtestasiMasukController;
use App\Http\Controllers\Admin\BaptisAnakController as AdminBaptisAnakController;
use App\Http\Controllers\Admin\BaptisDewasaController as AdminBaptisDewasaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GembalaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IzinNikahController as AdminIzinNikahController;
use App\Http\Controllers\Admin\JemaatController;
use App\Http\Controllers\Admin\KeanggotaanController as AdminKeanggotaanController;
use App\Http\Controllers\Admin\NilaiAgamaControler;
use App\Http\Controllers\Admin\PeneguhanNikahController as AdminPeneguhanNikahController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\SidiController as AdminSidiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WartaController;
use App\Http\Controllers\Formulir\AtestasiController;
use App\Http\Controllers\Formulir\AtestasiMasukController;
use App\Http\Controllers\Formulir\BaptisAnakController;
use App\Http\Controllers\Formulir\BaptisDewasaController;
use App\Http\Controllers\Formulir\IzinNikahController;
use App\Http\Controllers\Formulir\KeanggotaanController;
use App\Http\Controllers\Formulir\NilaiAgamaController;
use App\Http\Controllers\Formulir\PeneguhanNikahController;
use App\Http\Controllers\Formulir\SidiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard')->middleware(['role:user', 'verified']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified');
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
  ->middleware(['auth', 'signed'])
  ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
  ->middleware(['auth', 'throttle:6,1'])
  ->name('verification.resend');




Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/warta', [FrontController::class, 'warta'])->name('front.warta');
Route::get('/detail-warta/{id}', [FrontController::class, 'detailWarta'])->name('front.detailWarta');
Route::get('/detail-berita/{id}', [FrontController::class, 'detailBerita'])->name('front.berita.detail');

Route::prefix('formulir')->middleware(['role:user', 'verified'])->group(function () {

  Route::prefix('nilai-agama')->group(function () {
    Route::get('/sekolah', [NilaiAgamaController::class, 'sekolahIndex'])->name('formulir.nilaiagama.sekolah');
    Route::post('/sekolah/store', [NilaiAgamaController::class, 'sekolahStore'])->name('formulir.nilaiagama.store');
  });

  Route::prefix('formulir-atestasi')->group(function () {
    Route::get('/', [AtestasiController::class, 'index'])->name('formulir.atestasi.index');
    Route::post('/store', [AtestasiController::class, 'store'])->name('formulir.atestasi.store');
  });

  Route::prefix('formulir-atestasi-masuk')->group(function () {
    Route::get('/', [AtestasiMasukController::class, 'index'])->name('formulir.atestasi_masuk.index');
    Route::post('/store', [AtestasiMasukController::class, 'store'])->name('formulir.atestasi_masuk.store');
  });

  Route::prefix('formulir-keanggotaan')->group(function () {
    Route::get('/', [KeanggotaanController::class, 'index'])->name('formulir.keanggotaan.index');
    Route::post('/store', [KeanggotaanController::class, 'store'])->name('formulir.keanggotaan.store');
  });

  Route::prefix('formulir-baptis-anak')->group(function () {
    Route::get('/', [BaptisAnakController::class, 'index'])->name('formulir.baptisAnak.index');
    Route::post('/store', [BaptisAnakController::class, 'store'])->name('formulir.baptisAnak.store');
  });

  Route::prefix('formulir-baptis-dewasa')->group(function () {
    Route::get('/', [BaptisDewasaController::class, 'index'])->name('formulir.baptisDewasa.index');
    Route::post('/store', [BaptisDewasaController::class, 'store'])->name('formulir.baptisDewasa.store');
  });


  Route::prefix('formulir-baptis-sidi')->group(function () {
    Route::get('/', [SidiController::class, 'index'])->name('formulir.sidi.index');
    Route::post('/store', [SidiController::class, 'store'])->name('formulir.sidi.store');
  });



  Route::prefix('formulir-izin-nikah')->group(function () {
    Route::get('/', [IzinNikahController::class, 'index'])->name('formulir.izin_nikah.index');
    Route::post('/store', [IzinNikahController::class, 'store'])->name('formulir.izin_nikah.store');
  });



  Route::prefix('formulir-peneguhan-nikah')->group(function () {
    Route::get('/', [PeneguhanNikahController::class, 'index'])->name('formulir.peneguhan_nikah.index');
    Route::post('/store', [PeneguhanNikahController::class, 'store'])->name('formulir.peneguhan_nikah.store');
  });
});


Route::middleware(['role:user', 'verified'])->group(function () {

  Route::prefix('user/atestasi')->group(function () {
    Route::get('/', [AtestasiController::class, 'user'])->name('user.atestasi');
    Route::get('/show/{id}', [AtestasiController::class, 'show'])->name('user.showAtestasi');
  });

  Route::prefix('user/atestasi-masuk')->group(function () {
    Route::get('/', [AtestasiMasukController::class, 'user'])->name('user.atestasiMasuk');
    Route::get('/show/{id}', [AtestasiMasukController::class, 'show'])->name('user.showAtestasiMasuk');
  });

  Route::prefix('user/keanggotaan')->group(function () {
    Route::get('/', [KeanggotaanController::class, 'user'])->name('user.keanggotaan');
    Route::get('/show/{id}', [KeanggotaanController::class, 'show'])->name('user.showKeanggotaan');
  });

  Route::prefix('user/baptis-anak')->group(function () {
    Route::get('/', [BaptisAnakController::class, 'user'])->name('user.baptisAnak');
    Route::get('/show/{id}', [BaptisAnakController::class, 'show'])->name('user.showBaptisAnak');
  });


  Route::prefix('user/baptis-dewasa')->group(function () {
    Route::get('/', [BaptisDewasaController::class, 'user'])->name('user.baptisDewasa');
    Route::get('/show/{id}', [BaptisDewasaController::class, 'show'])->name('user.showBaptisDewasa');
  });


  Route::prefix('user/sidi')->group(function () {
    Route::get('/', [SidiController::class, 'user'])->name('user.sidi');
    Route::get('/show/{id}', [SidiController::class, 'show'])->name('user.showSidi');
  });

  Route::prefix('user/izinNikah')->group(function () {
    Route::get('/', [IzinNikahController::class, 'user'])->name('user.izinNikah');
    Route::get('/show/{id}', [IzinNikahController::class, 'show'])->name('user.showizinNikah');
  });

  Route::prefix('user/nikah')->group(function () {
    Route::get('/', [PeneguhanNikahController::class, 'user'])->name('user.nikah');
    Route::get('/show/{id}', [PeneguhanNikahController::class, 'show'])->name('user.shownikah');
  });

  Route::prefix('user/NilaiAgama')->group(function () {
    Route::get('/', [NilaiAgamaController::class, 'user'])->name('user.NilaiAgama');
    Route::get('/show/{id}', [NilaiAgamaController::class, 'show'])->name('user.showNilaiAgama');
  });
});




Route::prefix('admin')->middleware(['role:admin'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

  Route::prefix('hero')->group(function () {
    Route::get('/', [HomeController::class, 'hero'])->name('admin.hero.index');
    Route::post('/store', [HomeController::class, 'heroStore'])->name('admin.hero.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('admin.hero.edit');
    Route::post('/update/{id}', [HomeController::class, 'update'])->name('admin.hero.update');
    Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('admin.hero.delete');
  });

  Route::prefix('user')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');
    Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
  });

  Route::prefix('subhero')->group(function () {
    Route::get('/', [HomeController::class, 'subhero'])->name('admin.subhero.index');
    Route::post('/store', [HomeController::class, 'subheroStore'])->name('admin.subhero.store');
    Route::get('/edit/{id}', [HomeController::class, 'subheroEdit'])->name('admin.subhero.edit');
    Route::post('/update/{id}', [HomeController::class, 'subheroUpdate'])->name('admin.subhero.update');
    Route::get('/delete/{id}', [HomeController::class, 'subheroDelete'])->name('admin.subhero.delete');
  });

  Route::prefix('gembala')->group(function () {
    Route::get('/', [GembalaController::class, 'index'])->name('admin.gembala.index');
    Route::post('/store', [GembalaController::class, 'store'])->name('admin.gembala.store');
    Route::get('/edit/{id}', [GembalaController::class, 'edit'])->name('admin.gembala.edit');
    Route::post('/update/{id}', [GembalaController::class, 'update'])->name('admin.gembala.update');
    Route::get('/delete/{id}', [GembalaController::class, 'delete'])->name('admin.gembala.delete');
  });


  Route::prefix('jemaat')->group(function () {
    Route::get('/', [JemaatController::class, 'index'])->name('admin.jemaat.index');
    Route::get('/create', [JemaatController::class, 'create'])->name('admin.jemaat.create');
    Route::post('/store', [JemaatController::class, 'store'])->name('admin.jemaat.store');
    Route::get('/edit/{id}', [JemaatController::class, 'edit'])->name('admin.jemaat.edit');
    Route::post('/update/{id}', [JemaatController::class, 'update'])->name('admin.jemaat.update');
    Route::get('/delete/{id}', [JemaatController::class, 'delete'])->name('admin.jemaat.delete');
  });


  Route::prefix('pengurus')->group(function () {
    Route::get('/', [PengurusController::class, 'index'])->name('admin.pengurus.index');
    Route::get('/create', [PengurusController::class, 'create'])->name('admin.pengurus.create');
    Route::post('/store', [PengurusController::class, 'store'])->name('admin.pengurus.store');
    Route::get('/edit/{id}', [PengurusController::class, 'edit'])->name('admin.pengurus.edit');
    Route::post('/update/{id}', [PengurusController::class, 'update'])->name('admin.pengurus.update');
    Route::get('/delete/{id}', [PengurusController::class, 'delete'])->name('admin.pengurus.delete');
  });



  Route::prefix('warta')->group(function () {
    Route::get('/', [WartaController::class, 'index'])->name('admin.warta.index');
    Route::get('/create', [WartaController::class, 'create'])->name('admin.warta.create');
    Route::post('/store', [WartaController::class, 'store'])->name('admin.warta.store');
    Route::get('/show/{id}', [WartaController::class, 'show'])->name('admin.warta.show');
    Route::get('/edit/{id}', [WartaController::class, 'edit'])->name('admin.warta.edit');
    Route::post('/update/{id}', [WartaController::class, 'update'])->name('admin.warta.update');
    Route::get('/delete/{id}', [WartaController::class, 'delete'])->name('admin.warta.delete');
  });

  Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/store', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/show/{id}', [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::post('/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::get('/delete/{id}', [BeritaController::class, 'delete'])->name('admin.berita.delete');
  });

  Route::prefix('kegiatan_ibadah')->group(function () {
    Route::get('/', [HomeController::class, 'kegiatanIbadah'])->name('admin.kegiatan_ibadah.index');
    Route::get('/create', [HomeController::class, 'create'])->name('admin.kegiatan_ibadah.create');
    Route::post('/store', [HomeController::class, 'store'])->name('admin.kegiatan_ibadah.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('admin.kegiatan_ibadah.edit');
    Route::post('/update/{id}', [HomeController::class, 'update'])->name('admin.kegiatan_ibadah.update');
    Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('admin.kegiatan_ibadah.delete');
  });


  Route::prefix('nilai_agama')->group(function () {
    Route::get('/', [NilaiAgamaControler::class, 'index'])->name('admin.nilai_agama.index');
    Route::get('/show/{id}', [NilaiAgamaControler::class, 'show'])->name('admin.nilai_agama.show');
    Route::get('/edit/{id}', [NilaiAgamaControler::class, 'edit'])->name('admin.nilai_agama.edit');
    Route::post('/update/{id}', [NilaiAgamaControler::class, 'update'])->name('admin.nilai_agama.update');
  });


  Route::prefix('atestasi')->group(function () {
    Route::get('/', [AdminAtestasiController::class, 'index'])->name('admin.atestasi.index');
    Route::get('/show/{id}', [AdminAtestasiController::class, 'show'])->name('admin.atestasi.show');
    Route::get('/edit/{id}', [AdminAtestasiController::class, 'edit'])->name('admin.atestasi.edit');
    Route::post('/update/{id}', [AdminAtestasiController::class, 'update'])->name('admin.atestasi.update');
  });


  Route::prefix('atestasi-masuk')->group(function () {
    Route::get('/', [AdminAtestasiMasukController::class, 'index'])->name('admin.atestasi_masuk.index');
    Route::get('/show/{id}', [AdminAtestasiMasukController::class, 'show'])->name('admin.atestasi_masuk.show');
    Route::get('/edit/{id}', [AdminAtestasiMasukController::class, 'edit'])->name('admin.atestasi_masuk.edit');
    Route::post('/update/{id}', [AdminAtestasiMasukController::class, 'update'])->name('admin.atestasi_masuk.update');
  });



  Route::prefix('keanggotaan')->group(function () {
    Route::get('/', [AdminKeanggotaanController::class, 'index'])->name('admin.keanggotaan.index');
    Route::get('/show/{id}', [AdminKeanggotaanController::class, 'show'])->name('admin.keanggotaan.show');
    Route::get('/edit/{id}', [AdminKeanggotaanController::class, 'edit'])->name('admin.keanggotaan.edit');
    Route::post('/update/{id}', [AdminKeanggotaanController::class, 'update'])->name('admin.keanggotaan.update');
  });


  Route::prefix('baptisAnak')->group(function () {
    Route::get('/', [AdminBaptisAnakController::class, 'index'])->name('admin.baptisAnak.index');
    Route::get('/show/{id}', [AdminBaptisAnakController::class, 'show'])->name('admin.baptisAnak.show');
    Route::get('/edit/{id}', [AdminBaptisAnakController::class, 'edit'])->name('admin.baptisAnak.edit');
    Route::get('/tolak/{id}', [AdminBaptisAnakController::class, 'tolak'])->name('admin.baptisAnak.tolak');
    Route::post('/update/{id}', [AdminBaptisAnakController::class, 'update'])->name('admin.baptisAnak.update');
  });

  Route::prefix('baptisDewasa')->group(function () {
    Route::get('/', [AdminBaptisDewasaController::class, 'index'])->name('admin.baptisDewasa.index');
    Route::get('/show/{id}', [AdminBaptisDewasaController::class, 'show'])->name('admin.baptisDewasa.show');
    Route::get('/edit/{id}', [AdminBaptisDewasaController::class, 'edit'])->name('admin.baptisDewasa.edit');
    Route::get('/tolak/{id}', [AdminBaptisDewasaController::class, 'tolak'])->name('admin.baptisDewasa.tolak');
    Route::post('/update/{id}', [AdminBaptisDewasaController::class, 'update'])->name('admin.baptisDewasa.update');
  });


  Route::prefix('sidi')->group(function () {
    Route::get('/', [AdminSidiController::class, 'index'])->name('admin.sidi.index');
    Route::get('/show/{id}', [AdminSidiController::class, 'show'])->name('admin.sidi.show');
    Route::get('/edit/{id}', [AdminSidiController::class, 'edit'])->name('admin.sidi.edit');
    Route::get('/tolak/{id}', [AdminSidiController::class, 'tolak'])->name('admin.sidi.tolak');
    Route::post('/update/{id}', [AdminSidiController::class, 'update'])->name('admin.sidi.update');
  });


  Route::prefix('izin-nikah')->group(function () {
    Route::get('/', [AdminIzinNikahController::class, 'index'])->name('admin.izin_nikah.index');
    Route::get('/show/{id}', [AdminIzinNikahController::class, 'show'])->name('admin.izin_nikah.show');
    Route::get('/edit/{id}', [AdminIzinNikahController::class, 'edit'])->name('admin.izin_nikah.edit');
    Route::post('/update/{id}', [AdminIzinNikahController::class, 'update'])->name('admin.izin_nikah.update');
  });

  Route::prefix('peneguhan-nikah')->group(function () {
    Route::get('/', [AdminPeneguhanNikahController::class, 'index'])->name('admin.peneguhan_nikah.index');
    Route::get('/show/{id}', [AdminPeneguhanNikahController::class, 'show'])->name('admin.peneguhan_nikah.show');
    Route::get('/edit/{id}', [AdminPeneguhanNikahController::class, 'edit'])->name('admin.peneguhan_nikah.edit');
    Route::get('/tolak/{id}', [AdminPeneguhanNikahController::class, 'tolak'])->name('admin.peneguhan_nikah.tolak');
    Route::post('/update/{id}', [AdminPeneguhanNikahController::class, 'update'])->name('admin.peneguhan_nikah.update');
  });
});


require __DIR__ . '/auth.php';

Auth::routes();
