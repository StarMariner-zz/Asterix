
<!DOCTYPE html > <!--html 5-->
<html lang="en">
<head>
<meta name="author" content="Pete Garrity">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" type="text/css">
<!-- w3.css, above This code is makes the site responsive to any browser, if its missing it looks bad on mobile phones.  Thanks W3schools -->
<title>Asterix Audio Player</title>
<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: solid;
    border-color: lavender;
	border-width: 2px;
} 
</style>
</head>

<body>
<!-- Works Great just needs tweeking-->
<!-- plays any mp3 MP3 found in the current directory where this single .php file is -->
<!-- Copyright Pete Garrity 2016, royalty and licence free for anyone, but not for fianacial gain-->
<!-- original work of mine using a lot of info of the internet to make a sweet simple script -->
<!-- note: correct use of the echo is not established, I mean I'm not sure -->

<!--Header -->
<div class="w3-container w3-round w3-green w3-padding-medium w3-xxlarge"> 
<!-- <img src="fat_asterix.svg" height="48" alt="Fat Asterix Wildcard logo"/> --> 
<b>ASTERIX *</b> <span class="w3-xlarge w3-text-yellow">player</span> 
</div>
<!--Header -->

<!--Scan and Show -->
<div class="w3-margin-left"> 
<br />
<?php
  //start scan directory
  //outputs true if .mp3 or .MP3 found in the string. if its MP3 or mp3 then it also captures fileneames like MP3_Player.php 
  //Show the user the content of the array one at a time , these are filenames.
  //Note there are MP3files which are the names of the files which need %20 instead of space to make them usable by the player
  //there are MP3filenames which dont have any formating and are what the user sees directly on the ftp site.
  //The audio player is HTML 5 the \" lets the Quations be used and not parsed.
  //Pindex increments, adding a prefix number before the filename / audio title, thus a pseudo playlist.

  $dir = '.';
  $MP3filenames = scandir($dir); //scan the current directory , place results into an array. Sort in ascending order - this is default
  $MP3files = str_replace(' ', '%20', $MP3filenames); //replace spaces with the code for space

  $NoOfFiles = count($MP3filenames); //count number of files in the array 

  $Pindex = 0;
  for($n = 0; $n < $NoOfFiles; $n++) {
    if (strpos($MP3filenames[$n],".mp3") or strpos($MP3filenames[$n],".MP3")){
     $Pindex++;
     echo "$Pindex",".&nbsp;","$MP3filenames[$n]"; 
     echo "<br />		
           <audio controls>
           <source src=$MP3files[$n] type=\"audio/mpeg\">
           </audio>
	   <hr />";
    }
   }
?>
</div>
<!--Scan and Show -->

<!-- Footer -->
<div class = "w3-round w3-green w3-padding-medium w3-small">
<a href="http://www.w3.org/html/logo/">
<img src="https://www.w3.org/html/logo/badge/html5-badge-h-multimedia.png" width="64" height="32" alt="HTML5 Powered with Multimedia" title="HTML5 Powered with Multimedia">
</a>2016 Pete Garrity
</div>
<!-- Footer -->

</body>
</html>
