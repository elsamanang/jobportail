<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
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
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content black-text">            
                <table class="responsive-table highlight centered">
                    <thead>
                    <tr>
                        <th>Poste</th>
                        <th>Date Soumission</th>
                        <th>Employeur</th>
                        <th>Reponse</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($offredemande_data as $offredemande) { ?>
                        <tr>
                            <td><?php echo ucfirst($offredemande->posteOffre)?></td>
                            <td><?php echo ucfirst($offredemande->dateSoumission)?></td>
                            <td><?php echo ucfirst($offredemande->nomEmployeur)?></td>
                            <td><?php if ($offredemande->reponse == NULL) {
                                echo '<strong class="orange-text">En attente de reponse</strong>';
                            } elseif($offredemande->reponse == 0) {
                                echo '<strong class="red-text">Demande Rejetée</strong>';
                            }else{
                                echo '<strong class="green-text">Validée</strong>';
                            }?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m6">
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
        <div class="col m6 right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>
<br><br>
