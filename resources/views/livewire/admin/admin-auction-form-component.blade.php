<div class="form-wrapper">
    <x-common.alert-msg :message="$message" />

    <form class="dashboard-form">
        @csrf

        @if($auctionId)
            <input type="hidden" name="id" value="{{ $auctionId }}">
        @endif


        <x-livewire.inputs.text name="auction.heading" label="HEADING:" />

        <x-livewire.inputs.text name="auction.description" label="DESCRIPTION:" />

        <x-livewire.inputs.text name="auction.location" label="LOCATION:" />

        <x-livewire.inputs.text name="auction.period" label="PERIOD:" />


        <label for="end_date">DATE AND TIME:</label>
        <input wire:model.lazy="auction.date_time" type="date" id="date_time" name="auction.date_time"/>
        <x-common.error-msg name="auction.date_time"/>

        <label for="end_date">End DATE:</label>
        <input wire:model.lazy="auction.end_date" type="date" id="end_date" name="auction.end_date"/>
        <x-common.error-msg name="auction.end_date"/>


        <div>
            <x-livewire.inputs.button action="submitForm" value="SAVE CHANGES" />
        </div>
    </form>

</div>
