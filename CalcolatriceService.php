<?php

/*? Se devo riguardare questo codice fra molto tempo cosa è importante che indichi nei commenti?*/
// require_once("./CalcolatriceStati.php");

// define("CONSENTED", [".", ",", "-"]);




class CalcolatriceService
{
    /*INFO se sono protected le proprietà sotto, CalcolatriceController non riusciva ad accedere */
    public const ISTRUZIONI = "<p class='warning'>WARNING: Aggiungi almeno due numeri separati da virgole, 
    seleziona un operazione e premi il tasto Calcola. 
    <br>Ricordati che non puoi dividere un numero per zero</p>";

    
    public  $throwIstr;
    /* Funzione che riceve una stringa e restituisce un array di numeri se ha ricevuto una stringa 
    di numeri separata da virgole */
    private  const CONSENTED = [".", ",", "-"];
    private  $ultimaRiga;

    public function __construct(){
        $this->ultimaRiga = "Nessun Risultato";
        $this->throwIstr = false;
    }
    
    public function calcola($stringaDiNumeri, $op)
    {
        
        $result = 0;
        $arrayDiNumeri = $this->pulisciStringa($stringaDiNumeri);
        if (!empty($arrayDiNumeri)) {

            switch ($op) {
                case "+":
                    $result = $this->somma($arrayDiNumeri);
                    break;
                case "-":
                    $result = $this->sott($arrayDiNumeri);
                    break;
                case "×":
                    $result = $this->molt($arrayDiNumeri);
                    break;
                case "÷":
                    $result = $this->divi($arrayDiNumeri);
                    break;
            }
        }else{
            $this->throwIstr = true;
        }
        $this->salva($stringaDiNumeri, $op, $result);
        return $this->ultimaRiga;
    }
//private functions 
    private function salva($stringaDiNumeri, $op, $result)
    {

        // $lines = file("./log/logCalc.txt");
        // $lastLine = sizeof($lines) - 1;
        // echo "<br>". $lines[$lastLine] . "<br>";
        // if (!is_dir($dir_name)) {
        //     //Create our directory if it does not exist
        //     mkdir($dir_name);
        //     echo "Directory created";
        //     }
        // if(filesize("./log/logCalc.txt") == 0){echo "is empty"};

        if ($result != 0) {
            $sDaSalvare = str_replace(",", " $op ", $stringaDiNumeri);
            $sDaSalvare = $sDaSalvare . " = " . $result . "\n";
            $this->ultimaRiga = $sDaSalvare;
            file_put_contents("./log/logCalc.txt", $sDaSalvare, FILE_APPEND);
        }
    }


    private function pulisciStringa($stringaDiNumeri): array
    {


        $arNumeri = [];
        $sub = "";
        for ($i = 0; $i < strlen($stringaDiNumeri); $i++) {
            $sub = substr($stringaDiNumeri, $i, 1);


            if (!(in_array($sub, self::CONSENTED) or is_numeric($sub))) {

                break;
            }
        }

        $arNumeri = explode(",", $stringaDiNumeri);

        foreach ($arNumeri as $num) {

            if (!is_numeric($num)) {

                $arNumeri = [];
                break;
            }
        }

        return $arNumeri;
    }


    private function somma($ar)
    {
        $first = array_shift($ar);
        $sum = $first;

        foreach ($ar as $num) {
            $sum += $num;
        }

        return $sum;
    }

    private function sott($ar)
    {
        $first = array_shift($ar);
        $sum = $first;
        foreach ($ar as $num) {
            $sum -= $num;
        }
        return $sum;
    }

    private function molt($ar)
    {

        $first = array_shift($ar);
        $sum = $first;
        foreach ($ar as $num) {
            $sum *= $num;
        }
        return $sum;
    }


    private function divi($ar)
    {
        $first = array_shift($ar);
        $sum = $first;
        foreach ($ar as $num) {
            if ($num == 0) {

                $sum = 0;
                break;
            }
            $sum = $sum / $num;
        }
        // $s_stampa=str_replace(",","+",$sNumeri);

        return $sum;
    }


    //? devo indicare il tipo di ritorno dei paramentri qua sotto?!


    
}
