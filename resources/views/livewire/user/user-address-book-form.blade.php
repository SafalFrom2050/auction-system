<div class="form-wrapper">
    <x-common.alert-msg :message="$message" />

    <form class="dashboard-form">
        @csrf

        @if($address_id)
            <input type="hidden" name="id" value="{{ $address_id }}">
        @endif


        <x-livewire.inputs.text name="userAddress.name" label="NAME:" />

        <x-livewire.inputs.text name="userAddress.phone" label="PHONE:" />

        <x-livewire.inputs.text name="userAddress.address" label="ADDRESS:" autocomplete="street-address" />

        <x-livewire.inputs.text name="userAddress.zip_code" label="ZIP CODE:" autocomplete="postal-code" />

        <x-livewire.inputs.checkbox name="userAddress.isDefault" label="SET DEFAULT:" isReadOnly="{{ $hasDefault }}" />

        <x-livewire.inputs.text name="userAddress.province" label="PROVINCE:" autocomplete="province" />

        <x-livewire.inputs.text name="userAddress.city" label="CITY:" autocomplete="city" />

        <x-livewire.inputs.text name="userAddress.country" label="COUNTRY:" autocomplete="country" />


        <div>
            <x-livewire.inputs.button action="submitForm" value="SAVE CHANGES" />
        </div>
    </form>

</div>
