<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content black-text">
                <?php echo form_open('update_ucompetences','class =""');?>
                <input type="hidden" name="idCompetences" value="<?php echo $competence['idCompetences']?>">
                    <div class="input-field col  s10 offset-s1">
                        <i class="material-icons prefix">attach_file</i>
                        <input id="icon_nom" type="text" class="validate" name="nomCompetence" value="<?php echo $competence['nomCompetence']?>">
                        <label for="icon_nom">Nom Competence</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" value="Modifier">Modifier
                        <i class="material-icons right">cached</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>