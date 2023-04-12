<head>
    <title>ALi's PHP</title>
    <link rel="icon" type="image/x-icon" href="images/elephant_tre.ico">
    <style>
        
        html{
            position:relative;
        }

        body{
            /* width: 100%; */
            
            /* background-color: rgba(12, 42, 97, 0.4); */

            <?php if (!empty($_GET["mood"]) && $_GET["mood"] == "down") : ?>
            background-color: rgba(12, 42, 97, 0.4);

            <?php elseif (!empty($_GET["mood"]) && $_GET["mood"] == "up"): ?>
            background-color: rgba(255, 128, 0, 0.4);   
                
            <?php endif; ?>
            
            width : 80%;
            margin: 0 auto;
            padding-bottom: 20px;
            text-align: center;
        }

        ul.menu {
            
            list-style: none;
            position: sticky;
            top: 5px;
            z-index: 100;

        }

        .menu-item {
            text-decoration: none;

            float: right;
            border-bottom: solid blueviolet;
            border-left: solid;
            border-radius: 5px;
            font-family: monospace;
            font-weight: bolder;
            background-color: rgb(62, 47, 79);
            margin: px;
            margin-top: 5px;
        }

        ul li.home-link {
            font-size: 1.5em;
            margin-left: 5px;
            margin-top: unset;
        }



        .menu a {

            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 10px 10px;

        }


        .menu li:hover,
        .menu li:focus-within {
            background-color: rgb(102, 64, 145);
            border-top: white solid;
        }


        .menu li:active {
            border: solid white;

        }


    </style>
</head>