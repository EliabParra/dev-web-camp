<?php

namespace Classes;

class Paginacion {
    public $pagina_actual;
    public $registros_pagina;
    public $total_registros;

    public function __construct($pagina_actual = 1, $registros_pagina = 10, $total_registros = 0) {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registros_pagina = (int) $registros_pagina;
        $this->total_registros = (int) $total_registros;
    }

    public function offset() {
        return ($this->registros_pagina * ($this->pagina_actual - 1));
    }

    public function total_paginas() {
        return ceil($this->total_registros / $this->registros_pagina);
    }

    public function pagina_anterior() {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_siguiente() {
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
    }

    public function link_anterior() {
        $html = '';
        if ($this->pagina_anterior()) {
            $html .= "
                <a class=\"paginacion__link paginacion__link--text\" href=\"?page={$this->pagina_anterior()}\">&laquo; Anterior</a>
            ";
        }
        return $html;
    }

    public function link_siguiente() {
        $html = '';
        if ($this->pagina_siguiente()) {
            $html .= "
                <a class=\"paginacion__link paginacion__link--text\" href=\"?page={$this->pagina_siguiente()}\">Siguiente &raquo;</a>
            ";
        }
        return $html;
    }

    public function numeros_paginas() {
        $html = '';
        for ($i = 1; $i <= $this->total_paginas(); $i++) {
            if ($i === $this->pagina_actual) {
                $html .= "
                    <span class=\"paginacion__link paginacion__link--actual\">{$i}</span>
                ";
            } else {
                $html .= "
                    <a class=\"paginacion__link paginacion__link--numero\" href=\"?page={$i}\">{$i}</a>
                ";
            }
        }
        return $html;
    }

    public function paginacion() {
        $html = '';
        if ($this->total_registros > 1) {
            $html .= "
                <div class=\"paginacion\">
                    {$this->link_anterior()}
                    {$this->numeros_paginas()}
                    {$this->link_siguiente()}
                </div>
            ";
        }
        return $html;
    }
}