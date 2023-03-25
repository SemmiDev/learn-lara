<?php

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [Controller::class, "home"])->middleware("auth");

Route::get("/register", [Controller::class, "register"])->middleware("guest");

Route::get("/login", [Controller::class, "login"])
    ->name("login")
    ->middleware("guest");

Route::post("/register", [Controller::class, "store_register"]);
Route::post("/login", [Controller::class, "store_login"]);

Route::post("/logout", function () {
    auth()->logout();
    request()
        ->session()
        ->invalidate();
    request()
        ->session()
        ->regenerateToken();
    return redirect("/");
});

Route::get("/tasks/new", [Controller::class, "new_task"])->middleware("auth");
Route::post("/tasks/new", [Controller::class, "new_task_store"])->middleware(
    "auth"
);
Route::get("/tasks/{task:id}/edit", [
    Controller::class,
    "edit_task",
])->middleware("auth");

Route::put("/tasks", [Controller::class, "edit_task_store"])->middleware(
    "auth"
);

Route::delete("/tasks/{task:id}", [
    Controller::class,
    "delete_task",
])->middleware("auth");

Route::get("/tasks", [Controller::class, "tasks_by_category"])->middleware(
    "auth"
);
Route::get("/tasks/tags/{tag:name}", [
    Controller::class,
    "tasks_by_tag",
])->middleware("auth");
Route::get("/tasks/{task:id}", [Controller::class, "task"])->middleware("auth");
Route::get("/search", [Controller::class, "search_tasks"])->middleware("auth");

Route::patch("/tasks/{task:id}/completed", [
    Controller::class,
    "task_completed",
])->middleware("auth");
