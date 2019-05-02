<?php
namespace App\Http\Controllers;
use App\User;
use App\System;
use Illuminate\Http\Request;
class GalaxyController extends Controller
{ 
    public function index()
    {
        $systems = System::all();
        return view('/home', ['systems' => $systems]);
    }

    public function create()
    {

        return view('/home');
    }
    public function store()
    {
        $systems = new System();
        
        request()->validate([
            'name' => 'required',
            'XCoordinate' => 'required',
            'YCoordinate' => 'required',
        ]);
        $systems->name = request('name');
        $systems->XCoordinate = request('XCoordinate');
        $systems->YCoordinate = request('YCoordinate');
        $systems->save();
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
        $systems->save();
        return redirect('/home');
    }
    public function destroy($id)
    {
        System::find($id)->delete();
        return redirect('/home');
    }
}