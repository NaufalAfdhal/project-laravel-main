<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department; // Import model Department
use App\Models\Grade; // Import model Grade
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Menampilkan daftar mahasiswa dan departemen terkait
    public function index() {
        // Ambil semua data mahasiswa dengan relasi grade dan department
        $students = Student::with('grade', 'department')->get();

        // Ambil semua departemen untuk menampilkan mahasiswa berdasarkan departemen
        $departments = Department::with('students')->get();

        return view('student', [
            'title' => "Students",
            'student' => $students,
            'departments' => $departments,  // Pass data departemen ke view
        ]);
    }

    // Halaman untuk menambah data mahasiswa
    public function create() {
        // Ambil data departemen dan grade untuk dropdown
        $departments = Department::all();
        $grades = Grade::all();

        return view('tambah', [
            'departments' => $departments,  // Kirim data departemen
            'grades' => $grades  // Kirim data grade
        ]);
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request) {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:100',
            'grade_id' => 'required|exists:grades,id', // Pastikan grade_id valid
            'department_id' => 'required|exists:departments,id', // Pastikan department_id valid
            'email' => 'required|email|max:50',
            'address' => 'required|string|max:80',
        ]);

        // Menyimpan data mahasiswa baru
        $student = new Student();
        $student->name = $request->name;
        $student->grade_id = $request->grade_id; // Pastikan grade_id ada di form
        $student->department_id = $request->department_id; // Pastikan department_id ada di form
        $student->email = $request->email;
        $student->address = $request->address;
        $student->save();

        return redirect('/student')->with('success', 'Student added successfully!');
    }
}
