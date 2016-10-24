<?php ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fauna+One:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=ABeeZee:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/terdiaAjaxRequest.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</head>

<body class="body">
	<?php 
        include_once("view/menu.php");
        include_once("controller/autoload.php");
        $con = new data();
        $helper = new helper();
        $load_data = new loadData();
        if(isset($_SERVER['HTTP_REFERER'])){
            $back = $_SERVER['HTTP_REFERER'];
        }
    ?>

    <div id="menu_container">
    <header class="logo">
        <a href="index" title="Logo"><img src="../images/logo.PNG"></a>
       </header>
       
       <header class="headercontent">
        <nav>
        <?php echo $menu;?>
        </nav>
    </header>
    </div>


