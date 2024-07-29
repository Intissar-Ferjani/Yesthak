@extends('admin.layout')
@section('content')
<!-- Table -->
<title>Yesthak</title>
<div class="card">
    <div class="card-datatable table-responsive">
        <div class="dataTables_wrapper">
            <div class=" d-flex justify-content-between align-items-center mt-4 p-3 m-4">
                <h3><i class="fa-solid fa-layer-group"></i> Gérer <b>Cagnottes</b></h3>
                <!-- menu -->
                @include('admin.customMenu')
                <div class="customcontainer">
                    <input type="checkbox" id="toggle" checked />
                    <label class="button" for="toggle">
                    <nav class="nav">
                        <ul>
                        <li>{{ menu('Home', 'bootstrap') }}</li>
                        <li>{{ menu('dash', 'bootstrap') }}</li>
                        <li>{{ menu('Categories', 'bootstrap') }}</li>
                        </ul>
                    </nav>
                    </label>  
                </div>
            </div>
            
            <div class="row mx-2 mt-4"> 
                <div class="col-md-6 dt-action-buttons d-flex align-items-center p-2">
                    {{-- Search area --}}
                    <div class="dataTables_filter">
                        <form action="{{ route('searchPot') }}" method="get">
                            @csrf
                            <label>
                                <input type="search" class="form-control px-3" placeholder="Rechercher.." name="searchName">
                            </label>
                            <input type="submit" style="display: none">
                        </form>
                    </div>
                </div>
            
                <div class="col-md-6 dt-action-buttons d-flex align-items-center justify-content-end p-2">
                    {{-- add area --}}
                    @include('admin.cagnottes.addPot')
            
                    {{-- bulk-delete area --}}
                    @include('admin.cagnottes.bulk-deletePot')
                </div>
            </div>
            
        </div>
    </div>      
                    
    <table class="table border-top dataTable" style="width: 1210px;">

        <!-- message area --> 
        @include('admin.message')
        <!-- end message -->

        <thead>
        <tr>
            <th class="dt-not-orderable">
                <input type="checkbox" id="select_all">
                <label for="select_all"></label>
            </th>
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fas fa-tag" style="color: blue"></i> Titre</th>
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fa-solid fa-coins"></i> Montant</th>
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fa-regular fa-file-image"></i> Image </th>
            <th rowspan="1" colspan="1" style="width: 332px; margin-left:10px; font-size: 15px"><i class="fa-solid fa-circle-info" style="color:rgb(99, 215, 199)"></i> Détails</th>
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fa-solid fa-user"></i> Créateur</th>
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fa-solid fa-layer-group"></i> Categorie</th>
            <th rowspan="1" colspan="1" style="width: 175px; font-size: 15px"><i class="fa-solid  fa-bolt" style="color:gold;"></i> Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pots as $pot)
            <tr>
                <td>
                    <label for="checkbox_{{$pot->id}}">
                        <input type="checkbox" name="row_id" id="checkbox_{{$pot->id}}" disabled>
                    </label>
                </td>
                <td>{{$pot->title}}</td>
                <td>{{$pot->amount ?? 'Non spécifié'}}</td>
                <td>
                    <img src="{{ Storage::url($pot->photo) }}" style="width:88px;height:82px; border-radius: 50%;">
                </td>                
                <td>
                    <div>
                        <div class="d-flex flex-column">
                            <a href="" class="text-body">
                                <span class="fw-medium">{{$pot->description}}</span>
                            </a>
                        </div>
                    </div>
                </td>
                <td>{{ $pot->user->name}}</td>

                <td>{{ $pot->category->name}}</td>
                <td>
                    <div class="d-inline-block text-nowrap " style="margin-left: 20px">
                        {{-- edit section --}}
                        @include('admin.cagnottes.editPot')  

                        {{-- delete section --}}
                        @include('admin.cagnottes.deletePot')
                                               
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>
    <div class="p-4" style="background: #1c1d26;">
        {{$pots->links()}}
    </div>
    

    {{-- checkbox --}}
    <script>
        document.getElementById('select_all').addEventListener('change', function () {
            var checkboxes = document.querySelectorAll('input[name="row_id"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });
    </script>
</div>
@endsection   