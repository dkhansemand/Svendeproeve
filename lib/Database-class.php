<?php

interface Log {
    public function logError($errCocde, $errLogBy, $errMsg);
}

abstract class Database extends PDO implements Log{

    protected $conn;
    private $connected = false;
    private $query = null;

    public function logError($errCode, $errLogBy, $errMsg)
    {
        !defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : null;
        !defined('_LOG_PATH_') ? define('_LOG_PATH_', dirname(__DIR__) . DS .'log') : null;
        if(!file_exists(_LOG_PATH_))
        {
            mkdir(_LOG_PATH_);
        }
        $timestamp = date("d-m-Y H:i:s");
        $date = date("d-m-y");
        $logPath = _LOG_PATH_ . DS . 'error_'.$date.'.log';
        $logEntry = '[' . $timestamp . '][' . $errCode . '][' . $errLogBy . '] - ' . $errMsg . PHP_EOL;
        if(file_exists($logPath))
        {
            ## Log for the current date exsist, add new log entry.
            file_put_contents($logPath, $logEntry, FILE_APPEND) or die("Not able to write log entry to file");
        }
        else
        {
            ## Log for the current date does not exsist, create it first. Then add new log entry
            if(fopen($logPath, 'w'))
            {
                file_put_contents($logPath, $logEntry, FILE_APPEND) or die("Not able to write log entry to file");
            }
            else
            { 
                if(@__DEBUG__ === true)
                {
                    throw new Exception('Not able to create file ' . $logPath . 'error_'.$date.'.log');
                    //echo 'Not able to create file // ' . $logPath . 'error_'.$date.'.log';
                }
                exit;
            } 
        }
    }
    /**
     * __contruct of parent class PDO, opens the connection to specified SQL server
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $db
     */
    public function __construct()
    {
        try
        {
            $pdoOptions = array(
                PDO::ATTR_TIMEOUT => 10,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT => false
            );
            $this->conn = new PDO("mysql: host="._DB_HOST_.";dbname="._DB_NAME_.";charset=utf8", _DB_USERNAME_, _DB_PASSWORD_, $pdoOptions);
            $this->connected = true;
        }
        catch(PDOException $err)
        {
            self::logError($err->getCode(), 'System\PDO', $err->getMessage());
            if(@__DEBUG__ === true)
            {
                //echo 'Error logged, check logfile!';
                throw new Exception('Error logged, check log file on server!');
            }
            Router::Redirect('/Error/500');
            exit;
        }
    }

    public function query($query, $params = false)
    {
        $this->query = $this->conn->prepare($query);
        if($params)
        {
            $this->query->execute($params);
        }
        else 
        {
            $this->query->execute();
        }
        return $this->query;
    }

    public function checkConnection()
    {
        return $this->connected;
    }

    public function close()
    {
        unset($this->conn, $this->query);
    }


    public function __deconstruct()
    {
        unset($this->conn, $this->query);
    }
}
