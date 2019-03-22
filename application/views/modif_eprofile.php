<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m10 offset-m1">
        <div class="card">
            <div class="card-content black-text">
                <span class="card-title center">Entreprise</span>
                <div class="divider"></div>
                <?php echo form_open_multipart('update_eprofile','class =""');?>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">business</i>
                            <input id="icon_name" type="text" class="validate" name="nomEmployeur" placeholder="<?php echo $this->session->entreprise->nomEmployeur?>" value="<?php echo $this->session->entreprise->nomEmployeur?>">
                            <label for="icon_name">Nom Entreprise <span class="red-text">*<span></label>
                            <span><?php echo form_error('nomEmployeur') ?></span> 
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">location_on</i>
                            <input id="icon_adresse" type="text" class="validate" name="adresseEmployeur"  placeholder="<?php echo $this->session->entreprise->adresseEmployeur?>" value="<?php echo $this->session->entreprise->adresseEmployeur?>">
                            <label for="icon_adresse">Adresse <span class="red-text">*<span></label>
                            <?php echo form_error('adresseEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="icon_email" type="email" class="validate" name="emailEmployeur"  placeholder="<?php echo $this->session->entreprise->emailEmployeur?>" value="<?php echo $this->session->entreprise->emailEmployeur?>">
                            <label for="icon_email">Email <span class="red-text">*<span></label>
                            <?php echo form_error('emailEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" type="tel" class="validate" name="telephoneEmployeur"  placeholder="<?php echo $this->session->entreprise->telephoneEmployeur?>" value="<?php echo $this->session->entreprise->telephoneEmployeur?>">
                            <label for="icon_telephone">Telephone <span class="red-text">*<span></label>
                            <?php echo form_error('telephoneEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">public</i>
                            <input id="icon_site" type="text" class="validate" name="siteEmployeur"  placeholder="<?php echo $this->session->entreprise->siteEmployeur?>" value="<?php echo $this->session->entreprise->siteEmployeur?>">
                            <label for="icon_site">Site</label>
                            <?php echo form_error('siteEmployeur') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">local_post_office</i>
                            <input id="icon_postal" type="text" class="validate" name="codePostal"  placeholder="<?php echo $this->session->entreprise->codePostal?>" value="<?php echo $this->session->entreprise->codePostal?>">
                            <label for="icon_postal">Code-Postal</label>
                            <?php echo form_error('codePostal') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">attach_file</i>
                            <input id="icon_fax" type="text" class="validate" name="fax"  placeholder="<?php echo $this->session->entreprise->fax?>" value="<?php echo $this->session->entreprise->fax?>">
                            <label for="icon_fax">Fax</label>
                            <?php echo form_error('fax') ?>
                        </div>
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="logo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Image de Profile" name="logo" value="<?php echo $this->session->entreprise->logo?>">
                            </div>
                            <?php echo form_error('logo') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">perm_identity</i>
                            <input id="icon_pseudo" type="text" class="validate" name="pseudo"  placeholder="<?php echo $this->session->entreprise->pseudo?>" value="<?php echo $this->session->entreprise->pseudo?>">
                            <label for="icon_pseudo">Pseudo</label>
                            <?php echo form_error('pseudo') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_pwd" type="password" class="validate" name="pwd"  placeholder="<?php echo $this->session->entreprise->pwd?>" value="<?php echo $this->session->entreprise->pwd?>">
                            <label for="icon_pwd">Password <span class="red-text">*<span></label>
                            <?php echo form_error('pwd') ?>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_pwdconf" type="password" class="validate" name="pwdconf"  placeholder="<?php echo $this->session->entreprise->pwd?>" value="<?php echo $this->session->entreprise->pwd?>">
                            <label for="icon_pwdconf">Password-Confirm <span class="red-text">*<span></label>
                            <?php echo form_error('pwdconf') ?>
                        </div>
                    </div>
                    <button class=" waves-effect waves-light btn center pulse" type="submit" name="update" id="" value="Update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>