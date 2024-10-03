<?php

use App\Models\OldProjectPhotoMdl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CompanyByProject;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\InterestController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\ClassifiedController;
use App\Http\Controllers\Admin\MainSliderController;
use App\Http\Controllers\Admin\OldProjectController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\SingleVideoController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\Admin\ProjectPhotoController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\CommunicationController;
use App\Http\Controllers\Admin\CompanySliderController;
use App\Http\Controllers\Admin\MajorBySectionController;
use App\Http\Controllers\Admin\OldProjectPhotoController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProductByCompanyController;
use App\Http\Controllers\Admin\ProjectByCompanyController;
use App\Http\Controllers\Admin\ClassifiedPackageController;
use App\Http\Controllers\Admin\InstructionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('pageCount', 20);

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
USER PROFILE
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/user/profile', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [UserProfileController::class, 'personal'])->name('user.profile');

        Route::post('/personal/update', [UserProfileController::class, 'personalUpdate'])->name('user.profile.personalUpdate');

        Route::get('/company', [UserProfileController::class, 'companyInfo'])->name('user.profile.company');

        Route::get('/personal/change-password', [UserProfileController::class, 'changePassword'])->name('user.profile.ngePassword');

        Route::post('/personal/change-password', [UserProfileController::class, 'updatePassword'])->name('user.profile.updatePassword');
    }
);

