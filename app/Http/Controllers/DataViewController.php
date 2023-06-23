<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        return view('tableview', ['data' => $data]); 
    }
}