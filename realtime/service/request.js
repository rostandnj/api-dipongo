var request = require('request');
var config = require('./../config');
var virgil = require('./../service/virgil');

/**
 * Must be replace with axios
 */
virgil.init();

var req = function() {


    this.get = function(req, url, fn) {

        var options = {
            url: config.API_URL + url
        };
        if (req.query.token !== undefined ) {
            options.headers = {
                'lang': 'fr',
                'Content-Type': 'application/json',
                'Cookie': req.headers.cookie,
                'Authorization': 'Bearer '+req.query.token
            };
        }

        request(options, function(err, httpResponse, body) {
            if (err) {
                fn(true, err);
            } else {
                if (httpResponse.statusCode === 200 || httpResponse.statusCode === 201) {
                    fn(false, body);
                } else {
                    fn(true, body);
                }
            }
        });
    };

    this.post = function(req, url, params, fn) {


        var options = {
            body: params,
            json: true,
            url: config.API_URL + url
        };
        options.headers = {
            'lang': !!req.cookies.lang ? req.cookies.lang : 'fr',
            'Content-Type': 'application/json',
            'Cookie': req.headers.cookie,
        }

        if (req.query.token !== undefined) {
            options.headers.Authorization = 'Bearer '+req.query.token;
        }

        request.post(options, function(err, httpResponse, body) {
            if (err) {
                fn(true, err);
            } else {
                if (httpResponse.statusCode === 200 || httpResponse.statusCode === 201) {
                    fn(false, body);
                } else {
                    fn(true, body);
                }
            }
        });
    };

    this.pipe = function(res, url) {
        if (res) {
            request.get(url).pipe(res);
        } else
            res.status(404).send();
    };

    this.getFileServer = function(path) {
        return mediaUtils.getFileServer(path);
    };

    this.getApiUrl = function(req, path) {
        return req.hostname && req.protocol ? req.protocol + '://' + req.hostname + '/api' + path : '/api' + path;
    };

};

module.exports = new req();
