    <span class="btn btn-icon" onclick="confirmDelete(event, {{$pot->id}})">
        <i class="fa-solid fa-eraser" style="color: rgb(247, 28, 28);" ></i>
    </span>    
    <form id="delete-{{$pot->id}}" action="{{ route('cagnottes.destroy', ['cagnotte' => $pot->id]) }}" method="post" style="display: none">
        @csrf
        @method('delete')
    </form>
    <script>
        function confirmDelete(event, potId) {
            console.log('Pot ID:', potId);
            event.preventDefault();

            Swal.fire({
                title: "Es-tu sûr?",
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, supprime-le!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Supprimé!",
                        icon: "success"
                    });

                    document.getElementById('delete-' + potId).submit();
                }
            });
        }
    </script>
</span>