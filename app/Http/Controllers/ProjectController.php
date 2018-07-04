<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App;
use View;
use Session;


class ProjectController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createform()
    {
         $users = DB::table('users')->pluck('name');        
         return view('createproject', ['users' => $users]);
    }

    public function createproject(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'naziv_projekta' => 'required|max:255',
            'opis_projekta' => 'required|max:255',
            'cijena_projekta' => 'required',
            'datum_pocetka' => 'required',
            'datum_zavrsetka' => 'required',
            'obavljeni_poslovi'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect('/projects/create')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data=$request;
            $data['ukljuceni']=implode(',',$request['ukljuceni']);
            $project= App\Project::create($data->all());
            $project->save();
        }
        return redirect('/details');
    }

    public function details()
    {
        $projects = App\Project::all();
        $userName = Auth::user()->name;

        $voditeljski_projekti = array();
        $ukljuceni_projekti = array();
        
        foreach($projects as $project){
            if($project['voditelj']==$userName){
                array_push($voditeljski_projekti, $project);
            }
            
                $ukljuceni=explode(',',$project['ukljuceni']);
                foreach($ukljuceni as $u){
                    if($u==$userName){
                        array_push($ukljuceni_projekti, $project);                    
                    }
                }
            
        }
        return view('details', ['voditeljski_projekti' => $voditeljski_projekti,'ukljuceni_projekti' => $ukljuceni_projekti] );
    }


    public function edit($id)
    {
        $project = App\Project::find($id);
        $users = DB::table('users')->pluck('name');        
        
        return view('editproject',['project'=>$project,'users'=>$users]);
    }

    public function editforeign($id)
    {
        $project = App\Project::find($id);
        $users = DB::table('users')->pluck('name');        
        
        return view('editforeignproject',['project'=>$project,'users'=>$users]);
    }

    public function updateproject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv_projekta' => 'required|max:255',
            'opis_projekta' => 'required|max:255',
            'cijena_projekta' => 'required',
            'datum_pocetka' => 'required',
            'datum_zavrsetka' => 'required',
            'obavljeni_poslovi'=>'required'
        ]);
        $id=$request['id'];  

        if ($validator->fails()) {
            
            return redirect('/project/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator); 
        }
        else{
            $data=$request;
            $data['ukljuceni']=implode(',',$request['ukljuceni']);
            $project= App\Project::find($id);
            $project->naziv_projekta = $request['naziv_projekta'];
            $project->opis_projekta = $request['opis_projekta'];
            $project->cijena_projekta = $request['cijena_projekta'];
            $project->datum_pocetka =$request['datum_pocetka'];
            $project->datum_zavrsetka =$request['datum_zavrsetka'];
            $project->obavljeni_poslovi = $request['obavljeni_poslovi'];
            $project->save();
        }
            // redirect
            Session::flash('message', 'Uspješno uređen projekt!');
            return redirect('/details');
    }
    
    public function updateforeignproject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'obavljeni_poslovi'=>'required'
        ]);
        $id=$request['id'];  

        if ($validator->fails()) {
            return redirect('/project/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator); 
        }
        else{
            $project= App\Project::find($id);
            $project->obavljeni_poslovi = $request['obavljeni_poslovi'];
            $project->save();
        }
            // redirect
            Session::flash('message', 'Uspješno uređen projekt!');
            return redirect('/details');
    }
    

    
}
