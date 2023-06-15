<?php

namespace App\Providers;

use App\Entities\Student;
use App\Entities\Subject;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $repositories = [
        Student::class => StudentRepository::class,
        Subject::class => SubjectRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        foreach ($this->repositories as $entity => $repository) {
            $this->app->bind($repository, function ($app) use ($repository, $entity) {
                return new $repository(
                    $app['em'],
                    $app['em']->getClassMetaData($entity)
                );
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
