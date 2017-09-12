<?php
namespace Database;

use PDO;
use Config\DbConfig;

/**
 * PDODatabase description
 */

class PDODatabase
{
    private static $instance = null;

    /** @var /PDO Database connection */
    private $connection;

    /**
     * [__construct description]
     * @method __construct
     */
    private function __construct()
    {
        $dsn = "mysql:host=" . DbConfig::DBHOST . ";dbname=" . DbConfig::DBNAME . ";charset=utf8";
        $this->connection = new PDO($dsn, DbConfig::DBUSER, DbConfig::DBPASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PDODatabase();
        }
        return self::$instance;
    }

    /**
     * Get the value of Connection
     *
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
/**
 * [prepare description]
 * @method prepare
 * @param  [type]  $statement [description]
 * @return [type]             [description]
 */

    public function prepare($statement)
    {
            return $this->pdo->prepare($statement);
    }

/**
 * [execute description]
 * @method execute
 * @param  array   $params [description]
 * @return [type]          [description]
 */

    public function execute(array $params = [])
    {
        return $this->statement->execute($params);
    }

/**
 * [fetchRow description]
 * @method fetchRow
 * @return [type]   [description]
 */

    public function fetchRow()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

        /**
         * Undocumented function
         *
         * @return void
         */
    public function fetcAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

/**
 * [fetchObject description]
 * @method fetchObject
 * @param  [type]      $class_name [description]
 * @return [type]                  [description]
 */

    public function fetchObject($class_name)
    {
        return $this->statement->fetchObject($class_name);
    }

/**
 * [query description]
 * @method query
 * @param  [type] $statement [description]
 * @return [type]            [description]
 */

    public function query($statement)
    {
        return $this->pdo->query($statement);
    }
}
