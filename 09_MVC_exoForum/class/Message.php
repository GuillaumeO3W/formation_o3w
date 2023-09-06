<?php

class Message
{
    private $_id;
    private $_date;
    private $_hour;
    private $_author;
    private $_message;


    public function __construct(array $data)
    {
        $this->hydrate($data);

    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }
    
    public function getDate(): string
    {
        return $this->_date;
    }

    public function setDate(string $date)
    {
        $this->_date = $date;
    }

    public function getHour(): string
    {
        return $this->_hour;
    }

    public function setHour(string $hour)
    {
        $this->_hour = $hour;
    }

    public function getAuthor(): string
    {
        return $this->_author;
    }

    public function setAuthor(string $author)
    {
        $this->_author = $author;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function setMessage(string $message)
    {
        $this->_message = $message;
    }


    private function hydrate(array $data)
    {
        foreach($data as $key=>$value)
        {
            $setter = 'set'. ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($value);
            }
        }
    }

    

}