<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Hash;

class Controller
{
    public function home()
    {
        return view("home", [
            "title" => "Home",
            "activeTab" => "home",
        ]);
    }

    public function edit_task(Task $task)
    {
        $tags = $task
            ->tags()
            ->pluck("name")
            ->toArray();
        $tags = implode(" ", $tags);

        return view("edit_task", [
            "title" => "Edit Task",
            "task" => $task,
            "tags" => $tags,
        ]);
    }

    public function edit_task_store()
    {
        $validatedData = request()->validate([
            "id" => ["required", "min:1", "max:100"],
            "name" => ["required", "min:3", "max:100"],
            "category" => ["required", "min:3", "max:50"],
            "priority" => ["required", "min:3", "max:50"],
            "due_date" => ["required", "min:3", "max:50"],
            "assignee" => ["required", "min:3", "max:50"],
            "description" => ["required", "min:3", "max:1000"],
            "tags" => ["required", "min:3", "max:1000"],
        ]);

        $task = Task::find($validatedData["id"]);
        $task->name = $validatedData["name"];
        $task->category = $validatedData["category"];
        $task->priority = $validatedData["priority"];
        $task->due_date = $validatedData["due_date"];
        $task->assignee = $validatedData["assignee"];
        $task->description = $validatedData["description"];
        $task->save();

        $tags = explode(" ", $validatedData["tags"]);
        $tags = array_unique($tags);
        $tags = array_filter($tags);
        $tags = array_map("strtolower", $tags);
        $tags = array_map("trim", $tags);

        $task->tags()->detach();
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(["name" => $tag]); // will not create if already exists
            $task->tags()->attach($tag); // will not attach if already attached
        }

        return redirect("/tasks/" . $task->id);
    }

    public function tasks_by_category()
    {
        $category = request("category");
        if (empty($category)) {
            $category = "Urgent and Important";
        }

        // https://stackoverflow.com/questions/34518448/laravel-posts-and-tags-has-many-through-relationship
        $tasks = Task::where("category", $category)
            ->where("user_id", auth()->user()->id)
            ->with("tags")
            ->orderBy("created_at", "desc")
            ->paginate(25);

        return view("tasks", [
            "title" => "Category",
            "tasks" => $tasks,
        ]);
    }

    public function tasks_by_tag(Tag $tag)
    {
        $tasks = $tag
            ->tasks()
            ->where("user_id", auth()->user()->id)
            ->with("tags")
            ->orderBy("created_at", "desc")
            ->paginate(25);

        return view("tasks_tags", [
            "title" => "Tag",
            "tasks" => $tasks,
            "tag" => $tag->name,
        ]);
    }

    public function task(Task $task)
    {
        $task = $task->load("tags");
        if ($task->user_id != auth()->user()->id) {
            return redirect()->back();
        }

        return view("task", [
            "title" => "Task",
            "task" => $task,
        ]);
    }

    public function search_tasks()
    {
        $keyword = request("keyword");
        $category = request("category");

        $tasks = Task::where("category", $category)
            ->where("description", "like", "%" . $keyword . "%")
            ->where("user_id", auth()->user()->id)
            ->with("tags")
            ->orderBy("created_at", "desc")
            ->paginate(25)
            ->withQueryString();

        return view("tasks", [
            "title" => "Search",
            "tasks" => $tasks,
        ]);
    }

    public function login()
    {
        return view("login", [
            "title" => "Login",
        ]);
    }

    public function register()
    {
        return view("register", [
            "title" => "Register",
        ]);
    }

    public function new_task()
    {
        return view("new_task", [
            "title" => "New Task",
        ]);
    }

    public function new_task_store()
    {
        $validatedData = request()->validate([
            "name" => ["required", "min:3", "max:100"],
            "category" => ["required", "min:3", "max:50"],
            "priority" => ["required", "min:3", "max:50"],
            "due_date" => ["required", "min:3", "max:50"],
            "assignee" => ["required", "min:3", "max:100"],
            "description" => ["required", "min:3"],
            "tags" => ["required", "min:3", "max:100"],
        ]);

        $validatedData["user_id"] = auth()->user()->id;

        $validatedData["tags"] = trim($validatedData["tags"]);
        $tags = explode(" ", $validatedData["tags"]);
        $tags = array_unique($tags);

        $tags = array_filter($tags, function ($tag) {
            return $tag != "";
        });

        $tags = array_map(function ($tag) {
            return Tag::firstOrCreate(["name" => $tag])->id;
        }, $tags); // this will return an array of tag ids

        $task = Task::create($validatedData);
        $task->tags()->attach($tags); // then we insert to the tag_task table

        // then we insert to the tag_task table
        return redirect("/")->with("status", "Task created successfully.");
    }

    public function delete_task(Task $task)
    {
        $task->tags()->detach(); // first we detach the tags, detach() will delete the record from the tag_task table
        $task->delete();
        return redirect("/tasks")->with("status", "Task deleted successfully.");
    }

    public function store_register()
    {
        $validatedData = request()->validate([
            "name" => ["required", "min:3", "max:255"],
            "email" => [
                "required",
                "email:dns",
                "max:255",
                "unique:users,email",
            ],
            "password" => ["required", "min:8", "max:255"],
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);
        User::create($validatedData);
        return redirect("/login")->with(
            "status",
            "Registration successful. Please login."
        );
    }

    public function store_login()
    {
        $validatedData = request()->validate([
            "email" => ["required", "email", "max:255"],
            "password" => ["required", "min:8", "max:255"],
        ]);

        if (auth()->attempt($validatedData)) {
            request()
                ->session()
                ->regenerate();
            return redirect("/")->with(
                "status",
                "Login successful. Welcome back!"
            );
        }

        return back()->with(
            "status",
            "The provided credentials do not match our records."
        );
    }

    public function task_completed(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back();
    }
}
