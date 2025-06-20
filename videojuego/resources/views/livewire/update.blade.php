<div>
<select name="distribuidora_id" wire:model.live="distribuidora_id" id="">
    @foreach ($distribuidoras as $distribuidora)
        <option value="{{$distribuidora->id}}">{{$distribuidora->nombre}}</option>
    @endforeach
</select>

    @php
        dd($desarrolladoras);
    @endphp

<select name="" id="">
    @foreach ($desarrolladoras as $desarrolladora)
        <option value="">{{$desarrolladora->nombre}}</option>
    @endforeach
</select>
</div>
