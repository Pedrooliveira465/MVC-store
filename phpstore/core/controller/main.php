<?php

namespace core\controller;

use core\classes\functions;

class main
{

    public function index()
    {
        $dados = [
            "clientes"=>["Sob", "Mateus", "Pedro"]
        ];

        functions::layout(['layout/htmlheader', 
        'paginicial', 
        'layout/htmlfooter'
    ], $dados);
    }

    public function loja()
    {

        echo "cu";
    }
}
