<?php

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
Route::get('teste','teste@index');



Auth::routes();

Route::get('/', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();
Route::get('cadastrarAdmAss','AdmFederacaoController@CadastrarAdminAssociacao');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('cadastrarFederacao','FederacaoController@store');
Route::get('federacoes','FederacaoController@show');
Route::resource('federacao','FederacaoController');
Route::get('procuraFederacao/{id}','FederacaoController@procuraFederacao');
Route::post('editarFederacao','FederacaoController@edit');
Route::delete('apagarFederacao/{id}','FederacaoController@apagarFederacao');
Route::post('cadastrarApa','ApaController@store');
Route::post('cadastrarLocalizacao','ApaController@cadastrarLocalizacao');
Route::get('cadastrarApa','ApaController@cadastrarApa');
Route::get('consultaProvincia','ProvinciaController@show');
Route::any('consultarMunicipios/{provincia}','ApaController@Provincias_Municipios');
Route::any('consultarDistricto/{municipio}','ApaController@MunicipioDistricto');
Route::any('consultarComuna/{municipio}','ApaController@MunicipioComuna');
//Route::post('registarLocalizacao','LocalizacaoController@store');
Route::post('registarApa','ApaController@storeApa');
Route::get('ConsultarFederacao','FederacaoController@ConsultarFederacao');
Route::resource('CadastrarUser','UserController');
Route::any('ConsultarFederacao2','FederacaoController@consultarFederacao2');
Route::post('cadastrarUser','UserController@store');
Route::any('consultarPapeis','UserController@consultarPapel');
Route::any('consultarAssociacoes','AdmFederacaoController@consultarAssociacoes');
Route::any('cadastrarAdma','AdmFederacaoController@store');
Route::any('consultarAssociac','ApaController@Consultar');
Route::any('consultarA','ApaController@ConsultarAssociacoes');
Route::any('consultaAsso/{id}','ApaController@Associacoes');
Route::any('pesquisaAsso/{id}','ApaController@Pa');
Route::get('cadastrarClube','ClubeController@index');
Route::any('clubeConsultaAssociacao','ClubeController@Associacoes');
Route::any('cadastrarClube1','ClubeController@store');
Route::any('verAdm','FederacaoController@verAdm');
Route::any('consultarClube','ClubeController@show');
Route::any('consultarClubesAuth','ClubeController@consultarClubes');
Route::any('ConsultarProvinciasID','ClubeController@ConsultarProvinciasID');
Route::any('CadastrarAtleta','JogadorController@index');