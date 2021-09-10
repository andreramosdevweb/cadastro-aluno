<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::paginate(5);

        return view("index", [
            'students' => $students
        ]);
    }


    public function create()
    {
        return view("create");
    }


    public function store(StudentRequest $request)
    {
        $data_to_save = $request->except(['token']);

        if (!empty($request->file('avatar'))) {
            $data_to_save['avatar'] = $request->file('avatar')->store('students');
        }

        try {
            Student::create($data_to_save);
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("Erro ao criar novo Aluno!");
        }

    }


    public function edit($id)
    {
        $student = Student::find($id);


        if (!$student) {
            return redirect()->route('students.index');
        }

        return view('edit', [
            'student' => $student
        ]);

    }


    public function update(StudentRequest $request, $id)
    {
        $data_to_save = $request->all();

        try {

            $student = Student::find($id);

            $path = $student->avatar;

            if (isset($data_to_save['avatar'])) {
                Storage::delete($student->avatar);
                $path = $request->file('avatar')->store('students');
            }

            $student->fill($data_to_save);
            $student->avatar = $path;

            $student->save();

            return redirect()->route('students.index');

        } catch (\Exception $e) {
            return redirect()->route('students.edit', compact($id))
                ->withErrors("Erro ao editar Aluno!");
        }

    }


    public function destroy($id)
    {

        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
