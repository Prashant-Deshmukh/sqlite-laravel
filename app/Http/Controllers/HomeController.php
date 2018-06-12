<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function addInfo(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('layouts.add_info');
        } else {
            $insertId = \DB::table('person_info')->insertGetId([
                                                                    'name' => $request->get('name'),
                                                                    'age' => $request->get('age'),
                                                                    'address' => $request->get('address'),
                                                                    'profession' => $request->get('profession'),
                                                               ]);
            if ($insertId) {
                return view('layouts.add_info')->with('msg','Success');
            }
        }
    }
    public function userInfo()
    {
        $info = \DB::table('person_info')->get();
        dd($info);
    }
}
