<?php
namespace Service;

class DBConnector {
    private static $connection;
    private static $config;

    /** Set configuration of the database to be used
     * 
     * @param array $config Example: [
     * 'driver' => 'mysql',
     * 'host' => 'localhost',
     * 'dbname' => 'tableName',
     * 'dbuser' => 'username',
     * 'dbpass' => 'password'
     * ]
     * 
     * @return void
     */
     public static function setConfig(array $config) {
        $dsn = \sprintf(
                '%s:host=%s;dbname=%s',
                $config['driver'],
                $config['host'],
                $config['dbname']
        );
        
        self::$config = [
            'dsn' => $dsn,
            'dbuser' => $config['dbuser'],
            'dbpass' => $config['dbpass']
        ];

        return;
    }
    /** Create a connection to the database using the class config
     * 
     * @param void
     * 
     * @throws RuntimeException if $config is empty
     * 
     * @return void
     */
    private static function createConnection() {
        if (!self::$config) {
            throw new \RuntimeException('The configuration is empty, run setConfig()');
            return;
        }
        self::$connection = new \PDO(self::$config['dsn'], self::$config['dbuser'], self::$config['dbpass']);
    }
    
    /** Return the PDO Object of the configured database. If not already created, creates one
     * 
     * @param void 
     * 
     * @return PDO $connection Return the connection
     */
    public static function getConnection() {
        if (!self::$connection) {
            self::createConnection();
        }

        return self::$connection;
    }
}
