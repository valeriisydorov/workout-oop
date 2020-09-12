<?php


namespace models;


class Upload
{
    protected $name;
    protected $key;
    protected $path;

    public function __construct($name, $key)
    {
        $this->name = $name;
        $this->key = $key;
        $this->path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'images';
    }

    public function  isUploaded()
    {
        if ($_FILES[$this->name]['error'][$this->key] == UPLOAD_ERR_OK) {
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        move_uploaded_file(
            $_FILES[$this->name]['tmp_name'][$this->key],
            $this->path . DIRECTORY_SEPARATOR . $_FILES[$this->name]['name'][$this->key]
        );
    }
}
