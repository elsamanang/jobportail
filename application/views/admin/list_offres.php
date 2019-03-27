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
                    <h5>Offres</h5>
                    <div class="divider"></div>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Poste offre</th>
                            <th>Date debut</th>
                            <th>Date Fin</th>
                            <th>Entreprise</th>
                            
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($offre_data as $offre) {?>
                        <tr>
                            <td><?php echo ucfirst($offre->posteOffre);?></td>
                            <td><?php echo ucfirst($offre->dateDebutOffre);?></td>
                            <td><?php echo ucfirst($offre->dateFinOffre);?></td>
                            <td><?php echo ucfirst($offre->nomEmployeur);?></td>
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