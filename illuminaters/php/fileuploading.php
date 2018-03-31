<?php
require '../core/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="/illuminaters/css/fileuploading.css">
<link rel="stylesheet" href="/illuminaters/js/fileuploading.js">
<link href='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' rel='stylesheet' type='text/css'>



    <head>
        <meta charset="utf-8"/>
   

     
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>

        <form id="upload1" method="post" action="comparator.php" enctype="multipart/form-data">
            <div id="drop">
              audio1

                <a>Browse</a>
                <input type="file" name="upl" multiple />
            </div>

            <ul>
               
            </ul>

        </form>
        <form id="upload2" method="post" action="comparator.php" enctype="multipart/form-data">
            <div id="drop">
                audio2
                <a>Browse</a>
                <input type="file" name="upl" multiple />
            </div>

            <ul>
               
            </ul>

        </form>

        <!-- JavaScript Includes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="assets/js/jquery.knob.js"></script>

        <!-- jQuery File Upload Dependencies -->
        <script src="assets/js/jquery.ui.widget.js"></script>
        <script src="assets/js/jquery.iframe-transport.js"></script>
        <script src="assets/js/jquery.fileupload.js"></script>

        <!-- Our main JS file -->
        <script src="assets/js/script.js"></script>

    </body>
</html>