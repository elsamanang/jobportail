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
        <?php echo form_open('formation/create_action','class ="form-horizontal form-label-left"');?>
            <div class="form-group">
                <label for="varchar">NomFormation <?php echo form_error('nomFormation') ?></label>
                <input type="text" class="form-control" name="nomFormation" id="nomFormation" placeholder="NomFormation"/>
            </div>
            <div class="form-group">
                <label for="varchar">NomInstitution <?php echo form_error('nomInstitution') ?></label>
                <input type="text" class="form-control" name="nomInstitution" id="nomInstitution" placeholder="NomInstitution"/>
            </div>
            <div class="form-group">
                <label for="year">DateDebutFormation <?php echo form_error('dateDebutFormation') ?></label>
                <input type="year" class="form-control" name="dateDebutFormation" id="dateDebutFormation" placeholder="DateDebutFormation"/>
            </div>
            <div class="form-group">
                <label for="year">DateFinFormation <?php echo form_error('dateFinFormation') ?></label>
                <input type="year" class="form-control" name="dateFinFormation" id="dateFinFormation" placeholder="DateFinFormation"/>
            </div>
            <div class="form-group">
                <label for="varchar">DiplomeFormation <?php echo form_error('diplomeFormation') ?></label>
                <input type="text" class="form-control" name="diplomeFormation" id="diplomeFormation" placeholder="DiplomeFormation"/>
            </div>
            <div class="form-group">
                <label for="double">ResultatFormation <?php echo form_error('resultatFormation') ?></label>
                <input type="text" class="form-control" name="resultatFormation" id="resultatFormation" placeholder="ResultatFormation"/>
            </div>
            <div class="form-group">
                <label for="varchar">DescriptionFormation <?php echo form_error('descriptionFormation') ?></label>
                <input type="text" class="form-control" name="descriptionFormation" id="descriptionFormation" placeholder="DescriptionFormation"/>
            </div>
            <div class="form-group">
                <label for="int">Fk IdDemandeur <?php echo form_error('fk_idDemandeur') ?></label>
                <input type="text" class="form-control" name="fk_idDemandeur" id="fk_idDemandeur" placeholder="Fk IdDemandeur"/>
            </div>
            <input type="submit" class="btn btn-success" value="Enregistrer">
            <a href="<?php echo site_url('welcome') ?>" class="btn btn-default">Cancel</a>
        </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>