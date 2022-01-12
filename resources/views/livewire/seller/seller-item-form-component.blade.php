<div class="form-wrapper">
    <x-common.alert-msg :message="$message" />

    <form class="dashboard-form">
        @csrf

        @if($itemId)
            <input type="hidden" name="id" value="{{ $itemId }}">
        @endif


        <x-livewire.inputs.text name="item.title" label="TITLE:" />

        <x-livewire.inputs.text name="item.lot_no" label="LOT NO:" />

        <x-livewire.inputs.text name="item.artist" label="ARTIST:" />

        <x-livewire.inputs.text name="item.classification" label="SUBJECT CLASSIFICATION:" />

        <label for="production_date">PRODUCTION DATE:</label>
        <input wire:model.lazy="item.production_date" type="date" id="production_date" name="production_date"/>
        <x-common.error-msg name="item.production_date"/>


        <x-livewire.inputs.text name="item.est_price" label="ESTIMATED PRICE (RS.)" />

        <x-livewire.inputs.text name="item.description" label="DESCRIPTION:" />

        <x-common.inputs.select
            :options="$categories" name="item.category_id"/>

        <x-common.inputs.select
            :options="$auctions" name="item.auction_id" o-value="heading"/>

        <div>
            <x-livewire.inputs.button action="submitForm" value="SAVE CHANGES" />
        </div>
    </form>

</div>
