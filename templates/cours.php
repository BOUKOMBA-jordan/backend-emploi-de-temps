<div class="container">
    
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2><b>Gestion des Cours</b></h2></div>
                

                <div class="col-sm-4">
                    <button type="button" class="btn btn-info add-new-cours"><i class="fa fa-plus"></i> Ajouter</button>
                </div>
            </div>
        </div>
        <table class="table table-bordered"
            id="table"
            data-filter-control="true"
            data-show-search-clear-button="true">
            <thead>
                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="cours" data-filter-control="input">Nom de la Cours</th>
                    <th>Action</th>
                </tr>
                
            </thead>
            <tbody>
                <?php
                    foreach ($cours as $element) {
                ?>
                        <tr>
                            <td><input type="text"  class="form-control" value="<?= nl2br(htmlspecialchars($element->idCours)) ?>" disabled></td>
                            <td><?= nl2br(htmlspecialchars($element->nomCours)) ?></td>
                                   
                            <td id="bouton-action-cours-<?= nl2br(htmlspecialchars($element->idCours)) ?>">
                                <a class="editCours" ><i class="material-icons"></i></a>
                                <a class="deleteCours" data-bs-toggle="modal" data-bs-target="#exampleModalCours"><i class="material-icons"></i></a>
                            </td>
                        </tr> 
                <?php
                    }
                            
                ?>   
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCours" tabindex="-1" aria-labelledby="exampleModalLabelCours" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelCours">Modal title</h1>
                    <i class="fa fa-window-close" aria-hidden="true" data-bs-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    Êtes-vous sure de vouloir supprimer la Cours: <br><br>
                    <strong><p id="coursupprimer"></p></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary validerSuppressionCours">Valider</button>
                </div>
                </div>
            </div>
        </div>

        
    </div>
</div>  

<script>
    $(function() {
        $('#table').bootstrapTable()
    })
</script>  
