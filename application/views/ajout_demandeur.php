<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1><?php echo $title;?></h1>
    <?php if(isset($this->session->message)) echo $this->session->message;?>
	<div id="body">
        <?php echo form_open_multipart('demandeur/create_action','class ="form-horizontal form-label-left"');?>
            <div class="form-group">
                <label for="varchar">NomDemandeur <?php echo form_error('nomDemandeur') ?></label>
                <input type="text" class="form-control" name="nomDemandeur" id="nomDemandeur" placeholder="NomDemandeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">PrenomDemandeur <?php echo form_error('prenomDemandeur') ?></label>
                <input type="text" class="form-control" name="prenomDemandeur" id="prenomDemandeur" placeholder="PrenomDemandeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">Titre <?php echo form_error('titre') ?></label>
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre"/>
            </div>
            <div class="form-group">
                <label for="varchar">AdresseDemandeur <?php echo form_error('adresseDemandeur') ?></label>
                <input type="text" class="form-control" name="adresseDemandeur" id="adresseDemandeur" placeholder="AdresseDemandeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">EmailDemandeur <?php echo form_error('emailDemandeur') ?></label>
                <input type="text" class="form-control" name="emailDemandeur" id="emailDemandeur" placeholder="EmailDemandeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">TelephoneDemandeur <?php echo form_error('telephoneDemandeur') ?></label>
                <input type="text" class="form-control" name="telephoneDemandeur" id="telephoneDemandeur" placeholder="TelephoneDemandeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">Genre <?php echo form_error('genre') ?></label>
                <input type="text" class="form-control" name="genre" id="genre" placeholder="Genre"/>
            </div>
            <div class="form-group">
                <label for="date">DateNaissance <?php echo form_error('dateNaissance') ?></label>
                <input type="date" class="form-control" name="dateNaissance" id="dateNaissance" placeholder="DateNaissance"/>
            </div>
            <div class="form-group">
                <label for="varchar">Nationalite <?php echo form_error('nationalite') ?></label>
                <input type="text" class="form-control" name="nationalite" id="nationalite" placeholder="Nationalite"/>
            </div>
            <div class="form-group">
                <label for="varchar">EtatCivil <?php echo form_error('etatCivil') ?></label>
                <input type="text" class="form-control" name="etatCivil" id="etatCivil" placeholder="EtatCivil"/>
            </div>
            <div class="form-group">
                <label for="varchar">ImageProfile <?php echo form_error('imageProfile') ?></label>
                <input type="file" class="form-control" name="imageProfile" id="imageProfile" placeholder="ImageProfile"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pseudo <?php echo form_error('pseudo') ?></label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pwd <?php echo form_error('pwd') ?></label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Pwd"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pwd <?php echo form_error('pwdconf') ?></label>
                <input type="password" class="form-control" name="pwdconf" id="pwdconf" placeholder="PwdConfirm"/>
            </div>
            <input type="submit" class="btn btn-success" value="Enregistrer">
            <a href="<?php echo site_url('welcome') ?>" class="btn btn-default">Cancel</a>
        </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>