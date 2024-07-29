@extends('layout')

@section('content')
<div class="Maincontainer">  
  <section id="portfolio" class="wrapper style1 special fade-up"> 
    <form method="POST" action="{{ route('cagnotte.update', $cagnotte->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <!-- Display validation messages -->
      <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <b>{{ $error }}</b>
                @endforeach
            </div>
        @endif
      </div>
      <!-- End validation -->
        
      <article class="container">
        <section class="intro flow">
          <div class="col-3 ">
            <input class="effect-3" type="text" placeholder="Placeholder Text" value="{{ $cagnotte->title }}" name="title" style="text-align: center; font-size: 22px; color:whitesmoke; font-weight:300; width:500px">
            <span class="focus-border"></span>
          </div>   
          <header class="major" style="margin-top:90px ; margin-left:60px">
            <label for="file-input">
              <input id="file-input" type="file" class="fileinput" name="photo" style="margin-bottom: 40px; "/>
              <img id="img-preview" style="background-image: url('{{ Storage::url($cagnotte->photo)}}');" />
            </label>
          </header>   
        </section>
        <section class="details">
          <header>
            <h3 style="font-size: 19px !important; padding-top:20px">Modifier votre cagnotte</h3>
          </header>
          {{-- ----------- --}}
          <div class="scroll-container">
            <div class="form-container"> 
              <div class="row">
                <span class="inputSpan" style="margin-left:52px ; margin-top: 30px">
                  <input class="gate" id="amount" type="text" value="{{ $cagnotte->amount }}" placeholder="0 DT" name="amount" style="text-indent: 30px;"/><label for="amount">Montant</label>
                </span>
                <span class="inputSpan" style="margin-left:8px ; margin-top: 40px">                      
                  <select class="gate"  name="category_id">
                      @foreach ($cruds as $c)
                        <option value="{{ $c->id }}" {{ $cagnotte->category_id == $c->id ? 'selected' : '' }} >
                          {{ $c->name }}
                        </option>
                      @endforeach
                  </select>
                  <p></p>
                </span>
              </div>
            </div>
            {{-- ----------- --}}
            <div class="box alt" style="width: 480px; margin: auto;">    
              <div class="form-container">   
                <div class="form-group"  >
                  <div class="trix-container">
                    <div class="mb-4" wire:ignore>
                      <br>
                      <input id="body" type="hidden" wire:model="description" id="description" name="description" value="{{ $cagnotte->description }}">
                      <trix-editor input="body"></trix-editor>
                    </div>
                  </div>
                  <br>
                  <span style="color: #15161c00">Lorem <br>Ipsum is simply <br>dummy text of the printingbr <br> and typesetting industry..........................................</span>
                  @if ($cagnotte->status == 'open')
                    <div class="form-group">
                      <input type="submit" value="Mettre à jour ma cagnotte" class="fit primary" style="width: 350px; margin-top: 25px;"/>
                      <p></p>
                    </div> 
                  @endif                 
                </div>
              </div>
            </div>
          </div>
        </section>
      </article>
    </form>
    @if ($cagnotte->status == 'open')
      <div style="display: flex; flex-direction: column; align-items: center;">
        <form method="POST" action="{{ route('closePot', $cagnotte->id) }}" style="margin-bottom: 20px;">
          @csrf
          @method('DELETE')
          <div class="form-group" style="margin-bottom: 20px;">
            <button type="submit"  class="button fermerCagnotte" >Fermer ma cagnotte</button>
          </div>
        </form>
      </div>
    @endif
    <form method="POST" action="{{ route('cagnotte.destroy', $cagnotte->id) }}" style="margin-bottom: 20px;">
      @csrf
      @method('DELETE')
      <input type="submit" class="buttonSupp" value="Supprimer ma cagnotte" style="width: 350px;">
    </form>
  </section>   
  
  <div class="row gtr-uniform" style="display: flex; justify-content: center; align-items: center;">
    <span onclick="window.location.href='{{ route('viewPots') }}'" style="padding-top: 100px; cursor: pointer; text-decoration: none;">
      <i class="fa-solid fa-circle-chevron-left fa-2xl" style="text-decoration: none;"></i>
    </span>
  </div> 
   
</div>
  
{{-- ----------------------------------------------------------- --}}
<script>
      //Change and preview Image
      const input = document.getElementById("file-input");
      var preview = document.getElementById('img-preview');
  
      input.addEventListener("change", (e) => {
        if (e.target.files.length) {  //checks if there are any files 
          var file = input.files[0]; // takes the 1st file
          preview.style.backgroundImage = file ? `url("${URL.createObjectURL(file)}")` : 'url("{{ asset("storage/photos/donation-box.jpg") }}")';
        }
      });
</script> 

@endsection