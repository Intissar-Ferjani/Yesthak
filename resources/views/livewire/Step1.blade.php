<div class="row gtr-uniform">
    @foreach ($cruds as $category)
        <div class="col-4 col-6-medium col-12-xsmall portfolio-item" wire:click="$set('category_id', {{ $category->id }})">
            <span class="{{ $category->icon }}" style="padding-top: 22px; cursor: pointer" wire:click="nextPage"></span> 
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->details }}</p>
        </div>
    @endforeach
</div>
