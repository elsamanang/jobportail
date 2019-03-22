<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content black-text">
                <?php echo form_open('update_urealisation','class =""');?>
                <input type="hidden" name="idRealisation" value="<?php echo $realisation['idRealisation']?>">
                    <div class="input-field col  s10 offset-s1">
                        <i class="material-icons prefix">attach_file</i>
                        <input id="icon_name" type="text" class="validate" name="nomRealisation" value="<?php echo $realisation['nomRealisation']?>">
                        <label for="icon_name">Nom Realisation</label>
                    </div>
                    <div class="input-field col  s10 offset-s1">
                        <i class="material-icons prefix">public</i>
                        <input id="icon_link" type="text" class="validate" name="lienRealisation" value="<?php echo $realisation['lienRealisation']?>">
                        <label for="icon_link">Lien de la Realisation</label>
                    </div>
                    <div class="input-field col  s10 offset-s1">
                        <i class="material-icons prefix">event</i>
                        <input type="text" class="datepicker" placeholder="Date de la Realisation" id="dateRealisation" name="dateRealisation" value="<?php echo $realisation['dateRealisation']?>">
                        <label for="dateRealisation">Date de la Realisation</label>
                    </div>
                    <div class="input-field col  s10 offset-s1">
                        <i class="material-icons prefix">edit</i>
                        <textarea id="description" class="materialize-textarea" name="descriptionRealisation" value="<?php echo $realisation['descriptionRealisation']?>"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" value="Modifier">Modifier
                        <i class="material-icons right">cached</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>