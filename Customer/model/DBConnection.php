<?php


namespace Model;


class DBConnection
{
    public string $dsn;
    public string $username;
    public string $password;

    /**
     * DBConnection constructor.
     * @param string $dsn
     * @param string $username
     * @param string $password
     */
    public function __construct(string $dsn,
                                string $username,
                                string $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(): \PDO
    {
        try {
            return new \PDO($this->dsn,$this->username,$this->password);
        }catch (\PDOException $exception){
            echo $exception->getMessage();
            die();
        }
    }
}