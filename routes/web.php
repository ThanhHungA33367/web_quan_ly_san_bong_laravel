<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//trang chinh
Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/page/{id}', [PageController::class, 'show'])->name('page.show');
Route::get('/page/schedule/GetInfo', [PageController::class, 'show_modal'])->name('page.schedule');
Route::any('/page/schedule/create/', [BillController::class, 'store'])->name('bill.store');

//dang nhap, dang xuat
Route::get('/admin', [LoginController::class, 'getLogin'])->name('admin.index');
Route::post('/admin', [LoginController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'Logout'])->name('admin.logout');
//trang admin
Route::group(['prefix' => '/admin', 'middleware' => ['checkManagerLogin']], static function(){

    Route::get('/field', [FieldController::class, 'index'])->name('field.index');
    Route::get('/field/create', [FieldController::class, 'create'])->name('field.create');
    Route::post('/field/create', [FieldController::class, 'store'])->name('field.store');
    Route::get('/field/{field}', [FieldController::class, 'edit'])->name('field.edit');
    Route::put('/field/{field}', [FieldController::class, 'update'])->name('field.update');
    Route::delete('/field/destroy', [FieldController::class, 'destroy'])->name('field.destroy');

    Route::get('/field/create/calendar', [CalendarController::class, 'create'])->name('calendar.create');
    Route::post('/field/create/calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::get('/field/create/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');
    Route::get('/field/calendar/index', [CalendarController::class, 'index_calendar'])->name('calendar.index');
    Route::get('/field/calendar/index/{id}', [CalendarController::class, 'index_calendar_show'])->name('calendar.index.show');
    Route::get('/field/calendar/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');
    Route::post('/field/calendar/edit', [CalendarController::class, 'update'])->name('calendar.update');
    Route::get('/field/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');


    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/approve', [OrderController::class, 'approve'])->name('order.approve');
    Route::get('/order/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
    Route::get('/bill/getData', [BillController::class, 'getData'])->name('bill.getData');

    Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic.index');
    Route::get('/statistic/months', [StatisticController::class, 'index_revenue_months'])->name('statistic.revenue_months');

});


