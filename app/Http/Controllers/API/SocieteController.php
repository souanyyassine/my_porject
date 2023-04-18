<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    // all societes
    public function index()
    {
        $societes = Societe::all()->toArray();
        return array_reverse($societes);
    }

    // add societe
    public function add(Request $request)
    {
        $societe = new Societe([
            'name' => $request->name
        ]);
        $societe->save();

        return response()->json('The societe successfully added');
    }

    // edit societe
    public function edit($id)
    {
        $societe = Societe::find($id);
        return response()->json($societe);
    }

    // update societe
    public function update($id, Request $request)
    {
        $societe = Societe::find($id);
        $societe->update($request->all());

        return response()->json('The societe successfully updated');
    }

    // delete societe
    public function delete($id)
    {
        $societe = Societe::find($id);
        $societe->delete();

        return response()->json('The societe successfully deleted');
    }
}