<!-- Page-Title --> 
<div class="row">
    <div class="col-sm-12" style="margin-bottom: 30px">
        <button type="button" id="btn_add" class="btn btn-primary">Ajouter <span lass="m-l-5"><i
                    class="fa fa-plus-square"></i></span></button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des Tablettes</h3>
            </div>
            <div class="panel-body table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10%">id</th>
                        <th style="width: 10%">Nom Imprimante</th>
                        <th style="width: 20%">Date creation</th>
                        <th style="width: 25%">contact</th>
                        <th style="width: 25%">numero de series</th>
                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($telephone as $phone) { ?>
                        <tr>
                            <td><?php echo $phone->id; ?></td>
                            <td><?php echo $phone->name; ?></td>
                            <td><?php echo $phone->date_creation; ?></td>
                            <td><?php echo $phone->contact; ?></td>
                            <td><?php echo $phone->serial; ?></td>
                            
                            <td class="actions" style="width: 1%; text-align: center; white-space: nowrap">
                                <a href="#" class="on-default btn_edit" id='<?php echo $phone->id; ?>'><i class="fa fa-pencil"></i></a>&nbsp;
                                <a href="#" class="on-default btn_delete" id='<?php echo $phone->id; ?>'><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- End Row -->

<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_formLabel" aria-hidden="true">
<form action="#" id="form" class="form-horizontal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal_formLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_eleve" name="id_eleve"/>

                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-3">Prenom<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="prenom" id="prenom" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nom<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="nom" id="nom" class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lieu Naissance<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="lieu_naissance" id="lieu_naissance" class="form-control" type="text" required>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date Naissance<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="date_naissance" id="date_naissance" class="form-control" type="date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Sexe<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <select name="sexe" id="sexe" class="form-control"  required>
                                    <option value=""></option>
                                    <option value="F">Féminin</option>
                                    <option value="M">Masculin</option>
                                </select> 
                                    
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="email_eleve_pro" id="email_eleve_pro" class="form-control" type="email" required>
                                    
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Téléphone<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input name="tel_eleve" id="tel_eleve" class="form-control" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>                        
</div> <!-- End Row -->



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
