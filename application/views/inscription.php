<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m5 offset-m1">
        <div class="card">
            <div class="card-content black-text">
                <span class="card-title center">Entreprise</span>
                <div class="divider"></div>
                <?php echo form_open_multipart('logupEntreprise','class =""');?>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">business</i>
                            <input id="icon_name" type="text" class="validate" name="nomEmployeur" required>
                            <label for="icon_name">Nom Entreprise <span class="red-text">*<span></label>
                            <span><?php echo form_error('nomEmployeur') ?></span> 
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">location_on</i>
                            <input id="icon_adresse" type="text" class="validate" name="adresseEmployeur" required>
                            <label for="icon_adresse">Adresse <span class="red-text">*<span></label>
                            <?php echo form_error('adresseEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="icon_email" type="email" class="validate" name="emailEmployeur" required>
                            <label for="icon_email">Email <span class="red-text">*<span></label>
                            <?php echo form_error('emailEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" type="tel" class="validate" name="telephoneEmployeur" required>
                            <label for="icon_telephone">Telephone <span class="red-text">*<span></label>
                            <?php echo form_error('telephoneEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">public</i>
                            <input id="icon_site" type="text" class="validate" name="siteEmployeur">
                            <label for="icon_site">Site</label>
                            <?php echo form_error('siteEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">local_post_office</i>
                            <input id="icon_postal" type="text" class="validate" name="codePostal">
                            <label for="icon_postal">Code-Postal</label>
                            <?php echo form_error('codePostal') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">attach_file</i>
                            <input id="icon_fax" type="text" class="validate" name="fax">
                            <label for="icon_fax">Fax</label>
                            <?php echo form_error('fax') ?>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="logo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Image de Profile">
                            </div>
                            <?php echo form_error('logo') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">perm_identity</i>
                            <input id="icon_pseudo" type="text" class="validate" name="pseudo">
                            <label for="icon_pseudo">Pseudo</label>
                            <?php echo form_error('pseudo') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_pwd" type="password" class="validate" name="pwd" required>
                            <label for="icon_pwd">Password <span class="red-text">*<span></label>
                            <?php echo form_error('pwd') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_pwdconf" type="password" class="validate" name="pwdconf" required>
                            <label for="icon_pwdconf">Password-Confirm <span class="red-text">*<span></label>
                            <?php echo form_error('pwdconf') ?>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light center pulse" type="submit" name="logup" id="" value="S'inscrire">S'inscrire</button>
                </form>
                <span class="red-text">(*) <strong style="font-size :12px;">champs obligatoire</strong><span>
            </div>
        </div>
    </div>
    <div class="col s12 m5">
        <div class="card">
            <div class="card-content black-text">
                <span class="card-title center">Personne</span>
                <div class="divider"></div>
                <?php echo form_open_multipart('logupPersonne','class =""');?>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_nom" type="text" class="validate" name="nomDemandeur" required>
                            <label for="icon_nom">Nom <span class="red-text">*<span></label>
                            <?php echo form_error('nomDemandeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_prenom" type="text" class="validate" name="prenomDemandeur" required>
                            <label for="icon_prenom">Prenom <span class="red-text">*<span></label>
                            <?php echo form_error('prenomDemandeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">school</i>
                            <input id="icon_titre" type="text" class="validate" name="titre" required>
                            <label for="icon_titre">Titre <span class="red-text">*<span></label>
                            <?php echo form_error('titre') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">location_on</i>
                            <input id="icon_adress" type="text" class="validate" name="adresseDemandeur" required>
                            <label for="icon_adress">Adresse <span class="red-text">*<span></label>
                            <?php echo form_error('adresseDemandeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="icon_mail" type="email" class="validate" name="emailDemandeur" required>
                            <label for="icon_mail">Email <span class="red-text">*<span></label>
                            <?php echo form_error('emailDemandeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_phone" type="tel" class="validate" name="telephoneDemandeur" required>
                            <label for="icon_phone">Telephone <span class="red-text">*<span></label>
                            <?php echo form_error('telephoneDemandeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">face</i>
                            <select name="genre" required>
                                <option value="f">Feminin</option>
                                <option value="m">Masculin</option>
                                <option value="a">Autres</option>
                            </select>
                            <label>Genre <span class="red-text">*<span></label>
                            <?php echo form_error('genre') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">cake</i>
                            <input type="text" class="datepicker" placeholder="Date de Naissance" id="dateNaissance" name="dateNaissance" required>
                            <label for="dateNaissance">Date Naissance <span class="red-text">*<span></label>
                            <?php echo form_error('dateNaissance') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">public</i>
                            <input id="icon_nation" type="text" class="validate" name="nationalite" required>
                            <label for="icon_nation">Nationalite <span class="red-text">*<span></label>
                            <?php echo form_error('nationalite') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">local_post_office</i>
                            <input id="icon_civil" type="text" class="validate" name="etatCivil" required>
                            <label for="icon_civil">Etat Civil <span class="red-text">*<span></label>
                            <?php echo form_error('etatCivil') ?>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="imageProfile">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="imageProfile" type="text" placeholder="Image de Profile">
                            </div>
                            <?php echo form_error('imageProfile') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">perm_identity</i>
                            <input id="icon_pseud" type="text" class="validate" name="pseudo">
                            <label for="icon_pseud">Pseudo</label>
                            <?php echo form_error('pseudo') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_passwd" type="password" class="validate" name="pwd" required>
                            <label for="icon_passwd">Password <span class="red-text">*<span></label>
                            <?php echo form_error('pwd') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_passwdconf" type="password" class="validate" name="pwdconf" required>
                            <label for="icon_passwdconf">Password-Confirm <span class="red-text">*<span></label>
                            <?php echo form_error('pwdconf') ?>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light center pulse" type="submit" name="logup" id="" value="S'inscrire">S'inscrire</button>
                </form>
                <span class="red-text">(*) <strong style="font-size :12px;">champs obligatoire</strong><span>
            </div>
        </div>
    </div>
</div>