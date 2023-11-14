<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Liste ordinateurs</h3>
                        </div>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table border-0 star-student table-hover table-center mb-0 datatables table-striped">
                        <thead class="student-thread">
						<tr>
							<th style="width: 10%">id</th>
							<th style="width: 10%">Nom ordinateur</th>
							<th style="width: 20%">Date creation</th>
							<th style="width: 25%">contact</th>
							<th style="width: 25%">numero de series</th>
							
							<th>Action</th>
						</tr>
                        </thead>
                        <tbody>
							<?php foreach ($ordinateurs as $ordi) { ?>
								<tr>
									<td><?php echo $ordi->id; ?></td>
									<td><?php echo $ordi->name; ?></td>
									<td><?php echo $ordi->date_creation; ?></td>
									<td><?php echo $ordi->contact; ?></td>
									<td><?php echo $ordi->serial; ?></td>
									
									<td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
										<a href="#" class="on-default btn_edit" id='<?php echo $ordi->id; ?>'><i class="fa fa-pencil"></i></a>&nbsp;
										<a href="#" class="on-default btn_delete" id='<?php echo $ordi->id; ?>'><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;
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
                url_submit: "<?php echo site_url('C_ordinateur/liste_ordinateur')?>", //url du save (données envoyés par post)

                title_modal_add: 'Ajouter eleve', //Title du modal à l'ouverture en mode ajout
                focus_add: 'prenom', //l'emplacement du focus en mode ajout

                title_modal_edit: 'Modifier eleve', //Title du modal à l'ouverture en mode edit
                focus_edit: 'prenom',//l'emplacement du focus en mode edit

                url_edit: "<?php echo site_url('C_eleve/recup_eleve')?>", //url le fonction qui recupére la données de la ligne
                url_delete: "<?php echo site_url('C_eleve/delete_eleve')?>", //url de la fonction supprimé
            });

    });
</script>
