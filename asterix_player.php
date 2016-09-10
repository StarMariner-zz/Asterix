
<!DOCTYPE html > <!--html 5-->
<html lang="en">
<head>
<meta name="author" content="starmariner.net">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- above This code is makes the site responsive to any browser, if its missing it looks bad on mobile phones.  Thanks W3schools -->
<!--<meta name="dcterms.created" content="Sat, 10 Sep 2016 16:52:42 GMT">-->

<!-- some style extracts from normalize.css v4.1.1  github.com/necolas/normalize.css  -->
<!-- some style extracts from www.w3schools.com/lib/w3.css-->
<title>Asterix "drop and play" Audio Directory Player</title>

<style>

*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
/* asterix customized , minor additions , prefered values. please compare with original normailze.css and w3.css */
/* make fontsize 100% in the body, then everything else can refernce to it with em, thus browser responsive font sizes and more */
html,body{font-family: verdana,sans-serif,monaco; font-size: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin:0; line-height:1.5; overflow:visible}
/* end asterix changes
 
/*! extracts from normalize.css v4.1.1 | MIT License | github.com/necolas/normalize.css */
audio,canvas,video{display:inline-block;vertical-align:baseline}
audio:not([controls]){display:none;height:0}[hidden],template{display:none}
a{background-color:transparent}
img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}
/* End extract from normalize.css */

a{color:inherit}
.header-box{padding:.05em .5em;font-size:3em;color:white;background-color:green}
.subtitle-font{color:#d2be0e;font-size:0.75em} /* yellow  px/16=em or  px/current font-size = em */
.footer-box{padding:.2em 1em;font-size:1em;color:white;background-color:green}
.playerbox1{background-color:#f0f0f0}
.playerbox2{background-color:#e5e5e5}
</style>

</head>

<body>

<!-- plays any mp3 MP3 found in the current directory where this single .php file is -->
<!-- Copyright Pete Garrity 2016, royalty and licence free for anyone, but not for fianacial gain-->
<!-- original work of mine using a lot of info of the internet to make a sweet simple script -->
<!-- note: correct use of the echo is not established, I mean I'm not sure -->
<!-- With HTML5 alone ,MP3, MP4, M4A are at present univeral / work on all popular browsers, ogg works on a few, so does wav. Need javascript to implement it.-->

<div class="header-box">
<!-- removed round from div class ,as not supported in ie8 or earlier --> 
<!-- <img src="fat_asterix.svg" height="48" alt="Fat Asterix Wildcard logo"/> --> 
<b>ASTERIX *</b><span class="subtitle-font">player</span> 
</div>

<div > 
<br />
<?php
  //start scan directory
  //if .mp3 or .MP3 found in the string for the filename, show a playlist index number and the filename, then show a html5 player for the file. 
  //Note there are audiofiles which are the names of the files which need %20 instead of space to make them usable by the player
  //There are audiofilenames which don't have any formatting and are what is seen directly on the ftp site.
  //05092016 changed MP3filenames ect to audiofilenames, added audiofiletyes
  //The audio is HTML5 implemented ,the \" lets the quations be used and not parsed.
  //For speed , if you know the filetypes are lower case .mp3 in your chosen directory, remove the other values in the audiofiletype array list.
  //mp4 video files will only play the audio part with the html5 player.                
  
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
	 if($Pindex & 1){echo "<div class=\"playerbox1\">";} else {echo "<div class=\"playerbox2\">";};
     echo "&nbsp;","$Pindex",".&nbsp;","$audiofilenames[$n]"; 
     echo "<br />",
	 	  "&nbsp;",
		  "<audio controls>
           <source src=$audiofiles[$n] type=\"audio/mpeg\">
		   <a href=$audiofiles[$n]></a>
           </audio>
		   </div>";
	 }
   }}
?>
</div>

<div class = "footer-box">
<!-- removed round from div class ,as not supported in ie8 or earlier --> 
<a href="http://www.w3.org/html/logo/">
<img src="https://www.w3.org/html/logo/badge/html5-badge-h-multimedia.png" width="64" height="32" alt="HTML5 Powered with Multimedia" title="HTML5 Powered with Multimedia">
</a> 2016 StarMariner.net
</div>

</body>
</html>
