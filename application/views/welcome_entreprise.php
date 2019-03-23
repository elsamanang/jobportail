<div class="row">
    <div class="col s8 offset-s2">
        <form class="col s12">
            <div class="input-field col s10">
                <i class="material-icons prefix">search</i>
                <input id="icon_search" type="search" class="search" name="q" value="<?php echo $q; ?>">
                <label for="icon_search">Chercher</label>
            </div>
            <div class="input-field col s2">
                <input id="icon_btn" type="submit" class="btn waves-light search" value="Chercher">
            </div>
        </form>
    </div>
</div>
    <!-- <div class="divider"></div> -->
    <div class="row">
        <?php
            foreach ($demandeur_data as $demandeur)
            {
        ?>
            <div class="col s3">
                <div class="card sticky-action" style=" width: 250px;">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo base_url()?><?php 
                            $img = ($demandeur->imageProfile == NULL) ? "assets/none.jpg" : $demandeur->imageProfile;
                                echo $img;?>" style="height: 250px;">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator blue-grey-text text-darken-4"><?php echo ucfirst($demandeur->prenomDemandeur) ?>, <?php echo ucfirst($demandeur->nomDemandeur) ?><i class="material-icons right">more_vert</i></span>
                        <p class="blue-grey-text"><?php echo $demandeur->titre?></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title blue-grey-text text-darken-4">Identity : <i class="material-icons right">close</i></span>
                        <p><strong class="blue-grey-text">Nom</strong> : <?php echo ucfirst($demandeur->nomDemandeur) ?>.</p>
                        <p><strong class="blue-grey-text">Prenom</strong> : <?php echo ucfirst($demandeur->prenomDemandeur) ?>.</p>
                        <p><strong class="blue-grey-text">Adresse</strong> : <?php echo $demandeur->adresseDemandeur?>.</p>
                        <p><strong class="blue-grey-text">Email</strong> : <?php echo $demandeur->emailDemandeur?>.</p>
                        <p><strong class="blue-grey-text">Telephone</strong> : <?php echo $demandeur->telephoneDemandeur?>.</p>
                        <p><strong class="blue-grey-text">Genre</strong> : <?php echo $demandeur->genre?>.</p>
                        <p><strong class="blue-grey-text">Nationalite</strong> : <?php echo $demandeur->nationalite?>.</p>
                        <p><strong class="blue-grey-text">Etat-Civil</strong> : <?php echo $demandeur->etatCivil?>.</p>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn" href=""><i class="material-icons right">phone</i>Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div><br><br>
        