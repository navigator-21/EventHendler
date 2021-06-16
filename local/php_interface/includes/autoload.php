<?
namespace Navigator\Looder;
/**
 * Class CClassLoader
 * Provides autoloading for other classes any package by PSR-4 model
 * Singleton.
 *
 * To correctly autoload place classes into /local/php_interface/include/classes/ folder
 * by this path template: ./Namespace/ClassName.php
 */
class CClassLoader
{
    /**
     * 
     */
    private static $config = [

    ];
    /**
     * @access protected
     * @static object CClassLoader
     */
    private static $instance;

    /**
     * Get Instance function
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new CClassLoader;
        }
        return self::$instance;
    }

    /**
     * Constructor function
     * @access private
     */
    private function __construct()
    {
        $this->setRootDir();       
        spl_autoload_register(array($this, 'includeClass'));
    }

    /**
     * @access private
     */
    private function __clone()
    { /* this is Singleton class */
    }

    /**
     * @access private
     */
    private function __wakeup()
    { /* this is Singleton class */
    }

    /**
     * Include file with required class
     * @access private
     * @param  $class string PSR-4! Case sensitive
     *
     * @return null
     */
    private function includeClass($class)
    {               
        $name = str_replace("\\", "/", $class); 
        $classesDir = "/local/php_interface/includes/classes/";
        $classFile = $_SERVER["DOCUMENT_ROOT"] . $classesDir . $name . ".php";
        if (file_exists($classFile)) {                     
            require_once($classFile);
        } else {           
            $classesDir = "navigator/php_interface/includes/classes/";
            $classFile = $_SERVER["DOCUMENT_ROOT"] . $classesDir . $name . ".php";
            if (file_exists($classFile)) {                
                require_once($classFile);
            }
        }
    }

    /**
     * Function check server variable DOCUMENT_ROOT and set it if unset to provide console calls
     * @access private
     *
     * @return null
     */
    private function setRootDir()
    {

        if (empty($_SERVER['DOCUMENT_ROOT']))
            $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . "/../../../");
    }
}

CClassLoader::getInstance();