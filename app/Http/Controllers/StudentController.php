<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facades\StudentFacade;
use Inertia\Inertia;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // show the metrics on dashboard
    public function dashboard()
    {
        $totalStudents = StudentFacade::getTotalStudentsCount();
        $activeStudents = StudentFacade::getActiveStudentsCount();
        $inactiveStudents = StudentFacade::getInactiveStudentsCount();
        $newStudentsDaily = StudentFacade::getNewStudentsCount('daily');
        $newStudentsWeekly = StudentFacade::getNewStudentsCount('weekly');
        $newStudentsMonthly = StudentFacade::getNewStudentsCount('monthly');

        return Inertia::render('Dashboard', compact('totalStudents', 'inactiveStudents', 'activeStudents', 'newStudentsDaily', 'newStudentsWeekly', 'newStudentsMonthly'));
    }

    // show the list of students
    public function index(Request $request)
{
    $search = $request->input('search');

    $students = Student::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->get()
        ->map(function ($student) {
            // Ensure the image URL is absolute
            $student->image = $student->image ? asset('storage/' . $student->image) : asset('images/default-avatar.png');
            return $student;
        });

    return Inertia::render('Students/Index', [
        'students' => $students,
        'filters' => [
            'search' => $search,
        ],
    ]);
}

    // show the create form
    public function create()
    {
        return Inertia::render('Students/Create');
    }

    // create a new student
    public function store(Request $request)
    {
        StudentFacade::store($request);
        return redirect()->route('students.index');
    }

    // show the edit form
    public function edit(Student $student)
    {
        $data = StudentFacade::edit($student);

        return Inertia::render('Students/Edit', $data);
    }

    // update the student
    public function update(Request $request, Student $student)
    {
        StudentFacade::update($request, $student);

        return redirect()->route('students.index');
    }

    // update the status of the student
    public function status(Student $student)
    {
        StudentFacade::updateStatus($student);

        return redirect()->route('students.index');
    }

    // delete the student
    public function destroy(Student $student)
    {
        StudentFacade::destroy($student);

        return redirect()->route('students.index');
    }
}
