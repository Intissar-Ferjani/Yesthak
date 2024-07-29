    <span class="btn btn-icon" onclick="confirmDelete(event, {{$category->id}})">
        <i class="fa-solid fa-eraser" style="color: rgb(247, 28, 28);" ></i>
    </span>
    <form id="delete-{{$category->id}}" action="{{route('categories.destroy', ['category' => $category->id])}}" method="post" style="display: none">
        @csrf
        @method('delete')
    </form>
    <script>
        function confirmDelete(event, categoryId) {
            console.log('Category ID:', categoryId);
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

                    document.getElementById('delete-' + categoryId).submit();
                }
            });
        }
    </script>
</span>