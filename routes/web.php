<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\TagController;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\UserController;

// authentication
Route::middleware('guest')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login-form');
  Route::post('login-submit', [LoginController::class, 'login'])->name('login.submit');


  Route::get('forgot-password', [ForgotPasswordBasic::class, 'showForgetPasswordForm'])->name('forgot-password');

  Route::post('forgot-password', [ForgotPasswordBasic::class, 'submitForgetPasswordForm'])->name('forget.password.post');

  Route::get('reset-password/{token}', [ForgotPasswordBasic::class, 'showResetPasswordForm'])->name('reset.password.get');

  Route::post('reset-password', [ForgotPasswordBasic::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
Route::middleware('auth')->group(function () {

  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  // Route::resource('roles', RoleController::class);

  Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{users}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{users}', [UserController::class, 'update'])->name('update');
    Route::get('/destroy/{users}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
  });

  // Main Page Route
  Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

  // customer route
  Route::prefix('organizations')->name('organizations.')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('index');
    Route::get('data', [CompanyController::class, 'getData'])->name('data');
    Route::get('/create', [CompanyController::class, 'create'])->name('create');
    Route::post('/store', [CompanyController::class, 'store'])->name('store');
    Route::get('/edit/{customer}', [CompanyController::class, 'edit'])->name('edit');
    Route::put('/update/{customer}', [CompanyController::class, 'update'])->name('update');
    Route::get('/destroy/{customer}', [CompanyController::class, 'destroy'])->name('destroy');
    Route::get('/show/{customer}', [CompanyController::class, 'show'])->name('show');
  });
  Route::prefix('leads')->name('leads.')->group(function () {
    Route::get('/', [LeadController::class, 'index'])->name('index');
    Route::get('data', [LeadController::class, 'getData'])->name('data');
    Route::get('/create', [LeadController::class, 'create'])->name('create');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
    Route::get('/edit/{leads}', [LeadController::class, 'edit'])->name('edit');
    Route::post('/update/{leads}', [LeadController::class, 'update'])->name('update');
    Route::get('/destroy/{leads}', [LeadController::class, 'destroy'])->name('destroy');


    Route::get('/{lead}/activities', [LeadController::class, 'getActivities'])->name('activities');
    Route::post('/{lead}/notes', [LeadController::class, 'storeNote'])->name('store-notes');
  });
  Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/store', [TagController::class, 'store'])->name('store');
    Route::get('/edit/{tags}', [TagController::class, 'edit'])->name('edit');
    Route::post('/update/{tags}', [TagController::class, 'update'])->name('update');
    Route::get('/destroy/{tags}', [TagController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('titles')->name('titles.')->group(function () {
    Route::get('/', [TitleController::class, 'index'])->name('index');
    Route::get('/create', [TitleController::class, 'create'])->name('create');
    Route::post('/store', [TitleController::class, 'store'])->name('store');
    Route::get('/edit/{titles}', [TitleController::class, 'edit'])->name('edit');
    Route::post('/update/{titles}', [TitleController::class, 'update'])->name('update');
    Route::get('/destroy/{titles}', [TitleController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('pipelines')->name('pipelines.')->group(function () {
    Route::get('/', [PipelineController::class, 'index'])->name('index');
    Route::get('data', [PipelineController::class, 'getData'])->name('data');
    Route::post('/store', [PipelineController::class, 'store'])->name('store');
    Route::get('/edit/{pipelines}', [PipelineController::class, 'edit'])->name('edit');
    Route::post('/update/{pipelines}', [PipelineController::class, 'update'])->name('update');
    Route::get('/destroy/{pipelines}', [PipelineController::class, 'destroy'])->name('destroy');
  });

  // customer route
  Route::prefix('general')->name('general.')->group(function () {
    Route::get('/countries', [GeneralController::class, 'getCountries'])->name('countries');
    Route::get('/states', [GeneralController::class, 'getStates'])->name('states');
    Route::get('/users', [GeneralController::class, 'getNonCustomerUsers'])->name('users');
    Route::get('/customers', [GeneralController::class, 'getCustomerUsers'])->name('customers');
    Route::post('/customer-detail', [GeneralController::class, 'getCustomerDetail'])->name('customer-detail');
  });
});
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');


// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');

Route::get('/testpage', [TablesBasic::class, 'testpage']);




// routes by fahad

// CEO routes (no middleware for testing)
Route::prefix('ceo')->group(function () {
  Route::view('/dashboard', 'dashboard.ceo.dashboard')->name('ceo.dashboard');
  Route::view('/insights', 'dashboard.ceo.insights')->name('ceo.insights');
  Route::view('/master-data', 'dashboard.ceo.master-data')->name('ceo.master-data');
});

// HR
Route::prefix('hr')->group(function () {
  Route::view('/dashboard', 'dashboard.hr.dashboard')->name('hr.dashboard');
  Route::view('/employee-management', 'dashboard.hr.employee-management')->name('hr.employee-management');
  Route::view('/form-handling', 'dashboard.hr.form-handling')->name('hr.form-handling');
  Route::view('/logs', 'dashboard.hr.logs')->name('hr.logs');
  Route::view('/master-data', 'dashboard.hr.master-data')->name('hr.master-data');
});

// Employee
Route::prefix('employee')->group(function () {
  Route::view('/profile', 'dashboard.employee.profile')->name('employee.profile');
  Route::view('/form', 'dashboard.employee.grading-form')->name('employee.form');
  Route::view('/scorecard', 'dashboard.employee.scorecard')->name('employee.scorecard');
  Route::view('/master-data', 'dashboard.employee.master-data')->name('employee.master-data');
});
Route::get('/master-data', function () {
  return view('content.master-data.index');
})->name('master-data');
