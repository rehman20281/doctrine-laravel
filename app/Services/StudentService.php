<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rehman
 * Date: 25/12/2022
 * Time: 1:22 PM
 */

namespace App\Services;

use App\Repositories\StudentRepository;

class StudentService
{
    public function __construct(
        protected StudentRepository $studentRepository,
    )
    {
    }

    /**
     * @return array|object[]
     */
    public function getStudents(): array|object
    {
        return $this->studentRepository->findAll();
    }
}
