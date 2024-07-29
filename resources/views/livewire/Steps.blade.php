<div>
    <form wire:submit.prevent='submit' enctype="multipart/form-data">
        <section id="portfolio" class="wrapper style1 special fade-up">
            <div class="Maincontainer">

                <header class="major">
                    <h2>{{ $pages[$currentPage]['heading'] }} <i class="{{ $pages[$currentPage]['icon'] }}"></i></h2>
                </header>                
                
                <div class="box alt">
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

                    @if ($currentPage == 1) 
    
                        @include('livewire.Step1')
    
                    @elseif ($currentPage == 2)
    
                        @include('livewire.Step2')
    
                    @elseif ($currentPage == 3)
    
                        @include('livewire.Step3')
                        
                    @else
                        @php
                            return redirect('/');
                        @endphp
    
                    @endif
                </div>
                <div class="row gtr-uniform" style="display: flex; justify-content: center; align-items: center;">
                    <span style="padding-top: 100px; cursor: pointer;"><i wire:click="previousPage" class="fa-solid fa-circle-chevron-left fa-2xl"></i></span>
                </div>        
            </div>
        </section>
    </form>
</div>