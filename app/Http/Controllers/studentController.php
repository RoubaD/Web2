<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class studentController extends Controller
{
    public function create(Request $request){
        //here we validated for the creation of students the fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nbOfCredits' => 'required|integer',
            'is_registered' => 'required|boolean',
        ]);
    
        // Create a new student record
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->nbOfCredits = $validatedData['nbOfCredits'];
        $student->is_registered = $validatedData['is_registered'];
        $student->save();
    
        // Redirect back to the students page
        return redirect('/students')->with('success', 'Student added successfully!');
    }

    public function index()
    {
        $students = Student::all(); // Retrieve all students
        return view('students', compact('students')); // Pass the students to the view
    }

    public function show($id){

        $student = Student::find($id); // Fetch student by ID
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student);
    }

    public function creditsGreaterThan100()
    {
        $students = Student::where('nbOfCredits', '>', 100)->get();
    
        if ($students->isEmpty()) {
            return response()->json(['message' => 'No students found with credits greater than 100.'], 404);
        }
    
        return response()->json($students);
    }

    public function creditsLessThan50OrNotRegistered()
    {
        $students = Student::where('nbOfCredits', '<', 50)
            ->orWhereNull('is_registered') 
            ->get();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No students found with credits less than 50 or not registered.'], 404);
        }

        return response()->json($students);
    }

    public function maxCredits()
    {
        $student = Student::orderBy('nbOfCredits', 'desc')->first();

        if (!$student) {
            return response()->json(['message' => 'No students found.'], 404);
        }

        return response()->json($student);
    }
}
