<div id="EditProfileModal" class="modal fade" role="dialog" >
    <div class="modal-dialog modal-sm" > 
        <div class="modal-content" style="background-color: #0da8ee;">
            <div class="modal-header bg-organge text-white">
                <h5 class="modal-title">Tus datos</h5>
                <button type="button" aria-label="Close" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" id="editProfileForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                    <input type="hidden" name="user_id" id="pfUserId">
                    <input type="hidden" name="is_active" value="1">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pfName">Nombre:</label><span class="required text-danger">*</span>
                        <input type="text" name="name" id="pfName" class="form-control" required autofocus tabindex="1" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pfEmail">Correo electrónico:</label><span class="required text-danger">*</span>
                        <input type="text" name="email" id="pfEmail" class="form-control" required tabindex="3" readonly>
                    </div>
                   <!--  <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnPrEditSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5" title="Guardar cambios">Actualizar</button>
                        <button type="button" class="btn btn-light ml-1" data-dismiss="modal" title="Cancelar cambios">Cancelar</button>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
</div>
