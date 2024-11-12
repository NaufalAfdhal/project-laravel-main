<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $grades = Grade::with('students')->latest()->get();

        return view('grade',
        ['title' => "Grades",
        'grade' =>$grades

        // load('students')bisa pake ini kalo Grade::all

        // 'grade'=> Grade::all() //route model binding
        ]);
    }


}
