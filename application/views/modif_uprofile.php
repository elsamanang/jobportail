<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m6 offset-m1">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content black-text">
                    <?php echo form_open_multipart('update_uprofile','class =""');?>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">person</i>
                                <input id="icon_nom" type="text" class="validate" placeholder="<?php echo $this->session->user->nomDemandeur?>" value="<?php echo $this->session->user->nomDemandeur?>" name="nomDemandeur">
                                <label for="icon_nom">Nom </label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">person</i>
                                <input id="icon_prenom" type="text" class="validate" placeholder="<?php echo $this->session->user->prenomDemandeur?>" value="<?php echo $this->session->user->prenomDemandeur?>" name="prenomDemandeur">
                                <label for="icon_prenom">Prenom </label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">school</i>
                                <input id="icon_titre" type="text" class="validate" placeholder="<?php echo $this->session->user->titre?>" value="<?php echo $this->session->user->titre?>" name="titre">
                                <label for="icon_titre">Titre </label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">location_on</i>
                                <input id="icon_adress" type="text" class="validate" placeholder="<?php echo $this->session->user->adresseDemandeur?>" value="<?php echo $this->session->user->adresseDemandeur?>" name="adresseDemandeur">
                                <label for="icon_adress">Adresse</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="icon_mail" type="email" class="validate" placeholder="<?php echo $this->session->user->emailDemandeur?>" value="<?php echo $this->session->user->emailDemandeur?>" name="emailDemandeur">
                                <label for="icon_mail">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_phone" type="tel" class="validate" placeholder="<?php echo $this->session->user->telephoneDemandeur?>" value="<?php echo $this->session->user->telephoneDemandeur?>" name="telephoneDemandeur">
                                <label for="icon_phone">Telephone</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">face</i>
                                <select name="genre">
                                    <option value="f" <?php if($this->session->user->genre == 'f') echo "selected"?>>Feminin</option>
                                    <option value="m" <?php if($this->session->user->genre == 'm') echo "selected"?>>Masculin</option>
                                    <option value="a" <?php if($this->session->user->genre == 'a') echo "selected"?>>Autres</option>
                                </select>
                                <label>Genre</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">cake</i>
                                <input type="text" class="datepicker" id="dateNaissance" placeholder="<?php echo $this->session->user->dateNaissance?>" value="<?php echo $this->session->user->dateNaissance?>" name="dateNaissance">
                                <label for="dateNaissance">Date Naissance</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">public</i>
                                <input id="icon_nation" type="text" class="validate" placeholder="<?php echo $this->session->user->nationalite?>" value="<?php echo $this->session->user->nationalite?>" name="nationalite">
                                <label for="icon_nation">Nationalite</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">local_post_office</i>
                                <input id="icon_civil" type="text" class="validate" placeholder="<?php echo $this->session->user->etatCivil?>" value="<?php echo $this->session->user->etatCivil?>" name="etatCivil">
                                <label for="icon_civil">Etat Civil</label>
                            </div>
                            <div class="file-field input-field col s6">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="imageProfile">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Image de Profile" name="imageProfile" value="<?php echo $this->session->user->imageProfile?>">
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">perm_identity</i>
                                <input id="icon_pseud" type="text" class="validate" placeholder="<?php echo $this->session->user->pseudo?>" value="<?php echo $this->session->user->pseudo?>" name="pseudo">
                                <label for="icon_pseud">Pseudo</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">lock</i>
                                <input id="icon_passwd" type="password" class="validate" placeholder="<?php echo $this->session->user->pwd?>" value="<?php echo $this->session->user->pwd?>" name="pwd">
                                <label for="icon_passwd">Password</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">lock</i>
                                <input id="icon_passwdconf" type="password" class="validate" placeholder="<?php echo $this->session->user->pwd?>" value="<?php echo $this->session->user->pwd?>" name="pwdconf">
                                <label for="icon_passwdconf">Password-Confirm</label>
                            </div>
                        </div>
                        <button class=" waves-effect waves-light btn center pulse" type="submit" name="update" id="" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m5">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <h5>Formation</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Institution</th>
                            <th>Duree</th>
                            <th>Diplome</th>
                            <th>Resultat</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($formations as $formation) {?>
                        <tr>
                            <td><?php echo ucfirst($formation->nomFormation);?></td>
                            <td><?php echo ucfirst($formation->nomInstitution);?></td>
                            <td><?php echo $formation->dateDebutFormation;?>-<?php echo $formation->dateFinFormation;?></td>
                            <td><?php echo ucfirst($formation->diplomeFormation);?></td>
                            <td><?php echo ucfirst($formation->resultatFormation);?></td>
                            <td>
                                <a class="btn-floating blue darken-1 center tooltipped" data-position="left" data-tooltip="Modifier" href="<?php echo site_url('modif_uformation')?>/<?php echo $formation->idFormation?>"><i class="material-icons">edit</i></a>
                                <a class="btn-floating red darken-1 center tooltipped" data-position="left" data-tooltip="Supprimer" href=""><i class="material-icons">delete_sweep</i></a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <h5>Competences</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Competence</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($competences as $competence) {?>
                        <tr>
                            <td><?php echo ucfirst($competence->nomCompetence);?></td>
                            <td>
                                <a class="btn-floating blue darken-1 center tooltipped" data-position="left" data-tooltip="Modifier" href="<?php echo site_url('modif_ucompetence')?>/<?php echo $competence->idCompetences?>"><i class="material-icons">edit</i></a>
                                <a class="btn-floating red darken-1 center tooltipped" data-position="left" data-tooltip="Supprimer" href=""><i class="material-icons">delete_sweep</i></a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <h5>Realisations</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Realisation</th>
                            <th>Lien</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($realisations as $realisation) {?>
                        <tr>
                            <td><?php echo ucfirst($realisation->nomRealisation);?></td>
                            <td><?php echo ucfirst($realisation->lienRealisation);?></td>
                            <td><?php echo ucfirst($realisation->dateRealisation);?></td>
                            <td><?php echo ucfirst($realisation->descriptionRealisation);?></td>
                            <td>
                                <a class="btn-floating blue darken-1 center tooltipped" data-position="left" data-tooltip="Modifier" href="<?php echo site_url('modif_urealisation')?>/<?php echo $realisation->idRealisation?>"><i class="material-icons">edit</i></a>
                                <a class="btn-floating red darken-1 center tooltipped" data-position="left" data-tooltip="Supprimer" href=""><i class="material-icons">delete_sweep</i></a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <h5>Emplois</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Poste</th>
                            <th>Entreprise</th>
                            <th>Duree</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($emplois as $emploi) {?>
                        <tr>
                            <td><?php echo ucfirst($emploi->posteEmplois);?></td>
                            <td><?php echo ucfirst($emploi->nomEntreprise);?></td>
                            <td><?php echo ucfirst($emploi->dateDebutEmplois);?>-<?php echo ucfirst($emploi->dateFinEmplois);?></td>
                            <td>
                                <a class="btn-floating blue darken-1 center tooltipped" data-position="left" data-tooltip="Modifier" href="<?php echo site_url('modif_uemplois')?>/<?php echo $emploi->idEmplois?>"><i class="material-icons">edit</i></a>
                                <a class="btn-floating red darken-1 center tooltipped" data-position="left" data-tooltip="Supprimer" href=""><i class="material-icons">delete_sweep</i></a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>