<?php

namespace App\Http\Controllers;

use App\Entities\Student;
use App\Entities\Subject;
use App\Services\StudentService;

class StudentController extends Controller
{

    /**
     * @param StudentService $service
     */
    public function __construct(
        protected StudentService $service
    )
    {
    }

    public function index()
    {

        $students = $this->service->getStudents();

        /** @var Student $student */
        foreach ($students as $student) {
            echo "<br>Name : ", $student->getName();
            echo "<br>Rollno : ", $student->getRollno();
            /* @var Subject $subject */
            foreach ($student->getSubject() as $subject) {
                echo "<br>Subject: ", $subject->getTitle();
            }
            echo "<hr>";
        }
    }
}
