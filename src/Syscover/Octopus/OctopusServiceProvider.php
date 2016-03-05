<?php namespace Syscover\Octopus;

use Illuminate\Support\ServiceProvider;

class OctopusServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// include route.php file
		if (!$this->app->routesAreCached())
			require __DIR__ . '/../../routes.php';

		// register views
		$this->loadViewsFrom(__DIR__ . '/../../views', 'octopus');

        // register translations
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'octopus');

        // register migrations
        $this->publishes([
            __DIR__ . '/../../database/migrations/' 		=> base_path('/database/migrations'),
			__DIR__ . '/../../database/migrations/updates/' => base_path('/database/migrations/updates'),
        ], 'migrations');

        // register migrations
        $this->publishes([
            __DIR__ . '/../../database/seeds/' 				=> base_path('/database/seeds')
        ], 'seeds');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}
}