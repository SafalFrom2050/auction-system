<section class="overview-section">
    <h2 class="welcome-text">
        <span>Welcome To </span><br/>
        <span>Your Account</span>
    </h2>

    <div class="mx-8">
        <p class="text-gray-400 my-2">Account Status: <span class="text-gray-800">{{ucfirst(auth()->user()->client_type)}}</span></p>

        <p class="text-gray-400 my-2">Total Bids: <span class="text-gray-800">{{ucfirst(auth()->user()->bids->count())}}</span></p>

    </div>

</section>


