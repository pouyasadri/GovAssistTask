<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\url;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    //
    public function index()
    {
        $data = url::latest()->get();
        return view('home', compact('data'));
    }

    public function show($slug)
    {
        $destination = url::where('slug', $slug)->first();
        return redirect($destination->destination);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destination' => 'required|URL'
        ]);
        $data['slug'] = str::random(5);
        url::create($data);
        return redirect('/home')->with('msg', 'Saved');
    }

    public function api_index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'destination' => 'required|URL'
        ]);
        if ($validation->fails()) {
            return response()->json(["error"=>"Validation Fails"]);
        } else {
            $data = $request;
            $result = url::where('destination', $data['destination'])->first();
            return response()->json($result);
        }
    }
}
