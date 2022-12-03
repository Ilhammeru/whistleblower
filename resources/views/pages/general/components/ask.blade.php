<div class="ask-tab__items mt-3">
    <p class="title text-navy fw-bold">
        {{ __('view.ask_team') }} Investigator
    </p>

    <div class="row">
        <div class="col-md-5">
            <form action="">
                <div class="form-group mb-3">
                    <textarea name="question" id="question" cols="2" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3 row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <div class="text-end">
                            <div class="d-flex align-items-center gap-3">
                                {{-- captcha --}}
                                <span>{!! $captcha !!}</span>
                                <input type="text" name="captcha" class="form-control border-orange" placeholder="Captcha">
                                <a class="btn btn-orange w-100" href="{{ route('reporting.success') }}">{{ __('view.send') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- history-chat --}}
    <div class="row mt-5">
        <div class="col-md-5">
            <div class="container-message">
                <div class="message-box row border mb-3">
                    <div class="col-md-1">
                        <i class="bi bi-people" style="font-size: 26px;"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="header pb-1 mb-2 border-bottom d-flex align-items center justify-content-between">
                            <p class="name">tim investigator</p>
                            <p class="date">01-05-2022</p>
                        </div>
                        <div class="body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure dolorem recusandae ratione ab consequuntur facilis quibusdam dicta, dolor debitis quo a praesentium eveniet. Consectetur ad minus sunt numquam, rem enim.
                        </div>
                    </div>
                </div>
                <div class="message-box row border mb-3">
                    <div class="col-md-1">
                        <i class="bi bi-person" style="font-size: 26px;"></i>
                    </div>
                    <div class="col-md-11">
                        <div class="header pb-1 mb-2 border-bottom d-flex align-items center justify-content-between">
                            <p class="name">detektifconan</p>
                            <p class="date">01-05-2022</p>
                        </div>
                        <div class="body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure dolorem recusandae ratione ab consequuntur facilis quibusdam dicta, dolor debitis quo a praesentium eveniet. Consectetur ad minus sunt numquam, rem enim.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>