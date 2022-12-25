<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rehman
 * Date: 25/12/2022
 * Time: 12:51 AM
 */

namespace App\Repositories;

use App\Repositories\Interfaces\StudentRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository implements StudentRepositoryInterface
{

    /**
     * @param $id
     * @return object|null
     */
    public function findStd($id): object|null
    {
        return $this->find(1);
    }
}
