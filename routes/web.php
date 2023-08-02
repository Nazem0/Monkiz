<?php
use Illuminate\Http\Request;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\ServiceController;
use App\Models\User;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Task;



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
    $services = Service::all();
    $counter = [
        'clients' => User::where('role', 'Client')->count(),
        'mcs' => User::where('role', 'Maintenance_Center')->count(),
        'tasks' => Task::count(),
        'offers' => Offer::count()
    ];
    return view('index', compact('counter', 'services'));
})->name('index');

// Authorization Routes

Route::get("/login", function () {
    return view('login');
});
Route::post("/login", [AuthController::class, "login"])->name('login');

Route::get('/logout', [AuthController::class, "logout"]);

Route::get('about_us', function () {
    return view('about_us');
});

Route::get('/contact_us', function () {
    return view('contact_us');
});

Route::post("/register", [UserController::class, "store"])->name('register.store');
Route::get('/register', function () {
    return view('register');
});
Route::get('/profile', [UserController::class, "show"])->name('user.profile');
Route::get('/users/{id}/edit', [UserController::class, "edit"])->name('user.edit');
Route::put('/users/{id}', [UserController::class, "update"])->name('user.update');
Route::delete('/users/{id}', [UserController::class, "destroy"])->name('user.delete');

// Tasks Routes
Route::get('/tasks', [TaskController::class, "index"])->name('tasks');
Route::get('/tasks/new', [TaskController::class, "create"])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, "store"])->name('tasks.store');
Route::post('/tasks/search', [TaskController::class, "search"])->name('tasks.search');
Route::get('/tasks/{id}/edit', [TaskController::class, "edit"])->name('tasks.edit');
Route::put('/tasks/{id}/update', [TaskController::class, "update"])->name('tasks.update');
Route::delete('/tasks/{id}/delete', [TaskController::class, "destroy"])->name('tasks.delete');


// Offers Routes
Route::post('/offers/store', [OfferController::class, "store"])->name('offers.store');
Route::delete('/offers/delete', [OfferController::class, "destroy"])->name('offers.delete');
Route::put('/offers/{offer_id}', [OfferController::class, 'update'])->name('offers.update');

Route::get('open-ai', [OpenAIController::class, 'index']);

// Admin Dashboard Routes
Route::get('/admin', function () {
    $counter = [
        'clients' => User::where('role', 'Client')->count(),
        'mcs' => User::where('role', 'Maintenance_Center')->count(),
        'tasks' => Task::count(),
        'offers' => Offer::count()
    ];
    return view('admin.index', compact('counter'));
})->name('admin');

Route::get('/admin/users', [UserController::class, "show_users"])->name('admin.users');
Route::post('/admin/users', [UserController::class, "search"])->name('admin.user.search');
Route::get('/admin/services', function () {
    $services = Service::all();
    return view('admin.services.index', compact('services'));
})->name('admin.services');
Route::post('/admin/services/store', [ServiceController::class, "store"])->name('service.store');
Route::get('/admin/services/{id}', [ServiceController::class, "edit"])->name('service.edit');

Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('service.update');

Route::delete('/admin/services/{id}', [ServiceController::class, "destroy"])->name('service.delete');

Route::get('/admin/tasks', function () {
    $tasks = Task::paginate(4);
    return view('admin.tasks.index', compact('tasks'));
})->name('admin.tasks');

Route::get(
    '/admin/tasks/{id}/{status}',
    [TaskController::class,'status']
)->name('task.status');
Route::get('/admin/offers/',function () {
    $offers = Offer::all();
    $tasks=Task::all();
    return view('admin.offers.index', compact('offers','tasks'));
    }
)->name("admin.offers");
//Maintenance Centers Cards & Details Routes

Route::get('/mccards', [UserController::class, "show_mc"])->name('mcs');
//getting id from DB ({{item->id}})->$id in controller will catch the id returning the data by id of a single MC
Route::get('/users/{id}', [UserController::class, "show_mc_profile"])->name('user.mc.show');

Route::get('/my_offers', [OfferController::class, "my_offers"])->name('my_offers');

Route::post('/mccards', [UserController::class, "searches"])->name('mccards.search');
