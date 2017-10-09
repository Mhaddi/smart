/*  Theme 
 *  Javascript actions, methods, and functions
 *  @package 
 *  @version 1.2.0
 */
var dotsmagazine = {};

$(function() {
    "use strict";
    /**
     * [wowInit initialize WOW Js]
     */
    dotsmagazine.wowInit = function wowInit() {
        new WOW().init();
    };
    /**
     * [tickerInit initialize ticker Js]
     */
    dotsmagazine.tickerInit = function tickerInit() {
        $('.js-news').ticker({
            speed: 0.10, // The speed of the reveal
            // ajaxFeed: false,       // Populate jQuery News Ticker via a feed
            // feedUrl: false,        // The URL of the feed
            // MUST BE ON THE SAME DOMAIN AS THE TICKER
            // feedType: 'xml',       // Currently only XML
            // htmlFeed: true,        // Populate jQuery News Ticker via HTML
            // debugMode: true,       // Show some helpful errors in the console or as alerts
            // SHOULD BE SET TO FALSE FOR PRODUCTION SITES!
            controls: true, // Whether or not to show the jQuery News Ticker controls
            titleText: 'BREAKING NEWS', // To remove the title set this to an empty String
            displayType: 'reveal', // Animation type - current options are 'reveal' or 'fade'
            direction: 'ltr', // Ticker direction - current options are 'ltr' or 'rtl'
            pauseOnItems: 2000, // The pause on a news item before being replaced
            // fadeInSpeed: 600,      // Speed of fade in animation
            // fadeOutSpeed: 300      // Speed of fade out animation}
        });
    };
    /**
     * [mixItUpInit initialize mixItUp Js]
     */
    dotsmagazine.mixItUpInit = function mixItUpInit() {
        $('.filter-container').mixItUp({
            animation: {
                enable: true
            },
            load: {
                filter: '.category-1'
            }
        });

    };
    /**
     * [ripplIenit initialize rippl Js]
     */
    dotsmagazine.ripplIenit = function ripplIenit() {
        $('*[data-color]').ripple({
            'v_duration': 1000,
            'h_duration': 1000
        });
    };

    /**
     * [scrollTop scroll to top page]
     */
    dotsmagazine.scrollTop = function scrollTop() {
        ('body').on('click', '#scroll-top', function() {
            $("html, body").animate({
                scrollTop: 0
            }, '1000');
        });
    };
    /**
     * [searchNavbar open and close search in the navbar ]
     */
    dotsmagazine.searchNavbar = function searchNavbar() {
        $('body').on('click', '.search-link', function(event) {
            // $('.search-screen').fadeIn(500);
            $('.search-screen').removeClass("hide");
            $('.search-screen').addClass("show");
            $('.page').addClass('blur');
            $('body').addClass('overflow-hidden');
        });

        $('body').on('click', '.search-close', function(event) {
            // $('.search-screen').fadeOut(500, function() {
            //     $('body').removeClass('overflow-hidden');
            // });
            $('.search-screen').addClass("hide");
            $('.search-screen').removeClass("show");
            $('body').removeClass('overflow-hidden');
            $('.page').removeClass('blur');
        });
        $('body').on('click', '.open-search', function(event) {
            $('.main-search').toggle(100);
            $('.open-search').find('.fa-times').toggleClass('hide');
            $('.open-search').find('.fa-search').toggleClass('hide');
            return false;
        });
    };
    /**
     * light box options 
     */

    dotsmagazine.lightbox = function lightbox() {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'disableScrolling': true
        });
    };


    /**
     * [arrInstagramFactory description]
     * @param  {[type]} json [description]
     * @return {[type]}      [description]
     */
    dotsmagazine.arrInstagramFactory = function arrInstagramFactory(json, numberOfimages) {
        var arrThumbnail = [];
        var arrHightResolution = [];
        // create array of thumbnil
        for (var i = 0; i < numberOfimages; i++) {
            arrThumbnail.push(json.items[i].images.thumbnail.url);
        }

        // create array of big images
        for (var x = 0; x < numberOfimages; x++) {
            arrHightResolution.push(json.items[x].images.standard_resolution.url);
        }
        return [arrThumbnail, arrHightResolution];
        // return json.items[0].images.low_resolution.url;
    };
    /**
     * [drawInstaImages draw Instagram Images inside sidebar]
     * @param  {[type]} arr [description]
     * @return {[type]}     [description]
     */
    dotsmagazine.drawInstaImages = function drawInstaImages(arr) {
        for (var i = 0; i < arr[0].length; i++) {
            console.log(arr[0][i]);
            var c = '<a class="gallery-small-image" href="' + arr[1][i] + '" data-lightbox="example-instagram10" data-title=""><img src="' + arr[0][i] + '" alt=""><i class="fa fa-search-plus "></i></a>';
            $(".gallery-block-small .images-container").prepend(c);
        }
    };

    dotsmagazine.getImagesFromInstagram = function getImagesFromInstagram(userId, numerOfImages, accessToken) {

        $.ajax({
                // url: 'https://www.instagram.com/'+userId+'/media',
                url: 'https://api.instagram.com/v1/users/' + userId + '/media/recent/?access_token=' + accessToken,
                type: 'GET',
                dataType: 'json',
                // data: {param1: 'value1'},
            })
            .done(function(result) {
                console.log("success");
                drawInstaImages(
                    arrInstagramFactory(result, numerOfImages)
                );
                // console.log(arrInstagramFactory(result));
            });
        // .fail(function() {
        //     console.log("insta error");
        // })
        // .always(function() {
        //     console.log("insta complete");
        // });
    };

    dotsmagazine.openSettingPanel = function openSettingPanel() {
        var containerLi = $('.settings-panel ul li');
        containerLi.click(function(event) {

            var cssLink = $(this).attr("data-link");
            $('#dark-skin').attr({
                href: cssLink
            });
        });

        $('body').on('mouseenter', '.settings-panel', function() {
            $(this).stop().animate({
                    left: "0"
                },
                100,
                function() {

                });
        }).on('mouseleave', '.settings-panel', function() {
            $(this).stop().animate({
                    left: "-110px"
                },
                100,
                function() {

                });
        });
    };

    /**
     * [openTabsHover open bootstrap tabs with hover insted of click ]
     */
    dotsmagazine.openTabsHover = function openTabsHover() {
        $('.ul-hover-open-tab > li > a').hover(function() {
            if ($(this).hasClass("hover-open-tab")) {
                $(this).tab('show');

            }
        });

    };

    /**
     * [stickyEle sticky elements]
     * @param  {[type]} element [the elemnt want to be sticky]
     */
    dotsmagazine.stickyEle = function stickyEle(element) {
        $(element).headroom();

        $(element).affix({
            offset: {
                top: "212",
                bottom: function() {
                    return (this.bottom = $('.footer').outerHeight(true));
                }
            }
        });


    };

    dotsmagazine.stickyEle(".sticky-header");
    dotsmagazine.openSettingPanel();
    dotsmagazine.openTabsHover();
    dotsmagazine.tickerInit();
    dotsmagazine.mixItUpInit();
    dotsmagazine.ripplIenit();
});