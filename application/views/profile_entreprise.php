<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s3">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo base_url()?><?php 
                        $img = ($this->session->entreprise->logo == NULL) ? "assets/none.jpg" : $this->session->entreprise->logo;
                            echo $img;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col s8 card">
        <div class="col s7">
            <h5>Identity</h5>
            <div class="divider"></div>
            <p class="blue-grey-text">Nom : <span><?php echo ucfirst($this->session->entreprise->nomEmployeur)?></span></p>
            <p class="blue-grey-text">Adresse : <span><?php echo ucfirst($this->session->entreprise->adresseEmployeur)?></span></p>
            <p class="blue-grey-text">Email : <span><?php echo $this->session->entreprise->emailEmployeur?></span></p>
            <p class="blue-grey-text">Telephone : <span><?php echo $this->session->entreprise->telephoneEmployeur?></span></p>
            <p class="blue-grey-text">Site : <span><?php echo $this->session->entreprise->siteEmployeur?></span></p>
            <p class="blue-grey-text">Code Postal : <span><?php echo $this->session->entreprise->codePostal?></span></p>
            <p class="blue-grey-text">Fax : <span><?php echo $this->session->entreprise->fax?></span></p>
            <p class="blue-grey-text">Pseudo : <span><?php echo $this->session->entreprise->pseudo?></span></p>
        </div>
        <div class="col s4 offset-s1">
            <div class="row">
                <p class="">
                    <a class="waves-effect waves-light btn right" href="<?php echo site_url('add_offre')?>"><i class="material-icons left">add</i>Ajouter Offre</a>
                </p>
            </div>
            <div class="row">
                <p class="">
                    <a class="waves-effect waves-light btn right" href="<?php echo site_url('offres')?>"><i class="material-icons left">view_headline</i>Liste Offres</a>
                </p>
            </div>
            <div class="row">
            <p><a class="waves-effect waves-light btn right" href="<?php echo site_url('modif_eprofile')?>/<?php echo $this->session->entreprise->idEmployeur?>"><i class="material-icons right">edit</i>Modifier</a></p>
            </div>
        </div>
    </div>
</div>