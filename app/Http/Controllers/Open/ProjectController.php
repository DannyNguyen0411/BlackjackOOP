<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index(): View{
        $projects = Project::paginate(8);

        return view( 'open.projects.index', compact('projects'));
    }
}
