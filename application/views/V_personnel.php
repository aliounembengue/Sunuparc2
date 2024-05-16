<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Liste Personne</h3>
                        </div>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table border-0 star-student table-hover table-center mb-0 datatables table-striped">
                        <thead class="student-thread">
						<tr>
							<th style="width: 10%">IEN</th>
							<th style="width: 10%">Nom </th>
							<th style="width: 20%">Prenom</th>
							<th style="width: 25%">Telephone</th>
							<th style="width: 25%">Mail</th>
							
							<th>Action</th>
						</tr>
                        </thead>
                        <tbody>
							<?php foreach ($personnel as $perso) { ?>
								<tr>
									<td><?php echo $perso->ien_ens; ?></td>
									<td><?php echo $perso->nom_ens; ?></td>
									<td><?php echo $perso->prenom_ens; ?></td>
									<td><?php echo $perso->tel_ens; ?></td>
									<td><?php echo $perso->email_ens_pro; ?></td>
									
									<td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
										<a href="#" class="on-default btn_edit" id='<?php echo $perso->ien_ens; ?>'><i class="fa fa-pencil"></i></a>&nbsp;
										<a href="#" class="on-default btn_delete" id='<?php echo $perso->ien_ens; ?>'><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;
									</td>
								</tr>
						<?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script type="text/javascript">

    $(document).ready(function () {
            
	$('#datatables-buttons').managing_ajax({

	});

    });
</script-->


<script type="text/javascript">

    $(document).ready(function () {
            
            $('#datatable-buttons').managing_ajax({
                id_modal_form: 'modal_form', //id du modal qui contient le formulaire

                id_form: 'form', //id du formulaire
                url_submit: "<?php echo site_url('C_personateur/liste_personateur')?>", //url du save (données envoyés par post)

                title_modal_add: 'Ajouter eleve', //Title du modal à l'ouverture en mode ajout
                focus_add: 'prenom', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Modifier eleve', //Title du modal à l'ouverture en mode edit
                focus_edit: 'prenom',//l'emplacement du focus en mode edit

                url_edit: "<?php echo site_url('C_eleve/recup_eleve')?>", //url le fonction qui recupére la données de la ligne
                url_delete: "<?php echo site_url('C_eleve/delete_eleve')?>", //url de la fonction supprimé
            });

    });
</script>
