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
    
    public function iconTool($descricao,$iconClass = 'fa fa-question-circle desc',$extra = ''){
        if(is_array($descricao) || trim($descricao) == "") {return;}
        static $loaded = false;
        if($loaded === false){
            $this->LoadResource('html', 'html')->LoadJQueryFunction('$("[data-toggle=tooltip]").tooltip();');
        }
        else{$loaded = true;}
         //$placement = ($this->placement == '')?'right':$this->placement;
        $var = "<a $extra"
                . 'data-toggle="tooltip" '
                . "data-placement='$this->placement' "
                . 'title="'.$descricao.'">'
                . '<span class="'.$iconClass.'"></span>'
                . '</a>';
        
        
        return $var;
    }

    public function nameTool($description, $name, $href = '', $location='bottom', $class='', $extra='') {
        $href = ($href == '') ? '' : "href='$href'";
        return "<a $href data-rel='tooltip' title='$description' data-placement='$location' class='$class' $extra>$name</a>";
    }
    
    
    public function setPlacement($placement){
        $this->placement = $placement;
        return $this;
    }

}
