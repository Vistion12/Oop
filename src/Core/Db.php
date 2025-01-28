<?php

namespace Vistion\Oop\Core;

use PDO;
use PDOStatement;
use Vistion\Oop\Model\Model;
use Vistion\Oop\traits\TSingletone;

class Db
{

    private array $config = [
      'host' => 'localhost',
      'driver' => 'sqlite',
        'login' => '',
        'password' => '',
        'database' => 'blog.db',
    ];

    use TSingletone;
    private ?PDO $connection = null;

    private function getConnection():PDO
    {
        if (is_null($this->connection)) {
            //var_dump("соединяюсь с дб");
            $this->connection = new PDO("{$this->config['driver']}:../{$this->config['database']}");
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function query(string $sql, array $params = []): PDOStatement
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function lastInsertId(): int
    {
        return $this->getConnection()->lastInsertId();
    }

    public function execute(string $sql, array $params = []): PDOStatement
    {
        return  $this->query($sql, $params);

    }

    //select where id = :id, ['id'=>1]
    public function queryOne(string $sql, array $params = []): ?array
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryOneObject(string $sql, array $params, string $class): Model
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $pdoStatement->fetch();
    }

    //select *
    public function queryAll($sql): bool|array
    {
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}