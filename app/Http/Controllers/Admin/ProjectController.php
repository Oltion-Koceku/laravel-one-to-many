<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.project.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {




        $exist = Project::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.projects.index')->with('error', 'Questo TITOLO esiste già!');
        }else{

            $new_project = new Project();

            $new_project->title = $request->title;
            $new_project->slug = Helper::makeSlug($new_project->title, Project::class);
            // operazione ternario per l'immagine
            $new_project->img = $request->img ? Storage::put('uploads', $request->img) : null;
            $new_project->type_id = $request->type_id;
            $new_project->description = $request->description;
            $new_project->save();

            return redirect()->route('admin.projects.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        return view('admin.project.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $val_data = $request->all();



        $exist = Project::where('title', $request->title)
               ->where('id', '!=', $project->id)
               ->first();

        if ($exist) {

            return redirect()->route('admin.projects.index')->with('error', 'Questo TITOLO esiste già!');
        }else{


            $val_data['slug'] = Helper::makeSlug($request->title, Project::class);



            $project->update($val_data);

            return redirect()->route('admin.projects.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('good', "Progetto eliminato correttamnete");
    }
}
