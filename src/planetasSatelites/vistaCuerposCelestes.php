<?php
class vistaCuerposCelestes
{
    private $listaCuerposCelestes;
    private $tipo;

    public function __construct($listaCuerposCelestes, $tipo)
    {
        $this->listaCuerposCelestes = $listaCuerposCelestes;
        $this->tipo = $tipo;
    }

    public function mostrarHTML()
    {
        $html = file_get_contents('plantillaCuerposCelestes.html');
        $rutaImage = ($this->tipo =='PLANETS') ? 'planets' : 'satellites' ;
        $content = '';
        $primerElemento = true;
        foreach ($this->listaCuerposCelestes as $indice => $cuerpoCeleste) {
            $activeClass = $primerElemento ? ' active' : '';
            $collapseId = 'collapseExample' . $indice;
            $content .= '<div class="carousel-item ' . $activeClass . '">
                    <h3 class="nombreCuerpoCeleste">' . $cuerpoCeleste->nombre . '</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <img src=" ../images/'. $rutaImage .'/' . $cuerpoCeleste->imagen . '" class="d-block img-fluid" alt="">
                        </div>
                        <div class="col-md-6 contenedorDescripcion">
                            <p class="descripcion">' . $cuerpoCeleste->descripcion . '</p>
                        </div>
                    </div>
                    <p class="more-info">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#' . $collapseId . '" aria-expanded="false" aria-controls="' . $collapseId . '">
                            See more
                        </button>
                    </p>
                    <div class="collapse descripcionParaMobil" id="' . $collapseId . '">
                        <div class="card card-body">
                        ' . $cuerpoCeleste->descripcion . '
                        </div>
                    </div>
                </div>';
            $primerElemento = false;
        }

        $html = str_replace('##what##', strtolower($this->tipo), $html);
        $html = str_replace('CUERPOS CELESTES', $this->tipo, $html);
        $html = str_replace('<!-- #CONTENT# -->', $content, $html);
        echo $html;
    }
}

?>