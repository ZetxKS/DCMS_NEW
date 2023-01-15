<?php

namespace bin;

class dcms
{
    static function include_dir(string $dir)
    {
        if(substr($dir,-1, 1) != '/')
            $dir .= '/';
        $lines = scandir($dir);
        foreach ($lines as $line) {
            $line = $dir . $line;
            if(is_file($line))
                require_once $line;
            if(str_replace($dir, '', $line) != '.' && str_replace($dir, '', $line) != '..' && is_dir($line))
                self::include_dir($line);
        }
    }
}