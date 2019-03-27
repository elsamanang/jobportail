<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/materialise.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font.css">
    <script src="<?php echo base_url();?>assets/materialize.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
    <title>Job Portal</title>
</head>
<body>
<div class="row">
    <div class="col s3">
        <ul class="sidenav sidenav-fixed blue-grey" id="mobile-demo">
            <div class="user-view">
                <div class="row center-align">
                    <img src="<?php echo base_url();?>assets/none.jpg" alt="User" srcset="" class="circle" style="width:50px; height:50px">
                </div>
                <div class="row white-text text-darken-3">
                    <p>Admin</p>
                    <p style="font-size:0.8em; margin-top:-6%;">admin@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <ul id="nav-mobile" class="collection" style="border:none;">
                    <li class="collection-item blue-grey darken-2"><a href="<?php echo site_url('liste_demandeurs');?>" class="white-text">Demandeur</a></li>
                    <li class="collection-item blue-grey darken-2"><a href="<?php echo site_url('liste_employeurs');?>" class="white-text">Employeurs</a></li>
                    <li class="collection-item blue-grey darken-2"><a href="<?php echo site_url('liste_offres');?>" class="white-text">Offres</a></li>
                    <li class="collection-item blue-grey darken-2"><a href="<?php echo site_url('liste_postulations');?>" class="white-text">Postulations</a></li>
                    <br>
                    <br>
                    <li class="collection-item blue-grey darken-1"><a href="<?php echo site_url('logout');?>" class="white-text">Deconnexion</a></li>
                </ul>
            </div> 
        </ul>
    </div>