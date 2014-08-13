<?php

use classes\Classes\Object;
abstract class pluginClass extends classes\Classes\Object{

	protected $base_path    = "";
    protected $base_url     = "";
    protected $relative_url = "";
	abstract public function load();
	abstract public function draw();

	public function configure($config = array()){
	
	}
	
	public function setVars($plug_type, $plug_name, $rel_path){
        $this->base_path     = dirname(__FILE__)     . "/$plug_type/$plug_name/";
        $this->base_url      = PLUGIN_URL  . "/$plug_type/$plug_name/";
        
        $relative = explode(PROJECT,dirname(__FILE__));
        array_shift($relative);
        $this->relative_url  = $relative;
	}
}

?>
