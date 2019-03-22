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
    <div class="divider"></div>
    <div class="row">
        <?php
            foreach ($offre_data as $offre)
            {
        ?>
            <div class="col s3">
                <div class="card sticky-action" style=" width: 250px;">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo base_url()?><?php 
                            $img = ($offre->logo == NULL) ? "assets/none.jpg" : $offre->logo;
                                echo $img;?>" style="height: 250px;">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator blue-grey-text text-darken-4"><?php echo ucfirst($offre->nomEmployeur) ?><i class="material-icons right">more_vert</i></span>
                        <p><a href="<?php echo $offre->siteEmployeur?>"><?php echo $offre->siteEmployeur?></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title blue-grey-text text-darken-4">Offre d'Emploi<i class="material-icons right">close</i></span>
                        <p><strong class="blue-grey-text">Poste</strong> : <?php echo ucfirst($offre->posteOffre) ?>.</p>
                        <p><strong class="blue-grey-text">Depuis</strong> : <?php echo $offre->dateDebutOffre ?>.</p>
                        <p><strong class="blue-grey-text">Expire</strong> : <?php echo $offre->dateFinOffre ?>.</p>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn" href=""><i class="material-icons right">directions_run</i>Postuler</a>
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
        </div>