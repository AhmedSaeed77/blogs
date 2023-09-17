<?php 
 use App\Http\Controllers\RoomController; 
 
 use App\Http\Controllers\CountryController; 


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\YoutubeController;
use Modules\Blog\Http\Controllers\PostController;
use Modules\Blog\Http\Controllers\CommentController;

use App\Http\Controllers\PaypalController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TapController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UpdateProfile;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SettingLanguageController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get( '/', function () {
    return view('welcome');
});

// Route::get('/livewire', function () {
//     return view('livewire');
// });
Route::get('/livewire', [PostController::class, 'getlivewire'])->name('getlivewire');
Route::post('/livewire', [PostController::class, 'livewire'])->name('livewire');



Route::get('/alerts', function () {
    return view('cp.alerts')->name('alerts');
});

      
Route::get('/recapcha', function () {
    return view('recapcha');
});

Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('redirect');
Route::get('login/{provider}/callback', [SocialController::class, 'Callback'])->name('callback');
       
Route::get('/testtest', [TestController::class, 'testtest'])->name('testtest');
Route::get('/index', [TestController::class, 'index'])->name('post1.index');

//Route::get('/testtest', [TestController::class, 'testtest'])->name('testtest');
//Route::get('/testtest', [TestController::class, 'testtest'])->name('testtest');

Route::post('/password/email', [RegisterController::class, 'sendmail'])->name('student.password.email2');
Route::get('/password/resete', [RegisterController::class, 'showLinkRequestForm'])->name('student.password.request');
Route::post('/password/change', [RegisterController::class, 'changepass'])->name('student.password.changepass');
Route::get('/password/reset2',[RegisterController::class, 'showResetForm2'])->name('student.password.reset2');


Route::get('check', [AdminController::class, 'check'])->name('login');
Route::any('login', [AdminController::class, 'login'])->name('alogin');
Route::any('logout', [AdminController::class, 'logout'])->name('logout');

Route::get('checkuser', [AdminController::class, 'checkuser'])->name('loginuser');
Route::post('checkuser', [AdminController::class, 'checkuserlogin'])->name('checkuserlogin');
Route::get('registeruser', [AdminController::class, 'registeruser'])->name('registeruser');
Route::post('registeruser', [AdminController::class, 'storeuser'])->name('storeuser');
Route::any('logoutuser', [AdminController::class, 'logoutuser'])->name('logoutuser');

// Route::group(['middleware' => 'prevent-back-history'], function () {
//Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/userpage', function () {return view('user');})->name('userpage');
// });
// });


