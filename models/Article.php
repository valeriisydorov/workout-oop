<?php


namespace models;


class Article extends DB
{
    private $id;
    private $title;
    private $content;

    public function __construct($id = null, $title = null, $content = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM article WHERE id=:id';
        $data = $this->query($sql, [':id' => $id]);
        if ($data) {
            $this->title = $data['title'];
            $this->content = $data['content'];
            return $this;
        } else {
            return false;
        }
    }

    public function update()
    {
        $sql = 'UPDATE article SET title=:title, content=:content WHERE id=:id';
        $data = $this->query($sql, [':id' => $this->getId(), ':title' => $this->getTitle(), ':content' => $this->getContent()]);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
