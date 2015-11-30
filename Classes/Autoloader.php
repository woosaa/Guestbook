<?php
namespace Classes;

/**
 * Autoload of the required files
 */
class Autoloader {
  public function loader($className) {
        $filename =  APP_ROOT.'/'.str_replace('\\', '/', $className) . ".php";
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

