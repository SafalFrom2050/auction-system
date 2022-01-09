<section class="details-section">
    <h2 class="title-text">
        <i class="far fa-id-card"></i>

        MY DETAILS <br/>
        <span>Keep your account information up to date</span>

        <x-common.spinner target="saveUser"/>
    </h2>

    <div class="flex-column form-wrapper" wire:loading.remove wire:target="saveUser">

        @if($message)
            <x-common.alert-msg :message="$message" duration="{{3000}}"/>
        @endif

        <form class="dashboard-form">
            <label for="user.name">NAME:</label>
            <input wire:model.lazy="user.name" type="text" id="user.name" name="user.name"/>
            <x-common.error-msg name="user.name"/>

            <label for="email">EMAIL:</label>
            <input wire:model.lazy="user.email" type="email" id="email" name="user.email"/>
            <x-common.error-msg name="user.email"/>

            <label for="dob">DATE OF BIRTH:</label>
            <input wire:model.lazy="user.dob" type="date" id="dob" name="dob"/>
            <x-common.error-msg name="user.dob"/>

            <label for="phone">PHONE:</label>
            <input wire:model.lazy="user.phone" type="text" id="tel" name="user.phone"/>
            <x-common.error-msg name="user.phone"/>

{{--            <div class="mt-1">--}}
{{--                <label>MOSTLY INTERESTED IN:</label>--}}
{{--                <div class="mt-2 flex-row">--}}
{{--                    <label for="radio">--}}
{{--                        <input--}}
{{--                            type="radio"--}}
{{--                            id="radio"--}}
{{--                            name="interested-in"--}}
{{--                            value="Womenswear"--}}
{{--                        />--}}
{{--                        Womenswear--}}
{{--                    </label>--}}

{{--                    <hr class="separator-vertical"/>--}}
{{--                    <label for="radio-2">--}}
{{--                        <input--}}
{{--                            type="radio"--}}
{{--                            id="radio-2"--}}
{{--                            name="interested-in"--}}
{{--                            value="Menswear"--}}
{{--                        />--}}
{{--                        Menswear--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

            <button wire:click.prevent="saveUser" class="button-fill mt-4 font-bold">SAVE CHANGES</button>
        </form>
    </div>
</section>
