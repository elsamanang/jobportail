<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content black-text">
                <?php echo form_open('addoffre','class =""');?>
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">attach_file</i>
                        <input id="icon_post" type="text" class="validate" name="posteOffre">
                        <label for="icon_post">Poste Offre</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 offset-s1">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="date_debut" name="dateDebutOffre">
                            <label for="date_debut">Date de Debut</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="datepicker" placeholder="Date de la Realisation" id="date_fin" name="dateFinOffre">
                            <label for="date_fin">Date de Fin</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" value="Ajouter">Ajouter
                        <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>