<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Strukture\DtoTemplate\DtoTemplate;
use App\Strukture\ModelTemplate\ModelTemplate;
use App\Strukture\RouteTemplate\RouteTemplate;
use App\Strukture\ConfigTemplate\ConfigTemplate;
use App\Strukture\DtoTemplate\GetAllDtoTemplate;
use App\Strukture\InterfaceTemplate\ReadInterfaceTemplate;
use App\Strukture\RealisationClass\ReadRepositoryTemplate;
use App\Strukture\InterfaceTemplate\WriteInterfaceTemplate;
use App\Strukture\RealisationClass\WriteRepositoryTemplate;
use App\Strukture\HttpTemplate\ResourceTemplate\ResourceTemplate;
use TimeHunter\LaravelFileGenerator\Facades\LaravelFileGenerator;
use App\Strukture\ServiceProviderTemplate\ServiceProviderTemplate;
use App\Strukture\HttpTemplate\ControllerTemplate\ControllerTemplate;
use App\Strukture\HttpTemplate\RequestTemplate\CreateRequestTemplate;
use App\Strukture\HttpTemplate\RequestTemplate\GetAllRequestTemplate;
use App\Strukture\HttpTemplate\ResourceTemplate\GetAllCollectionResource;

class ModuleGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Module Generation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $filename = 'App/Modules/V1/' . $this->argument('name');

        // if (is_dir($filename)) {
        //     dd('This module alredy exist');
        // } else {
        //     LaravelFileGenerator::publish(
        //         new ReadInterfaceTemplate($this->argument('name')),
        //         new WriteInterfaceTemplate($this->argument('name')),
        //         new ReadRepositoryTemplate($this->argument('name')),
        //         new WriteRepositoryTemplate($this->argument('name')),
        //         new ModelTemplate($this->argument('name')),
        //         new ConfigTemplate($this->argument('name')),
        //         new ControllerTemplate($this->argument('name')),
        //         new CreateRequestTemplate($this->argument('name')),
        //         new GetAllRequestTemplate($this->argument('name')),
        //         new ResourceTemplate($this->argument('name')),
        //         new GetAllCollectionResource($this->argument('name')),
        //         new DtoTemplate($this->argument('name')),
        //         new GetAllDtoTemplate($this->argument('name')),
        //         new ServiceProviderTemplate($this->argument('name')),
        //         new RouteTemplate($this->argument('name')),
        //     );
        // }

    }
}

