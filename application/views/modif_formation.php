<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content black-text">
                <?php echo form_open('update_uformation','class =""');?>
                <input type="hidden" name="idFormation" value="<?php echo $formation['idFormation']?>">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">attach_file</i>
                        <input id="iconname" type="text" class="validate" name="nomFormation" value="<?php echo $formation['nomFormation']?>">
                        <label for="iconname">Nom Formation</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">business</i>
                        <input id="iconnamei" type="text" class="validate" name="nomInstitution" value="<?php echo $formation['nomInstitution']?>">
                        <label for="iconnamei">Nom Institution</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">school</i>
                        <input id="icon_diplome" type="text" class="validate" name="diplomeFormation" value="<?php echo $formation['diplomeFormation']?>">
                        <label for="icon_diplome">Diplome(domaine)</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">school</i>
                        <input id="icon_result" type="text" class="validate" name="resultatFormation" value="<?php echo $formation['resultatFormation']?>">
                        <label for="icon_result">Resultat obtenu</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 offset-s1">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datedebut" name="dateDebutFormation" value="<?php echo $formation['dateDebutFormation']?>">
                            <label for="datedebut">Date de Debut</label>
                        </div>
                        <div class="input-field col s5">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datefin" name="dateFinFormation" value="<?php echo $formation['dateFinFormation']?>">
                            <label for="datefin">Date de Fin</label>
                        </div>
                    </div>

                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">edit</i>
                        <textarea id="descriptionf" class="materialize-textarea" name="descriptionFormation" value="<?php echo $formation['descriptionFormation']?>"></textarea>
                        <label for="descriptionf">Description</label>
                    </div>
                    <button class="btn waves-effect waves-light pulse" type="submit" value="Modifier">Modifier
                        <i class="material-icons right">cached</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>