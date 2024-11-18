<?php

namespace domain\Services;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class StudentService
{

    protected $student;

    // constructor
    public function __construct()
    {
        $this->student = new Student();
    }


    // return all the students
    public function all()
    {
        return $this->student->all()->map(function ($student) {
            return [
                "id" => $student->id,
                "name" => $student->name,
                'image' => Storage::url("{$student->image}"),
                "age" => $student->age,
                "status" => $student->status,
            ];
        });
    }

    // create a new student
    public function store($data)
    {
        // the image is stored in the public folder
        $file = $data->file('image');
        $disk = 'public';
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('students', $filename, $disk);

        // validate the data
        $data->validate([
            "name" => "required",
            "image" => "required",
            "age" => "required",
            "status" => "required",
        ]);

        //
        Student::create([
            "name" => $data->name,
            "image" => $path,
            "age" => $data->age,
            "status" => $data->status,
        ]);
    }

    // return the current student
    public function edit($student)
    {
        return [
            "student" => $student,
            "image" => Storage::url("{$student->image}"),
        ];
    }

    // update the student
    public function update($data,  $student)
    {
        $image = $student->image;

        if ($data->hasFile('image')) {
            // delete the old image
            Storage::delete("public/{$image}");

            $file = $data->file('image');
            $disk = 'public';
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('students', $filename, $disk);
            $image = $path;
        }

        // validate the data
        $data->validate([
            "name" => "required",
            "age" => "required",
            "status" => "required",
        ]);

        // update the student
        $student->update([
            "name" => $data->name,
            "image" => $image,
            "age" => $data->age,
            "status" => $data->status,
        ]);
    }

    // update the status of the student
    public function updateStatus($student)
    {
        $student->update([
            "status" => !$student->status,
        ]);
    }


    // delete the student
    public function destroy($student)
    {
        Storage::delete("public", $student->image);
        $student->delete();
    }


    // Dashboard Metrics

    // return the total number of students
    public function getTotalStudentsCount()
    {
        return Student::count();
    }

    // return the total number of active students
    public function getActiveStudentsCount()
    {
        return Student::where('status', true)->count();
    }

    // return the total number of inactive students
    public function getInactiveStudentsCount()
    {
        return Student::where('status', false)->count();
    }

    public function getNewStudentsCount($interval = 'daily')
    {
        $startDate = Carbon::now()->startOfDay();

        switch ($interval) {
            case 'daily':
                $endDate = Carbon::now()->endOfDay();
                break;
            case 'weekly':
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'monthly':
                $endDate = Carbon::now()->endOfMonth();
                break;
            default:
                throw new \InvalidArgumentException('Invalid interval provided');
        }

        return Student::whereBetween('created_at', [$startDate, $endDate])->count();
    }
}
