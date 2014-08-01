<?php namespace ThibaudDauce\PostgresqlSchema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as App;
use Illuminate\Support\Facades\Schema;

class PostgresqlSchemaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('thibaud-dauce/postgresql-schema');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		\App::singleton('db.connection.pgsql', function(App $app, array $parameters)
		{
			list($connection, $database, $prefix, $config) = $parameters;
			return new PostgresConnection($connection, $database, $prefix, $config);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
