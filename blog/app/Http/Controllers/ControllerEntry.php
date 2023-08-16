<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControllerEntry extends Controller
{
    public function index()
    {
        //Nama Table = Nama Controller ::all();
        $entry = Entry::all(); // Retrieve all entry in Entry database

        //return view('nama page',compact('nama table'));
        return view('welcome',compact('entry'));//Hantar data kat view
    }

    function store(Request $request)//Untuk store data
    {
        $created = Entry::create([
        
        // 'Nama Column Database'=>$request->nama input,
        'Title'=>$request->Title,
        'Text'=>$request->Content,
    
        ]);

        if($created){//kalau ada value mesti ==True

            return redirect() -> route('index');

        }else{


            return redirect() -> route('insert');
        }
    }

    public function updatepage(Entry $id)
    {
        //return view('nama page',compact('nama table'));
        return view('Update',compact('id'));//Hantar data kat view
    }

    function simpanan(Request $request,Entry $id)//Untuk store data
    {
        //dd($request->all());

        $updated = Entry::where ('id',$id->id)->update([
        
        //Nama table = nama xkesah -> nama input
        'Title'=>$request->Title,
        'Text'=>$request->Content,
    
        ]);

        if($updated){//kalau ada value mesti ==True

            return redirect() -> route('index');

        }else{


            return redirect() -> route('gogoupdate');
        }
    }


    
    public function destroy($id)
    {
        $entry = Entry::find($id);

        $deleted = $entry->delete();
        if ($deleted) {
            return redirect()->route('index')->with('success', 'Entry deleted successfully');
        } else {
            return redirect()->route('index')->with('error', 'Entry not found');
        }
    }
      


}
