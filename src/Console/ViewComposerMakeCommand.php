<?php

namespace Davidpeach\Viewcomposers\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ViewComposerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:composer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view composer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'View Composer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/view-composer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\ViewComposers';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['resource', null, InputOption::VALUE_NONE, 'Generate a resource controller class.'],
        ];
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param  string  $name
     * @return string
     */
    // protected function buildClass($name)
    // {
    //     $namespace = $this->getNamespace($name);

    //     return str_replace("use $namespace\Controller;\n", '', parent::buildClass($name));
    // }
}
