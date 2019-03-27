<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-content black-text">
                <span class="card-title center blue-grey-text"><?php echo ucfirst($title);?></span>
                <div class="divider"></div>
                <?php echo form_open('admin_log','class =""');?>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="icon_prefix" type="text" class="validate" name="pseudo" required>
                            <label for="icon_prefix">Pseudo <span class="red-text">*<span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_telephone" type="password" class="validate" name="pwd" required>
                            <label for="icon_telephone">Password <span class="red-text">*<span></label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light center" type="submit" name="login" id="" value="SeConnecter">Se Connecter</button>
                </form>
                <span class="red-text">(*) <strong style="font-size :12px;">champs obligatoire</strong><span>
            </div>
        </div>
    </div>
</div>