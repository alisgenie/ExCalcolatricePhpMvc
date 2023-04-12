<!-- Model/service View Controller -->




<?php

if (isset($_GET["page"]) && !empty($_GET["page"])) {

    $controllerName = ucfirst(strtolower($_GET["page"]));
    $controllerName = $controllerName . "Controller";
    $controllerNamePlusExtension = $controllerName . ".php";

    $pathController = dirname(__FILE__) . "/" . $controllerNamePlusExtension;
    
    if (file_exists($pathController)) {
        require_once($controllerNamePlusExtension);

        $calcolatriceController = new $controllerName();

        /* Funzione Render che chiama  */
        $res = $calcolatriceController->run();
        
        $calcolatriceController->render($res);

    }
}








if (!isset($_GET["page"]) && empty($_GET["page"])) {

?>

    <p><a href="?page=calcolatrice">Vai alla Calcolatrice</a></p>

    <!-- <p><a href="?page=calcolatrice">Vai alla pagina HR</a></p> -->
<?php

}
