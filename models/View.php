<?php


namespace models;


class View
{
    protected $path;
    protected $data = [];

    public function __construct()
    {
        $this->path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
    }

    public function assign($data = [])
    {
        foreach ($data as $key => $dataItem) {
            $this->data[$key] = $dataItem;
        }
    }

    public function render($view)
    {
        ob_start();
        extract($this->data);
        include $this->path . $view;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
