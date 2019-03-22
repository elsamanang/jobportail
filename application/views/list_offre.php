<?php var_dump($offre_data); ?>
<h4 class="center blue-grey-text"><?php echo ucfirst($title);?></h4>
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content black-text">
                <p class="">
                    <a class="waves-effect waves-light btn" href="<?php echo site_url('add_offre')?>"><i class="material-icons left">add</i>Ajouter Offre</a>
                </p>

                <ul class="collapsible z-depth-0">
                    <?php $i=0;
                        foreach ($offre_data as $offre)
                        {$i++;
                    ?>
                        <li>
                            <div class="collapsible-header">
                                <div class="col s1"><?php echo $i?>.</div>
                                <div class="col s5"><?php echo ucfirst($offre->posteOffre) ?></div>
                                <div class="col s3"><?php echo $offre->dateDebutOffre ?></div>
                                <div class="col s3"><?php echo $offre->dateFinOffre ?></div>
                            </div>
                            <div class="collapsible-body">
                                <h5><span>Postulants(1)</span></h5>
                                <table class="responsive-table striped highlight">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Noms</th>
                                            <th>Adresse</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Genre</th>
                                            <th>Nationalite</th>
                                            <th>Etat Civil</th>
                                            <th>Date de Naissance</th>
                                            <th>Date Postuler</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tubongye Roland Beni</td>
                                            <td>rubi</td>
                                            <td>roland.beni1@gmail.com</td>
                                            <td>+243991551044</td>
                                            <td>M</td>
                                            <td>Congolaise</td>
                                            <td>Celibataire</td>
                                            <td>03/08/1900</td>
                                            <td>12/03/2019</td>
                                            <td><a class="waves-effect waves-light btn right" href="#"><i class="material-icons left">phone</i>Call</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    <?php }?>
                </ul>

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
        </div>
</div>
