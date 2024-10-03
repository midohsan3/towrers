<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserClassifieds;
use App\Http\Controllers\TowersController;
use App\Http\Controllers\Person\PCvController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Person\PhonController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Person\PInterestController;
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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/company/register', [TowersController::class, 'companyRegister'])->name('front.company.register');

        Route::get('/person/register', [TowersController::class, 'personRegister'])->name('front.person.register');

        Route::post('/company/store', [TowersController::class, 'companyStore'])->name('front.company.store');

        Route::post('/person/store', [TowersController::class, 'personStore'])->name('front.person.store');
    }
);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [FrontController::class, 'index'])->name('front');

        Route::get('/home/main', [FrontController::class, 'main'])->name('front.main');

        Route::get('/home/companies', [FrontController::class, 'companies'])->name('front.companies');

        Route::get('/sec{section}/companies', [FrontController::class, 'companiesBySection'])->name('front.companies.section');

        Route::get('/sec_{section}/mj_{major}', [FrontController::class, 'companiesByMajors'])->name('front.companies.major');

        Route::get('/co{company}/company', [FrontController::class, 'singleCompany'])->name('front.companies.single');

        Route::get('/co{old_project}/company/profile', [FrontController::class, 'companySingleOldProject'])->name('front.companies.single.o_project');

        Route::get('/co{old_project}/company/profile/glary', [FrontController::class, 'companySingleOldProjectGlary'])->name('front.companies.single.o_project.glary');

        Route::post('/order/store', [FrontController::class, 'orderStore'])->name('front.order.store');

        Route::get('/main/projects', [FrontController::class, 'projects'])->name('front.project');

        Route::get('/ca{category}/projects', [FrontController::class, 'projectsByCategory'])->name('front.project.category');

        Route::get('/pr{project}/projects', [FrontController::class, 'project'])->name('front.project.single');

        Route::get('/main/jobs', [FrontController::class, 'jobs'])->name('front.jobs');

        Route::get('/jb{category}/jobs', [FrontController::class, 'jobsByCategory'])->name('front.jobs.category');

        Route::get('/jb{job}/jobsingle', [FrontController::class, 'singleJob'])->name('front.jobs.single');

        //Route::post('/jobs/single/apply', [FrontController::class, 'apply'])->name('front.jobs.apple');

        Route::get('/main/cvs', [FrontController::class, 'cvs'])->name('front.cvs');

        Route::get('/cv{category}/cvs', [FrontController::class, 'cvsByCategory'])->name('front.cvs.category');

        Route::get('/main/gallery', [FrontController::class, 'videosGallery'])->name('front.videos_gallery');

        Route::get('/products/all', [FrontController::class, 'products'])->name('front.product');

        Route::get('/prd{category}/products', [FrontController::class, 'productsByCategory'])->name('front.product.category');

        Route::get('/sing{product}/product', [FrontController::class, 'singleProduct'])->name('front.product.single');

        Route::post('/product/enquiry', [FrontController::class, 'productEnquiry'])->name('front.product.enquiry');

        Route::get('/main/Videos', [FrontController::class, 'videos'])->name('front.videos');

        Route::get('/main/choose-ad', [FrontController::class, 'chooseAd'])->name('ad.choose');
    }
);



//Route::get('/test', [FrontController::class, 'index']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
==========================
Front ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), /*'namespace' => 'Front',*/
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
    }
);



/*
==========================
PERSONAL Phone ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/personal/dashboard/info', 'namespace' => 'Personal',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::post('/phone', [PhonController::class, 'updatePhone'])->name('person.phone.update');
    }
);

/*
==========================
PERSONAL ACCOUNT CV ROUTS
==========================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/personal/dashboard/mycv', 'namespace' => 'Personal',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [PCvController::class, 'index'])->name('person.vb.index');

        Route::post('/store', [PCvController::class, 'store'])->name('person.cv.store');

        Route::post('/update', [PCvController::class, 'update'])->name('person.cv.update');
    }
);

/*
================================
PERSONAL ACCOUNT INTERESTS ROUTS
================================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/personal/dashboard/my-interests', 'namespace' => 'Personal',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

         Route::get('/', [PInterestController::class, 'index'])->name('person.interest.index');
    }
);

/*
==========================
ADS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {



        Route::get('/create-ad{package}/package', [AdController::class, 'create'])->name('ad.create');

        Route::post('/store', [AdController::class, 'store'])->name('ad.store');

        Route::get('/main{classified}/pay', [AdController::class, 'pay'])->name('ad.pay');

        Route::get('/main{classified}/finishpayment', [AdController::class, 'finishPayment'])->name('ad.finish');
    }
);

/*
==========================
USER CLASSIFIEDS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/my-classifieds',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/main/choose', [UserClassifieds::class, 'index'])->name('my.classifieds.index');
    }
);

/*
==========================
SEARCH ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/find',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::post('/', [SearchController::class, 'index'])->name('search.index');
    }
);