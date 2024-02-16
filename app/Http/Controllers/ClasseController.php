<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classe=Classe::all();
        return view('auth.classe',['classe'=>$classe]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes=new Classe();
        return view('auth.formulaireclasse',['classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasseRequest $request)
    {
        //
        $classe=new Classe();
        $classe->libelle=$request['libelle'];
        $classe->save();
        return to_route('auth.classe')->with("success","Ajout reussi...");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Classe::destroy($id);
        return to_route('auth.classe')->with("success","Suppression reussi...");
    }
}
