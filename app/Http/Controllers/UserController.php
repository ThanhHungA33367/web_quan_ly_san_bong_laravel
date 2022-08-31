<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        $search = $request->get('q');
        $data = Field::where('name','like','%' .$search. '%')->paginate(10)->appends(['q' => $search]);
        return view('welcome', [
            'data' => $data,
            'search'=>$search
        ]);
    }

}
