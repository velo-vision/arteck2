/**
 * Created by me664 on 12/15/15.
 */
jQuery(document).ready(function($){
    $('.share li>a').click(function () {
        var href = $(this).attr('href');
        if (href && $(this).hasClass('no-open') == false) {


            popupwindow(href, '', 600, 600);
            return false;
        }
    });

    function popupwindow(url, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }


    $(window).load(function(){
        $('.bravo_map_wrap').each(function(){
            var map_div=$(this).find('.bravo_google_map');
            var lt = map_div.data('lat');
            var ld = map_div.data('lng');
            var options = {
                center: new google.maps.LatLng(lt, ld),
                zoom: map_div.data('zoom'),
                scrollwheel: false,
                styles: [{
                    featureType: "landscape",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 65
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "poi",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 51
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "road.highway",
                    stylers: [{
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "road.arterial",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 30
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "road.local",
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 40
                    }, {
                        visibility: "on"
                    }]
                }, {
                    featureType: "transit",
                    stylers: [{
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    }]
                }, {
                    featureType: "administrative.province",
                    stylers: [{
                        visibility: "off"
                    }] /**/
                }, {
                    featureType: "administrative.locality",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "administrative.neighborhood",
                    stylers: [{
                        visibility: "on"
                    }] /**/
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                        visibility: "on"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -100
                    }]
                }, {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{
                        hue: "#ffff00"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -97
                    }]
                }]
            };
            var div = map_div[0];
            var map = new google.maps.Map(div, options);

            var image = map_div.data('marker');
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lt, ld),
                map: map,
                icon: image
            });
            //map.mapTypes.set('Styled', styledMapType);

            var contentString = '<div id="mapcontent">' + '<p>'+map_div.data('content')+'</p></div>';
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 320,
                content: contentString
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
        });

    });


    /*
     =========================================================================================
     19. VIDEO BG
     =========================================================================================
     */
    var bravo_video_bg=$('.bravo_video_bg');
    var videobackground = new $.backgroundVideo(bravo_video_bg, {
        "align": "centerXY",
        "width": 1280,
        "height": 720,
        "path": bravo_video_bg.data('path'),
        "filename": bravo_video_bg.data('file-name'),
        "types": ["mp4","ogg","webm"],
        "preload": false,
        "autoplay": false,
        "loop": false
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() > $("#video_background").height()) {
            $("#video_background").hide();
        } else {
            $("#video_background").show();
        }
    });
    $('.widget_categories li').each(function(){
        if($(this).find('ul.children').length){
            $(this).addClass('page_item_has_children');
        }
    })
});