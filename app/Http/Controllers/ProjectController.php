<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;

use Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // TODO ここVSCodeでエラー出る
        $user = Auth::user();

        $projects = $user->projects->sortByDesc('created_at');
        // プロジェクトに属していないタスクをinboxタスクとして取得
        $tasks = $user->tasks->whereNull('project_id')->sortByDesc('created_at');

        return view('Projects.index', [
            'projects' => $projects,
            'tasks' => $tasks
            ]);
    }
}
