<?php
include('includes/read.php');
?>
<html>
    <head>
        <title>Image Tagging with jQuery and PHP</title>
        <link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
		<link href="css/main.css" rel="stylesheet" type="text/css" media="screen"> 
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    <body>
        <div id='main_panel'>

             <div style='margin: auto; width: 600px;'>
                <div id='image_panel' >
                <?php
                   // <img src='tagging.jpg' id='imageMap'  />
                ?>
                <?php
					$photo = getPhoto('1');
					$row = mysqli_fetch_array($photo);
					echo "<img src='$row[0]' id='imageMap'  />";
                ?>
					<div id='mapper' ><img src='save.png' onclick='openDialog()' /></div>

                    <div id="planetmap">

                    </div>
                    <div id='form_panel'>
                        <div class='row'>
                            <div class='label'>Title</div><div class='field'><input type='text' id='title' /></div>
                        </div>
                        <div class='row'>
                            <div class='label'></div>
                            <div class='field'>
                                <input type='button' value='Add Tag' onclick='addTag()' />

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div style="background: none repeat scroll 0 0 #C7C7C8;
                 border: 1px solid #AEAEAE;
                 clear: both;
                 margin: 20px auto;
                 padding: 20px 0;
                 text-align: center;
                 width: 600px;">
                <input type="button" value="Show Tags" onClick="showTags()" />
                <input type="button" value="Hide Tags" onClick="hideTags()" />
            </div>
        </div>
    </body>
</html>