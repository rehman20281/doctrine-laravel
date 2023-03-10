<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rehman
 * Date: 25/12/2022
 * Time: 12:51 AM
 */

namespace App\Entities;

use App\Repositories\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\Column(type: "string")]
    private string $class;

    #[ORM\Column(type: "string")]
    private string $rollno;

    #[
        ORM\OneToMany(mappedBy: 'student', targetEntity: Subject::class, cascade: ['persist']),
        ORM\JoinColumn(name: 'id', referencedColumnName: 'std_id', onDelete: "CASCADE")
    ]
    private $subject;

    public function __construct()
    {
        $this->subject = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getRollno(): string
    {
        return $this->rollno;
    }

    /**
     * @param string $rollno
     */
    public function setRollno(string $rollno): void
    {
        $this->rollno = $rollno;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

}
