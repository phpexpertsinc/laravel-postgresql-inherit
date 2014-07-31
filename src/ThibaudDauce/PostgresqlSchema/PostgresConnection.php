<?php namespace ThibaudDauce\PostgresqlSchema;

use Illuminate\Database\PostgresConnection as BasePostgresConnection;

class PostgresqlConnection extends BasePostgresConnection {

  /**
	 * Get the default schema grammar instance.
	 *
	 * @return \ThibaudDauce\PostgresqlSchema\PostgresGrammar
	 */
	protected function getDefaultSchemaGrammar()
	{
		return $this->withTablePrefix(new PostgresGrammar);
	}

}
