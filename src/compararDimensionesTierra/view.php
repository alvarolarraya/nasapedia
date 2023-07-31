<?php
class View
{
    private $planetsList;

    public function __construct($planetsList)
    {
        $this->planetsList = $planetsList;
    }

    public function showHtml()
    {
        $html = file_get_contents('compareEarthDimensions.html');
        $exploded = explode("##option##",$html);
        $select = "";
        foreach ($this->planetsList as $planet){
            if(strcmp($planet->nombre, "Earth") !== 0){
                $aux = str_replace("##planetId##",$planet->ID,$exploded[1]);
                $aux = str_replace("##planetRadius##",$planet->radio,$aux);            
                $select.=str_replace("##planetName##",$planet->nombre,$aux);
            }
        }
        echo $exploded[0].$select.$exploded[2];
    }
}

?>