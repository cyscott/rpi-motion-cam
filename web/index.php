
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Motion Camera</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="css/gallery.css">
</head>
<body>

<div>
    <div class="header">
        <div class="pure-menu pure-menu-open pure-menu-horizontal">
            <a class="pure-menu-heading" href="">MotionCam</a>

            <ul>
                <li class="pure-menu-selected"><a href="#">Home</a></li>
            </ul>
        </div>
    </div>

    <div class="pure-g">
        <div class="photo-box u-1 u-med-1-3 u-lrg-1-4">
            <a href="#">
                <img src="http://www.fillmurray.com/420/400"
                     alt="Murray">
            </a>

            <aside class="photo-box-caption">
                <span>by <a href="#">Rpi</a></span>
            </aside>
        </div>

        <div class="text-box u-1 u-med-2-3 u-lrg-3-4">
            <div class="l-box">
                <h1 class="text-box-head">MotionCam</h1>
                <p class="text-box-subhead">Snappin' pics since Dec 30, 2014</p>
            </div>
        </div>

    <?php
    if ($handle = opendir('./img/')) {

      while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
          echo "<div class='photo-box u-1 u-med-1-2 u-lrg-1-3'><a href='$entry'>";
          echo "<img src='$entry'></a><aside class='photo-box-caption'><span>by Rpi</span></aside>";
          echo "</div>"
        }
      }

      closedir($handle);
    }
    ?>

    </div>

    <div class="footer">

    </div>
</div>


</body>
</html>
