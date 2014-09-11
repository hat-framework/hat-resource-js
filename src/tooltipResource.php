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
    
    public function __construct(){
        $this->LoadResource('html', 'html')->LoadJquery();
    }

    public function pass($descricao, $title = '?') {
        $this->LoadResource('html', 'html');
        $this->html->LoadJs(URL . "static/js/lib/formulario/description");
        return "<div class='description-container'>
                    <div class='description-hover'>" . $title . "</div>
                    <div class='description-text' style='display: none;'>" . $descricao . "</div>
                </div>";
    }

    public function iconTool($description, $icon = 'icon-question-sign', $left = false) {
        $result = ($left == true) ?
                "<div class='pull-left'><i class='$icon' data-rel='tooltip' title='$description'></i></div>" :
                "<i class='$icon' data-rel='tooltip' title='$description'></i>";
        return $result;
    }

    public function nameTool($description, $name, $href = '') {
        $href = ($href == '') ? '' : "href='$href'";
        return "<a $href data-rel='tooltip' title='$description'>$name</a>";
    }

}
