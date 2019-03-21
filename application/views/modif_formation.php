<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content black-text">
                <?php echo form_open('update_uformation','class =""');?>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">attach_file</i>
                        <input id="iconname" type="text" class="validate">
                        <label for="iconname">Nom Formation</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">business</i>
                        <input id="iconnamei" type="text" class="validate">
                        <label for="iconnamei">Nom Institution</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">school</i>
                        <input id="icon_diplome" type="text" class="validate">
                        <label for="icon_diplome">Diplome(domaine)</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">school</i>
                        <input id="icon_result" type="text" class="validate">
                        <label for="icon_result">Resultat obtenu</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 offset-s1">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datedebut">
                            <label for="datedebut">Date de Debut</label>
                        </div>
                        <div class="input-field col s5">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="datefin">
                            <label for="datefin">Date de Fin</label>
                        </div>
                    </div>

                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">edit</i>
                        <textarea id="descriptionf" class="materialize-textarea"></textarea>
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