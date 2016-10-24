/**
 * Created by Osayawe Ogbemudia Terry
 * (Final Year Project Code Snippet
 * for my video gallery
 * on 2/12/14.
 */

$(document).ready(function(){
    $('a.videoLink').each(function (){
        var video = $(this).attr('path');
        var thumb = $(this).attr('videofile')+'.jpg';
        var thumbnailFilePath = video.concat(thumb);
        var videoCaption = $(this).attr('videocaption');
        $(this).css('background-image','url('+thumbnailFilePath+')');
        $(this).html('<div class="caption">'+videoCaption+'</div><img src="images/play_icon.png" class="play" />');
    });

 $('.videoLink').click(function (){
        var path = $(this).attr('path');
        var videoFile = $(this).attr('videofile');
        var videoWidth = Number($(this).attr('videowidth'));
        var videoHeight = Number($(this).attr('videoheight'));

        var videoCode = '<video width="'+videoWidth+'" height="'+videoHeight+'" controls autoplay autobuffer><source src="'+path+videoFile+'.ogv" type="video/ogg" /><source src="'+path+videoFile+'.mp4" type="video/mp4" /><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="'+videoWidth+'" height="'+(videoHeight+40)+'" id="lynda_video_player" align="middle"><param name="allowScriptAccess" value="sameDomain"><param name="allowFullScreen" value="true"><param name="movie" value="lynda_video_player.swf?videoFile='+path+videoFile+'.mp4&amp;skinFile=lynda_video_skin.swf&amp;videoFileWidth='+videoWidth+'&amp;videoFileHeight='+videoHeight+'"><param name="quality" value="high"><param name="wmode" value="transparent"><param name="scale" value="noscale"><param name="salign" value="lt"><embed src="lynda_video_player.swf?videoFile='+path+videoFile+'.mp4&amp;skinFile=lynda_video_skin.swf&amp;videoFileWidth='+videoWidth+'&amp;videoFileHeight='+videoHeight+'" quality="high" width="'+videoWidth+'" height="'+(videoHeight+40)+'" name="lynda_video_player" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" scale="noscale" salign="lt" wmode="transparent" allowfullscreen="true" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed></object></video>';

        $('#videoPlayer').html(videoCode);
        var checkBrowser = navigator.userAgent.toLowerCase();
        var isAndroid = checkBrowser.indexOf('android') > -1;
        var isiPhone = checkBrowser.indexOf('iphone') > -1;
        var isiPod = checkBrowser.indexOf('ipod') > -1;

        if( isAndroid || isiPhone || isiPod ){
            window.location = path+videoFile+'.mp4';
        }else{
            $.fancybox({
                'transitionIn' : 'fade',
                'transitionOut' : 'fade',
                'href' : '#videoPlayer'
            });
        }
    });
});
