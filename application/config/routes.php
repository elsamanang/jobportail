<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Acceuils
$route['default_controller'] = 'welcome/login';
$route['accueil_user'] = 'user/welcome';
$route['accueil_entreprise'] = 'entreprise/welcome';

//login ang logout
$route['login'] = 'welcome/login';
$route['log'] = 'welcome/login_action';
$route['logout'] = 'welcome/logout';

//Inscriptions
$route['inscription'] = 'welcome/inscription';
$route['logupPersonne'] = 'user/demandeur/create_action';
$route['logupEntreprise'] = 'entreprise/employeur/create_action';

//Profiles user(demandeur)
$route['uprofile'] = 'user/demandeur/profile';
$route['modif_uprofile/(:any)'] = 'user/demandeur/update/$1';
$route['update_uprofile'] = 'user/demandeur/update_action';

//Profiles entreprises(employeur)
$route['eprofile'] = 'entreprise/employeur/profile';
$route['modif_eprofile/(:any)'] = 'entreprise/employeur/update/$1';
$route['update_eprofile'] = 'entreprise/employeur/update_action';

//Offres
$route['offres'] = 'entreprise/offre';
$route['add_offre'] = 'entreprise/offre/create';
$route['addoffre'] = 'entreprise/offre/create_action';

//Realisations
$route['addrealisation'] = 'user/realisation/create_action';
$route['modif_urealisation/(:any)'] = 'user/realisation/update/$1';
$route['update_urealisation'] = 'user/realisation/update_action';

//Competences
$route['addcompetences'] = 'user/competences/create_action';
$route['modif_ucompetence/(:any)'] = 'user/competences/update/$1';
$route['update_ucompetences'] = 'user/competences/update_action';

//Emplois
$route['addemplois'] = 'user/emplois/create_action';
$route['modif_uemplois/(:any)'] = 'user/emplois/update/$1';
$route['update_uemplois'] = 'user/emplois/update_action';

//Formations
$route['addformation'] = 'user/formation/create_action';
$route['modif_uformation/(:any)'] = 'user/formation/update/$1';
$route['update_uformation'] = 'user/formation/update_action';


//Postuler
$route['postuler/(:any)'] = 'user/demandeur/postuler/$1';
//Reserved(errors,...)
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
