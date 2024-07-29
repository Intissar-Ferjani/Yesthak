<div style="text-align:center;" >
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <span style="color: black; font-size:15px">{{$error}}</span>
                @endforeach
            </ul>
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-success">
            <span style="color: black; font-size:15px">{{session('message')}}</span>
        </div>
    @endif
</div>    