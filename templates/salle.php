<div class="container">
    
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2><b>Gestion des Salle</b></h2></div>
                

                <div class="col-sm-4">
                    <button type="button" class="btn btn-info add-new-salle"><i class="fa fa-plus"></i> Ajouter</button>
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
                    <th data-field="salle" data-filter-control="input">Nom de la Salle</th>
                    <th>Action</th>
                </tr>
                
            </thead>
            <tbody>
                <?php
                    foreach ($salle as $element) {
                ?>
                        <tr>
                            <td><input type="text"  class="form-control" value="<?= nl2br(htmlspecialchars($element->idSalle)) ?>" disabled></td>
                            <td><?= nl2br(htmlspecialchars($element->numeroSalle)) ?></td>
                                   
                            <td id="bouton-action-salle-<?= nl2br(htmlspecialchars($element->idSalle)) ?>">
                                <a class="editSalle" ><i class="material-icons"></i></a>
                                <a class="deleteSalle" data-bs-toggle="modal" data-bs-target="#exampleModalSalle"><i class="material-icons"></i></a>
                            </td>
                        </tr> 
                <?php
                    }
                            
                ?>   
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalSalle" tabindex="-1" aria-labelledby="exampleModalLabelSalle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelSalle">Modal title</h1>
                    <i class="fa fa-window-close" aria-hidden="true" data-bs-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    Êtes-vous sure de vouloir supprimer la Salle: <br><br>
                    <strong><p id="salleSupprimer"></p></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary validerSuppressionSalle">Valider</button>
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
