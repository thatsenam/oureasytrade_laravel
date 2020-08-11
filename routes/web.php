<?php

use App\Deposit;
use App\Withdraw;
use Composer\DependencyResolver\Request;
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

Route::get('/', function () {return view('home');});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard','Admin\AdminController@dashboard')->name('adminhome');
Route::get('/admin/add_member','Admin\AdminController@add_member')->name('add_member');
Route::post('/admin/handle-member-form','Admin\AdminController@handle_member_form')->name('handle_member_form');
Route::post('/admin/check_mobile','Admin\AdminController@check_mobile')->name('check_mobile');
Route::get('/admin/deposit-fund','Admin\AdminController@deposit_fund');
Route::post('/admin/deposit-fund','Admin\AdminController@deposit_fund_form');
Route::post('/admin/q/members','Admin\MemberController@getMembers')->name('members.getMembers');

Route::get('/admin/withdraw-fund','Admin\AdminController@withdraw_fund');
Route::post('/admin/withdraw-fund','Admin\AdminController@withdraw_fund_form');

Route::get('/admin/loan-grant','Admin\AdminController@loan_grant');
Route::post('/admin/loan-grant','Admin\AdminController@loan_grant_form');

Route::get('/admin/loan-collection','Admin\AdminController@loan_collection');
Route::post('/admin/loan-collection','Admin\AdminController@loan_collection_form');

Route::post('/admin/q/loans','Admin\MemberController@getLoans')->name('members.getLoans');





Auth::routes();



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/test', function (Request $request) {
return Withdraw::all()->first();
});
