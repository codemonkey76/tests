<div class="select-option col-md-6" style=" margin-bottom: 15px; width: 100%; height: 100px; overflow-x: visible; overflow-y: scroll">
    <div>
        <i class="ti-angle-down"></i>
        <select id="mydropdown" name="belt" >
            <option selected="selected" value="" >Belt Select</option>

            @foreach(\App\Belts::all() as $belt)
                <option value="{{ $belt->id }}" data-imagesrc="{{ asset('images/' . $belt->picture . '.png') }}"></option>
            @endforeach

        </select>
    </div>
</div>