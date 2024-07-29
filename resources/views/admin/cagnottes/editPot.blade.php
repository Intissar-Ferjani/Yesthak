<a href="{{ route('cagnottes.edit', $pot->id) }}" class="btn btn-icon edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit{{$pot->id}}">
    <i class="fa-solid fa-wand-magic-sparkles" style="color: rgba(253, 167, 39, 0.968)"></i>
</a> 

<!-- Offcanvas to edit category -->
<div class="offcanvas offcanvas-end" id="offcanvasEdit{{$pot->id}}" aria-labelledby="offcanvasEditLabel{{$pot->id}}">
    <div class="offcanvas-header">
    <h5 id="offcanvasEditLabel{{$pot->id}}" class="offcanvas-title">Mettre à jour la  cagnotte</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
    <form class="add-new pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNew" novalidate="novalidate" action="{{ route('cagnottes.update', $pot->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-title">Titre</label>
            <input type="text" class="form-control" id="add-title" name="title" value="{{$pot->title}}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-amount">Montant</label>
            <input type="text" class="form-control" id="add-amount" name="amount" value="{{$pot->amount}}">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="ex-photo">Image actuelle</label>
            <p></p>
            <img src="{{ Storage::url($pot->photo)}}" style="width: 80px; height: 80px; border-radius:50%" id="ex-photo">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <br>
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-photo">Télécharger une autre image</label>
            <input type="file" class="form-control" id="add-photo" name="photo" style="Storage::url($photo->store('photos', 'public'))">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-category">Catégorie</label>
            <select name="category_id" class="form-control">
                @foreach ($cruds as $c)
                    <option value="{{ $c->id }}" {{ $pot->category_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
            

        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="add-description">Description</label>
            <textarea id="add-details" class="form-control" name="description">{{$pot->description}}</textarea>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Sauvegarder</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Annuler</button>
    </form>
    </div>
</div>
{{-- end offcanvas --}}