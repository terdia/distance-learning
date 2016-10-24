<?php ob_start(); ?>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/video_gallery.css" />
<link rel="stylesheet" href="js/myfancybox/fancybox/jquery.fancybox-1.3.4.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fauna+One:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=ABeeZee:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>

<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="js/myfancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/terdiaAjaxRequest.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/video_gallery.js"></script>
</head>

<body class="body">
	<?php
            include_once("view/menu.php");
            include_once("connection/data.php");
            include_once("model/studentHelper.php");
            include_once("model/loadstudentData.php");
            include_once("model/ImageFilter.php");
            include_once("model/convertToAgo.php");
            $con = new data();
            $helper = new studentHelper();
            $load_data = new loadstudentData();
            $filter = new ImageFilter();
            if(isset($_SERVER['HTTP_REFERER'])){
		    	$back = $_SERVER['HTTP_REFERER'];
			}
    ?>

    <div id="menu_container">
    <header class="logo">
        <a href="index" title="Logo"><img src="images/logo.PNG"></a>
       </header>
       
       <header class="headercontent"> 
        <nav>
            <?php echo $menu;?>
        </nav>
    </header>
    </div>