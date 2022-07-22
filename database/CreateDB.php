<?php

namespace database;
use database\DataBase;

class CreateDB extends Database
{
    private $databaseQueries =
    [];

    // create data fake
    private $fakeDatas = [
        ['table' => 'tableName', 'fields' => [
            'field 1', 'field 2', 'field 3', 'field 4'
        ], 'values' => [
            'field 1 val', 'field 2 val', 'field 3 val', 'field 4 val'
        ]]
    ];

    public function run()
    {
        foreach ($this->databaseQueries as $databaseQuery) {
            $this->createTable($databaseQuery);
        }
        // if you want make create data fake in youre tables 
        // foreach($this->fakeDatas as $fakeData)
        // {
        //   $this->insert($fakeData['table'], $fakeData['fields'], $fakeData['values']);
        // }
    }
}
