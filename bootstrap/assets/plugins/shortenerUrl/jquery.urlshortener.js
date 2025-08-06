/*!
 * jQuery URL Shortener 2.0
 * henrique weiand
 *
 * Date: 17/05/2017
 */

$.urlShortener = function (options) {

    var settings   = {};
    var key_google = 'AIzaSyDMOPJ-ZKJ5DoUmNdnNWpsFgrkM1x_Zozw';

    $.extend(settings, options);

    $.ajax({
        url         : 'https://www.googleapis.com/urlshortener/v1/url?key='+key_google,
        type        : 'POST',
        contentType : 'application/json; charset=utf-8',
        data        : '{ longUrl: "'+settings.longUrl+'"}',
        dataType    : 'json',
        success     : function(response) {

            if(settings.success != undefined && settings.success != '') {
                settings.success(response.id);
            }
        },
        error: function (jqXHR, statusError) {
            console.log(jqXHR);
            console.log(statusError);
        }
    });

}

$.urlShortener.settings = {
    apiKey: 'AIzaSyDMOPJ-ZKJ5DoUmNdnNWpsFgrkM1x_Zozw',
    version: 'v1',
};

/*!
 * jQuery URL Shortener 1.0
 * https://github.com/hayageek/jQuery-URL-shortener
 *
 * Date: 24-Oct-2013
 */

/*
(function ($) {
    var scriptsLoaded = false;
    var clientLoaded = false;

    $.getScript("https://apis.google.com/js/client.js", function () {
        (function checkIfLoaded() {
            if (gapi.client) {
                scriptsLoaded = true;
                gapi.client.setApiKey($.urlShortener.settings.apiKey);
                gapi.client.load('urlshortener', $.urlShortener.settings.version, function () {
                    clientLoaded = true;
                });
            } else window.setTimeout(checkIfLoaded, 10);
        })();
    });


    $.urlShortener = function (options) {

        var settings = {};
        var data = {};
        $.extend(settings, $.urlShortener.settings, options);

        (function checkScriptsAndClientLoaded() {
            if (scriptsLoaded && clientLoaded) {
                if (settings.longUrl != undefined) {
                    longToShort(settings);
                } else if (settings.shortUrl != undefined) //URL info
                {
                    shortUrlInfo(settings);
                }
            } else {
                window.setTimeout(checkScriptsAndClientLoaded, 10);
            }

        })();

        function longToShort(s) {
            var data = {
                'longUrl': s.longUrl
            };
            var request = gapi.client.urlshortener.url.insert({
                'resource': data
            });
            request.execute(function (response) {
                if (response.id != null) {
                    if (s.success) {
                        s.success.call(this, response.id);
                    }
                } else {
                    if (s.error) {
                        s.error.call(this, response.error);
                    }
                }
            });
        }

        function shortUrlInfo(s) {
            var data = {
                'shortUrl': s.shortUrl,
                'projection': s.projection
            };
            var request = gapi.client.urlshortener.url.get(data);
            request.execute(function (response) {
                if (response.longUrl != null) {
                    if (s.success) {
                        if (s.projection == undefined) s.success.call(this, response.longUrl);
                        else s.success.call(this, response);
                    }
                } else {
                    if (s.error) {
                        s.error.call(this, response.error);
                    }
                }

            });

        }

    }
    $.urlShortener.settings = {
        apiKey: 'AIzaSyDMOPJ-ZKJ5DoUmNdnNWpsFgrkM1x_Zozw',
        version: 'v1',
    };

}(jQuery));

*/