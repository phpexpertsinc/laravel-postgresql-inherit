<?php namespace ThibaudDauce\PostgresqlSchema;

use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;
use Illuminate\Support\Fluent;
use ThibaudDauce\PostgresqlSchema\Blueprint;
use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class PostgresGrammar extends BasePostgresGrammar {


	/**
	 * Compile a create table command.
	 *
	 * @param  \ThibaudDauce\PostgresqlSchema\Blueprint  $blueprint
	 * @param  \Illuminate\Support\Fluent  $command
	 * @return string
	 */
	public function compileCreate(BaseBlueprint $blueprint, Fluent $command)
	{
    $sql = parent::compileCreate($blueprint, $command);

    $inheritedTables = implode(', ', $this->getInheritedTables($blueprint));

		return $sql . " inherits ($inheritedTables)";
	}


	/**
	 * Compile the blueprint's inherits definitions.
	 *
	 * @param  \ThibaudDauce\PostgresqlSchema\Blueprint  $blueprint
	 * @return array
	 */
	protected function getInheritedTables(Blueprint $blueprint)
	{
		$tables = array();

		foreach ($blueprint->getInheritedTables() as $table)
		{
			$sql = $this->wrapTable($table);

			$tables[] = $this->addModifiers($sql, $blueprint, $column);
		}

		return $tables;
	}
}
