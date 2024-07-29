<div class="dt-buttons" style="margin: 20px"> 
    <a href="" class="dt-button add-new btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
        <span class="d-none d-sm-inline-block"><i class="fa-solid fa-plus"></i> Ajouter une  cagnotte</span>
    </a> 
</div>
<!-- Offcanvas to add new category -->
<div class="offcanvas offcanvas-end" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Nouvelle cagnotte</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNew" novalidate="novalidate" action="{{ route('cagnottes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="add-title">Titre</label>
              <input type="text" class="form-control" id="add-title" name="title">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-amount">Montant</label>
            <input type="text" class="form-control" id="add-amount" name="amount">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-photo">Télécharger une image</label>
            <input  type="file" id="photo" name="photo" class="form-control"/>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-category">Catégorie</label>
            <select name="category_id" class="form-control">
              <option value="" selected disabled>Choisie une Catégorie</option>
                @foreach ($cruds as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="add-description">Description</label>
              <textarea id="add-description" class="form-control"  name="description"></textarea>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>

          
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Créer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
      </form>
    </div>
</div>
{{-- end offcanvas --}}