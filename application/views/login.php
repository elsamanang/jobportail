<div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <div class="card-content black-text">
                    <span class="card-title center blue-grey-text"><?php echo ucfirst($title);?></span>
                    <div class="divider"></div>
                    <?php echo form_open('log','class =""');?>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="icon_prefix" type="email" class="validate" name="email">
                                <label for="icon_prefix">Email</label>
                            </div>
                            <!-- <span class="input-field col s12 white-text center red"><?php echo form_error('email') ?></span> -->
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="icon_telephone" type="password" class="validate" name="pwd">
                                <label for="icon_telephone">Password</label>
                            </div>
                            <!-- <span class="input-field col s12"><?php echo form_error('pwd') ?></span> -->
                            <div class="left">
                                <!-- Switch -->
                                <div class="switch">
                                    Type :
                                    <label>
                                        Personne
                                        <input type="checkbox" name="type">
                                        <span class="lever"></span> Entreprise
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light center" type="submit" name="login" id="" value="SeConnecter">Se Connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>