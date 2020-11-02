<?php

/**
 * Class FluentStructure
 */
class FluentStructure
{

    /** @var string */
    private $primaryKey;
    /** @var string */
    private $foreignKey;

    /**
     * FluentStructure constructor.
     *
     * @param string $primaryKey
     * @param string $foreignKey
     */
    function __construct($primaryKey = 'id', $foreignKey = '%s_id') {
        if ($foreignKey === null) {
            $foreignKey = $primaryKey;
        }
        $this->primaryKey = $primaryKey;
        $this->foreignKey = $foreignKey;
    }

    /**
     * @param string $table
     *
     * @return string
     */
    public function getPrimaryKey($table) {
        return $this->key($this->primaryKey, $table);
    }

    /**
     * @param string $table
     *
     * @return string
     */
    public function getForeignKey($table) {
        return $this->key($this->foreignKey, $table);
    }

    /**
     * @param string|callback $key
     * @param string          $table
     *
     * @return string
     */
    private function key($key, $table) {
        if (is_callable($key)) {
            return $key($table);
        }else{
        echo 'Key is '.$key.' and table is '.$table;

        }

        return sprintf($key, $table);
    }
    
}
