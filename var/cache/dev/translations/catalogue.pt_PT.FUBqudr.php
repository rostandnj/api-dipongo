<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('pt_PT', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ocorreu uma excepção durante a autenticação.',
    'Authentication credentials could not be found.' => 'As credenciais de autenticação não foram encontradas.',
    'Authentication request could not be processed due to a system problem.' => 'O pedido de autenticação não foi concluído devido a um problema no sistema.',
    'Invalid credentials.' => 'Credenciais inválidas.',
    'Cookie has already been used by someone else.' => 'Este cookie já está em uso.',
    'Not privileged to request the resource.' => 'Não possui privilégios para aceder a este recurso.',
    'Invalid CSRF token.' => 'Token CSRF inválido.',
    'No authentication provider found to support the authentication token.' => 'Nenhum fornecedor de autenticação encontrado para suportar o token de autenticação.',
    'No session available, it either timed out or cookies are not enabled.' => 'Não existe sessão disponível, esta expirou ou os cookies estão desativados.',
    'No token could be found.' => 'O token não foi encontrado.',
    'Username could not be found.' => 'Nome de utilizador não encontrado.',
    'Account has expired.' => 'A conta expirou.',
    'Credentials have expired.' => 'As credenciais expiraram.',
    'Account is disabled.' => 'Conta desativada.',
    'Account is locked.' => 'A conta está trancada.',
  ),
));

$cataloguePt = new MessageCatalogue('pt', array (
));
$catalogue->addFallbackCatalogue($cataloguePt);
$catalogueEn = new MessageCatalogue('en', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
    'Too many failed login attempts, please try again later.' => 'Too many failed login attempts, please try again later.',
    'Invalid or expired login link.' => 'Invalid or expired login link.',
  ),
  'messages' => 
  array (
    'please login' => 'please login before',
    'account_created' => 'Your account has been created',
    'profile_update' => 'Profile updated',
    'required_field' => 'required field',
    'user not found' => 'user not found',
    'user_not_found' => 'user not found',
    'account not activated' => 'account not activated',
    'account locked' => 'account locked',
    'login or password incorrect' => 'login or password incorrect',
    'Password does not match' => 'login or password incorrect',
    'empty request' => 'empty request',
    'phone already used' => 'phone already used',
    'name should not be empty' => 'name should not be empty',
    'password should contains at least 6 characters' => 'password should contains at least 1 characters',
    'empty img' => 'empty img',
    'please choose image profile again' => 'please choose image profile again',
    'nothing_to_update' => 'Nothing updated',
    'not found' => 'entity not found',
    'account created' => 'account created',
    'email already used' => 'name already used',
    'user updated' => 'user update',
    'already used' => 'already used',
    'empty field' => 'empty field',
    'phone length error' => 'phone should content at least 9 digits',
    'current_password_invalid' => 'Current password is not correct',
    'new_password_invalid' => 'Password must content at least 6 characters',
    'password_invalid' => 'Password must content at least 6 characters',
    'operation denied' => 'operation denied',
    'account not found' => 'account not found',
    'account already activated' => 'account already activated',
    'account activated' => 'account activated',
    'bad user type' => 'bad user type',
    'new password send' => 'A new password has been sended to your mail box',
    'no registered entity' => 'no registered entity',
    'no running session' => 'no running game active please start a new game',
    'question already done' => 'question already answered',
    'answer not exist' => 'answer not exist',
    'no step found for this question' => 'no step found for this question',
    'number of answer incorrect' => 'number of answer incorrect',
    'invlid answer' => 'invalid answer',
    'already running session' => 'already running game',
    'no available questions' => 'no available questions',
    'session ended' => 'game ended',
    'remaining time for this question' => 'remaining time for answer this question',
    'second' => 'second (s)',
    'session_message1' => 'C\'est un bon début ! Poursuis ton voyage entre les lieux pour répondre à plus de questions.',
    'session_message2' => 'Tu es sur la bonne voie ! Continue d\'étudier avec Julien et tu seras bientôt un vrai secouriste.',
    'session_message3' => 'Encore un effort, tu y es presque ! Encore quelques points et le secourisme n\'aura plus de secret pour toi.',
    'session_message4' => 'Bravo ! Tu as obtenu tous les points, tu peux être fière de toi.',
    'email_not_valid' => 'invalid email',
    'email address already used' => 'email already registered',
  ),
));
$cataloguePt->addFallbackCatalogue($catalogueEn);

return $catalogue;