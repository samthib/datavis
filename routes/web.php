<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin;


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

Route::middleware(['auth:sanctum', 'verified'])->group(function()
{
  Route::get('/dashboard', function() {
    return view('dashboard');
  })->name('dashboard');

  /* Route for Administration */
  Route::prefix('admin')->name('admin.')->group(function () {

    /* Route to manage Admin's Board Charts */
    Route::get('/', function() {
      return redirect()->route('admin.index');
    });
    Route::get('/dashboard', [Admin\AdminController::class, 'index'])->name('index');

    /* Route to manage Admin's Board Charts */
    Route::resource('/charts', Admin\ChartController::class);

    /* Route to manage Admin's Board Libraries */
    Route::resource('/libraries', Admin\LibraryController::class);

    /* Route to manage Admin's Board Datas */
    Route::resource('/datas', Admin\DataController::class);

    /* Route to manage Admin's Board Users */
    Route::resource('/users', Admin\UserController::class);

    /* Route to manage the application's Design */
    Route::resource('/designs', Admin\DesignController::class);
    Route::get('/designs/shadow/{design}', [Admin\DesignController::class, 'shadow'])->name('designs.shadow');

    /* Route to manage Admin's Board Messages */
    Route::get('/messages/inbox', [Admin\MessageController::class, 'index'])->name('messages.inbox.index');
    Route::get('/messages/sent', [Admin\MessageController::class, 'sent'])->name('messages.sent.index');
    Route::resource('/messages', Admin\MessageController::class, ['except' => ['index', 'edit']]);

    /* Route to manage the application's Pages */
    Route::resource('/pages', Admin\PageController::class);
  });
});


//Routes for charts
Route::get('/', [ChartController::class, 'index'])->name('charts.index');
Route::get('/charts/{chart:title}', [ChartController::class, 'show'])->name('charts.show');
Route::get('/shadow/{chart:title}', [ChartController::class, 'shadow'])->name('charts.shadow');


// Routes for emails messages
Route::get('/messages', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');


// Routes for pages
Route::get('/A-propos', [PageController::class, 'abouts'])->name('pages.abouts');
Route::get('/features', [PageController::class, 'features'])->name('pages.features');
Route::get('/{page:title}', [PageController::class, 'show'])->name('pages.show');
