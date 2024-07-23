<?php
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StuclassController;



Route::get('link', function () {
    $url = route('w');
    return "<a href='$url'>go to welcome</a>";
});

Route::get('hwelcome', function () {
    return "welcome to laravel";
})->name('w');

Route::get('cv', function () {
    return view('cv');
});

Route::get('login', function () {
    return view('login');
});

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::post('/process_form', function () {
    return redirect()->route('login_done');
})->name('process_form');

Route::get('/login_done', function () {
    return "Login Done";
})->name('login_done');

Route::get('/contact', function () {
    return view('contact');
})->name('contact_form');

Route::post('/contact', function (Request $request) {
    $data = $request->all();
    return view('contact_confirmation', ['data' => $data]);
})->name('submit_contact_form');

Route::get('/add-cars', function () {
    return view('add-cars'); // Ensure the view file is named 'add-car.blade.php'
})->name('cars.add');
Route::get('/add-cars', function () {
    return view('add-cars');
})->name('cars.add');


Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::get('/stuclasses', [StuclassController::class, 'index'])->name('stuclasses.index');
Route::get('/stuclasses/create', [StuclassController::class, 'create'])->name('stuclasses.create');
Route::post('/stuclasses', [StuclassController::class, 'store'])->name('stuclasses.store');
Route::get('/stuclasses/{stuclass}', [StuclassController::class, 'show'])->name('stuclasses.show');
Route::get('/stuclasses/{stuclass}/edit', [StuclassController::class, 'edit'])->name('stuclasses.edit');
Route::put('/stuclasses/{stuclass}', [StuclassController::class, 'update'])->name('stuclasses.update');
Route::delete('/stuclasses/{stuclass}', [StuclassController::class, 'destroy'])->name('stuclasses.destroy');
?>