var VirgilCrypto = require('virgil-crypto');
const config = require('./../config');

const serverPubKey = config.VIRGIL_SERVER_KEY;

var virgil= function () {

    this.encryptionKeypair;
    this.virgilCrypto;
    this.init = function () {

        VirgilCrypto.initCrypto().then(() => {

            this.virgilCrypto = new VirgilCrypto.VirgilCrypto();

            this.encryptionKeypair = this.virgilCrypto.generateKeys();

        });
    };
    this.getData = function (data) {

        let dataJson=data;

        let result={};
        result.status =401;



        if(dataJson.code === 201 || dataJson.code ===200)
        {

            let d =   this.virgilCrypto.decrypt(dataJson.data, this.encryptionKeypair.privateKey);

            result.data = JSON.parse(JSON.parse(d.toString()));

            result.status=201;

        }
        else{
            //console.log(dataJson.data);
        }



        return result;

    };

    this.encryptData = function(data){

        const impPublicKey= this.virgilCrypto.importPublicKey(serverPubKey);

       let res = this.virgilCrypto.encrypt(
            { value: JSON.stringify(data), encoding: 'utf8' },
            impPublicKey
        );



       return res;


    }

};

module.exports = new virgil();
