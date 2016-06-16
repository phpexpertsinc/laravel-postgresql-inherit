<?php 

namespace jumper423\LaravelDataBase;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    /**
     * The inherited tables that should be added to the table.
     *
     * @var array
     */
    protected $inheritedTables = [];

    /**
     * Get the inherited tables that should be added.
     *
     * @return array
     */
    public function getInheritedTables()
    {
        return $this->inheritedTables;
    }

    /**
     * Add a new inherited table to the blueprint.
     *
     * @param  string $name
     */
    public function addInheritedTable($name)
    {
        $this->inheritedTables[] = $name;
    }
}
