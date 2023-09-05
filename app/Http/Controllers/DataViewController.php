<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Hash;
use DB;

class DataViewController extends Controller 
{
    public function viewTable()
    { 
        $data = DB::table('services')->get();
        return view('serviceadd', ['data' => $data]); 
    }

    // public function viewAddForm()
    // { 
    //     return view('serviceadd'); 
    // }

    public function store(Request $request)
    { 
        $request->validate([ 
            'name' => ['required', 'min:3', 'max:15'], 
            'price' => ['required']           
        ]);
                       
        $services = new Service(); 
        $services->name = $request->name; 
        $services->price = $request->price; 
        $res = $services->save(); 

        if($res){ 
            return back()->with('success', 'New service added ');
        }else{ 
            return back()->with('fail', 'Something went wrong');
        }        
    }   
}