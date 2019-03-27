    <div class="col s9">
        <h4><?php echo $title?></h4>
        <div class="divider"></div>
            <div class="col s9 offset-s2">
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
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <h5>Demandeurs</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Titre</th>
                            <th>Genre</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Nationalite</th>
                            <th>EtatCivil</th>
                            
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($demandeur_data as $demandeur) {?>
                        <tr>
                            <td><?php echo ucfirst($demandeur->nomDemandeur);?></td>
                            <td><?php echo ucfirst($demandeur->prenomDemandeur);?></td>
                            <td><?php echo ucfirst($demandeur->titre);?></td>
                            <td><?php echo ucfirst($demandeur->genre);?></td>
                            <td><?php echo $demandeur->emailDemandeur;?></td>
                            <td><?php echo ucfirst($demandeur->adresseDemandeur);?></td>
                            <td><?php echo ucfirst($demandeur->telephoneDemandeur);?></td>
                            <td><?php echo ucfirst($demandeur->nationalite);?></td>
                            <td><?php echo ucfirst($demandeur->etatCivil);?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div><br><br>
    </div>
</div>

    