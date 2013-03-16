<?php
/**
 * Basic (very basic actually) framework for testing JavaScript functions
 */

class htmlBasics {
    public $jQueryVersion = '1.9.1';
    private $currentDirectory = '';

    public function __construct() {
        $this->currentDirectory = rtrim(dirname(__FILE__), '/').'/';
    }

    private function setjQueryVersion($jQueryVersion = '') {
        if (!empty($jQueryVersion)) {
            if (file_exists($this->currentDirectory.'jquery-'.$jQueryVersion.'.min.js')) {
                $this->jQueryVersion = $jQueryVersion;
            }
        }

        return $this->jQueryVersion;
    }

    public function getHeader($pluginName = '', $jQueryVersion = '') {
        if (empty($pluginName) || !file_exists($this->currentDirectory.$pluginName.'/jquery.'.$pluginName.'.js')) {
            throw new Exception('Specified plugin ("'.$pluginName.'") does not exists!');
        }

        $jQueryVersion = $this->setjQueryVersion($jQueryVersion);

        $html = '<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Testing background transition...</title>';
        $html .= '<script type="text/javascript" src="../../jquery-'.$jQueryVersion.'.min.js"></script>';
        $html .= '<script type="text/javascript" src="../jquery.'.$pluginName.'.js"></script>';

        $html .= '</head><body>';

        return $html;
    }

    public function getFooter() {
        $html = '</body></html>';
        return $html;
    }
}
