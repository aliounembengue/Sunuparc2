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
                    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
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

<script type="text/javascript">

    $(document).ready(function () {
            
	$('#datatable-buttons').managing_ajax({

	});

    });
</script>
