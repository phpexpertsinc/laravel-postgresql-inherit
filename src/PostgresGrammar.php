<?php

namespace jumper423\LaravelDataBase;

use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;
use Illuminate\Support\Fluent;

class PostgresGrammar extends BasePostgresGrammar
{
    /**
     * Compile a create table command.
     *
     * @param  Blueprint $blueprint
     * @param  \Illuminate\Support\Fluent $command
     * @return string
     */
    public function compileCreate(Blueprint $blueprint, Fluent $command)
    {
        $inheritedTables = implode(', ', $this->getInheritedTables($blueprint));
        $sql = parent::compileCreate($blueprint, $command);
        if (empty($inheritedTables)) {
            return $sql;
        } else {
            return $sql . " inherits ($inheritedTables)";
        }
    }

    /**
     * Compile the blueprint's inherits definitions.
     *
     * @param  Blueprint $blueprint
     * @return array
     */
    protected function getInheritedTables(Blueprint $blueprint)
    {
        $tables = [];
        foreach ($blueprint->getInheritedTables() as $table) {
            $tables[] = $table;
        }
        return $tables;
    }
}
