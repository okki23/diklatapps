<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!-- Website Design By: www.happyworm.com -->
<title>Demo : The jPlayerPlaylist Object</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>player_assets/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>player_assets/lib/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>player_assets/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>player_assets/dist/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_N",
		cssSelectorAncestor: "#jp_container_N"}, 
		<?php echo $parsing; ?>
		, {
		playlistOptions: {
			enableRemoveControls: true
		},
		swfPath: "player_assets/dist/jplayer",
		supplied: "webmv, ogv, m4v, oga, mp3, mp4, avi, mkv, flv, webmm",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		audioFullScreen: true
	});
  

});
//]]>
</script>
</head>
<body>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1 align="center"> Selamat Datang di <?php echo $judul; ?> </h1>
                        </div>
                        <div class="body"> 
                            <div id="jp_container_N" class="jp-video jp-video-270p" role="application" aria-label="media player">
                                <div class="jp-type-playlist">
                                    <div id="jquery_jplayer_N" class="jp-jplayer"></div>
                                    <div class="jp-gui">
                                        <div class="jp-video-play">
                                            <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                                        </div>
                                        <div class="jp-interface">
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar">
                                                    <div class="jp-play-bar"></div>
                                                </div>
                                            </div>
                                            <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                            <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                            <div class="jp-controls-holder">
                                                <div class="jp-controls">
                                                    <button class="jp-previous" role="button" tabindex="0">previous</button>
                                                    <button class="jp-play" role="button" tabindex="0">play</button>
                                                    <button class="jp-next" role="button" tabindex="0">next</button>
                                                    <button class="jp-stop" role="button" tabindex="0">stop</button>
                                                </div>
                                                <div class="jp-volume-controls">
                                                    <button class="jp-mute" role="button" tabindex="0">mute</button>
                                                    <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                                    <div class="jp-volume-bar">
                                                        <div class="jp-volume-bar-value"></div>
                                                    </div>
                                                </div>
                                                <div class="jp-toggles">
                                                    <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                                    <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
                                                    <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                                </div>
                                            </div>
                                            <div class="jp-details">
                                                <div class="jp-title" aria-label="title">&nbsp;</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-playlist">
                                        <ul>
                                            <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                                            <li>&nbsp;</li>
                                        </ul>
                                    </div>
                                    <div class="jp-no-solution">
                                        <span>Update Required</span>
                                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                    </div>
                                </div>
                            </div>
                                    
                        </body>
                        </div>
                </div>
            </div>
         


        </div>
    </section>
</html>
