<div>
    <div class="minimized-width-container">
        <div class="photo-upload">
            <div class="photo-edit">
                <input wire:model="photo" type="file" id="photo" name="photo" />
                <label for="photo"></label>
            </div>
            <div class="photo-preview">
            <div id="imagePreview" style="background-image: url('{{ $photo ? Storage::url($photo->store('photos', 'public')) : asset('storage/photos/donation-box.jpg') }}')"></div>
            </div>    
        </div>            
    </div>
    <br>
    <div class="trix-container">
        <div class="mb-4" wire:ignore style="width: 470px; margin-left: 380px;">
            <br>
            <input id="body" type="hidden" name="description">
            <trix-editor wire:model="description" placeholder="Ajouter un paragraphe descriptif sur votre cagnotte ..."></trix-editor>
            <br>
        </div>
    </div>
    <br>     
    <div class="minimized-width-container">      
        <input type="submit" value="Créer ma cagnotte" class="fit primary" />    
    </div> 
</div>

