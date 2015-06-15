
var searchUrlRoot = '/search/node/';
var searchUrlParam = 'node';
var searchKwParam = 'q';
var clickTracked = false;
var facebookLikeClicked = false;


$(document).ready(function(){
    /* ************ PAGEVIEWS ************ */
    $('a#fb_share').click(function(){
        trackFacebookLike();
    });
    /* ************ EVENTS ************ */
    /* PayPal */
    $('#paypalDonate input').click(function(){
        _gaq.push(['_trackEvent', 'External link', 'PayPal', window.location.pathname]);
    });
    /* Odchod na RSS */
    $('.social a').click(function()
    {
        var href = $(this).attr('href');
        if (/rss/.test(href)) {
            trackLinkEvent('Rss reader', 'Rss feed', window.location.pathname);
        }
    });   
    /* Odchod na flicker gallery */
    $('.JS_tab2 .flickr2 a').click(function(){
        var gallery = $(this).children('img').attr('alt');
        trackLinkEvent('External link', window.location.pathname, gallery);
    });
    /* Odchod na flicker gallery */
    $('.JS_tab2 .btn a').click(function(){
        trackLinkEvent('External link', window.location.pathname, 'All galleries on Filcker');
    });
    /* Odchod na youtube */
    $('.JS_tab3 .img a').click(function(){
        trackLinkEvent('External link', window.location.pathname, $(this).attr('title'));
    });
    /* Odchod na youtube */
    $('.JS_tab3 .ptext a').click(function(){
        trackLinkEvent('External link', window.location.pathname, $(this).text());
    });
    /* Odchod na youtube */
    $('.JS_tab3 .btn a').click(function(){
        trackLinkEvent('External link', window.location.pathname, 'All films on Youtube');
    });
    /* Stahnuti prirucky dobrovolnika */
    $('.pdf a').click(function(){
        trackLinkEvent('Download', window.location.pathname, $(this).text());
    });
    /* Stranka download */
    $('a.pdf').click(function(){
        trackLinkEvent('Download', window.location.pathname, $(this).text());
    });
    /* Stranka download */
    $('a.doc').click(function(){
        trackLinkEvent('Download', window.location.pathname, $(this).text());

    });
    /* Obecny link mimo stranku */
    $('a').click(function(){
        if (clickTracked) {
            clickTracked=false;
            return;
        }
        var href = $(this).attr('href');
        if (/^(http:\/\/)?[a-z0-9.-_]+\.[a-z]{2,3}/i.test(href) && !eval('/'+window.location.hostname+'/').test(href)) {
            _gaq.push(['_trackEvent', 'External link', window.location.pathname, $(this).attr('href')]);
        }
    });

/* FACEBOOK */
if (window.trackFacebook == 1) {
    window.fbAsyncInit = function() {
      FB.init({appId: '133661643353986', status: true, cookie: true,
               xfbml: true});
    };
    (function() {
      var e = document.createElement('script');e.async = true;
      e.src = document.location.protocol + '//connect.facebook.net/cs_CZ/all.js';
      document.getElementById('fb-root').appendChild(e);
    }());
    FB.Event.subscribe('edge.create', function() {
        trackFacebookLike();
    });
}

}); /* document.ready() */



function trackFacebookLike(){
    if (facebookLikeClicked) {
        return;
    }
    facebookLikeClicked = true;
    _gaq.push(['_setCustomVar', 1, 'Facebook', 'FB liker', 1]);
    _gaq.push(['_trackPageview', '/facebook/like']);
}

/* OTHER FUNCTIONS */
function trackLinkEvent(category, type, name, value){
    _gaq.push(['_trackEvent', category, type, name, value]);
    clickTracked = true;
}

function getPageUrl(){
    var currentUrl = document.URL;
    var searchUrl = searchUrlRoot;
    var seoSearchParameter = searchUrlParam;
    var searchParameter = searchKwParam;

    var url = currentUrl.replace(/http:\/\//, '');
    url = url.replace(eval('/'+window.location.hostname+'/'), '');

    searchUrl = searchUrl.replace(/\/+/g, '\\/');

    var regexp = eval('/'+searchUrl+'/');
    if (regexp.test(url)) { 
        regexp = eval('/^.*('+seoSearchParameter+')\\/([^/]+)/');
        var query = url.match(regexp, '');
        query = query[2];

        keywords = query.replace(/%20/g, '+');
        url = url.replace(eval('/\\/'+query+'/'), '/');
        if (/\?/.test(url)) {
            url += ((/\?$/).test(currentUrl) ? '' : '&')+ searchParameter +'='+ keywords;
        } else {
            url += '?' + searchParameter +'='+ keywords;
        }
    }

    return url;
}
