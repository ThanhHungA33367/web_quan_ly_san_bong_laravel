<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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
Route::get('/', [PageController::class, 'index']);
Route::get('/page/{id}', [PageController::class, 'show'])->name('page.show');
Route::get('/page/schedule/GetInfo', [PageController::class, 'show_modal'])->name('page.schedule');

Route::any('/page/schedule/create/', [BillController::class, 'store'])->name('bill.store');

//trang admin
Route::get('/admin', [ManagerController::class, 'index']);
//Route::get('/admin1', [ManagerController::class, 'login']);

Route::get('/admin/field', [FieldController::class, 'index'])->name('field.index');
Route::get('/admin/field/create', [FieldController::class, 'create'])->name('field.create');
Route::post('/admin/field/create', [FieldController::class, 'store'])->name('field.store');
Route::get('admin/field/{field}', [FieldController::class, 'edit'])->name('field.edit');
Route::put('admin/field/{field}', [FieldController::class, 'update'])->name('field.update');
Route::delete('/admin/field/destroy', [FieldController::class, 'destroy'])->name('field.destroy');

Route::get('/admin/field/create/calendar', [CalendarController::class, 'create'])->name('calendar.create');
Route::post('/admin/field/create/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::get('/admin/field/create/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');
Route::get('/admin/field/calendar/index', [CalendarController::class, 'index_calendar'])->name('calendar.index');
Route::get('/admin/field/calendar/index/{id}', [CalendarController::class, 'index_calendar_show'])->name('calendar.index.show');
Route::get('/admin/field/calendar/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');
Route::post('/admin/field/calendar/edit', [CalendarController::class, 'update'])->name('calendar.update');
Route::get('/admin/field/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');


Route::get('/admin/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/admin/order/approve', [OrderController::class, 'approve'])->name('order.approve');
Route::get('/admin/order/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

Route::get('admin/bill', [BillController::class, 'index'])->name('bill.index');
Route::get('admin/bill/getData', [BillController::class, 'getData'])->name('bill.getData');



