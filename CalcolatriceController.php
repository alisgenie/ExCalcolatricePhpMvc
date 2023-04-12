<?php

class CalcolatriceController
{

    //?2 ho provato private ma non funzione */
    // protected static $istr = false;


    public $sRisultato;

    // public function __construct(){
    //     $this->sRisultato = "Sono il risultato";
    // }
    public function run()
    {
        require_once("./CalcolatriceService.php");

        $calcolatrice = new CalcolatriceService();



        if (isset($_POST["num"]) and !empty($_POST["num"]) and isset($_POST["op"]) and !empty($_POST["op"])) {

            $this->sRisultato = $calcolatrice->calcola($_POST["num"], $_POST["op"]);
            
            //WARN $istr non è ancora stata usata
        } else {
            $calcolatrice->throwIstr = true;
        }
        


        if ($calcolatrice->throwIstr){

            // $this->sRisultato = $calcolatrice::ISTRUZIONI;
            $this->sRisultato = CalcolatriceService::ISTRUZIONI;
        }

        return $this->sRisultato;
    }


    public function render($risultato)
    {/* parte grafica, renderizza */



        include dirname(__FILE__) . "/templateCalc.php";


    }
}
