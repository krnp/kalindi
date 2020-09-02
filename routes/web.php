<?php
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::group(['prefix' => 'controlpanel', 'middleware' => 'admin'], function() {
	Route::get('home', 'HomeController@index')->name('home');
	
	Route::prefix('type-of-accounts')->group(function () {
		Route::get('', 'TypeOfAccounts@index');
		Route::get('/add', 'TypeOfAccounts@getAddNew');
		Route::post('/add', 'TypeOfAccounts@postAddNew');
		Route::get('/edit/{id}', 'TypeOfAccounts@getEdit');
		Route::post('/edit/{id}', 'TypeOfAccounts@postEdit');
	});
	
	Route::prefix('accounts-heads')->group(function () {
		Route::get('', 'AccountHeads@index');
		Route::get('/add', 'AccountHeads@getAddNew');
		Route::post('/add', 'AccountHeads@postAddNew');
		Route::get('/edit/{id}', 'AccountHeads@getEdit');
		Route::post('/edit/{id}', 'AccountHeads@postEdit');
	});
	
	Route::prefix('loan-application')->group(function () {
		Route::get('/', 'LoanApplication@index');
		Route::get('/create_lone', 'LoanApplication@createLoan');
		Route::post('/create_lone', 'LoanApplication@createLoan');
		Route::get('/add', 'LoanApplication@getAddNew');
		Route::post('/add', 'LoanApplication@saveLoanData');
		Route::get('/view/{id}', 'LoanApplication@getView');
		Route::get('/edit/{id}', 'LoanApplication@getEdit');
		Route::post('/edit/{id}', 'LoanApplication@postEdit');
		Route::post('/delete/{id}', 'LoanApplication@deletePost');

		Route::post('/generateemis/{id}', 'EmiController@postgenerateEmis');
		Route::get('/emis/{id}', 'EmiController@getEmis');
		Route::post('/emis/{id}', 'EmiController@postEmis');
		Route::post('/payemis/{id}', 'EmiController@payEmis');
	});
	
	Route::prefix('area')->group(function () {
		Route::get('', 'AreaController@index');
		Route::get('/add', 'AreaController@addNewArea');
		Route::post('/add', 'AreaController@saveAreaData');
		Route::get('/edit/{id}', 'AreaController@getEdit');
		Route::post('/edit/{id}', 'AreaController@postEdit');
		Route::get('/delete/', 'AreaController@deletePost');
	});
	
	Route::prefix('dealer')->group(function () {
		Route::get('', 'DealerController@index');
		Route::get('/add', 'DealerController@addNewDealer');
		Route::post('/add', 'DealerController@saveDealerData');
		Route::get('/edit/{id}', 'DealerController@getEdit');
		Route::post('/edit/{id}', 'DealerController@postEdit');
		Route::get('/delete/', 'DealerController@deletePost');
	});
	
	Route::prefix('surveyor')->group(function () {
		Route::get('', 'SurveyorController@index');
		Route::get('/add', 'SurveyorController@addNewDealer');
		Route::post('/add', 'SurveyorController@saveDealerData');
		Route::get('/edit/{id}', 'SurveyorController@getEdit');
		Route::post('/edit/{id}', 'SurveyorController@postEdit');
		Route::get('/delete/', 'SurveyorController@deletePost');
	});
	
	Route::prefix('fieldexcutive')->group(function () {
		Route::get('', 'FieldExecutiveController@index');
		Route::get('/add', 'FieldExecutiveController@addNewExecutive');
		Route::post('/add', 'FieldExecutiveController@saveExecutiveData');
		Route::get('/edit/{id}', 'FieldExecutiveController@getEdit');
		Route::post('/edit/{id}', 'FieldExecutiveController@postEdit');
		Route::get('/delete/', 'FieldExecutiveController@deletePost');
	});
	
	Route::prefix('brand')->group(function () {
		Route::get('', 'BrandController@index');
		Route::get('/add', 'BrandController@addNewBrand');
		Route::post('/add', 'BrandController@saveBrandData');
		Route::get('/edit/{id}', 'BrandController@getEdit');
		Route::post('/edit/{id}', 'BrandController@postEdit');
		Route::get('/delete/', 'BrandController@deletePost');
	});
	
	Route::prefix('product')->group(function () {
		Route::get('', 'ProductController@index');
		Route::get('/add', 'ProductController@addNewProduct');
		Route::post('/add', 'ProductController@saveProductData');
		Route::get('/edit/{id}', 'ProductController@getEdit');
		Route::post('/edit/{id}', 'ProductController@postEdit');
		Route::get('/delete/', 'ProductController@deletePost');
	});
	
	Route::get('get-state-list','AreaController@getStateList');
	Route::get('get-city-list','AreaController@getCityList');


	// =========================new update==========================//
		Route::prefix('receipt')->group(function () {
		Route::get('', 'ReceiptController@index');
		Route::get('/add', 'ReceiptController@addNewReceipt');
		Route::post('/add', 'ReceiptController@saveReceipt');
		Route::get('/edit/{id}', 'ReceiptController@getEdit');
		Route::post('/edit/{id}', 'ReceiptController@postEdit');
		Route::get('/delete/', 'ReceiptController@deletePost');
	});


		Route::prefix('payment')->group(function () {
		Route::get('', 'PaymentController@index');
		Route::get('/add', 'PaymentController@addNewPayment');
		Route::post('/add', 'PaymentController@savePayment');
		Route::get('/edit/{id}', 'PaymentController@getEdit');
		Route::post('/edit/{id}', 'PaymentController@postEdit');
		Route::get('/delete/', 'PaymentController@deletePost');
	});
	Route::prefix('journal')->group(function (){
        Route::get('', 'JournalController@index');
		Route::get('/add', 'JournalController@addNewJournal');
		Route::post('/add', 'JournalController@saveJournal');
		Route::get('/edit/{id}', 'JournalController@getEdit');
		Route::post('/edit/{id}', 'JournalController@postEdit');
		Route::get('/delete/', 'JournalController@deletePost');
	});
	Route::prefix('bank_receipt')->group(function (){
        Route::get('', 'BankReceiptController@index');
		Route::get('/add', 'BankReceiptController@addNewJournal');
		Route::post('/add', 'BankReceiptController@saveJournal');
		Route::get('/edit/{id}', 'BankReceiptController@getEdit');
		Route::post('/edit/{id}', 'BankReceiptController@postEdit');
		Route::get('/delete/', 'BankReceiptController@deletePost');
	});
	Route::prefix('cash')->group(function (){
        Route::get('', 'CashController@index');
		Route::get('/add', 'CashController@addNewJournal');
		Route::post('/add', 'CashController@saveJournal');
		Route::get('/edit/{id}', 'CashController@getEdit');
		Route::post('/edit/{id}', 'CashController@postEdit');
		Route::get('/delete/', 'CashController@deletePost');
	});
//});