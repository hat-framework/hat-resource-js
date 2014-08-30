<?php

class tooltipResource extends \classes\Interfaces\resource {

    private static $instance = NULL;

    public static function getInstanceOf() {

        $class_name = __CLASS__;
        if (!isset(self::$instance)) {
            self::$instance = new $class_name;
        }

        return self::$instance;
    }

    public function pass($descricao, $title = '?') {
        $this->LoadResource('html', 'html');
        $this->html->LoadJs(URL."static/js/lib/formulario/description");
        return "<div class='description-container'>
                    <div class='description-hover'>".$title."</div>
                    <div class='description-text' style='display: none;'>".$descricao."</div>
                </div>";
    }
    
    public function iconTool($description, $icon = 'icon-question-sign', $left = false) {
        $this->LoadResource('html', 'html');
        $url = URL.'Application'.DS.'templates'.DS.CURRENT_TEMPLATE;
        $this->html->LoadJs(array(
        $url."/js/jquery-1.7.2.min.js",
        $url."/js/jquery-ui-1.8.21.custom.min.js",
        $url."/js/jquery.chosen.min.js",
        $url."/js/jquery.cleditor.min.js",
        $url."/js/custom_mod.js",
    ));
    $result = ($left == true)?
            "<div class='pull-left'><i class='$icon' data-rel='tooltip' title='$description'></i></div>":
            "<i class='$icon' data-rel='tooltip' title='$description'></i>";
    return $result;
        
    }
    
    public function nameTool($description, $name, $href = '') {
        $this->LoadResource('html', 'html');
        $url = URL.'Application'.DS.'templates'.DS.CURRENT_TEMPLATE;
        $this->html->LoadJs(array(
        $url."/js/jquery-1.7.2.min.js",
        $url."/js/jquery-ui-1.8.21.custom.min.js",
        $url."/js/jquery.chosen.min.js",
        $url."/js/jquery.cleditor.min.js",
        $url."/js/custom_mod.js",
    ));
        $href = ($href == '')?'':"href='$href'";
    return "<a $href data-rel='tooltip' title='$description'>$name</a>";
        
    }

}
