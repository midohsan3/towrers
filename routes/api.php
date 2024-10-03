<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CVPController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\JopPController;
use App\Http\Controllers\Api\HomePController;
use App\Http\Controllers\Api\RealsPController;
use App\Http\Controllers\Api\CompanyPCotroller;
use App\Http\Controllers\Api\ProjectPCotroller;
use App\Http\Controllers\Api\ProductPController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\InterestPController;
use App\Http\Controllers\Api\NotificationPController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/home', [RegisterController::class, 'company']);


/*
==================
= HOME PAGE
==================
*/

Route::group(
    [
        'prefix' => '/home', 'namespace' => 'Api'

    ],
    function () {

        Route::post('/search/projects',[HomePController::class, 'projectsSearch'])->name('api.home.search.projects');

        Route::post('/search/companies/category',[HomePController::class, 'categorySearch'])->name('api.home.search.category');

        Route::post('/search/consultants',[HomePController::class, 'consultantsSearch'])->name('api.home.search.consultants');

        Route::post('/search/contractors',[HomePController::class, 'contractorsSearch'])->name('api.home.search.contractors');

        Route::post('/search/subcontractors',[HomePController::class, 'subcontractorsSearch'])->name('api.home.search.subcontractors');

        Route::post('/search/suppliers',[HomePController::class, 'suppliersSearch'])->name('api.home.search.suppliers');

        Route::post('/search/building_materials',[HomePController::class, 'buildingMaterialsSearch'])->name('api.home.search.buildingMaterials');

        Route::post('/search/realestates',[HomePController::class, 'realestatesSearch'])->name('api.home.search.realestates');

        Route::post('/search/designers',[HomePController::class, 'designersSearch'])->name('api.home.search.designers');

        Route::post('/search/jobs',[HomePController::class, 'jobsSearch'])->name('api.home.search.jobs');

        Route::post('/search/cvs',[HomePController::class, 'cvsSearch'])->name('api.home.search.cvs');

        Route::post('/search/products',[HomePController::class, 'productsSearch'])->name('api.home.search.products');

        Route::get('/main_slider',[HomePController::class, 'mainSlider'])->name('api.home.mainSlider');

        Route::get('/news_bar',[HomePController::class, 'newsBar'])->name('api.home.newsBar');

        Route::get('/top_adds',[HomePController::class, 'topAds'])->name('api.home.topAds');

        Route::get('/projects',[HomePController::class, 'projects'])->name('api.home.projects');

        Route::get('/consultants',[HomePController::class, 'consultants'])->name('api.home.consultants');

        Route::get('/contractors',[HomePController::class, 'contractors'])->name('api.home.contractors');

        //Route::get('/3adds',[HomePController::class, 'secoundRow'])->name('api.home.secoundRow');

        Route::get('/sub_contractors',[HomePController::class, 'subContractors'])->name('api.home.subContractors');

        Route::get('/suppliers',[HomePController::class, 'suppliers'])->name('api.home.suppliers');

        Route::get('/w_video',[HomePController::class, 'wVideo'])->name('api.home.w_video');

        Route::get('/single_video',[HomePController::class, 'singleVideo'])->name('api.home.single_video');


        Route::get('/building_materials',[HomePController::class, 'buildingMaterials'])->name('api.home.buildingMaterials');

        Route::get('/real_estate',[HomePController::class, 'RealEstate'])->name('api.home.RealEstate');

        Route::get('/single_add',[HomePController::class, 'singleAdd'])->name('api.home.singleAdd');

        Route::get('/decor',[HomePController::class, 'decor'])->name('api.home.decor');

        Route::get('/jobs',[HomePController::class, 'jobs'])->name('api.home.jobs');

        Route::get('/decor',[HomePController::class, 'decor'])->name('api.home.decor');

        Route::get('/jobs',[HomePController::class, 'jobs'])->name('api.home.jobs');

        Route::get('/cvs',[HomePController::class, 'cvs'])->name('api.home.cvs');

        Route::get('/products',[HomePController::class, 'products'])->name('api.home.products');
    }
);
/*
==================
= REGISTRATION
==================
*/

Route::group(
    [
        'prefix' => '/home', 'namespace' => 'Api'

    ],
    function () {

        Route::post('/register/company',[RegisterController::class, 'company'])->name('api.register.company');

        Route::post('/register/person',[RegisterController::class, 'person'])->name('api.register.person');

        Route::post('/user/login',[RegisterController::class, 'logs'])->name('api.home.login');
    }
);

/*
==================
= COMPANIES PAGE
==================
*/

