<?php

/**
 * Basic (very basic actually) framework for testing JavaScript functions
 */
class htmlBasics {
    /**
     * The jQueryVersion that will be used
     * @see $this->setjQueryVersion()
     * @var string
     */
    private $jQueryVersion = '1.9.1';

    /**
     * The base directory
     * @var string
     */
    private $currentDirectory = '';

    /**
     * The relative directory respect to the current directory
     * @var string
     */
    private $relativeDirectory = '';

    /**
     * The directory where the script is located
     * @var string
     */
    private $scriptDirectory = '';

    /**
     * Whether the footer has been returned or not
     * @var boolean
     */
    private $returnedFooter = false;

    /**
     * Constructor
     *
     * @param string $jQueryVersion Sets the to-be-used jQuery version
     */
    public function __construct($jQueryVersion = '') {
        $this->currentDirectory = dirname(__FILE__).'/';

        $relativeDirectoryCount = substr_count(getcwd().'/', '/');
        $currentDirectoryCount = substr_count($this->currentDirectory, '/');

        $this->relativeDirectory = str_repeat('../', ($relativeDirectoryCount - $currentDirectoryCount));
        $this->scriptDirectory = str_repeat('../', ($relativeDirectoryCount - $currentDirectoryCount) - 1);

        // Order is important: the function uses the just setted up values
        $this->setjQueryVersion($jQueryVersion);
    }

    /**
     * Destructor, invokes getFooter if it hasn't been called earlier
     */
    public function __destruct() {
        if ($this->returnedFooter === false) {
            echo $this->getFooter();
        }
    }

    /**
     * Sets the jQuery version to be used
     *
     * @param string $jQueryVersion The jQuery version we want to use
     * @return string Returns the actual jQuery version to be used
     */
    private function setjQueryVersion($jQueryVersion = '') {
        if (!empty($jQueryVersion)) {
            // Only consider a valid jQueryVersion if such file actually exists
            if (file_exists($this->currentDirectory.'jquery-'.$jQueryVersion.'.min.js')) {
                $this->jQueryVersion = $jQueryVersion;
            }
        }

        return $this->jQueryVersion;
    }

    /**
     * Returns the header
     *
     * @TODO detect the plugin name dynamically
     *
     * @param string $pluginName The plugin name we want to test
     * @param string $jQueryVersion The jQuery version we want to use
     * @throws Exception If the pluginName doesn't exist, this class will return an exception
     * @return string Returns the generated HTML
     */
    public function getHeader($pluginName = '', $jQueryVersion = '') {
        // Some checks before continuing
        if (empty($pluginName) || !file_exists($this->currentDirectory.$pluginName.'/jquery.'.$pluginName.'.js')) {
            throw new Exception('Specified plugin ("'.$pluginName.'") does not exists!');
        }

        // Setup the actual jQueryVersion used
        $jQueryVersion = $this->setjQueryVersion($jQueryVersion);

        $html = '<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Testing background transition...</title>';
        $html .= '<script type="text/javascript" src="'.$this->relativeDirectory.'jquery-'.$jQueryVersion.'.min.js"></script>';
        $html .= '<script type="text/javascript" src="'.$this->scriptDirectory.'jquery.'.$pluginName.'.js"></script>';

        $html .= '</head><body>';

        return $html;
    }

    /**
     * Returns the footer
     *
     * @return string
     */
    public function getFooter() {
        $this->returnedFooter = true;
        $html = '</body></html>';

        return $html;
    }
}
