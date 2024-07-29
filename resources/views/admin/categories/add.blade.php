<div class="dt-buttons" style="margin: 20px"> 
    <a href="" class="dt-button add-new btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
        <span class="d-none d-sm-inline-block"><i class="fa-solid fa-plus"></i> Ajouter une  catégorie</span>
    </a> 
</div>
<!-- Offcanvas to add new category -->
<div class="offcanvas offcanvas-end" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Nouvelle catégorie</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNew" novalidate="novalidate" action="{{route('categories.store')}}" method="POST">
        @csrf
          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="add-name">Nom</label>
              <input type="text" class="form-control" id="add-name" name="name">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="add-details">Détails</label>
              <textarea id="add-details" class="form-control"  name="details"></textarea>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="icon-class">Classe d'icône</label>
            <input type="text" class="form-control" id="icon-class" name="icon">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
          
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Soumettre</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
      </form>
    </div>
</div>
{{-- end offcanvas --}}