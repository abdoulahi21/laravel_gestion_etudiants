<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Slim\Psr7\UploadedFile;
use function Laravel\Prompts\select;

class StudentController extends Controller
{

    public function index()
    {

        $etudiant=Student::all();
        return view('auth.etudiant',['et'=>$etudiant]);
    }
    //
    public function create()
    {
        $classe=Classe::all();
        $ets=new Student();
        return view('auth.formulaireetudiant',['ets'=>$ets],['classe'=>$classe]);
    }
    //function save
    public function store(StudentRequest $request)
    {
        $fileName = time() . '.' . $request->name_image->extension();
        $request->name_image->storeAs('public/photos', $fileName);

        $ets=new Student();
        $ets->first_name=$request['first_name'];
        $ets->last_name=$request['last_name'];
        $ets->email=$request['email'];
        $ets->age=$request['age'];
        $ets->adresse=$request['adresse'];
        $ets->name_image=$fileName;
        $ets->save();
        // Ajouter l'entrée dans la table pivot
        $ets->classes()->attach($request->input('id_classe',),['anneAcademique'=>$request->input('anneAcademique')]);

        return to_route('auth.etudiant')->with("success","Etudiant ajouter avec succes...");
    }
    //detail
    public function show($id)
    {
        $student= Student::find($id);
        return view('auth.detail',compact('student'));
    }
    //page modifier
    public function edit(string $id)
    {
        $classe=Classe::all();
        $s=new Student();
        return view('auth.modifetudiant',['classe'=>$classe],['s'=>$s->find($id)]);
    }
    //delete
    public function destroy(string $id)
    {
        $ets= Student::find($id);
        // Vérifier si l'étudiant exist
        if (!$ets) {
            return redirect()->route('auth.etudiant')->with('error', 'Étudiant non trouvé');
        }
        // Supprimer l'image associée s'il y en a une
        if ($ets->name_image) {
            Storage::delete('public/photos/' . $ets->name_image);
        }
       // Supprimer l'entrée dans la table pivot
        $ets->classes()->detach();
        $ets->delete();
      return to_route('auth.etudiant')->with("success","Suppression reussi...");
    }
    //

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request)
    {
        //
        $ets=Student::find($request->id);
        $imageName = '';
        if ($request->hasFile('name_image')) {
            $imageName = time() . '.' . $request->name_image->extension();
            $request->name_image->storeAs('public/photos', $imageName);
            if ($ets->name_image) {
                Storage::delete('public/photos/' . $ets->name_image);
            }
        } else {
            $imageName = $ets->name_image;
        }
        $ets->first_name=$request['first_name'];
        $ets->last_name=$request['last_name'];
        $ets->email=$request['email'];
        $ets->age=$request['age'];
        $ets->adresse=$request['adresse'];
        $ets->name_image=$imageName;
        $ets->save();
        //Mettre à jour l'entrée dans la table pivot
        $ets->classes()->sync($request->input('id_classe',),['anneAcademique'=>$request->input('anneAcademique')]);
       return redirect()->route('auth.etudiant')->with('success', 'Étudiant mis à jour avec succès');
    }
      public function search(Request $request)
      {
          $search = $request->input('search');
          $results = Student::where('last_name', 'like', "%$search%")->get();
          return view('auth.etudiant', ['et' => $results]);
      }

    public function export()
    {
        return Excel::download(new StudentExport(), 'students.xlsx');
    }

}
