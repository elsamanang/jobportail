<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s3">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img.png">
                </div>
            </div>
            <p><a class="waves-effect waves-light btn" href=""><i class="material-icons right">print</i>Imprimer CV</a></p>
        </div>
    </div>
    <div class="col s8 card">
        <div class="col s5">
            <h5>Identity</h5>
            <div class="divider"></div>
            <p class="blue-grey-text">Titre : <span>Ingenieur</span></p>
            <p class="blue-grey-text">Nom : <span>Shekinah Tshi</span></p>
            <p class="blue-grey-text">Prenom : <span>ShekMak</span></p>
            <p class="blue-grey-text">Pseudo : <span>ShekMak</span></p>
            <p class="blue-grey-text">Adresse : <span>lubumbashi</span></p>
            <p class="blue-grey-text">Email : <span>shekmak@gmail.com</span></p>
            <p class="blue-grey-text">Telephone : <span>+243976250495</span></p>
            <p class="blue-grey-text">Date de Naissance : <span>24/01/2006</span></p>
            <p class="blue-grey-text">Genre : <span>Masculin</span></p>
            <p class="blue-grey-text">Nationalite : <span>Zairoise</span></p>
            <p class="blue-grey-text">Etat civil : <span>Mariee</span></p>
        </div>
        <div class="col s6 offset-s1">
            <div class="row">
                <h5>Formation</h5>
                <div class="divider"></div>
                <p class="blue-grey-text">2018 :: Manager @ <span>SHIELD University</span></p>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal3"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Competences</h5>
                <div class="divider"></div>
                <p class="blue-grey-text">Analyste Developper</p>
                <p class="blue-grey-text">Modelisation</p>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal1"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Realisations</h5>
                <div class="divider"></div>
                <p class="blue-grey-text">2018 - MajiYetu @ www.majiyetu.group : description</p>
                <p class="blue-grey-text">2019 - Sardes @ www.sardesdrc.com : description</p>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal2"><i class="material-icons">add</i></a>
                </p>
            </div>
            <div class="row">
                <h5>Emplois</h5>
                <div class="divider"></div>
                <p class="blue-grey-text">2010-2018 :: CEO @ PBreakers</p>
                <p class="">
                    <a class="modal-trigger btn-floating blue darken-1 right" href="#modal4"><i class="material-icons">add</i></a>
                </p>
            </div>
        </div>
        <p><a class="waves-effect waves-light btn" href="<?php echo site_url('modif_uprofile')?>/1"><i class="material-icons right">edit</i>Modifier</a></p>
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
                    <input id="icon_nom" type="text" class="validate">
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
                    <input id="icon_name" type="text" class="validate">
                    <label for="icon_name">Nom Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">public</i>
                    <input id="icon_link" type="text" class="validate">
                    <label for="icon_link">Lien de la Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">event</i>
                    <input type="text" class="datepicker" placeholder="Date de la Realisation" id="dateRealisation">
                    <label for="dateRealisation">Date de la Realisation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">edit</i>
                    <textarea id="description" class="materialize-textarea"></textarea>
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
                    <input id="iconname" type="text" class="validate">
                    <label for="iconname">Nom Formation</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="iconnamei" type="text" class="validate">
                    <label for="iconnamei">Nom Institution</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">school</i>
                    <input id="icon_diplome" type="text" class="validate">
                    <label for="icon_diplome">Diplome(domaine)</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">school</i>
                    <input id="icon_result" type="text" class="validate">
                    <label for="icon_result">Resultat obtenu</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datedebut">
                        <label for="datedebut">Date de Debut</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datefin">
                        <label for="datefin">Date de Fin</label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">edit</i>
                    <textarea id="descriptionf" class="materialize-textarea"></textarea>
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
                    <input id="icon_post" type="text" class="validate">
                    <label for="icon_post">Poste Emplois</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input id="icon_entre" type="text" class="validate">
                    <label for="icon_entre">Nom Entreprise</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="date_debut">
                        <label for="date_debut">Date de Debut</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="date_fin">
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