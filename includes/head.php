    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="<?php echo (isset($page['description'])) ? $page['description'] : $_config['title']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($page['title'])) ? $page['title'] : $_config['title']; ?></title>


    <!-- Fallback to homescreen for Chrome <39 on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="<?php echo $_config['company']; ?>">

    <!-- Add to homescreen for Safari on iOS -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
    <meta name="apple-mobile-web-app-title" content="<?php echo $_config['company']; ?>">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileColor" content="#005fd4">
    <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">


    <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">

    <!-- Add to homescreen -->
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-config" content="browserconfig.xml">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Page styles -->
    <link rel="stylesheet" href="css/style.min.css">

    <script src="js/jquery-1.10.2.js" charset="UTF-8"></script>