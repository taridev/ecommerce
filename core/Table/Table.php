<?php

namespace Core\Table;

use Core\Database\Database;

abstract class Table
{
    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if ($this->table === null) {
            $chunks = explode('\\', get_class($this));
            $class_name = end($chunks);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

    public function extract($key, $value)
    {
        $return = [];
        $records = $this->all();
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function last($count = null)
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id DESC';
        if ($count and is_numeric($count)) {
            $query .= ' LIMIT '. $count;
        }
        return $this->query($query);
    }

    public function find($id)
    {
        return $this->query(
            "SELECT * FROM ". $this->table . " WHERE ". $this->table .".id = ?",
            [$id],
            true
        );
    }

    /**
     * @param $id id de l'éléments à mettre à jour
     * @param $fields tableau de paramêtre à mettre à jour ['param1' => 'new value', ... ]
     * @return mixed
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts [] = $k .' = ?';
            $attributes [] = $v;
        }
        $attributes [] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query(
            'UPDATE '. $this->table . ' SET '. $sql_part .' WHERE id = ?',
            $attributes,
            true
        );
    }

    public function delete($id)
    {
        return $this->query(
            'DELETE FROM '. $this->table . ' WHERE id = ?',
            [$id],
            true
        );
    }

    /**
     * @param $fields tableau de paramètres à enter pour créer l'entité ['param1' => 'value1', ... ]
     * @return mixed
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts [] = $k .' = ?';
            $attributes [] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query(
            'INSERT INTO '. $this->table . ' SET '. $sql_part,
            $attributes,
            true
        );
    }
}
