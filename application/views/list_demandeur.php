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
    <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('demandeur/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('demandeur/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('demandeur'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px" border="1">
            <tr>
                <th>No</th>
                <th>NomDemandeur</th>
                <th>PrenomDemandeur</th>
                <th>Titre</th>
                <th>AdresseDemandeur</th>
                <th>EmailDemandeur</th>
                <th>TelephoneDemandeur</th>
                <th>Genre</th>
                <th>DateNaissance</th>
                <th>Nationalite</th>
                <th>EtatCivil</th>
                <th>ImageProfile</th>
                <th>Pseudo</th>
                <th>Pwd</th>
                <th>Action</th>
            </tr><?php
                foreach ($demandeur_data as $demandeur)
                {
                    ?>
                    <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $demandeur->nomDemandeur ?></td>
                <td><?php echo $demandeur->prenomDemandeur ?></td>
                <td><?php echo $demandeur->titre ?></td>
                <td><?php echo $demandeur->adresseDemandeur ?></td>
                <td><?php echo $demandeur->emailDemandeur ?></td>
                <td><?php echo $demandeur->telephoneDemandeur ?></td>
                <td><?php echo $demandeur->genre ?></td>
                <td><?php echo $demandeur->dateNaissance ?></td>
                <td><?php echo $demandeur->nationalite ?></td>
                <td><?php echo $demandeur->etatCivil ?></td>
                <td><?php echo $demandeur->imageProfile ?></td>
                <td><?php echo $demandeur->pseudo ?></td>
                <td><?php echo $demandeur->pwd ?></td>
                <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('demandeur/read/'.$demandeur->idDemandeur),'Read'); 
                    echo ' | '; 
                    echo anchor(site_url('demandeur/update/'.$demandeur->idDemandeur),'Update'); 
                    echo ' | '; 
                    echo anchor(site_url('demandeur/delete/'.$demandeur->idDemandeur),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                </td>
            </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>