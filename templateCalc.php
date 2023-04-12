<head>
    <title>ALi's PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/elephant_tre.ico">
    
    <link rel="stylesheet" href="calcolatriceStyle.css">
</head>



<body>
<h1>Calcolatrice</h1>

    <main>
        <div class="form-container">
            <form method="post">
                <fieldset>
                    <legend></legend>
                    <p>Inserisci almeno 2 numeri separati da <b>virgola (,)</b></p>
                    <input type="text" name="num" placeholder="insert numbers...">

                    <select name="op" id="op">
                        <option value="" selected>scegli un operazione</option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="&#xd7">&#xd7</option>
                        <option value="&#xf7">&#xf7</option>
                    </select> 

                    <button type="submit" name="submit" value="1">Calcola</button>

            </form>
        </div>

        <div class="result-box">
            <h3>Risultato</h3>

            <?= $risultato;?>

        </div>
        <div class="log">
    
            <?=//TODO: accedere al file solo una volta far  aggiungere l'ultima riga a js, tramite ajax

             "<pre>", file_get_contents("./log/logCalc.txt"), "</pre>"; ?>
            
        </div>

    </main>



</body>