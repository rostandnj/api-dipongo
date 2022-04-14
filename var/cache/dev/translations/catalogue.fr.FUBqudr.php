<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('fr', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Une exception d\'authentification s\'est produite.',
    'Authentication credentials could not be found.' => 'Les identifiants d\'authentification n\'ont pas pu être trouvés.',
    'Authentication request could not be processed due to a system problem.' => 'La requête d\'authentification n\'a pas pu être executée à cause d\'un problème système.',
    'Invalid credentials.' => 'Identifiants invalides.',
    'Cookie has already been used by someone else.' => 'Le cookie a déjà été utilisé par quelqu\'un d\'autre.',
    'Not privileged to request the resource.' => 'Privilèges insuffisants pour accéder à la ressource.',
    'Invalid CSRF token.' => 'Jeton CSRF invalide.',
    'No authentication provider found to support the authentication token.' => 'Aucun fournisseur d\'authentification n\'a été trouvé pour supporter le jeton d\'authentification.',
    'No session available, it either timed out or cookies are not enabled.' => 'Aucune session disponible, celle-ci a expiré ou les cookies ne sont pas activés.',
    'No token could be found.' => 'Aucun jeton n\'a pu être trouvé.',
    'Username could not be found.' => 'Le nom d\'utilisateur n\'a pas pu être trouvé.',
    'Account has expired.' => 'Le compte a expiré.',
    'Credentials have expired.' => 'Les identifiants ont expiré.',
    'Account is disabled.' => 'Le compte est désactivé.',
    'Account is locked.' => 'Le compte est bloqué.',
    'Too many failed login attempts, please try again later.' => 'Plusieurs tentatives de connexion ont échoué, veuillez réessayer plus tard.',
    'Invalid or expired login link.' => 'Lien de connexion invalide ou expiré.',
  ),
  'messages' => 
  array (
    'please login' => 'bien vouloir se connecter',
    'account_created' => 'Votre compte a été créé',
    'profile_update' => 'Profile mis à jour',
    'required_field' => 'champ requis',
    'user not found' => 'compte non existant',
    'user_not_found' => 'compte non existant',
    'account not activated' => 'compte non activé',
    'account locked' => 'compte bloqué',
    'login or password incorrect' => 'nom / mot de passe incorrect',
    'Password does not match' => 'nom / mot de passe incorrect',
    'empty request' => 'requête non valide',
    'phone already used' => 'numéro de téléphone déjà utilisé',
    'name should not be empty' => 'le champ nom est vide',
    'password should contains at least 6 characters' => 'le mot de passe doit contenir au moins 1 charactère',
    'empty img' => 'champ img non fourni',
    'please choose image profile again' => 'une erreur est survenue',
    'nothing_to_update' => 'Aucune modification effectuée',
    'not found' => 'entité non trouvé(e) ->',
    'account created' => 'compte créé',
    'email already used' => 'nom déjà utilisé',
    'user updated' => 'utilisateur modifié',
    'already used' => 'déjà utilisé',
    'empty field' => 'champ vide',
    'phone length error' => 'le téléphone doit contenir au moins 9 chiffres',
    'current_password_invalid' => 'Mot de passe courant incorrect',
    'new_password_invalid' => 'Le nouveau mot de passe devrait contenir au moins 6 charactères',
    'password_invalid' => 'Le mot de passe doit contenir au moins 6 charactères',
    'operation denied' => 'opération interdite',
    'account not found' => 'compte non trouvé',
    'account already activated' => 'compte déjà activé',
    'account activated' => 'compte activé',
    'choose at list one category' => 'choisissez au moins une catégorie',
    'bad user type' => 'Type de compte incorrect',
    'new password send' => 'Un nouveau mot de passe a été envoyé à votre boîte mail',
    'no registered entity' => 'Aucune entité enregistré',
    'title should not be empty' => 'title should not be empty',
    'no running session' => 'aucun jeu en cours',
    'question already done' => 'question déjà répondue',
    'answer not exist' => 'réponse non existante',
    'no step found for this question' => 'aucune étape trouvée pour cette question',
    'number of answer incorrect' => 'nombre de réponse incorrect',
    'invlid answer' => 'réponses invalides',
    'already running session' => 'jeu est déjà en cours',
    'no available questions' => 'pas de questions disponible',
    'session ended' => 'jeu terminé',
    'remaining time for this question' => 'temps restant avant de répondre à cette question',
    'second' => 'seconde (s)',
    'session_message1' => 'C\'est un bon début ! Poursuis ton voyage entre les lieux pour répondre à plus de questions.',
    'session_message2' => 'Tu es sur la bonne voie ! Continue d\'étudier avec Julien et tu seras bientôt un vrai secouriste.',
    'session_message3' => 'Encore un effort, tu y es presque ! Encore quelques points et le secourisme n\'aura plus de secret pour toi.',
    'session_message4' => 'Bravo ! Tu as obtenu tous les points, tu peux être fière de toi.',
    'email_not_valid' => 'adresse email incorrecte',
    'email address already used' => 'email déjà enregistré',
  ),
));

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
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
