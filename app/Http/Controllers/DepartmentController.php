<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Show a list of all departments along with their students
    public function index()
    {
        // Fetch all departments with their related students
        $departments = Department::with('students')->get();

        // Return the view and pass the departments data to it
        return view('department.index', [
            'title' => 'Departments',
            'departments' => $departments
        ]);
    }

    // Show the form to create a new department
    public function create()
    {
        return view('department.create');
    }

    // Store a new department in the database
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create and save the new department
        $department = new Department();
        $department->name = $request->name;
        $department->save();

        // Redirect back to the departments list with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    // Show the details of a specific department
    public function show($id)
    {
        // Find the department by ID and load the students
        $department = Department::with('students')->findOrFail($id);

        return view('department.show', [
            'department' => $department
        ]);
    }

    // Show the form to edit an existing department
    public function edit($id)
    {
        // Find the department by ID
        $department = Department::findOrFail($id);

        return view('department.edit', [
            'department' => $department
        ]);
    }

    // Update the department details in the database
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the department and update its details
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->save();

        // Redirect to the departments list with a success message
        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    // Delete a department from the database
    public function destroy($id)
    {
        // Find the department and delete it
        $department = Department::findOrFail($id);
        $department->delete();

        // Redirect back to the departments list with a success message
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}

