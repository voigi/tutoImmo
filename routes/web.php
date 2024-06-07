<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
   
    Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);

});
// routes/web.php

Route::get('admin/test', function () {
    $property = Property::find(2);

    return app()->make(PropertyController::class)->edit($property);
});
