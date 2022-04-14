//const StreamToken = require('./models/StreamToken');
const request = require('./../service/request');
const route = require('./../route');


module.exports = async (req, res, next) => {
    try {
        /* On récupère le token qui se trouve en paramètre de l'URL */


        request.get(req,route.back_game,function (status,body) {
            if(![200,201].includes(body.status)){
                console.log('ok')
                //res.locals.user = body.data.user;
                res.status(200).json({
                    data: JSON.parse(body)
                });
            }


           // res.locals.user = body.data.data;
            //console.log(body.data);


            /* On passe l'utilisateur dans notre requête afin que celui-ci soit disponible pour les prochains middlewares */
            //res.locals.user = body.data.data;

            /* On appelle le prochain middleware */
            return next();


        });



    } catch (err) {
        return res.status(500).json({
            message: 'Internal server'
        });
    }
};
