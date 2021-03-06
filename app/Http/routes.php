<?php
use \App\Http\Middleware\login;

Route::group(['prefix'=>'/'],function () {

    Route::post('/doLogin', 'UsersController@doLogin');

    Route::get('/admin', 'HomeController@index');

    Route::get('/usuarios', [
        'uses' => 'UsersController@userForm',
        'as' => 'usuarios.view'
    ]);

    Route::get('/productos', [
        'uses' => 'generalController@getProductsForm',
        'as' => 'productos.view'
    ]);

    Route::get('/clientes', [
        'uses' => 'generalController@getClientesForm',
        'as' => 'clientes.view'
    ]);

    Route::get('/facturas', [
        'uses' => 'generalController@getFacturasForm',
        'as' => 'facturas.view'
    ]);

    Route::get('/usuarios/config/{id}',[
       'uses' => 'generalController@getConfigForm',
        'as' => 'usuarios.config'
    ]);

    Route::get('/getUsers', [
        'uses' => 'UsersController@getUsrs',
        'as' => 'index.usr'
    ]);

    Route::post('/addUser', [
        'uses' => 'UsersController@addUser'
    ]);

    Route::get('/getEstados',[
        'uses' => 'generalController@getEstados'
    ]);

    Route::get('/getCiudades/{id}',[
        'uses' => 'generalController@getCiudades'
    ]);

    Route::get('/getLocalidades/{id}',[
        'uses' => 'generalController@getLocalidades'
    ]);

    Route::get('/getRegimenFiscal',[
       'uses' => 'generalController@getRegimenFiscal'
    ]);

    Route::get('/getIva',[
       'uses' => 'generalController@getIVA'
    ]);

    Route::get('/getIeps',[
        'uses' => 'generalController@getIEPS'
    ]);

    Route::get('/getTipoUnidad',[
        'uses' => 'generalController@getTipoUnidad'
    ]);

    Route::get('/getSerSAT/{filtro}',[
        'uses' => 'generalController@getSerSAT'
    ]);

    Route::get('/getUnidadesSAT',[
        'uses' => 'generalController@getUnidadesSAT'
    ]);

    Route::get('/UnidadDeMedida/{id}',[
        'uses' => 'generalController@UnidadDeMedida'
    ]);

    Route::get('/getMetodosPago',[
        'uses' => 'generalController@getMetodosPago'
    ]);

    Route::get('/getUsoCfdi',[
        'uses' => 'generalController@getUsoCfdi'
    ]);

    //Parte de las configuraciones
    Route::post('/config/{id}/newUnidad',[
        'uses' => 'configController@addUnidadDeMedida'
    ]);

    Route::post('/config/{id}/newSerieFact',[
        'uses' => 'configController@addSerieFactura'
    ]);

    Route::post('/config/{id}/saveConfig','configController@saveConfiguration');
    //Parte de los Productos
    Route::get('/products/{id}',[
        'uses' => 'productsController@getProducts'
    ]);

    Route::post('/product/new',[
        'uses' => 'productsController@newProduct'
    ]);

    Route::delete('/productos/delete/{id}',[
        'uses' => 'productsController@deleteProduct'
    ]);

    //Parte de los clientes
    Route::get('/getClientes/{id}',[
        'uses' => 'clientesController@getClientes'
    ]);

    Route::post('/client/new',[
        'uses' => 'clientesController@newClient'
    ]);

    Route::delete('/cliente/delete/{id}',[
        'uses' => 'clientesController@deleteClient'
    ]);

    //parte de la factura
    Route::get('/factura/ver',[
        'uses' => 'facturaController@generatePDF',
        'as' => 'pdf.generate'
    ]);
});
