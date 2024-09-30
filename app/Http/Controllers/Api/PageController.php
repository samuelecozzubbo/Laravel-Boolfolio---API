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

    public function types()
    {
        $types = Type::all();

        return response()->json($types);
    }

    //Bonus
    public function projectBySlug($slug)
    {

        $project = Project::where('slug', $slug)->with('technologies', 'type')->first();
        if ($project) {
            $success = true;
            //Se un project non ha immagina otterrò solo store
            //allora faccio in modo che arrivi almeno l'immagine placeholder
            if ($project->img) {
                $project->img = asset('storage/' . $project->img);
            } else {
                $project->img = '/img/no-image.png';
                $project->image_original_name = 'no image';
            }
        } else {
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }
}
