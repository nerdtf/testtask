<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show ()
    {
        return $this->sendResponse(Auth::user()->companies()->get());
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'phone' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse($validator->errors(),409);
        }
        Auth::user()->companies()->create($validator->validated());
        return $this->sendResponse('success');
    }
}
