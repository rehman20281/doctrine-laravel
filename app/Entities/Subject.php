<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rehman
 * Date: 25/12/2022
 * Time: 5:29 PM
 */

namespace App\Entities;

use App\Repositories\SubjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{

    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $title;

    #[
        ORM\ManyToOne(targetEntity: Student::class, cascade: ['persist'], inversedBy: 'subject'),
        ORM\JoinColumn(name: 'std_id', referencedColumnName: 'id', onDelete: "CASCADE")
    ]
    private $student;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

}
