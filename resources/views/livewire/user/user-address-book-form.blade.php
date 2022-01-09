<div class="form-wrapper">
    <x-common.alert-msg :message="$message" />

    <form class="dashboard-form">
        @csrf

        @if($address_id)
            <input type="hidden" name="id" value="{{ $address_id }}">
        @endif


        <x-common.inputs.text name="userAddress.name" label="NAME:" />

        <x-common.inputs.text name="userAddress.phone" label="PHONE:" />

        <x-common.inputs.text name="userAddress.address" label="ADDRESS:" autocomplete="street-address" />

        <x-common.inputs.text name="userAddress.address2" label="ADDRESS 2:" autocomplete="street-address" />

        <x-common.inputs.text name="userAddress.zip_code" label="ZIP CODE:" autocomplete="postal-code" />

        <x-common.inputs.checkbox name="userAddress.isDefault" label="SET DEFAULT:" isReadOnly="{{ $hasDefault }}" />

        <x-common.inputs.select name="userAddress.province_id" label="PROVINCE:" :options="$provinces" />

        <x-common.inputs.select name="userAddress.city_id" label="CITY:" :options="$cities" />

        <x-common.inputs.text name="userAddress.company_name" label="COMPANY:" />

        <x-common.inputs.text name="userAddress.label" label="LABEL:" />


        <div>
            <x-common.inputs.button action="submitForm" value="SAVE CHANGES" />
        </div>
    </form>

</div>
