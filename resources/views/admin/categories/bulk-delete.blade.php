<div class="dt-buttons" style="margin: 10px"> 
    <button class="dt-button btn btn-danger m-2" type="button" >
        <span class="d-none d-sm-inline-block"
        onclick="
                if(confirm('Êtes-vous sûr de vouloir supprimer les éléments sélectionnés ?'))
                    document.getElementById('bulk-delete-form').submit();" > <i class="fa-solid fa-trash-can"></i> Supprimer tout
                <form id="bulk-delete-form" action="{{route('bulk-delete')}}" method="post" style="display: none">
                    @csrf
                    @method('delete')
                </form>
        </span>
    </button> 
</div>