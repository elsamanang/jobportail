<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s3">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo base_url()?><?php 
                            $img = ($this->session->user->imageProfile == NULL) ? "assets/none.jpg" : $this->session->user->imageProfile;
                                echo $img;?>">
                </div>
            </div>
            <p><a class="waves-effect waves-light btn" href="" onclick="printCv()"><i class="material-icons right">print</i>Imprimer CV</a></p>
        </div>
    </div>
    <div class="col s8 card">
        <div class="col s5">
            <h5>Identity</h5>
            <div class="divider"></div>
            <p class="blue-grey-text">Titre : <span><?php echo ucfirst($this->session->user->titre)?></span></p>
            <p class="blue-grey-text">Nom : <span><?php echo ucfirst($this->session->user->nomDemandeur)?></span></p>
            <p class="blue-grey-text">Prenom : <span><?php echo ucfirst($this->session->user->prenomDemandeur)?></span></p>
            <p class="blue-grey-text">Pseudo : <span><?php echo ucfirst($this->session->user->pseudo)?></span></p>
            <p class="blue-grey-text">Adresse : <span><?php echo ucfirst($this->session->user->adresseDemandeur)?></span></p>
            <p class="blue-grey-text">Email : <span><?php echo ucfirst($this->session->user->emailDemandeur)?></span></p>
            <p class="blue-grey-text">Telephone : <span><?php echo ucfirst($this->session->user->telephoneDemandeur)?></span></p>
            <p class="blue-grey-text">Date de Naissance : <span><?php echo ucfirst($this->session->user->dateNaissance)?></span></p>
            <p class="blue-grey-text">Genre : <span><?php echo ucfirst($this->session->user->genre)?></span></p>
            <p class="blue-grey-text">Nationalite : <span><?php echo ucfirst($this->session->user->nationalite)?></span></p>
            <p class="blue-grey-text">Etat civil : <span><?php echo ucfirst($this->session->user->etatCivil)?></span></p>
        </div>
        <div class="col s6 offset-s1">
            <div class="row">
                <h5>Formation</h5>
                <div class="divider"></div>
                <?php foreach ($formations as $formation) {?>
                <p class="blue-grey-text"><?php echo $formation->dateDebutFormation;?>-<?php echo $formation->dateFinFormation;?> :: <?php echo ucfirst($formation->nomFormation);?> @ <span><?php echo ucfirst($formation->nomInstitution);?></span></p>
                <?php }?>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal3"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Competences</h5>
                <div class="divider"></div>
                <?php foreach ($competences as $competence) {?>
                    <p class="blue-grey-text"><?php echo ucfirst($competence->nomCompetence);?></p>
                <?php }?>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal1"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Realisations</h5>
                <div class="divider"></div>
                <?php foreach ($realisations as $realisation) {?>
                    <p class="blue-grey-text"><?php echo ucfirst($realisation->dateRealisation);?> - <?php echo ucfirst($realisation->nomRealisation);?> @ <?php echo ucfirst($realisation->lienRealisation);?> : <?php echo ucfirst($realisation->descriptionRealisation);?></p>
                <?php }?>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal2"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Emplois</h5>
                <div class="divider"></div>
                <?php foreach ($emplois as $emploi) {?>
                    <p class="blue-grey-text"><?php echo ucfirst($emploi->dateDebutEmplois);?>-<?php echo ucfirst($emploi->dateFinEmplois);?> :: <?php echo ucfirst($emploi->posteEmplois);?> @ <?php echo ucfirst($emploi->nomEntreprise);?></p>
                <?php }?>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal4"><i class="material-icons">add</i></a>
                </p>
            </div>
        </div>
        <p><a class="waves-effect waves-light btn" href="<?php echo site_url('modif_uprofile')?>/<?php echo $this->session->user->idDemandeur?>"><i class="material-icons right">edit</i>Modifier</a></p>
    </div>
</div>

<!-- Ajout Competences modal-->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Ajouter Competence</h4>
        <p>
            <?php echo form_open('addcompetences','class =""');?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_file</i>
                    <input id="icon_nom" type="text" class="validate" name="nomCompetence">
                    <label for="icon_nom">Nom Competence</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" value="Ajouter">Ajouter
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>
<!-- Ajout Realisation modal-->
<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Ajouter Realisation</h4>
        <p>
            <?php echo form_open('addrealisation','class =""');?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_file</i>
                    <input id="icon_name" type="text" class="validate" name="nomRealisation">
                    <label for="icon_name">Nom Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">public</i>
                    <input id="icon_link" type="text" class="validate" name="lienRealisation">
                    <label for="icon_link">Lien de la Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">event</i>
                    <input type="text" class="datepicker" placeholder="Date de la Realisation" id="dateRealisation" name="dateRealisation">
                    <label for="dateRealisation">Date de la Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">edit</i>
                    <textarea id="description" name="descriptionRealisation" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" value="Ajouter">Ajouter
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>
<!-- Ajout Formation modal-->
<div id="modal3" class="modal">
    <div class="modal-content">
        <h4>Ajouter Formation</h4>
        <p>
            <?php echo form_open('addformation','class =""');?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_file</i>
                    <input id="iconname" type="text" class="validate" name="nomFormation">
                    <label for="iconname">Nom Formation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="iconnamei" type="text" class="validate" name="nomInstitution">
                    <label for="iconnamei">Nom Institution</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">school</i>
                    <input id="icon_diplome" type="text" class="validate" name="diplomeFormation">
                    <label for="icon_diplome">Diplome(domaine)</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">school</i>
                    <input id="icon_result" type="text" class="validate" name="resultatFormation">
                    <label for="icon_result">Resultat obtenu</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datedebut" name="dateDebutFormation">
                        <label for="datedebut">Date de Debut</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datefin" name="dateFinFormation">
                        <label for="datefin">Date de Fin</label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">edit</i>
                    <textarea id="descriptionf" class="materialize-textarea" name="descriptionFormation"></textarea>
                    <label for="descriptionf">Description</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" value="Ajouter">Ajouter
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>
<!-- Ajout Emplois modal-->
<div id="modal4" class="modal">
    <div class="modal-content">
        <h4>Ajouter Emplois</h4>
        <p>
            <?php echo form_open('addemplois','class =""');?>
                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_file</i>
                    <input id="icon_post" type="text" class="validate" name="posteEmplois">
                    <label for="icon_post">Poste Emplois</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="icon_entre" type="text" class="validate" name="nomEntreprise">
                    <label for="icon_entre">Nom Entreprise</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de Debut" id="date_debut" name="dateDebutEmplois">
                        <label for="date_debut">Date de Debut</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de Fin" id="date_fin" name="dateFinEmplois">
                        <label for="date_fin">Date de Fin</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" value="Ajouter">Ajouter
                    <i class="material-icons right">add</i>
                </button>
            </form>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>
<script>
    function printCv(){
        window.print();
    }
</script>