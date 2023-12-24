<head>
    <?php 
    
    $cookies = $_COOKIE['gender'] ?? 'goat';

    session_start();

    
   if($_SERVER['QUERY_STRING'] == 'tega'){
    unset($_SESSION['name']);
   }


   $name =  $_SESSION['name'] ?? '';


    ?>
    <title>Pizza php</title>
    <style>
        body{
            background:  #f4f4f4;
            margin: 0;
        }
        nav{
            background: #fff;
            padding:20px;
            display:flex;
            justify-content: space-around;
            align-items: center;
        }
        div.container a{
            display: inline-block;
            text-decoration: none;
            color: #cbb09c;
            text-transform: capitalize;
            font-size: 38px;
            text-indent: 450px;

        }
        ul li{
            list-style-type: none;
            cursor: pointer;
        }
        ul li a{
            text-decoration: none;
            background: #cbb09c;
            color:white;
            padding: 15px 20px;
            border-radius: 2px;
            text-transform: uppercase;
            cursor: pointer;
        }
        footer div.wrapper{
            margin-top: 20px;
            text-align: center;
            color: grey;
            font-size: large;
        }
        section{
        color:grey;
        }
        section h4{
            text-align: center;
            font-size: 38px;
        }
        form{
            background: white;
            max-width: 500px;
            margin:0px auto;
            padding:20px;
        }
        input[type=email],input[type=text]{
            display: block;
            width: 100%;
            border-color: grey;
            border-style: solid;
            border-width: 0px 0px 2px 0px;
            padding-top:30px;
            margin-bottom: 10px;
            color:grey;
            font-size: medium;
            padding-bottom: 2px;
        }
        input[type=email]:focus, input[type=text]:focus{
            outline:none;
            border-color: lightseagreen;
        }
        form div.submit{
            max-width: 50px;
            margin: 0 auto;
        }
        div.submit input[type=submit]{
            padding: 15px;
            background:#cbb09c ;
            color:white;
            border: 1px solid #cbb09c;
            border-radius: 3px;
            text-transform: uppercase;
            cursor: pointer;
        }
        .red-email{
            color: red;
            margin-bottom: 2px;
        }
        .red-text{
            color: red;
            margin-bottom: 2px; 
        }
        h4{
            text-align: center;
            color:grey;
            font-size: 28px;
        }
        .box-container{
            max-width:800px;
            margin:0 auto;
            display:flex;
            text-align: center;
        }
        .box1{
            width:300px;
            margin:10px;
            background: white;
            padding: 40px 30px;
            color:grey;
        } 
        .box1 ul{
            padding: 0;;
        }
        h6{
            margin:10px;
            color:grey;
            font-size: 14px;
        }
        .card{
            text-align: end;
            position: relative;
            top:30px;
        }
        .card a{
            text-decoration: none;
            color: #cbb09c;
            font-size:13px;
        }
        hr{
         position:relative;
         top: 20px;
        }
        .wrapps{
            text-align: center;
            color:grey;
        }
        .color{
            background: inherit;
        }
        .delete{
            padding:15px 20px;
            color: white;
            text-transform: uppercase;
            background: #cbb09c;
            border: none;
            cursor:pointer;
        }
        .pizza{
            display: block;
            position:relative;
            top:-95px;  
            margin: 20px auto -80px
        }
        .grey{
            text-indent: -110px;
            color: grey;
            position: relative;
            top:20px;
            cursor: default;

        }
    
    </style>
    </head>
    <body>
        <nav>
        <div class="container">
            <a href="index.php">Ninja Pizza</a>
        </div>
        <ul>
            <li class="grey">hello <?php echo htmlspecialchars($name) ;?></li>
            <li class="grey">(<?php echo htmlspecialchars($cookies) ;?>)</li>
            <li><a href="add.php">Add A Pizza</a></li>
        </ul>
        </nav>