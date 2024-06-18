<?php

use App\Models\Property;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin\PropertyController;

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/biens', [\App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where
([
    'property' => $idRegex,
    'slug' => $slugRegex,


]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
   
    Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);

});
// routes/web.php

Route::get('admin/test', function () {
    $property = Property::find(2);

    return app()->make(PropertyController::class)->edit($property);
});
