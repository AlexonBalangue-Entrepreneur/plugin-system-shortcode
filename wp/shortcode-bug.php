<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.2
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

    //no direct accees
    defined ('_JEXEC') or die('resticted aceess');

    jimport('joomla.filesystem.file');
    jimport('joomla.filesystem.folder');

    class Shortcodes {

        private static $_instance;
        private $document;
        private $importedFiles=array();

        //initialize 
        public function __construct(){

        }
		
        public static function loadShortcodesOverwrite(){

             if (!JFactory::getApplication()->isAdmin()) {

                if( JVERSION >= 3 ){
                    if (!class_exists('JViewLegacy', false))  self::getInstance()->Import('wp/joomla/viewlegacy.php');
                    if (!class_exists('JModuleHelper', false)) self::getInstance()->Import('wp/joomla/helper.php'); 

                } 
            }

            return self::getInstance();

        }
		
        /**
        * making self object for singleton method
        * 
        */
        final public static function getInstance()
        {
            if( !self::$_instance ){
                self::$_instance = new self();
                self::getInstance()->getDocument();
                self::getInstance()->getDocument()->shortcodes = self::getInstance();
            } 
            return self::$_instance;
        }


        /**
        * Get Document
        * 
        * @param string $key
        */
        public static function getDocument($key=false)
        {
            self::getInstance()->document = JFactory::getDocument();
            $doc = self::getInstance()->document;
            if( is_string($key) ) return $doc->$key;

            return $doc;
        }

        /**
        * Get Framework shortcodes path
        * 
        */
        public static function frameworkPath($base=false)
        {
            if( $base==true ) return JURI::root(true).'/plugins/system/shortcode';

            return JPATH_PLUGINS . '/system/shortcode';
        }

        public static function pluginPath($base=false){
            return self::getInstance()->frameworkPath($base);
        }

        /**
        * Make string to slug
        * 
        * @param mixed $text
        * @return string
        */

        public static function slug($text)
        {
            return preg_replace('/[^a-z0-9_]/i','-', strtolower($text));
        }

        /**
        * Import required file/files
        * 
        * @param array | string $paths
        * @param object $shortcodes
        * @return self
        */
        public static function Import($paths, $shortcodes=false)
        {
            if( is_array($paths) ) foreach((array) $paths as $file) self::_Import( $file );
            else self::_Import( $paths, $shortcodes );
            return self::getInstance();
        }

        /**
        * Single file import
        * 
        * @param string $path
        * @return self
        */
        private static function _Import($path, $shortcodes)
        {
            $inplugin = self::getInstance()->frameworkPath() . '/' . $path;

            if( file_exists( $inplugin ) && !is_dir( $inplugin ) ){
                self::getInstance()->importedFiles[] = $inplugin; 
                require_once $inplugin;
            }
            return self::getInstance();
        }

        /**
        * Get Imported file
        * @return array
        */
        public static function getImportedFiles()
        {
            return self::getInstance()->importedFiles;
        }


        public static function getbbcodes()
        {
            return self::getInstance()->bbcodes_tags;
        }

        private static $bbcodes_tags = array();
        public static function importbbcodeFiles()
        {
            $bbcodes = array();
            $pluginbbcodes = glob( self::getInstance()->pluginPath().'/bbcodes/*.php');

            foreach((array) $pluginbbcodes as $value)  $bbcodes[] =   basename($value);

            $bbcodes = array_unique($bbcodes);

            self::getInstance()->Import('wp/bbcodes.php', self::getInstance());

            foreach($bbcodes as $bbcode  ) self::getInstance()->Import('bbcodes/'.$bbcode);

            return self::getInstance();
        }


        private static function file($file)
        {
			if( file_exists( self::getInstance()->frameworkPath() . '/'. $file ) ) { 
                return self::getInstance()->frameworkPath() . '/'. $file;
            }
            return false;
        }


    }