/*
==========================
DASHBOARD ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/admin', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [AdminDashController::class, 'index'])->name('admin_dashboard.index');
    }
);


/*
==========================
ROLES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/roles', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [RoleController::class, 'index'])->name('role.index');

        Route::get('/create', [RoleController::class, 'create'])->name('role.create');

        Route::post('/store', [RoleController::class, 'store'])->name('role.store');

        Route::get('/r{role}/show', [RoleController::class, 'show'])->name('role.show');

        Route::get('/r{role}/edit', [RoleController::class, 'edit'])->name('role.edit');

        Route::post('r{role}/update', [RoleController::class, 'update'])->name('role.update');

        Route::post('destroy', [RoleController::class, 'destroy'])->name('role.destroy');
    }
);

/*
==========================
CITIES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/cities', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CityController::class, 'index'])->name('city.index');

        Route::get('/active', [CityController::class, 'active'])->name('city.active');

        Route::get('/inactive', [CityController::class, 'inactive'])->name('city.inactive');

        Route::get('/create', [CityController::class, 'create'])->name('city.create');

        Route::post('/store', [CityController::class, 'store'])->name('city.store');

        Route::get('/ct{city}/show', [CityController::class, 'show'])->name('city.show');

        Route::get('/ct{city}/edit', [CityController::class, 'edit'])->name('city.edit');

        Route::post('/update', [CityController::class, 'update'])->name('city.update');

        Route::post('/activate', [CityController::class, 'activate'])->name('city.activate');

        Route::post('/deactivate', [CityController::class, 'deactivate'])->name('city.deactivate');

        Route::post('/destroy', [CityController::class, 'destroy'])->name('city.destroy');
    }
);

/*
==============================
SUBSCRIPTIONS PACKAGES ROUTS
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/packages/subscriptions', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [PackageController::class, 'index'])->name('package.index');

        Route::get('/active', [PackageController::class, 'active'])->name('package.active');

        Route::get('/inactive', [PackageController::class, 'inactive'])->name('package.inactive');

        Route::get('/create', [PackageController::class, 'create'])->name('package.create');

        Route::post('/store', [PackageController::class, 'store'])->name('package.store');

        Route::get('/pac{package}/show', [PackageController::class, 'show'])->name('package.show');

        Route::get('/pac{package}/edit', [PackageController::class, 'edit'])->name('package.edit');

        Route::post('/update', [PackageController::class, 'update'])->name('package.update');

        Route::post('/activate', [PackageController::class, 'activate'])->name('package.activate');

        Route::post('/deactivate', [PackageController::class, 'deactivate'])->name('package.deactivate');

        Route::post('/destroy', [PackageController::class, 'destroy'])->name('package.destroy');
    }
);

/*
==========================
CLASSIFIEDS PACKAGES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/packages/classifieds', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [ClassifiedPackageController::class, 'index'])->name('package.classified.index');

        Route::get('/create', [ClassifiedPackageController::class, 'create'])->name('package.classified.create');

        Route::post('/store', [ClassifiedPackageController::class, 'store'])->name('package.classified.store');

        Route::get('/pck{package}/edit', [ClassifiedPackageController::class, 'edit'])->name('package.classified.edit');

        Route::post('/update', [ClassifiedPackageController::class, 'update'])->name('package.classified.update');

        Route::post('/activate', [ClassifiedPackageController::class, 'activate'])->name('package.classified.activate');

        Route::post('/deactivate', [ClassifiedPackageController::class, 'deactivate'])->name('package.classified.deactivate');

        Route::post('/destroy', [ClassifiedPackageController::class, 'destroy'])->name('package.classified.destroy');
    }
);

/*
==========================
SECTIONS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sections', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [SectionController::class, 'index'])->name('section.index');

        Route::get('/create', [SectionController::class, 'create'])->name('section.create');

        Route::post('/store', [SectionController::class, 'store'])->name('section.store');

        Route::get('/sec{section}/show', [SectionController::class, 'show'])->name('section.show');

        Route::get('/sec{section}/edit', [SectionController::class, 'edit'])->name('section.edit');

        Route::post('/update', [SectionController::class, 'update'])->name('section.update');

        Route::post('/activate', [SectionController::class, 'activate'])->name('section.activate');

        Route::post('/deactivate', [SectionController::class, 'deactivate'])->name('section.deactivate');

        Route::post('/destroy', [SectionController::class, 'destroy'])->name('section.destroy');
    }
);

/*
==========================
MAJORS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sections/majors', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [MajorController::class, 'index'])->name('major.index');

        Route::get('/create', [MajorController::class, 'create'])->name('major.create');

        Route::post('/store', [MajorController::class, 'store'])->name('major.store');

        Route::get('/mj{major}/show', [MajorController::class, 'show'])->name('major.show');

        Route::get('/mj{major}/edit', [MajorController::class, 'edit'])->name('major.edit');

        Route::post('/update', [MajorController::class, 'update'])->name('major.update');

        Route::post('/activate', [MajorController::class, 'activate'])->name('major.activate');

        Route::post('/deactivate', [MajorController::class, 'deactivate'])->name('major.deactivate');

        Route::post('/destroy', [MajorController::class, 'destroy'])->name('major.destroy');
    }
);


/*
==========================
PROJECTS CATEGORIES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sections/projects', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [ProjectCategoryController::class, 'index'])->name('project.category.index');

        Route::get('/create', [ProjectCategoryController::class, 'create'])->name('project.category.create');

        Route::post('/create', [ProjectCategoryController::class, 'store'])->name('project.category.store');

        Route::get('/cat{category}/edit', [ProjectCategoryController::class, 'edit'])->name('project.category.edit');

        Route::post('/update', [ProjectCategoryController::class, 'update'])->name('project.category.update');

        Route::post('/activate', [ProjectCategoryController::class, 'activate'])->name('project.category.activate');

        Route::post('/deactivate', [ProjectCategoryController::class, 'deactivate'])->name('project.category.deactivate');

        Route::post('/destroy', [ProjectCategoryController::class, 'destroy'])->name('project.category.destroy');
    }
);

/*
==========================
MAJORS BY SECTION ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sections/majors', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/sec{section}', [MajorBySectionController::class, 'index'])->name('section.major.index');
    }
);

/*
==========================
COMPANIES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CompanyController::class, 'index'])->name('company.index');

        Route::get('/active', [CompanyController::class, 'active'])->name('company.active');

        Route::get('/inactive', [CompanyController::class, 'inactive'])->name('company.inactive');

        Route::get('/category_{category}', [CompanyController::class, 'category'])->name('company.category');

        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');

        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');

        Route::get('comp{company}/show', [CompanyController::class, 'show'])->name('company.show');

        Route::get('comp{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');

        Route::post('update', [CompanyController::class, 'update'])->name('company.update');

        Route::post('featured', [CompanyController::class, 'featured'])->name('company.featured');

        Route::post('normalize', [CompanyController::class, 'normalize'])->name('company.normalize');

        Route::post('activate', [CompanyController::class, 'activate'])->name('company.activate');

        Route::post('deactivate', [CompanyController::class, 'deactivate'])->name('company.deactivate');

        Route::get('comp{company}/about', [CompanyController::class, 'about'])->name('company.about');

        Route::post('about/update', [CompanyController::class, 'aboutUpdate'])->name('company.about.update');

        Route::get('comp{company}/majors', [CompanyController::class, 'majors'])->name('company.majors');

        Route::post('major/update', [CompanyController::class, 'majorUpdate'])->name('company.majors.update');

        Route::post('change/pass', [CompanyController::class, 'changePass'])->name('company.changePassword');

        Route::post('destroy', [CompanyController::class, 'destroy'])->name('company.destroy');
    }
);
/*
==========================
PERSONS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/persons', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [PersonController::class, 'index'])->name('person.index');

        Route::get('/create', [PersonController::class, 'create'])->name('person.create');

        Route::post('/store', [PersonController::class, 'store'])->name('person.store');

        Route::get('/prsn{user}/edit', [PersonController::class, 'edit'])->name('person.edit');

        Route::post('/update', [PersonController::class, 'update'])->name('person.update');

        Route::post('/activate', [PersonController::class, 'activate'])->name('person.activate');

        Route::post('/deactivate', [PersonController::class, 'deactivate'])->name('person.deactivate');

        Route::post('/pass/change', [PersonController::class, 'changePass'])->name('person.changPass');

        Route::post('/destroy', [PersonController::class, 'destroy'])->name('person.destroy');
    }
);
/*
==========================
STAFF ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/staff', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [StaffController::class, 'index'])->name('staff.index');

        Route::get('/create', [StaffController::class, 'create'])->name('staff.create');

        Route::post('/store', [StaffController::class, 'store'])->name('staff.store');

        Route::get('/stf{user}/edit', [StaffController::class, 'edit'])->name('staff.edit');

        Route::post('/update', [StaffController::class, 'update'])->name('staff.update');

        Route::post('/pass-change', [StaffController::class, 'changePass'])->name('staff.changePass');
    }
);

/*
============================
PROJECTS BY COMPANY ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/comp{company}/projects', [ProjectByCompanyController::class, 'index'])->name('company.project.index');

        Route::post('/project/store', [ProjectByCompanyController::class, 'store'])->name('company.project.store');

        Route::post('/project/destroy', [ProjectByCompanyController::class, 'destroy'])->name('company.project.destroy');
    }
);

/*
============================
PRODUCTS BY COMPANY ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/comp{user}/products', [ProductByCompanyController::class, 'index'])->name('company.product.index');

        Route::get('/comp{user}/product/create', [ProductByCompanyController::class, 'create'])->name('company.product.create');

        Route::post('/product/store', [ProductByCompanyController::class, 'store'])->name('company.product.store');
    }
);


/*
==========================
JOBS CATEGORIES ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sections/jobs', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [JobCategoryController::class, 'index'])->name('job.category.index');

        Route::get('/create', [JobCategoryController::class, 'create'])->name('job.category.create');

        Route::post('/store', [JobCategoryController::class, 'store'])->name('job.category.store');

        Route::get('/jcat{category}/edit', [JobCategoryController::class, 'edit'])->name('job.category.edit');

        Route::post('/update', [JobCategoryController::class, 'update'])->name('job.category.update');

        Route::post('/activate', [JobCategoryController::class, 'activate'])->name('job.category.activate');

        Route::post('/deactivate', [JobCategoryController::class, 'deactivate'])->name('job.category.deactivate');

        Route::post('/destroy', [JobCategoryController::class, 'destroy'])->name('job.category.destroy');
    }
);

/*
============================
SLIDERS BY COMPANY ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/companyslider/{user}/slider', [CompanySliderController::class, 'byCompany'])->name('company.slider.by.company');
    }
);

/*
==========================
COMMUNICATIONS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies/communications', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/com{company}/list', [CommunicationController::class, 'index'])->name('communication.index');

        Route::post('/store', [CommunicationController::class, 'store'])->name('communication.store');

        Route::get('/com{con}/edit', [CommunicationController::class, 'edit'])->name('communication.edit');

        Route::post('/update', [CommunicationController::class, 'update'])->name('communication.update');

        Route::post('/destroy', [CommunicationController::class, 'destroy'])->name('communication.destroy');
    }
);

/*
=============================
COMPANY OLD PROJECTS ROUTS
=============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies/oldprojects', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/com{user}/oldprojects', [OldProjectController::class, 'index'])->name('company.oldProjects.index');

        Route::get('/com{user}/oldprojects/create', [OldProjectController::class, 'create'])->name('company.oldProjects.create');

        Route::post('/oldprojects/store', [OldProjectController::class, 'store'])->name('company.oldProjects.store');

        Route::get('/com{project}/oldprojects/edit', [OldProjectController::class, 'edit'])->name('company.oldProjects.edit');

        Route::post('/oldprojects/update', [OldProjectController::class, 'update'])->name('company.oldProjects.update');

        Route::post('/oldprojects/destroy', [OldProjectController::class, 'destroy'])->name('company.oldProjects.destroy');
    }
);
/*
=====================================
COMPANY OLD PROJECTS PHOTOS ROUTS
=====================================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/companies/oldprojects', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/oldproject{project}/glary', [OldProjectPhotoController::class, 'index'])->name('company.oldProjects.glary.index');

        Route::post('/oldproject/glary/store', [OldProjectPhotoController::class, 'store'])->name('company.oldProjects.glary.store');

        Route::get('/oldproject{photo}/glary/activate', [OldProjectPhotoController::class, 'activate'])->name('company.oldProjects.glary.activate');

        Route::get('/oldproject{photo}/glary/destroy', [OldProjectPhotoController::class, 'activate'])->name('company.oldProjects.glary.destroy');
    }
);

/*
==========================
PROJECTS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/projects', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [ProjectController::class, 'index'])->name('project.index');

        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');

        Route::post('/store', [ProjectController::class, 'store'])->name('project.store');

        Route::get('/proj{project}/create', [ProjectController::class, 'edit'])->name('project.edit');

        Route::post('/update', [ProjectController::class, 'update'])->name('project.update');

        Route::post('/featured', [ProjectController::class, 'featured'])->name('project.featured');

        Route::post('/normalize', [ProjectController::class, 'normalize'])->name('project.normalize');

        Route::post('/activate', [ProjectController::class, 'activate'])->name('project.activate');

        Route::post('/deactivate', [ProjectController::class, 'deactivate'])->name('project.deactivate');

        Route::post('/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');
    }
);

/*
=============================
COMPANIES BY PROJECT ROUTS
=============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/projects', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/pro{project}/company', [CompanyByProject::class, 'index'])->name('project.company.index');

        Route::post('/company/store', [CompanyByProject::class, 'store'])->name('project.company.store');

        Route::post('/company/destroy', [CompanyByProject::class, 'destroy'])->name('project.company.destroy');
    }
);

/*
==========================
PROJECTS PHOTOS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/projects/glary', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/pro{project}/index', [ProjectPhotoController::class, 'index'])->name('project.photo.index');

        Route::post('/store', [ProjectPhotoController::class, 'store'])->name('project.photo.store');

        Route::get('/pho{photo}/def', [ProjectPhotoController::class, 'setDef'])->name('project.photo.def');

        Route::get('/pho{photo}/destroy', [ProjectPhotoController::class, 'destroy'])->name('project.photo.destroy');
    }
);

/*
============================
INTERESTS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/interests', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [InterestController::class, 'index'])->name('interest.index');

        Route::get('/create', [InterestController::class, 'create'])->name('interest.create');

        Route::post('/store', [InterestController::class, 'store'])->name('interest.store');

        Route::get('/show_{interest}', [InterestController::class, 'show'])->name('interest.show');

        Route::get('/edit_{interest}', [InterestController::class, 'edit'])->name('interest.edit');

        Route::post('/update', [InterestController::class, 'update'])->name('interest.update');

        Route::post('/activate', [InterestController::class, 'activate'])->name('interest.activate');

        Route::post('/deactivate', [InterestController::class, 'deactivate'])->name('interest.deactivate');

        Route::post('/destroy', [InterestController::class, 'destroy'])->name('interest.destroy');
    }
);
/*
============================
INSTRUCTIONS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/instruction', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [InstructionController::class, 'index'])->name('instruction.index');

        Route::get('/create/general', [InstructionController::class, 'create_general'])->name('instruction.create.general');

        Route::post('/store/general', [InstructionController::class, 'store_general'])->name('instruction.store.general');

        Route::get('/create/project', [InstructionController::class,
        'create_project'])->name('instruction.create.project');

        Route::post('/store/project', [InstructionController::class,
        'store_project'])->name('instruction.store.project');

        Route::get('/create/job', [InstructionController::class,
        'create_job'])->name('instruction.create.job');

        Route::post('/store/job', [InstructionController::class,
        'store_job'])->name('instruction.store.job');

        Route::get('/create/product', [InstructionController::class,
        'create_product'])->name('instruction.create.product');

        Route::post('/store/product', [InstructionController::class,
        'store_product'])->name('instruction.store.product');

        Route::get('/create/user', [InstructionController::class,
        'create_user'])->name('instruction.create.user');

        Route::post('/store/user', [InstructionController::class,
        'store_user'])->name('instruction.store.user');

        Route::get('/read_all', [InstructionController::class, 'readAll'])->name('instruction.readAll');
    }
);
/*
============================
UNITS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/units', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [UnitController::class, 'index'])->name('unit.index');

        Route::get('/create', [UnitController::class, 'create'])->name('unit.create');

        Route::post('/store', [UnitController::class, 'store'])->name('unit.store');

        Route::get('/un{unit}/edit', [UnitController::class, 'edit'])->name('unit.edit');

        Route::post('/update', [UnitController::class, 'update'])->name('unit.update');

        Route::post('/activate', [UnitController::class, 'activate'])->name('unit.activate');

        Route::post('/deactivate', [UnitController::class, 'deactivate'])->name('unit.deactivate');

        Route::post('/destroy', [UnitController::class, 'destroy'])->name('unit.destroy');
    }
);

/*
============================
SIZES ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/classifieds/sizes', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [SizeController::class, 'index'])->name('size.index');

        Route::get('/create', [SizeController::class, 'create'])->name('size.create');

        Route::post('/store', [SizeController::class, 'store'])->name('size.store');

        Route::get('/sz{size}/edit', [SizeController::class, 'edit'])->name('size.edit');

        Route::post('/update', [SizeController::class, 'update'])->name('size.update');

        Route::post('/activate', [SizeController::class, 'activate'])->name('size.activate');

        Route::post('/deactivate', [SizeController::class, 'deactivate'])->name('size.deactivate');

        Route::post('/destroy', [SizeController::class, 'destroy'])->name('size.destroy');
    }
);
/*
============================
PRODUCTS CATEGORIES ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/category/product', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [ProductCategoryController::class, 'index'])->name('product.category.index');

        Route::get('/create', [ProductCategoryController::class, 'create'])->name('product.category.create');

        Route::post('/store', [ProductCategoryController::class, 'store'])->name('product.category.store');

        Route::get('/uct{section}/edit', [ProductCategoryController::class, 'edit'])->name('product.category.edit');

        Route::post('/update', [ProductCategoryController::class, 'update'])->name('product.category.update');

        Route::post('/activate', [ProductCategoryController::class, 'activate'])->name('product.category.activate');

        Route::post('/deactivate', [ProductCategoryController::class, 'deactivate'])->name('product.category.deactivate');

        Route::post('/destroy', [ProductCategoryController::class, 'destroy'])->name('product.category.destroy');
    }
);

/*
==========================
PRODUCTS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/products', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [ProductController::class, 'index'])->name('product.index');

        Route::get('/create', [ProductController::class, 'create'])->name('product.create');

        Route::post('/store', [ProductController::class, 'store'])->name('product.store');

        Route::get('/prod{product}/notify', [ProductController::class, 'notify'])->name('product.notify');

        Route::get('/prod{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

        Route::post('/update', [ProductController::class, 'update'])->name('product.update');

        Route::get('/prod{product}/featured', [ProductController::class, 'featured'])->name('product.featured');

        Route::get('/prod{product}/normalize', [ProductController::class, 'normalize'])->name('product.normalize');

        Route::post('/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    }
);

/*
==========================
JOBS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/jobs', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [JobController::class, 'index'])->name('job.index');

        Route::get('/create', [JobController::class, 'create'])->name('job.create');

        Route::post('/store', [JobController::class, 'store'])->name('job.store');

        Route::get('/jo{job}/edit', [JobController::class, 'edit'])->name('job.edit');

        Route::post('/update', [JobController::class, 'update'])->name('job.update');

        Route::post('/activate', [JobController::class, 'activate'])->name('job.activate');

        Route::post('/deactivate', [JobController::class, 'deactivate'])->name('job.deactivate');

        Route::post('/destroy', [JobController::class, 'destroy'])->name('job.destroy');
    }
);

/*
==========================
CVS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/cvs', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [CvController::class, 'index'])->name('cv.index');

        Route::get('/create', [CvController::class, 'create'])->name('cv.create');

        Route::post('/store', [CvController::class, 'store'])->name('cv.store');

        Route::get('/jo{job}/edit', [CvController::class, 'edit'])->name('cv.edit');

        Route::post('/update', [CvController::class, 'update'])->name('cv.update');

        Route::post('/activate', [CvController::class, 'activate'])->name('cv.activate');

        Route::post('/deactivate', [CvController::class, 'deactivate'])->name('cv.deactivate');

        Route::post('/destroy', [CvController::class, 'destroy'])->name('cv.destroy');
    }
);
/*
==========================
PRODUCTS PHOTOS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/products', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/pr{product}/photos', [ProductPhotoController::class, 'index'])->name('product.photos.index');

        Route::post('/photos/store', [ProductPhotoController::class, 'store'])->name('product.photos.store');

        Route::get('/photos{photo}/activate', [ProductPhotoController::class, 'activate'])->name('product.photos.activate');

        Route::get('/photos{photo}/destroy', [ProductPhotoController::class, 'destroy'])->name('product.photos.destroy');
    }
);
/*
==========================
SUBSCRIPTION ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/subscription', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [SubscriptionController::class, 'index'])->name('subscription.index');
    }
);

/*
==========================
COMPANIES SLIDERS ROUTS
==========================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sliders', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/companies', [CompanySliderController::class, 'index'])->name('slider.company.index');

        Route::post('/companies/store', [CompanySliderController::class, 'store'])->name('slider.company.store');

        Route::get('/sl{slider}/edit', [CompanySliderController::class, 'edit'])->name('slider.company.edit');

        Route::post('/companies/update', [CompanySliderController::class, 'update'])->name('slider.company.update');

        Route::post('/companies/destroy', [CompanySliderController::class, 'destroy'])->name('slider.company.destroy');
    }
);
/*
============================
MAIN SLIDERS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/sliders/main', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [MainSliderController::class, 'index'])->name('slider.main.index');

        Route::post('/store', [MainSliderController::class, 'store'])->name('slider.main.store');

        Route::get('/slid{slider}/edit', [MainSliderController::class, 'edit'])->name('slider.main.edit');

        Route::post('/update', [MainSliderController::class, 'update'])->name('slider.main.update');

        Route::get('/slid{slider}/activate', [MainSliderController::class, 'activate'])->name('slider.main.activate');

        Route::get('/slid{slider}/deactivate', [MainSliderController::class, 'deactivate'])->name('slider.main.deactivate');

        Route::get('/slid{slider}/destroy', [MainSliderController::class, 'destroy'])->name('slider.main.destroy');
    }
);

/*
============================
CLASSIFIEDS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/classifieds', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [ClassifiedController::class, 'index'])->name('classified.index');

        Route::get('/create', [ClassifiedController::class, 'create'])->name('classified.create');

        Route::get('/user-info{user}', [ClassifiedController::class, 'usrInfo'])->name('classified.user.info');

        Route::get('/amount{package}', [ClassifiedController::class, 'packageAmount'])->name('classified.package.amount');

        Route::post('/store', [ClassifiedController::class, 'store'])->name('classified.store');

        Route::get('/class{classified}/edit', [ClassifiedController::class, 'edit'])->name('classified.edit');

        Route::post('/update', [ClassifiedController::class, 'update'])->name('classified.update');

        Route::post('/activate', [ClassifiedController::class, 'activate'])->name('classified.activate');

        Route::post('/deactivate', [ClassifiedController::class, 'deactivate'])->name('classified.deactivate');

        Route::post('/destroy', [ClassifiedController::class, 'destroy'])->name('classified.destroy');
    }
);

/*
============================
ORDERS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/orders', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');

        Route::get('/show-{order}', [OrderController::class, 'show'])->name('order.show');

        Route::post('/approve', [OrderController::class, 'approve'])->name('order.approve');

        Route::post('/reject', [OrderController::class, 'reject'])->name('order.reject');

        Route::post('/destroy', [OrderController::class, 'destroy'])->name('order.destroy');
    }
);

/*
============================
NEWS BAR ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/news', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');

        Route::get('/create', [NewsController::class, 'create'])->name('news.create');

        Route::post('/store', [NewsController::class, 'store'])->name('news.store');

        Route::get('/ne{news}/edit', [NewsController::class, 'edit'])->name('news.edit');

        Route::post('/update', [NewsController::class, 'update'])->name('news.update');

        Route::post('/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
    }
);

/*
============================
VIDEOS ROUTS
============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/videos', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [VideoController::class, 'index'])->name('video.index');

        Route::get('/create', [VideoController::class, 'create'])->name('video.create');

        Route::post('/store', [VideoController::class, 'store'])->name('video.store');

        Route::get('/vd{video}/edit', [VideoController::class, 'edit'])->name('video.edit');

        Route::post('/update', [VideoController::class, 'update'])->name('video.update');

        Route::get('/vd{video}/featured', [VideoController::class, 'featured'])->name('video.featured');

        Route::get('/vd{video}/normalize', [VideoController::class, 'normalize'])->name('video.normalize');

        Route::post('/destroy', [VideoController::class, 'destroy'])->name('video.destroy');
    }
);

/*
===============================
SINGLE VIDEO ROUTS(HOME PAGE)
===============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard/single/video', 'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [SingleVideoController::class, 'index'])->name('adVideo.index');

        Route::post('/update', [SingleVideoController::class, 'update'])->name('adVideo.update');
    }
);