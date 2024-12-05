<?php
class mysqlconex {
    public function conex() {
        $enlace = mysqli_connect("localhost", "root", "", "pagina_ifpp");
        return $enlace;
    }
}
?>
