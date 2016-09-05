
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

<!-- plays any mp3 MP3 found in the current directory where this single .php file is -->
<!-- Copyright Pete Garrity 2016, royalty and licence free for anyone, but not for fianacial gain-->
<!-- original work of mine using a lot of info of the internet to make a sweet simple script -->
<!-- note: correct use of the echo is not established, I mean I'm not sure -->
<!-- With HTML5 alone ,MP3, MP4, M4A are at present univeral / work on all poplular browsers, ogg works on a few, so does wav. Need javascript to implement it.-->

<div class="w3-container w3-round w3-green w3-padding-medium w3-xxlarge"> 
<!-- <img src="fat_asterix.svg" height="48" alt="Fat Asterix Wildcard logo"/> --> 
<b>ASTERIX *</b> <span class="w3-xlarge w3-text-yellow">player</span> 
</div>

<div class="w3-margin-left"> 
<br />
<?php
  //start scan directory
  //if .mp3 or .MP3 found in the string for the filename, show a playlist index number and the filename, then show a html5 player for the file. 
  //Note there are audiofiles which are the names of the files which need %20 instead of space to make them usable by the player
  //There are audiofilenames which don't have any formatting and are what is seen directly on the ftp site.
  //05092016 changed MP3filenames ect to audiofilenames, added audiofiletyes
  //The audio is HTML5 implemented ,the \" lets the quations be used and not parsed.
  //For speed , if you know the filetypes are lower case .mp3 in your chosen directory, remove the other values in the audiofiletype array list.               
  
  $audiofiletype = array(".mp3",".Mp3",".MP3",".mP3",".mp4",".Mp4",".MP4",".mP4",".m4a",".M4a",".M4A",".m4A");
  
  $dir = '.';

  //Sort in ascending order - this is default
  $audiofilenames = scandir($dir); //scan the directory . is current, place results into an array
  $audiofiles = str_replace(' ', '%20', $audiofilenames); //replace spaces with the code for space

  //count number of files in the array the loop until finished
  $filescount = count($audiofilenames);
  
  $Pindex = 0;
  for($n = 0; $n < $filescount; $n++) { foreach ($audiofiletype as $value){
    if (strpos($audiofilenames[$n],$value)){
     $Pindex++;
     echo "$Pindex",".&nbsp;","$audiofilenames[$n]"; 
     echo "<br />		
           <audio controls>
           <source src=$audiofiles[$n] type=\"audio/mpeg\">
           </audio>
		   <hr />";
	 }
   }}
?>
</div>

<div class = "w3-round w3-green w3-padding-medium w3-small">
<a href="http://www.w3.org/html/logo/">
<img src="https://www.w3.org/html/logo/badge/html5-badge-h-multimedia.png" width="64" height="32" alt="HTML5 Powered with Multimedia" title="HTML5 Powered with Multimedia">
</a>2016 Pete Garrity
</div>

</body>
</html>
