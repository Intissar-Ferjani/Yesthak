<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-icon edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit{{$category->id}}">
    <i class="fa-solid fa-wand-magic-sparkles" style="color: rgba(253, 167, 39, 0.968)"></i>
</a> 

<!-- Offcanvas to edit category -->
<div class="offcanvas offcanvas-end" id="offcanvasEdit{{$category->id}}" aria-labelledby="offcanvasEditLabel{{$category->id}}">
    <div class="offcanvas-header">
    <h5 id="offcanvasEditLabel{{$category->id}}" class="offcanvas-title">Modifier la catégorie</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNew" novalidate="novalidate" action="{{route('categories.update', $category->id)}}" method="POST">
            @csrf
        @method('put')
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-name">Nom</label>
            <input type="text" class="form-control" id="add-name" name="name" value="{{$category->name}}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-details">Détails</label>
            <textarea id="add-details" class="form-control" name="details">{{$category->details}}</textarea>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="icon-class">Classe d'icône</label>
            <input type="text" class="form-control" id="icon-class" name="icon" value="{{$category->icon}}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Sauvegarder</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
    </form>
    </div>
</div>
{{-- end offcanvas --}}