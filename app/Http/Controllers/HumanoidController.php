<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

// models
use App\Humanoid;

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
        $faker = Faker::create();
        $humanoid = new Humanoid();
        $humanoid->name = $request->input('name', $faker->firstName);
        $humanoid->species = $request->input('species', OLYMPIAN);

        $humanoid->save();

        // TODO: MAKE THE FORM WORK VIA AJAX
    }
}
