<?php


namespace models;


class Review extends DB
{
    private $id;
    private $author;
    private $content;

    public function __construct($id = null, $author = null, $content = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM review WHERE id=:id';
        $data = $this->query($sql, [':id' => $id]);
        if ($data) {
            $this->author = $data['author'];
            $this->content = $data['content'];
            return $this;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM review WHERE id=:id';
        return $this->query($sql, [':id' => $id]);
    }
}
