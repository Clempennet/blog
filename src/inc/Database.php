<?php

namespace App\inc;

abstract class Database
{
    const host_name = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const user_name = 'root';
    const password = '';

    private $connection;

    public function getConnection(): \PDO
    {
        try {
            $this->connection = new \PDO(self::host_name, self::user_name, self::password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        } catch (\Exception $exception) {
            die('Connection error : ' . $exception->getMessage());
        }
    }

    private function checkConnection(): \PDO
    {
        if (null == $this->connection) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    protected function createQuery(string $sql, array $parameters = [])
    {
        if (empty($parameters)) {
            $result = $this->checkConnection()->query($sql);
        }

        $result = $this->checkConnection()->prepare($sql);
        //$result->setFetchMode(\PDO::FETCH_CLASS, static::class);
        $result->execute($parameters);

        return $result;
    }
}
