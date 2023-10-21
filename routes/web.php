<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/auth/social-auth', [SocialAuthController::class, 'index'])->name('social-auth');
Route::get('/auth/google/redirect', [SocialAuthController::class, 'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('googleCallback');
//Route::get('/testPage', function () {
//    return view('testPage');
//})->name('testPage');



Route::get('/MenuSearch', 'Main\MenuSearchController@search')->name('menusearch');
Route::get('/search', 'Main\SearchController@search')->name('search');
Route::get('/contact', 'Main\ContactController@index')->name('Contact');
Route::get('/about', 'Main\AboutController@index')->name('About');



Route::get('/', 'Main\IndexController@index')->name('/');
Route::get('/{lang}', 'Main\LangCookieController@create')->name('/lang');
Route::get('/{asdl}/login', 'Main\MainLoginController@index')->name('MainLogin');
Route::get('/{asdr}/register', 'Main\MainRegisterController@index')->name('MainRegister');
Route::get('/Salon/{SsalonId}', 'SalonController@index')->name('Salon');
Route::get('/Staff/{_staffid}/{massId}', 'StaffController@index')->name('SalonStaff');


Route::group(['', 'middleware' => 'admin'], function () {
    Route::get('/AdminPanel/index', 'Admin\AdminPanelController@index')->name('AdminPanel');


    Route::get('/AdminPanel/Users/index', 'Admin\Users\IndexController@index')->name('AdminPanel.Users');
    Route::get('/AdminPanel/Users/search', 'Admin\Users\IndexController@search')->name('UserSearch');
    Route::get('/AdminPanel/Users/{AdminUseredit}/edit', 'Admin\Users\IndexController@edit')->name('AdminUsers.edit');
    Route::patch('/AdminPanel/Users/{AdminUserupdate}/Update', 'Admin\Users\IndexController@update')->name('AdminUsers.update');
    Route::post('/AdminPanel/Users/{AdminUserdelete}/Delete', 'Admin\Users\IndexController@delete')->name('AdminUsers.delete');
    Route::get('/AdminPanel/Citylist/index', 'Admin\Citylist\CitylistController@index')->name('AdminPanel.Citylist');
    Route::post('/AdminPanel/Citylist/{cityId}/Delete', 'Admin\Citylist\CitylistController@delete')->name('AdminCity.delete');
    Route::post('/AdminPanel/Citylist/add', 'Admin\Citylist\CitylistController@create')->name('AdminCity.add');
    Route::get('/AdminPanel/Citylist/search', 'Admin\Citylist\CitylistController@search')->name('CitylistSearch');


    Route::get('/AdminPanel/Salons/index', 'Admin\Salons\IndexController@index')->name('AdminPanel.Salons');
    Route::get('/AdminPanel/Salons/search', 'Admin\Salons\IndexController@search')->name('SalonSearch');
    Route::get('/AdminPanel/salons/{AdminSalonedit}/edit', 'Admin\Salons\IndexController@edit')->name('AdminSalons.edit');
    Route::patch('/AdminPanel/salons/{AdminSalonupdate}/Update', 'Admin\Salons\IndexController@update')->name('AdminSalons.update');
    Route::post('/AdminPanel/salons/{AdminSalondelete}/Delete', 'Admin\Salons\IndexController@delete')->name('AdminSalons.delete');


    Route::get('/AdminPanel/Staffs/index', 'Admin\Staffs\IndexController@index')->name('AdminPanel.Staffs');
    Route::get('/AdminPanel/Staffs/search', 'Admin\Staffs\IndexController@search')->name('StaffsSearch');
    Route::get('/AdminPanel/Staffs/{AdminStaffedit}/edit', 'Admin\Staffs\IndexController@edit')->name('AdminStaffs.edit');
    Route::patch('/AdminPanel/Staffs/{AdminStaffupdate}/Update', 'Admin\Staffs\IndexController@update')->name('AdminStaffs.update');
    Route::patch('/AdminPanel/Staffs/{AdminStaffdelete}/Delete', 'Admin\Staffs\RemoveController@update')->name('AdminStaffs.delete');


    Route::get('/AdminPanel/Categories/index', 'Admin\Categories\IndexController@index')->name('AdminPanel.Categories');
    Route::get('/AdminPanel/Categories/Search/index', 'Admin\Categories\IndexController@search')->name('AdminPanel.RoleSearch');

    Route::get('/AdminPanel/Categories/{Specedit}/Specedit', 'Admin\Categories\SpeceditController@edit')->name('AdminPanel.SpecEdit');
    Route::patch('/AdminPanel/Categories/{Specupdate}/SpecUpdate', 'Admin\Categories\SpeceditController@update')->name('AdminPanel.SpecUpdate');
    Route::post('/AdminPanel/Categories/{Specdelete}/SpecDelete', 'Admin\Categories\SpeceditController@delete')->name('AdminPanel.SpecDelete');


    Route::post('/AdminPanel/addSpec', 'Admin\Categories\SpecaddController@create')->name('AdminPanel.addSpec');

});


Route::group(['', 'middleware' => 'verified'], function () {

    Route::get('/Manual/lessons', 'Manual\ManualController@index')->name('Manual');

    Route::get('/UserProfile/index', 'UserProfileController@index')->name('UserProfile');
    Route::get('/UserProfile/{UserProfile}/edit', 'UserProfileController@edit')->name('UserProfile.edit');
    Route::patch('/UserProfile/{UserProfile}', 'UserProfileController@update')->name('UserProfile.update');
    Route::patch('/UserProfile', 'UserProfile\UserAvatarUpdateController@update')->name('UserAvatarUpdate.update');


//ჩემს მიერ გაკეთებული ჯავშნები
    Route::get('/UserProfile/Reservations/index', 'ReservationsController@index')->name('Reservations');
    Route::patch('/Job/Reservations/{resid}', 'Job\Staff\EventCancelController@update')->name('Event.CancelUser');

//კლიენტების მიერ გაკეთებული ჯავშნები
    Route::get('/Events/index', 'Job\Events\EventController@index')->name('Events');
    Route::patch('/Job/Reservations/Update/{Evid}', 'Job\Events\EventStatusUpdateController@update')->name('Event.StatusUpdate');
    Route::patch('/Job/Reservations/{EvidM}/UpdateManager/{BarberId}', 'Job\Events\EventStatusUpdateManagerController@update')->name('Event.StatusUpdateManager');

    Route::post('/Job/Events/Clientinfo/index/{ClientId}', 'Job\Events\ClientInfoController@index')->name('ClientInfo');

    Route::get('/Events/Manager/index/{tanamshId}', 'Job\Events\ManagerEventsController@index')->name('Manager');


    Route::get('/Job/index', 'Job\StatusController@index')->name('Job');
    Route::patch('/Job/StatusUpdate{Userid}', 'Job\StatusController@update')->name('Status.update');
    Route::patch('/Job/StaffcodeUpdate/{Userid}', 'Job\StaffCodeController@update')->name('StaffCode.update');

    Route::get('/Job/Beautysalon', 'Job\BeautysalonController@index')->name('Job.Beautysalon');
    Route::post('/Job/Beautysalon/Create', 'Job\BeautysalonController@create')->name('Job.BeautysalonCreate');
    Route::patch('/Job/Beautysalon/{SalonUpdate}', 'Job\BeautysalonController@update')->name('Job.BeautysalonUpdate');
    Route::post('/Job/Beautysalon/Delete', 'Job\BeautysalonController@delete')->name('Job.BeautysalonDelete');
    Route::get('/Job/Beautysalon/search', 'Job\BeautysalonController@search')->name('Job.StaffSearch');
    Route::patch('/Job/Beautysalon/SalonFlipphotoUpdate/{salonflipid}', 'Job\Salon\FlipPhotoController@update')->name('Salon.FlipPhotoUpdate');


    Route::patch('/Job/SalonStaff/{Create}', 'Job\SalonStaffAddController@update')->name('Job.SalonStaffCreate');
    Route::get('/Job/{staffid}/StaffEdit', 'Job\SalonStaffController@edit')->name('Job.StaffEdit');
    Route::patch('/Job/{staffupdate}/StaffUpdate', 'Job\SalonStaffController@update')->name('Job.StaffUpdate');
    Route::patch('/Job/{staffdelete}/StaffDelete', 'Job\SalonStaffRemoveController@update')->name('Job.StaffDelete');
    Route::post('/Job/{staffclean}/StaffClean', 'Job\StaffCodeController@delete')->name('Job.StaffClean');


//For Barber პირად კაბინეტში
    Route::get('/Job/Staff/index', 'Job\Staff\StaffController@index')->name('Staff');
    Route::get('/Job/Staff/calendar', 'Job\Staff\StaffController@calendar')->name('Staff.calendar');
    Route::patch('/Job/Staff/FlipphotoUpdate', 'Job\Staff\FlipPhotoController@update')->name('Staff.FlipPhotoUpdate');
    Route::patch('/Job/Staff/RoleUpdate', 'Job\Staff\RoleUpdateController@update')->name('Staff.RoleUpdate');
    Route::patch('/Job/Staff/WorkingUpdate', 'Job\Staff\WorkingUpdateController@update')->name('Staff.WorkingUpdate');
    Route::post('/Job/Staff/AbilityCreate', 'Job\Staff\AbilitiesController@create')->name('Staff.AbilityCreate');
    Route::post('/Job/Staff/AbilityDelete/{AbilitydelId}', 'Job\Staff\AbilitiesController@delete')->name('Staff.AbilityDelete');


//For Users
    Route::post('/Staff/feedback/add{feedbackid}', 'FeedbackController@create')->name('Feedbackadd');
    Route::post('/Staff/feedback/Delete{feedbid}', 'StaffController@delete')->name('BarberFeedback.delete');
    Route::post('/Booksy/Create/{barberId}', 'EventController@create')->name('Booksy.Create');


//სალონის რეიტინგი იუზერებისთვის
    Route::post('/Salon/Salfeedbacks/add{salfeedbacksid}', 'SalfeedbacksController@create')->name('Salfeedbacksadd');
    Route::post('/Salon/Salfeedbacks/Delete{salfeedbid}', 'SalonController@delete')->name('Salfeedbacks.delete');


});


Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
