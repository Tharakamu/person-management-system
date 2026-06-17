<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PdfController;

use App\Models\Person;
use App\Models\User;

Route::get('/dashboard', function () {

    $personCount = Person::count();

    $userCount = User::count();
$todayRegistrations = Person::whereDate(
    'created_at',
    today()
)->count();
    $maleCount = Person::where('gender', 'Male')->count();

    $femaleCount = Person::where('gender', 'Female')->count();
$under18Count = Person::where('age', '<', 18)->count();
$over18Count = Person::where('age', '>=', 18)->count();
$youngCount = Person::whereBetween('age', [18, 35])->count();

$middleCount = Person::whereBetween('age', [36, 60])->count();

$seniorCount = Person::where('age', '>', 60)->count();
    $recentPersons = Person::latest()
        ->take(5)
        ->get();

    $districtData = Person::selectRaw('district, COUNT(*) as total')
        ->groupBy('district')
        ->pluck('total', 'district');

    return view(
        'dashboard',
        compact(
    'personCount',
'userCount',
'maleCount',
'femaleCount',
'todayRegistrations',
'under18Count',
'youngCount',
'under18Count',
'over18Count',
'middleCount',
'seniorCount',
'under18Count',
'recentPersons',
'districtData'
)
    );

})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

Route::post('/users/{id}/role', [UserController::class, 'updateRole'])
    ->name('users.role');

Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->name('users.destroy');
Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

Route::get('/reports/pdf', [ReportController::class, 'pdf'])
    ->name('reports.pdf');
    Route::resource('persons', PersonController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Export Excel
    Route::get('/persons-export', [ExportController::class, 'export'])
        ->name('persons.export');

    // Export PDF
    Route::get('/persons-pdf', [PdfController::class, 'export'])
        ->name('persons.pdf');

    // Import Excel Form
    Route::get('/persons-import', [ImportController::class, 'showImportForm'])
        ->name('persons.import.form');

    // Import Excel Save
    Route::post('/persons-import', [ImportController::class, 'import'])
        ->name('persons.import');
});
Route::get('/', function () {
    return redirect('/dashboard');
});

require __DIR__.'/auth.php';

Route::get('/test-api', function () {


$user = \App\Models\User::create([
    'name' => 'Browser Test',
    'email' => 'browser'.time().'@test.com',
    'password' => bcrypt('123456'),
    'role' => 'user'
]);

$token = $user->createToken('api-token')->plainTextToken;

return response()->json([
    'status' => true,
    'token' => $token,
    'user' => $user
]);


});
