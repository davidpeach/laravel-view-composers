<?php

namespace Davidpeach\Viewcomposers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->setupCommands();
		
		$this->setupPublishableItems();

		$this->setupViewComposers();
    	
	}

	public function register()
	{
		//
	}


	/**
	 * Register the commands needed for this package
	 * @return void
	 */
	protected function setupCommands()
	{
		$this->commands([
		    \Davidpeach\Viewcomposers\Console\ViewComposerMakeCommand::class
		]);
	}


	/**
	 * Setup the publishable items for this package
	 * @return void
	 */
	protected function setupPublishableItems()
	{
		$this->publishes([
        	__DIR__ . '/config/viewcomposers.php' => config_path('viewcomposers.php')
    	], 'config');
	}

	/**
	 * Setup the view composers based on the config setings in config\viewcomposers.php
	 * @return void
	 */
	protected function setupViewComposers()
	{
		if (config('viewcomposers')) {

    		foreach (config('viewcomposers') as $config) {

    			$pathToClass = ( ! empty($config['namespace'])) ? $config['namespace'] : '';

    			foreach ($config['composers'] as $composer) {
	    			view()->composer($composer['views'], $pathToClass . $composer['class']);
    			}

    		}
    	}
	}
}