<?php

use App\Models\OldProjectPhotoMdl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CJobController;
use App\Http\Controllers\Company\COrderController;
use App\Http\Controllers\Company\CSliderController;
use App\Http\Controllers\Company\CSocialController;
use App\Http\Controllers\Company\CPackageController;
use App\Http\Controllers\Company\CProductController;
use App\Http\Controllers\Company\CProfileController;
use App\Http\Controllers\Company\CProjectController;
use App\Http\Controllers\Company\CSectionController;
use App\Http\Controllers\Company\CInterestController;
use App\Http\Controllers\Company\CDashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

/*
==========================
DASHBOARD
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CDashboardController::class, 'index'])->name('c-company.dashboard.index');
    }
);

/*
==========================
PROFILE ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/profile', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CProfileController::class, 'index'])->name('c-company.profile.index');

        Route::get('/logo', [CProfileController::class, 'createLogo'])->name('c-company.profile.create.logo');

        Route::post('/logo/store', [CProfileController::class, 'storeLogo'])->name('c-company.profile.store.logo');

        Route::get('/address', [CProfileController::class, 'createAddress'])->name('c-company.profile.create.address');

        Route::post('/address/store', [CProfileController::class, 'storeAddress'])->name('c-company.profile.store.address');
    }
);

/*
==========================
ENQUIRY ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/orders', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [COrderController::class, 'index'])->name('c-company.order.index');

        Route::get('/show-{order}', [COrderController::class, 'show'])->name('c-company.order.show');

        Route::post('/complete', [COrderController::class, 'complete'])->name('c-company.order.complete');
    }
);

/*
==========================
COMMUNICATIONS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/social', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CSocialController::class, 'index'])->name('c-company.social.index');
    }
);

/*
==========================
PACKAGE ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/packages', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CPackageController::class, 'index'])->name('c-company.package.index');

        Route::get('/free{package}/store', [CPackageController::class, 'storeFree'])->name('c-company.package.store.free');

        Route::get('/check{package}/form', [CPackageController::class, 'check'])->name('c-company.package.paypal.form');

        Route::get('/subscribe{package}/store', [CPackageController::class, 'storeSubscribe'])->name('c-company.package.store.subscribe');
    }
);

/*
==========================
SECTION ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/section', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CSectionController::class, 'index'])->name('c-company.section.index');

        Route::post('/store', [CSectionController::class, 'store'])->name('c-company.section.store');

        Route::get('/majors', [CSectionController::class, 'majors'])->name('c-company.majors.index');

        Route::post('/majors', [CSectionController::class, 'storeMajors'])->name('c-company.majors.store');
    }
);

/*
==========================
MY-PROJECTS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/projects', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CProjectController::class, 'index'])->name('c-company.project.index');

        Route::get('/create', [CProjectController::class, 'create'])->name('c-company.project.create');

        Route::post('/store', [CProjectController::class, 'store'])->name('c-company.project.store');
    }
);

/*
==========================
MY-PRODUCTS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/products', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CProductController::class, 'index'])->name('c-company.product.index');

        Route::get('/create', [CProductController::class, 'create'])->name('c-company.product.create');

        Route::post('/store', [CProductController::class, 'store'])->name('c-company.product.store');

        Route::get('/prd{product}/edit', [CProductController::class, 'edit'])->name('c-company.product.edit');
    }
);

/*
==========================
MY-JOBS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/jobs', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CJobController::class, 'index'])->name('c-company.job.index');

        Route::get('/create', [CJobController::class, 'create'])->name('c-company.job.create');

        Route::post('/store', [CJobController::class, 'store'])->name('c-company.job.store');

        Route::get('/jb{job}/edit', [CJobController::class, 'edit'])->name('c-company.job.edit');

        Route::post('/update', [CJobController::class, 'update'])->name('c-company.job.update');
    }
);

/*
==========================
MY-INTERESTS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/interests', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CInterestController::class, 'index'])->name('c-company.interest.index');

        Route::post('/update', [CInterestController::class, 'update'])->name('c-company.interest.update');
    }
);

/*
==========================
MY-SLIDER ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/sliders', 'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CSliderController::class, 'index'])->name('c-company.slider.index');

        Route::post('/complete', [CSliderController::class, 'complete'])->name('c-company.slider.complete');
    }
);
