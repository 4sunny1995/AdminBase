<?php

namespace App\Providers;

use App\Exceptions\BaseException;
use App\Utils\Result;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    private $appRepositories = [
        'User',
    ];
    private $appSpRepositories = [
        // 'User',
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
        // $this->app->bind('laratwilio', function () {
        //     $this->ensureConfigValuesAreSet();
        //     $client = new Client(config('laratwilio.account_sid'), config('laratwilio.auth_token'));

        //     return new LaraTwilio($client);
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
    /**
     * Bind list repositories.
     */
    private function bindRepositories()
    {
        $appRepositories = $this->appRepositories;
        foreach ($appRepositories  as $key => $repository) {
            $classInterfaces = "App\\Repositories\\Interfaces\\{$repository}Interface";
            $classModel = "App\\Models\\{$repository}";
            if (!class_exists($classModel)) {
                $classModel = "App\\{$repository}";
            }
            $classRepository = "App\\Repositories\\Eloquent\\{$repository}Repository";
            if (!class_exists($classModel)
                || !class_exists($classRepository)
                || !interface_exists($classInterfaces)
            ) {
                throw new BaseException(Result::ERROR, "A {$repository} class does not exists.");
            }
            $this->app->bind($classInterfaces, function () use ($classModel, $classRepository) {
                return new $classRepository(new $classModel());
            });
        }
    }
    // private function ensureConfigValuesAreSet()
    // {
    //     $mandatoryAttributes = config('laratwilio');

    //     foreach ($mandatoryAttributes as $key => $value) {
    //         if (empty($value)) {
    //             throw new BaseException("Please provide a value for {$key}");
    //         }
    //     }
    // }
}
