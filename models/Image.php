<?php


namespace models;


class Image
{
    protected $path;
    protected $images = [];

    public function __construct()
    {
        $this->path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'images';
        $this->images = array_diff(scandir($this->path), ['.', '..']);
    }

    public function getImages()
    {
        return $this->images;
    }
}
