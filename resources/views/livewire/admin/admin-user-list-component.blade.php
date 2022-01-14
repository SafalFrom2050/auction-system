<section class="address-section">
    <h2 class="title-text">
        <i class="far fa-address-book"></i>
        USERS
        <x-common.spinner />
    </h2>


        <div class="address-book flex-column" wire:loading.remove>

            <x-common.alert-msg :message="$message" />

            <div class="saved-address">
                @foreach($users as $user)
                    <x-admin.cards.admin-user-card
                        :id="$user->id"
                        :title="$user->title"
                        :name="$user->name"
                        :email="$user->email"
                        :phone="$user->phone"
                        :dob="$user->dob->format('Y/m/d H:i A')"
                        :client-type="$user->client_type"
                        :is-approved="$user->is_approved"
                        :bank-account-no="$user->bank_account_no"
                        :bank-sort-code="$user->bank_sort_code"
                        :created-at="$user->created_at"
                    />

                @endforeach

            </div>
        </div>

</section>
