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
    <nav class="blue-grey">
        <div class="nav-wrapper">
            <a href="<?php echo site_url('accueil');?>" class="brand-logo"><i class="material-icons large left" id="title-icon">work</i> Job-Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <?php
                    
                    if(isset($this->session->user) || isset($this->session->entreprise)){
                ?>
                    <li class="active">
                        <a href="
                            <?php
                                if($this->session->type == 'user')
                                    echo site_url('accueil_user');
                                else
                                    echo site_url('accueil_entreprise');
                            ?>">
                            <i class="material-icons large left" id="">home</i>
                        </a>
                    </li>
                <?php }?>
                <?php
                    if(!isset($this->session->user)&& !isset($this->session->entreprise)){
                ?>
                    <li><a href="<?php echo site_url('login');?>">Login</a></li>
                    <li><a href="<?php echo site_url('inscription');?>">Inscription</a></li>
                <?php }?>
                <?php
                    if(isset($this->session->user)){
                ?>
                    <li>
                        <a href="
                            <?php 
                                if($this->session->type == 'user')
                                    echo site_url('uprofile');
                            ?>">
                            Profil
                        </a>
                    </li>
                    <li><a href="<?php echo site_url('logout');?>">Deconnexion</a></li>
                <?php }?>
                <?php
                    if(isset($this->session->entreprise)){
                ?>
                    <li>
                        <a href="
                            <?php 
                                if($this->session->type == 'entreprise')
                                    echo site_url('eprofile');
                            ?>">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="
                            <?php 
                                if($this->session->type == 'entreprise')
                                    echo site_url('offres');
                            ?>">
                            Mes Offres
                        </a>
                    </li>
                    <li><a href="<?php echo site_url('logout');?>">Deconnexion</a></li>
                <?php }?>
            </ul>
        </div>
    </nav>
</div>