<?php

namespace dcms\bin;

class filemanager
{
    public $files;
    private $dir;

    function __construct(?string $dir = null) {
        if($dir == null)
            $dir = DCMS_DOCUMENT_ROOT;

        $this->files = scandir($dir);
        $this->dir = $dir;
    }

    function read($file) {
        if(is_dir($this->dir . $file))
            return new filemanager($this->dir . $file);
        elseif(is_file($this->dir . $file))
            return file_get_contents($this->dir . $file);
    }

    function write($file, $content) {
        if(is_file($this->dir . $file))
            file_put_contents($this->dir . $file, $content);
        else
            return false;
    }
}