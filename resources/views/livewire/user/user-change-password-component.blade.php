<section class="change-password-section">
    <h2 class="title-text">
        CHANGE PASSWORD

        <x-common.spinner target="save"/>
    </h2>

    <div class="form-wrapper">
        <x-common.alert-msg :message="$message" />
        <form class="dashboard-form">
            <x-common.inputs.text type="password" name="password.current" label="CURRENT PASSWORD:"/>
            <x-common.inputs.text type="password" name="password.new_confirmation" label="NEW PASSWORD:"/>
            <x-common.inputs.text type="password" name="password.new" label="CONFIRM NEW PASSWORD:"/>

            <div>
                <x-common.inputs.button action="save" value="SAVE CHANGES" />
            </div>
        </form>
    </div>

</section>
