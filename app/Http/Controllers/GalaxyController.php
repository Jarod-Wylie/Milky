<?php
namespace App\Http\Controllers;
use App\User;
use App\System;
use App\Planet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class GalaxyController extends Controller
{ 
    public function index()
    {
        $systems = System::all();

        // return view("/Home", compact('systems'));
        return $systems;

    }
   
    public function indexForHomeViewing()
    {
        $systems = System::all();

        return view("/home", compact('systems'));
    }


    public function create()
    {

        return view('/home');
    }
    public function store()
    {
        $system = new System();
        
        request()->validate([
            'name' => 'required',
            'XCoordinate' => 'required',
            'YCoordinate' => 'required',

        ]);
        $system->name = request('name');
        $system->XCoordinate = request('XCoordinate');
        $system->YCoordinate = request('YCoordinate');
        $system->Satelites = request('Satelites');
        $system->Description = request('Description');

        
        $system->save();

        return redirect('home');
    }
 
    public function edit($id)
    {
        $systems = System::findOrFail($id);
        return view('editObj', compact('systems'));
    }
    public function update($id)
    {
        $systems = System::find($id);
        $systems->name = request('name');
        $systems->XCoordinate = request('XCoordinate');
        $systems->YCoordinate = request('YCoordinate');
        $systems->Description = request('Description');
        $systems->Satelites = request('Satelites');
        $systems->save();
        return redirect('home');
    }
    public function destroy($id)
    {
        System::find($id)->delete();
        return redirect('/home');
    }
}