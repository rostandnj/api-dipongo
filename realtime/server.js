const express = require('express');
const SSEClient = require('./service/sseclient');
const SSEManager = require('./service/ssemanager');
const crypto = require('crypto');
const cookieParser = require('cookie-parser');
const tokenAuthenticator = require('./middleware/TokenAuthenticator');
const serverAuthenticator = require('./middleware/ServerAuthenticator');
const bodyParser = require('body-parser');

const request = require('./service/request');
const route = require('./route');

const app = express();
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

/* On active la prise en charge des requêtes CORS */
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', 'http://localhost:3001');

    // authorized headers for preflight requests
    // https://developer.mozilla.org/en-US/docs/Glossary/preflight_request
    res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
    res.header('Access-Control-Allow-Credentials', true);
    next();

    app.options('*', (req, res) => {
        // allowed XHR methods
        res.header('Access-Control-Allow-Methods', 'GET, PATCH, PUT, POST, DELETE, OPTIONS');

        res.send();
    });
});

app.use(cookieParser());


const sseManager = new SSEManager();
app.set('sseManager', sseManager);

app.post('/notify', serverAuthenticator, async (req, res) => {

    let data = req.body;

    if(!!data.message && !!data.users){
        if(data.except !== undefined){
            sseManager.multicast(sseManager.onlineUsersExcept(parseInt(data.except)),{
                id: Date.now(),
                type: 'public-room',
                data: JSON.stringify({message: data.message})
            });

        }
        else
        {
            if(data.users.length === 1){
            sseManager.unicast(data.users[0],{
                id: Date.now(),
                type: 'single-room',
                data: JSON.stringify({message: data.message})
            });

            }

            if(data.users.length > 1){
                sseManager.multicast(data.users,{
                    id: Date.now(),
                    type: 'private-room',
                    data: JSON.stringify({message: data.message})
                });

            }
        }

    }


    res.status(201).send(JSON.stringify({message:'hello'}));

});



app.get('/stream/live', tokenAuthenticator, async (req, res) => {
    /* On récupère notre manager */
    const sseManager = req.app.get('sseManager');

    /* Notre route étant publique nous n'avons pas l'identité de l'utilisateur,
       nous générons donc un identifiant aléatoirement
     */
    //const id = res.locals.user.id;

    /* On ouvre la connexion avec notre client */
    //sseManager.open(id, res);

    /* On envoie le nombre de clients connectés à l'ensemble des clients */
    /*sseManager.broadcast({
        id: Date.now(),
        type: 'online-user',
        data: JSON.stringify({nb: sseManager.count(), users:sseManager.onlineUsers()})
    });*/
    //console.log(req.cookies.test);

    /* en cas de fermeture de la connexion, on supprime le client de notre manager */
    req.on('close', () => {
        /* En cas de deconnexion on supprime le client de notre manager */
        //sseManager.delete(id);
        /* On envoie le nouveau nombre de clients connectés */

        //sseManager.broadcast({id: Date.now(),type: 'leave',retry: 10000, data: id});
        /*sseManager.broadcast({
            id: Date.now(),
            type: 'online-user',
            data: JSON.stringify({nb: sseManager.count(), users:sseManager.onlineUsers()})
        });*/

        request.get(req,route.leave_game,function (status,body) {
            if(![200,201].includes(body.status)){
                console.log('close')
                //res.locals.user = body.data.data.user;
                /*res.status(200).json({
                    data: JSON.parse(body)
                });*/
            }
            else{

            }


            // res.locals.user = body.data.data;
            //console.log(body.data);


            /* On passe l'utilisateur dans notre requête afin que celui-ci soit disponible pour les prochains middlewares */
            //res.locals.user = body.data.data;

            /* On appelle le prochain middleware */

        });
    });
});




app.listen(9000, () => {
    console.log('App is running ! Go to http://localhost:9000');
});
