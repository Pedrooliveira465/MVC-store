<?php

namespace core\classes;

use Exception;

class functions
{

    public static function layout($estrutura)
    {

        if (!is_array($estrutura)) {
            throw new Exception("Estruturas inválidas", 1);
        }

        if (!empty($dados) && is_array($dados)) {

            extract($dados);
        }


        foreach ($estrutura as $sla) {

            include("../core/views/$sla.php");
        }
    }
}
