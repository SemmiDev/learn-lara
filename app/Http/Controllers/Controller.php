<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;

class Controller
{
    private  static function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    public function home()
    {
        return view('home', [
            'title' => 'Home',
            'activeTab' => 'home',
        ]);
    }

    public function tasks_by_category()
    {
        $category = request('category');
        if (empty($category)) {
            $category = 'Urgent and Important';
        }

        // https://stackoverflow.com/questions/34518448/laravel-posts-and-tags-has-many-through-relationship
        $tasks = Task::where('category', $category)
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('tasks', [
            'title' => 'Category',
            'tasks' => $tasks,
        ]);
    }

    public function tasks_by_tag(Tag $tag)
    {
        $tasks = $tag->tasks()
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('tasks_tags', [
            'title' => 'Tag',
            'tasks' => $tasks,
            'tag' => $tag->name,
        ]);
    }

    public function task(Task $task)
    {
        return view('task', [
            'title' => 'Task',
            'task' => $task->load('tags'),
        ]);
    }

    public function search_tasks()
    {
        $keyword = request('keyword');
        $category = request('category');

        $tasks = Task::where('category', $category)
            ->where('description', 'like', '%' . $keyword . '%')
            ->with('tags')
            ->orderBy('created_at', 'desc')
            ->paginate(25)
            ->withQueryString();

        return view('tasks', [
            'title' => 'Search',
            'tasks' => $tasks,
        ]);
    }

    public function login()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function store_register()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        dd($attributes);

        // $user = User::create($attributes);
        // auth()->login($user);
        // return redirect('/')->with('success', 'Your account has been created.');
    }
}
