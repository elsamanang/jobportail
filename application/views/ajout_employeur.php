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
        <?php echo form_open('employeur/create_action','class ="form-horizontal form-label-left"');?>
            <div class="form-group">
                <label for="varchar">NomEmployeur <?php echo form_error('nomEmployeur') ?></label>
                <input type="text" class="form-control" name="nomEmployeur" id="nomEmployeur" placeholder="NomEmployeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">AdresseEmployeur <?php echo form_error('adresseEmployeur') ?></label>
                <input type="text" class="form-control" name="adresseEmployeur" id="adresseEmployeur" placeholder="AdresseEmployeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">EmailEmployeur <?php echo form_error('emailEmployeur') ?></label>
                <input type="text" class="form-control" name="emailEmployeur" id="emailEmployeur" placeholder="EmailEmployeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">TelephoneEmployeur <?php echo form_error('telephoneEmployeur') ?></label>
                <input type="text" class="form-control" name="telephoneEmployeur" id="telephoneEmployeur" placeholder="TelephoneEmployeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">SiteEmployeur <?php echo form_error('siteEmployeur') ?></label>
                <input type="text" class="form-control" name="siteEmployeur" id="siteEmployeur" placeholder="SiteEmployeur"/>
            </div>
            <div class="form-group">
                <label for="varchar">CodePostal <?php echo form_error('codePostal') ?></label>
                <input type="text" class="form-control" name="codePostal" id="codePostal" placeholder="CodePostal"/>
            </div>
            <div class="form-group">
                <label for="varchar">Fax <?php echo form_error('fax') ?></label>
                <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax"/>
            </div>
            <div class="form-group">
                <label for="varchar">Logo <?php echo form_error('logo') ?></label>
                <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pseudo <?php echo form_error('pseudo') ?></label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pwd <?php echo form_error('pwd') ?></label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password"/>
            </div>
            <div class="form-group">
                <label for="varchar">Pwd <?php echo form_error('pwdconf') ?></label>
                <input type="password" class="form-control" name="pwdconf" id="pwdconf" placeholder="Password Confirm"/>
            </div>
            <input type="submit" class="btn btn-success" value="Enregistrer">
            <a href="<?php echo site_url('welcome') ?>" class="btn btn-default">Cancel</a>
        </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>