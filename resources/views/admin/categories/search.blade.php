@extends('admin.layout')
@section('content')
<title>Yesthak</title>
<!-- Table -->
<div class="card">
    <div class="card-datatable table-responsive">
        <div class="dataTables_wrapper">
            <div class="container d-flex justify-content-between align-items-center mt-2 p-3">
                <h3><i class="fa-solid fa-layer-group"></i> Gérer <b><a href="{{ route('categories.index') }}">Catégories</a></b></h3>
                <!-- menu -->
                @include('admin.customMenu')
                <div class="customcontainer">
                    <input type="checkbox" id="toggle" checked />
                    <label class="button" for="toggle">
                    <nav class="nav">
                        <ul>
                        <li>{{ menu('Home', 'bootstrap') }}</li>
                        <li>{{ menu('dash', 'bootstrap') }}</li>
                        <li>{{ menu('Cagnottes', 'bootstrap') }}</li>
                        </ul>
                    </nav>
                    </label>  
                </div>
            </div>
            
            <div class="row mx-2 mt-4"> 
                <div class="col-md-6 dt-action-buttons d-flex align-items-center p-2">
                    {{-- Search area --}}
                    <div class="dataTables_filter">
                        <form action="{{ route('search') }}" method="get">
                            <label>
                                <input type="search" class="form-control px-3" placeholder="Rechercher.." name="searchName">
                            </label>
                            <input type="submit" style="display: none">
                        </form>
                    </div>
                </div>
            
                <div class="col-md-6 dt-action-buttons d-flex align-items-center justify-content-end p-2">
                    {{-- add area --}}
                    @include('admin.categories.add')
            
                    {{-- bulk-delete area --}}
                    @include('admin.categories.bulk-delete')
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
            <th rowspan="1" colspan="1" style="width: 299px; margin-left: 10px; font-size: 15px"><i class="fas fa-tag" style="color: blue"></i> Name</th>
            <th rowspan="1" colspan="1" style="width: 332px; margin-left:10px; font-size: 15px"><i class="fa-solid fa-circle-info" style="color:rgb(99, 215, 199)"></i> Details</th>
            <th rowspan="1" colspan="1" style="width: 332px; margin-left:10px; font-size: 15px">Icon class</th>
            <th rowspan="1" colspan="1" style="width: 175px; font-size: 15px"><i class="fa-solid  fa-bolt" style="color:gold;"></i> Actions</th></tr>
        </thead>
        <tbody>
            @foreach ($category as $category)
            <tr>
                <td>
                    <label for="checkbox_{{$category->id}}">
                        <input type="checkbox" name="row_id" id="checkbox_{{$category->id}}" disabled>
                    </label>
                </td>
                <td>{{$category->name}}</td>
                <td>
                    <div>
                        <div class="d-flex flex-column">
                            <a href="" class="text-body">
                                <span class="fw-medium">{{$category->details}}</span>
                            </a>
                        </div>
                    </div>
                </td>
                <td>{{$category->icon}}</td>
                <td>
                    <div class="d-inline-block text-nowrap " style="margin-left: 20px">
                        {{-- edit section --}}
                        @include('admin.categories.edit')  

                        {{-- delete section --}}
                        @include('admin.categories.delete')
                                               
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>

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