<?php

use Illuminate\Contracts\View\View;
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


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/register-user', 'LoginController@showRegistrationForm');
Route::get('/set-new-password', 'LoginController@showNewPasswordForm');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
       return redirect()->to('/instructions');
    });
    Route::get('/instructions', 'HomeController@index')->name('instructions');
    Route::post('/change-filing-year', 'ChangeFilingYearController@index')->name('change-filing-year');
    Route::get('/general-questions', 'GeneralQuestionsController@index');
    Route::get('/personal-information', 'GeneralInformationController@personalInfo');
    Route::get('/id-verification', 'GeneralInformationController@idVerification');
    Route::get('/payment-for-our-service', 'GeneralInformationController@paymentForOurService');

    // income sub menu routes
    Route::get('/wages', 'IncomeController@showWages');
    Route::get('/foreign-erned-income', 'IncomeController@showForeignErnedIncome');
    Route::get('/business-income', 'IncomeController@showBusinessIncome');




    // income sub menu routes
    Route::get('/wages', 'IncomeController@showWages');
    Route::get('/foreign-income', 'IncomeController@showForeignIncome')->name('foreign-income');
    Route::get('/business-income', 'IncomeController@showBusinessIncome')->name('business-income');
    Route::get('/rental-income', 'IncomeController@showRentalIncome')->name('rental-income');
    Route::get('/passive-income', 'IncomeController@showPassiveIncome')->name('passive-income');
    // income sub menu routes end

    // taxes and deductions routes
    Route::get('/tax-filing', 'TaxesDeductionsController@showTaxFiling')->name('tax-filing');
    Route::get('/estimate-payments', 'TaxesDeductionsController@showEstimatePayments')->name('estimate-payments');
    Route::get('/stimulus', 'TaxesDeductionsController@showStimulus')->name('stimulus');
    Route::get('/advanced-child-tax-credit-payments-received', 'TaxesDeductionsController@showAdvancedChildTax')->name('advanced-child-tax');
    // taxes and deductions routes end


    // foreign accounts and entities sub menu routes
    Route::get('/fbr-8938', 'ForeignAccountsEntitiesController@showFBR8938')->name('FBR8938');
    Route::get('/5471-foreign-corporation', 'ForeignAccountsEntitiesController@show5471')->name('five471');
    Route::get('/3520-foreign-trusts', 'ForeignAccountsEntitiesController@show3520')->name('thirty520');
    // end of foreign accounts and entities sub menu routes

    // Corporate Taxes
    Route::get('/s-corporations', 'CorporationTaxesController@showSCorporations')->name('s-corporations');
    Route::get('/c-corporations', 'CorporationTaxesController@showCCorporations')->name('c-corporations');
    Route::get('/partnership', 'CorporationTaxesController@showPartnership')->name('partnership');
    Route::get('/foreign-corporation-112DF', 'CorporationTaxesController@showForeignCorporation')->name('foreign-corporation-112DF');
    Route::get('/not-profit', 'CorporationTaxesController@showNotProfit')->name('not-profit');
});