Route::get('firebase', [FirebaseController::class, 'index'])->name('firebase');
Route::group(['middleware' => 'auth'],function(){
    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
});

Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
        
        Route::get('/valex', function () {return view('cp.index');})->name('valex.index');
        Route::group(['prefix' => 'type', 'as' => 'type.'], function () {
            Route::get('/', [TypeController::class, 'index'])->name('index');
            Route::post('/store', [TypeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TypeController::class, 'edit'])->name('edit');
            Route::post('/delete', [TypeController::class, 'delete'])->name('delete');
            Route::post('/update', [TypeController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'grade', 'as' => 'grade.','middleware' => 'can:grade'], function () {
            Route::get('/', [GradeController::class, 'index'])->name('index');
            Route::post('/store', [GradeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [GradeController::class, 'edit'])->name('edit');
            Route::post('/delete', [GradeController::class, 'delete'])->name('delete');
            Route::post('/update', [GradeController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'section', 'as' => 'section.','middleware' => 'can:section'], function () {
            Route::get('/', [SectionController::class, 'index'])->name('index');
            Route::post('/store', [SectionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('edit');
            Route::post('/delete', [SectionController::class, 'delete'])->name('delete');
            Route::post('/update', [SectionController::class, 'update'])->name('update');
            Route::get('/level/{id}', [SectionController::class, 'getlevel'])->name('getlevel');
        });

        Route::group(['prefix' => 'level', 'as' => 'level.','middleware' => 'can:level'], function () {
            Route::get('/', [LevelController::class, 'index'])->name('index');
            Route::post('/store', [LevelController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('edit');
            Route::post('/delete', [LevelController::class, 'delete'])->name('delete');
            Route::post('/update', [LevelController::class, 'update'])->name('update');
            Route::get('/fetch', [LevelController::class, 'fetch'])->name('fetch');
        });

        Route::group(['prefix' => 'project', 'as' => 'project.','middleware' => 'can:project'], function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::post('/store', [ProjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
            Route::post('/delete', [ProjectController::class, 'delete'])->name('delete');
            Route::post('/update', [ProjectController::class, 'update'])->name('update');

            Route::get('/photo', [ProjectController::class, 'photo'])->name('photo');
            Route::get('/showresource/{id}', [ProjectController::class, 'showresource'])->name('showresource');

            Route::get('/exportprint', [ProjectController::class, 'exportprint'])->name('exportprint');
            Route::get('/exportpdf', [ProjectController::class, 'exportpdf'])->name('exportpdf');

        });

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
            Route::post('/delete', [RoleController::class, 'delete'])->name('delete');
            Route::post('/update', [RoleController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'cache', 'as' => 'cache.'], function () {
            Route::get('/', [YoutubeController::class, 'index'])->name('index');
        });

        Route::group(['prefix' => 'firebase', 'as' => 'firebase.'], function () {
            Route::get('/', [FirebaseController::class, 'index'])->name('firebase');
        });

        Route::group(['prefix' => 'gmail', 'as' => 'gmail.'], function () {
            Route::get('/', [MailController::class, 'index'])->name('index');
        });

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/delete', [UserController::class, 'delete'])->name('delete');
            Route::post('/update', [UserController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get('/blog', [BlogController::class, 'index'])->name('index');
            Route::post('/store', [BlogController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
            Route::post('/delete', [BlogController::class, 'delete'])->name('delete');
            Route::post('/update', [BlogController::class, 'update'])->name('update');
            Route::get('multiimages', [BlogController::class, 'showform'])->name('showform');
            Route::post('multiimages', [BlogController::class, 'storimages'])->name('storimages');

            Route::get('/editimage', [BlogController::class, 'editimage'])->name('editimage');
            Route::get('/getimagesvue/{id}', [BlogController::class, 'getimagesvue'])->name('getimagesvue');
            Route::post('/deleteimage', [BlogController::class, 'deleteimage'])->name('deleteimage');
            Route::post('/updateimage', [BlogController::class, 'updateimage'])->name('updateimage');

            Route::get('/allphoto', [BlogController::class, 'allphoto'])->name('allphoto');
        });

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('/update', [SettingController::class, 'updateOne'])->name('update');
            Route::get('lang/{lang}', [SettingController::class, 'translate'])->name('lang');
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/editprofile',[UpdateProfile::class, 'showUpdateFormadmin'])->name('editprofile');
            Route::post('/updateprofile', [UpdateProfile::class, 'updateprofile1'])->name('updateprofile');
        });

        Route::group(['prefix' => 'languages', 'as' => 'languages.'], function () {
            Route::get('lang/{lang}', [SettingLanguageController::class, 'translate'])->name('lang');
            Route::post('trans/{lang}',[SettingLanguageController::class, 'translate_submit'])->name('translate_submit');
            Route::post('addkey', [SettingLanguageController::class, 'translate_add'] )->name('translate_add');
            Route::post('delete/{lang}', [SettingLanguageController::class, 'delete'] )->name('delete');
        });

        Route::group(['prefix' => 'excel', 'as' => 'excel.'], function () {
            Route::get('/', [ExcelController::class, 'showform'])->name('showform');
            Route::post('/store',[ExcelController::class, 'importExcel'])->name('store');
        });

        Route::group(['prefix' => 'queue', 'as' => 'queue.'], function () {
            Route::get('/queue',[QueueController::class, 'sendmail'])->name('queue');
            //Route::post('/updateprofile', [UpdateProfile::class, 'updateprofile1'])->name('updateprofile');
        });

    });

    });

        // Route::get('/post', [PostController::class, 'index'])->name('index');
        // Route::get('/stroe', [PostController::class, 'add'])->name('post.add');
        // Route::post('/stroe', [PostController::class, 'store'])->name('post.store');
        // Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        // Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
        // Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        // Route::get('/post/{id}', [PostController::class, 'show'])->name('post.showcomment');

        // Route::get('/addcomment/{post_id}', [PostController::class, 'add_comment'])->name('post.add_comment');
        // Route::get('/deletecomment/{id}', [CommentController::class, 'delete'])->name('post.delete_comment');

        // Route::get('/download/{id}', [PostController::class, 'download'])->name('post.download');
    });

    
View::composer(['*'] , function ($view){
    $username = "Ahmed Saeed";
    $view->with('username',$username);
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes(['verify'=>true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/youtube', [YoutubeController::class, 'getVideo']);

Route::get('/{page}', [AdminController::class, 'index']);


Route::get('/payment', [TestController::class, 'payment'])->name('payment');
//Route::get('/pay', [PaypalController::class, 'payment'])->name('payment');
// Route::get('/cancel', [PaypalController::class, 'cancel'])->name('cancel');
// Route::get('/payment/success', [PaypalController::class, 'success'])->name('success');
Route::get('tap-payment', [TapController::class,'form'])->name('tap.form');
Route::post('tap-payment', [TapController::class,'payment'])->name('tap.payment');
Route::any('tap-callback',[TapController::class,'callback'])->name('tap.callback');
Route::resource('countries', CountryController::class);
Route::resource('rooms', RoomController::class);
