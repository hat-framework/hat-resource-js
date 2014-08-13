<?php

class jsResource extends \classes\Interfaces\resource{

	private $loaded = array();
    private $base_path;
    private $base_url;
    private $relative_url;
    protected $dir = "";
    private static $instance = NULL;
    public function __construct(){
    	$this->dir = dirname(__FILE__);
    	//$this->loadFile("classes/config.php");
    	//$this->loadFile("classes/pluginClass.php");
    }
    
    public static function getInstanceOf(){
        
        $class_name = __CLASS__;
        if (!isset(self::$instance)) {
            self::$instance = new $class_name;
        }

        return self::$instance;
    }
    
    public function load($plug_name, $plug_type){
        $rel_path  = dirname(__FILE__);
        $class = "$plug_name"."pluginClass";
        $this->LoadResourceFile("lib/$plug_type/$class.php");
        $plugin = call_user_func("$class::getInstanceOf()");
        $plugin->setVars($plug_type, $plug_name, $rel_path);
        return $plugin;
    }

}

?>
