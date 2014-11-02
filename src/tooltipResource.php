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
    public $placement = '';

    public function pass($descricao, $title = '?') {
        $this->LoadResource('html', 'html');
        $this->html->LoadJs(URL . "static/js/lib/formulario/description");
        return "<div class='description-container'>
                    <div class='description-hover'>" . $title . "</div>
                    <div class='description-text' style='display: none;'>" . $descricao . "</div>
                </div>";
    }
    
    public function iconTool($descricao,$iconClass = 'glyphicon glyphicon-question-sign desc'){
         if(is_array($descricao) || trim($descricao) == "") return;
         $placement = ($this->placement == '')?'right':$this->placement;
            $var = '<a '
                    . 'data-toggle="tooltip" '
                    . "data-placement='$this->placement' "
                    . 'title="'.$descricao.'">'
                    . '<span class="'.$iconClass.'"></span>'
                    . '</a>';
            $this->LoadResource('html', 'html')->LoadJQueryFunction('$("[data-toggle=tooltip").tooltip();');
        
        return $var;
    }

    public function nameTool($description, $name, $href = '', $location='bottom', $class='') {
        $href = ($href == '') ? '' : "href='$href'";
        return "<a $href data-rel='tooltip' title='$description' data-placement='$location' class='$class'>$name</a>";
    }
    
    
    public function setPlacement($placement){
        $this->placement = $placement;
        return $this;
    }

}
