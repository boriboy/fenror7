<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// paginator
use Illuminate\Pagination\Paginator;

// models
use App\Humanoid;

// events
use App\Events\HumanoidCreatedEvent;

class HumanoidController extends Controller
{
    /**
     * Creates Humanoid and dispatches event; this route is accessed via ajax
     * 
     * @param Request $request
     * @return void 
     */
    public function create(Request $request) {
        // instantiate new humanoid model and create it in database
        $humanoid = new Humanoid();

        // handle input (obviously in a normal app there would be input validation)
        $humanoid->name = $request->input('name', 'fake name');
        $humanoid->species = $request->input('species', OLYMPIAN);

        $saved = $humanoid->save();
        if ($saved) {
            // dispatch event
            event(new HumanoidCreatedEvent($humanoid));
        }
    }

    /**
     * Api route for ajax requests - load data of page requested
     * @param Request $request
     */
    public function paginate(Request $request) {
        return Humanoid::paginate(5)->getCollection();
    }
}
