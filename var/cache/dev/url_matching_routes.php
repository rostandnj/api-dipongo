<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/doc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\ApiController::hello'], null, null, null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
        '/api/login' => [[['_route' => 'web_own_login', '_controller' => 'App\\Controller\\ApiController::login'], null, ['POST' => 0], null, false, false, null]],
        '/app/create/account' => [[['_route' => 'web_create_account', '_controller' => 'App\\Controller\\ApiController::registerAccount'], null, ['POST' => 0], null, false, false, null]],
        '/api/update/password' => [[['_route' => 'api_update_password', '_controller' => 'App\\Controller\\ApiController::updatePassword'], null, ['POST' => 0], null, false, false, null]],
        '/app/reset/password' => [[['_route' => 'api_reset_password', '_controller' => 'App\\Controller\\ApiController::resetPassword'], null, ['POST' => 0], null, false, false, null]],
        '/api/user/info' => [[['_route' => 'api_get_current_user_info', '_controller' => 'App\\Controller\\ApiController::getCurrentUserInfo'], null, ['GET' => 0], null, false, false, null]],
        '/api/user/list/session' => [[['_route' => 'api_list_user_session', '_controller' => 'App\\Controller\\ApiController::listUserSession'], null, ['POST' => 0], null, false, false, null]],
        '/api/start/game' => [[['_route' => 'api_start_game', '_controller' => 'App\\Controller\\ApiController::startGame'], null, ['GET' => 0], null, false, false, null]],
        '/api/leave/game' => [[['_route' => 'api_leave_game', '_controller' => 'App\\Controller\\ApiController::leaveGame'], null, ['GET' => 0], null, false, false, null]],
        '/api/back/to/game' => [[['_route' => 'api_back_to_game', '_controller' => 'App\\Controller\\ApiController::backGame'], null, ['GET' => 0], null, false, false, null]],
        '/api/answer/question' => [[['_route' => 'api_answer_game_question', '_controller' => 'App\\Controller\\ApiController::anwserToolQuestion'], null, ['POST' => 0], null, false, false, null]],
        '/api/register/email' => [[['_route' => 'web_register_email', '_controller' => 'App\\Controller\\ApiController::registerEmail'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/app/validation/account/([^/]++)(*:74)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        74 => [
            [['_route' => 'api_validation_account', '_controller' => 'App\\Controller\\ApiController::validateAccount'], ['token'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
