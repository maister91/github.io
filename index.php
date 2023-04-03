<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include 'feedreader.php';
$feedReader = new FeedReader();

?>
<html lang="nl"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="nl" />
    <title>Grandi Markt Kasap</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery.simpleTicker.css" rel="stylesheet">
</head>
<body>
<section>
    <a class="weatherwidget-io" href="https://forecast7.com/nl/51d055d22/beringen/" data-label_1="BERINGEN"
       data-label_2="UNISMED BV" data-font="Roboto" data-icons="Climacons Animated" data-theme="marine">BERINGEN
        by UNISMED BV</a>
</section>
<header>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox"><?
            foreach (scandir('images') as $index => $file) {
                if (!in_array($file, ['.', '..'])) {
                    $random = rand();
                    ?><div class="carousel-item <?= ($index == 2 ? 'active' : '') ?>"
                         style="height: 880px;background-image: url('images/<?= $file.'?'.$random ?>')"></div><?
                }
            }
            ?></div>
    </div>
</header>

<footer class="footer">
    <div id="ticker-roll" class="ticker">
        <ul><?
            foreach ($feedReader->getFeed() as $feed) {
            ?><li><?
                    $date = new DateTime($feed['pubDate']);
                    echo $date->format('d-m H:i').': '.$feed['title'];
                ?></li><?
                echo PHP_EOL;
            }
        ?></ul>
    </div><!--/#ticker -->
</footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery.simpleTicker.js"></script>
<script>
    $(document).ready(function() {
        !function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
        $.simpleTicker($("#ticker-roll"),{'effectType':'roll'});
        setInterval(function(){ reload_page(); },60*60000);
        function reload_page()
        {
            window.location.reload(true);
        }
        $('.carousel').carousel({
            pause: "false",
            interval: 10000
        });
    });
</script>
</body>
</html>