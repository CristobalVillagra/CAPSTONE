<?php
class Views{

    public function getView($pagina, $vista, $data="")
    {
        if ($pagina == "home") {            //modificar home o index(admin)
            $vista = "Views/".$vista.".php";
        }else{
            $vista = "Views/".$pagina."/".$vista.".php";
        }
        require $vista;
    }
}


?>