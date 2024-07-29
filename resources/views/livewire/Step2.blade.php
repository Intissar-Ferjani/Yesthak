<div class="minimized-width-container">
    <div>
        <span class="inputSpan" style="width: 300px;" >
            <input class="gate" id="move" type="text" wire:model="title" name="title" required/><label for="move"> Titre </label>
          </span>
    </div>
    <br>    
    <div>
        <div style="display: flex; margin-top:20px">
            <p style="margin-right: 10px;">Définir un montant à atteindre</p>
            <label class="switch"><input type="checkbox" wire:click="show"><span class="slider round"></span></label>
        </div>
        @if ($amountShow == TRUE)
            <span class="inputSpan" style="margin-right:80px !important;">
                <input class="gate" id="element" type="text" wire:model="amount" name="amount" placeholder="DT" dir="rtl" required /><label for="element">Montant</label>
            </span>
            <p></p>
        @endif
    </div>        
    <div>
        <input type="button" value="Continuer" class="fit primary" wire:click="validateStep2"/>        
    </div>
</div>  