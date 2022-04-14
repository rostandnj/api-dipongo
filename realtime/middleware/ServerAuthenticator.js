const config = require('./../config');


module.exports = async (req, res, next) => {
    try {
        /* On récupère le token qui se trouve en paramètre de l'URL */

        if(req.headers.authorization && req.headers.authorization === config.SERVER_TOKEN){
            return next();
        }


    } catch (err) {
        return res.status(500).json({
            message: 'Internal server'
        });
    }
};
