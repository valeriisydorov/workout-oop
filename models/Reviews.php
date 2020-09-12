<?php


namespace models;


class Reviews extends DB
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $sql = 'SELECT * FROM review';
        $reviews = $this->queryAll($sql);
        foreach ($reviews as $review) {
            $this->data[] = new Review($review['id'], $review['author'], $review['content']);
        }
    }

    public function getData()
    {
        return $this->data;
    }
}
