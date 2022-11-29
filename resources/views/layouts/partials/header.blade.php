<div class="main-header">
    <div class="main-header__item
        d-flex align-items-center
        justify-content-between">
        {{-- logo --}}
        <a href="{{ route('reporting.index') }}">
            <img src="{{ asset('assets/icons/logomnk.png') }}" alt="mnk-logo" class="logo">
        </a>

        {{-- contact-us --}}
        <div class="main-header__item-contactus
            d-flex align-items-center
            justify-content-between">

            {{-- call us --}}
            <div class="call-us d-flex align-items-center">
                <img src="{{ asset('assets/icons/phone.png') }}" alt="call-us" class="call-us-image">
                <div class="call-us-text">
                    <p class="title">call us</p>
                    <p class="value">(+62-21) 2903 5022</p>
                </div>
            </div>

            <div class="divider"></div>

            {{-- email --}}
            <div class="email d-flex align-items-center">
                <img src="{{ asset('assets/icons/email.png') }}" alt="email-us" class="email-image">
                <div class="email-text">
                    <p class="title">send us email</p>
                    <p class="value">company.info@mnk.co.id</p>
                </div>
            </div>

        </div>

        {{-- iso --}}
        <img src="{{ asset('assets/icons/logoiso.png') }}" alt="iso" class="iso">
    </div>
</div>