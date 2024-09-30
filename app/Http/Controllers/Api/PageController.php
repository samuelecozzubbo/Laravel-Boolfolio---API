<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Type;



class PageController extends Controller
{
    public function index()
    {
        $project = Project::orderBy('id')->with('technologies', 'type')->paginate(10);
        $result = [
            'success' => true,
            'results' => $project,
        ];
        return response()->json($result);
    }

    public function technologies()
    {
        $technologies = Technology::all();

        return response()->json($technologies);
    }
}
