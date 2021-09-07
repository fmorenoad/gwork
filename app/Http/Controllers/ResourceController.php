<?php

namespace App\Http\Controllers;

use App\Project;
use App\Work;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;
use App\Refresource;

class ResourceController extends Controller
{
    public function store(ResourceRequest $request, Work $work)
    {
        if($request->refresource_id == 999)
        {
            if(isset($request->normal_hour) && $request->normal_hour > 0)
            {
                $resource_human_normal = Resource::create(['user_id' => auth()->user()->id, 
                                        'work_id' => $work->id,
                                        'type' => $request->type,
                                        'refresource_id' => 21,
                                        'unit' => 'hora normal',
                                        'quantity' => $request->normal_hour,
                                        'observation' => $request->observation,
                                        ]);
            }
            
            if(isset($request->extra_hour) && $request->extra_hour > 0)
            {
            $resource_human_extra = Resource::create(['user_id' => auth()->user()->id, 
                                        'work_id' => $work->id,
                                        'type' => $request->type,
                                        'refresource_id' => 22,
                                        'unit' => 'hora extra',
                                        'quantity' => $request->extra_hour,
                                        'observation' => $request->observation,
                                        ]);
            }

            return redirect(route('works.show', ['work' => $work]))->with('status', 'Recurso humano agrado con exito');
        }
        
        $resource = Resource::create(['user_id' => auth()->user()->id, 'work_id' => $work->id] + $request->all());
        return redirect(route('works.show', ['work' => $work]))->with('status', 'Recurso creado con éxito');
    }

    public function edit(Work $work, Resource $resource)
    {
        $refresources = Refresource::all()->where('type','=',$resource->type);
        return view('resources.edit', compact('work', 'resource', 'refresources'));
    }

    public function update(ResourceRequest $request, Work $work, Resource $resource)
    {
        $resource->update($request->all());

        return redirect(route('works.show', ['work' => $work]))->with('status', 'Actualizado con éxito');
    }

    public function destroy(Request $request, Work $work, Resource $resource)
    {        
        $resource->delete();
        return redirect(route('works.show', ['work' => $work]))->with('status', 'Eliminado con éxito');
    }

    public function create(Work $work)
    {
        $refresources = Refresource::all();
        return view('resources.create', compact('work', 'refresources'));
    }

    public function create_resource_human(Work $work)
    {
        return view('resources.create_resource_human', compact('work'));
    }
}
