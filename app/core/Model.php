<?php

class Model
{
    public $connection = "";
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'ticketing');
    }

    public function exeQuery(string $query, array $data = [], bool $returnData)
    {
        $prepare = $this->connection->prepare($query);
        $type = '';
        $values = [];
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                $type .= $item['type'];
                $values[$key] = $item['value'];
            }
            $prepare->bind_param($type, ...$values);
        }
        if ($returnData) {
            $prepare->execute();
            return $prepare->get_result();
        }
        return $prepare->execute();

    }

}