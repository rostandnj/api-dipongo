
import React, {useState, useCallback, useEffect} from 'react';

import {Layout} from 'antd';
import close from "../../public/assets/img/bouton-quitter.png";
import axios from "axios";
import {URL} from "../../urlapi";
import chrono from '../../public/assets/chrono.png';
import continuer from '../../public/assets/img/continuer.png';
import quitter from '../../public/assets/img/quitter.png';

import visiter from '../../public/assets/img/visiter.png';
import rejouer from '../../public/assets/img/rejouer.png';


import julien from "../../public/assets/img/Julien.png";
import suivant from "../../public/assets/suivant.jpg"
import Countdown from "react-countdown";

import { Spin,message,Modal,Progress } from 'antd';
import { LoadingOutlined } from '@ant-design/icons';
import {useAuth} from "../../store";
import {useRouter} from "next/router";






const antIcon = <LoadingOutlined style={{ fontSize: 40,color:'#1d893c',marginTop:30 }} spin />;



const {  Content } = Layout;
export default function  Onboarding () {

    const { session, updateSession, deleteSession } = useAuth();
    const router = useRouter()
    const [loading,setLoading] = useState(false)
    const [isModalVisible, setIsModalVisible] = useState(false);
    const [isClose, setIsClose] = useState(false);
    const [isReplay, setIsReplay] = useState(false);
    const [showStars, setShowStars] = useState(true);
    const [localSession,setLocalSession] = useState(null)

    const handleCancel = () => {
        setIsModalVisible(false);
        setIsClose(false)
        setIsReplay(false)
        setShowStars(true)
    };

    const logout = () => {

       deleteSession()

    }

    async function replayGame ( )  {

        try {
            setLoading(true)

            const result = await axios.get(URL + '/api/start/game', {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
            updateSession(result.data.data);
            router.push("/roadmap").then((r)=>{})
            setLoading(false)
            console.log('start')

        } catch(e) {
            setLoading(false)
            if (e.response) {
                message.warning(e.response.data.message)
            }else{
                message.warning('Erreur connexion!')
            }



        }

    }

    useEffect(() => {

        if (typeof window !== "undefined"){
            const token = localStorage.getItem("token")
            axios.get(URL + '/api/user/info', {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }).then((result)=>{
                if(result.data.data.running_session !== undefined){
                    if(result.data.data.running_session.question_done !== 50)
                    {
                        router.push('/lost').then((r)=>{})
                    }
                }
                else{
                    logout();
                }

            }).catch((error)=>{
                console.log(error)

            });
        }


    }, []);





    return (


        <div style={{width:'100vw',height:'100vh',backgroundColor:'#f4cb6e',position:'relative'}} >


            <div className="lost-image-text w100 u-pad-horizontal-m justcenter" style={{background: '#0202028a',height: '100%'}} >

                <div className="flex" style={{alignItems:'flex-end',zIndex:1}}>
                    <img src={julien} className="julien" style={{display: showStars?'block':'none'}}/>
                </div>

                <div className=" card-auth  w100 bgwhite u-pad-s u-pad-left-xl u-pad-vertical-l topText" style={{ marginLeft:-80,position:'relative',marginBottom:70}}>
                    <div className="flex" style={{alignItems:'flex-end',zIndex:1}}>
                        <img src="../../public/btn-close.png"  className="closeEnd cursor" style={{}} onClick={()=>logout()}/>
                    </div>
                    <h1 className="onboarding-text">


                        Tu recevras bientôt un mail pour confirmer notre invitation à passer une demi-journée au poste de secours le plus
                        proche de chez toi.<br/>
                        <span style={{fontWeight: 'bolder'}}>A bientôt !</span>


                    </h1>

                </div>

            </div>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlnsXlink="http://www.w3.org/1999/xlink"
                width="100%"
                height="100%"
                version="1.1"
                viewBox="0 0 1280 1024"
            >
                <g>
                    <image
                        width="100%"
                        height="100%"
                        opacity="1"
                        preserveAspectRatio="none"
                        xlinkHref="../../map_no_chrono.png"
                    ></image>
                    <path
                        className="cursor"
                        fill="transparent"
                        stroke="#none"
                        strokeLinecap="butt"
                        strokeLinejoin="miter"
                        strokeOpacity="1"
                        strokeWidth="1"
                        d="M29.52 182.66l1.846-162.365h134.688l1.845 164.21z"
                        opacity="0"
                    ></path>
                    <path
                        fill="url(#timer)"
                        stroke="#000"
                        strokeLinecap="butt"
                        strokeLinejoin="miter"
                        strokeOpacity="0"
                        strokeWidth="1"
                        d="M1105.182 876.396v36.901h105.168l-3.69-40.59z"
                        opacity="1"

                    ></path>
                    <path
                        className="cursor"
                        fill="transparent"
                        stroke="#000"
                        strokeLinecap="butt"
                        strokeLinejoin="miter"
                        strokeOpacity="0"
                        strokeWidth="1"
                        d="M1095.957 27.676c5.535 118.083 5.535 119.928 5.535 119.928l86.717 9.225 70.112-18.45-12.916-118.084z"
                        opacity="1"
                    ></path>

                </g>

            </svg>

        </div>



    );


}
