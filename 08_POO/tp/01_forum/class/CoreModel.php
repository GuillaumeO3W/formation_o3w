<?php

abstract class CoreModel
{
    private $_engine = DB_ENGINE;
    private $_host = DB_HOST;
    private $_dbname = DB_NAME;
    private $_charset = DB_CHARSET;
    private $_user = DB_USER;
    private $_pwd = DB_PWD;

    private $_db;

    public function __construct()
    {
        $this->connect();
    
    }

    private function connect()
    {
        try
        {
            $dsn = $this->_engine.':host='.$this->_host.';dbname='.$this->_dbname.';charset='.$this->_charset;
            $this->_db = new PDO($dsn, $this->_user, $this->_pwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
    protected function getDb()
    {
        return $this->_db;
    }

    public function __destruct()
        {
            if(!empty($this->_req))
            {
                $this->_req->closeCursor();
            }
        }

}