Route::group(
    [
        'prefix' => '/companies', 'namespace' => 'Api'

    ],
    function () {

        Route::get('/categories/index',[CompanyPCotroller::class,'categories'])->name('api.company.categories');

        Route::get('/categories/majors/index',[CompanyPCotroller::class,'majors'])->name('api.company.categories.majors');

        Route::get('/communications',[CompanyPCotroller::class,'communications'])->name('api.company.communications');

        Route::get('/index', [CompanyPCotroller::class, 'index'])->name('api.company.index');

        Route::get('/category_{id}',[CompanyPCotroller::class,'category'])->name('api.company.category');

        Route::get('/category_{category}/major_{major}',[CompanyPCotroller::class,'companyMajor'])->name('api.company.category.major');

        Route::get('/company_{id}',[CompanyPCotroller::class,'singleCompany'])->name('api.company.single');

        Route::get('/slider_{id}',[CompanyPCotroller::class,'sliders'])->name('api.company.sliders');

        Route::get('/projectsCount_{id}',[CompanyPCotroller::class,'projectsCount'])->name('api.company.projectsCount');

        Route::get('/contacts_{id}',[CompanyPCotroller::class,'contacts'])->name('api.company.contacts');

        Route::get('/projects_{id}',[CompanyPCotroller::class,'projects'])->name('api.company.projects');

        Route::get('/old_projects_{id}',[CompanyPCotroller::class,'oldProjects'])->name('api.company.oldProjects');

        Route::get('/single/old_project_{old_project}',[CompanyPCotroller::class,'companySingleOldProject'])->name('api.company.companySingleOldProject');

        Route::get('/related_projects_{id}',[CompanyPCotroller::class,'relatedProjects'])->name('api.company.related_projects');

        Route::post('/inquire',[CompanyPCotroller::class,'inquire'])->name('api.company.inquire');
    }
);
/*
==================
= PROJECTS PAGE
==================
*/

Route::group(
    [
        'prefix' => '/projects', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [ProjectPCotroller::class, 'index'])->name('api.project.index');

        Route::get('/categories', [ProjectPCotroller::class, 'categories'])->name('api.project.categories');

        Route::get('/category_{category}', [ProjectPCotroller::class, 'category'])->name('api.project.category');

        Route::get('/single_{projectId}', [ProjectPCotroller::class, 'single'])->name('api.project.single');

        Route::get('/single_{projectId}/photos', [ProjectPCotroller::class, 'photos'])->name('api.project.photos');

        Route::get('/single_{projectId}/recommended', [ProjectPCotroller::class, 'recommended'])->name('api.project.recommended');

        Route::get('/single_{projectId}/companies', [ProjectPCotroller::class,
        'companiesByProject'])->name('api.project.companiesByProject');
    }
);
/*
==================
= PRODUCTS PAGE
==================
*/

Route::group(
    [
        'prefix' => '/products', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [ProductPController::class, 'index'])->name('api.product.index');

        Route::get('/photos', [ProductPController::class, 'photos'])->name('api.product.photos');

        Route::get('/categories', [ProductPController::class, 'categories'])->name('api.product.categories');

        Route::get('/category_{category}', [ProductPController::class, 'category'])->name('api.product.category');

        Route::get('/single_{product}', [ProductPController::class, 'single'])->name('api.product.single');
        Route::get('/single_{product}/photos', [ProductPController::class, 'productPhotos'])->name('api.product.productPhotos');

        Route::get('/single_{product}/recommended', [ProductPController::class, 'recommended'])->name('api.product.recommended');

        Route::post('/inquire', [ProductPController::class, 'inquire'])->name('api.product.inquire');
    }
);
/*
==================
= JOBS PAGE
==================
*/

Route::group(
    [
        'prefix' => '/jobs', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [JopPController::class, 'index'])->name('api.job.index');

        Route::get('/categories', [JopPController::class, 'categories'])->name('api.job.categories');

        Route::get('/category_{category}', [JopPController::class, 'category'])->name('api.job.category');

        Route::get('/single_{job}', [JopPController::class, 'single'])->name('api.job.single');
    }
);
/*
==================
= CVS PAGE
==================
*/

Route::group(
    [
        'prefix' => '/cvs', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [CVPController::class, 'index'])->name('api.cv.index');

        Route::get('/category_{category}', [CVPController::class, 'category'])->name('api.cv.category');
    }
);
/*
==================
= Reals PAGE
==================
*/

Route::group(
    [
        'prefix' => '/reals', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [RealsPController::class, 'index'])->name('api.job.index');
    }
);

/*
==================
= CITIES
==================
*/

Route::group(
    [
        'prefix' => '/cities', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [CityController::class, 'index'])->name('api.job.index');
    }
);

/*
==================
= INTERESTS
==================
*/

Route::group(
    [
        'prefix' => '/interest', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index', [InterestPController::class, 'index'])->name('api.interest.index');

        Route::post('/update', [InterestPController::class, 'update'])->name('api.interest.update');
    }
);

/*
==================
= NOTIFICATIONS
==================
*/

Route::group(
    [
        'prefix' => '/notification', 'namespace' => 'Api'

    ],
    function () {
        Route::get('/index_{user_id}', [NotificationPController::class, 'index'])->name('api.notification.index');
    }
);