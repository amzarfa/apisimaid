<body>
    <div class="maincontainer">
        <div class="bat">
            <img class="wing leftwing" src="{{ asset('/img/bat-wing.png') }}">
            <img class="batt" src="{{ asset('/img/bat-body.png') }}" alt="bat">
            <img class="wing rightwing" src="{{ asset('/img/bat-wing.png') }}">
        </div>
        <div class="bat">
            <img class="wing leftwing" src="{{ asset('/img/bat-wing.png') }}">
            <img class="batt" src="{{ asset('/img/bat-body.png') }}" alt="bat">
            <img class="wing rightwing" src="{{ asset('/img/bat-wing.png') }}">
        </div>
        <div class="bat">
            <img class="wing leftwing" src="{{ asset('/img/bat-wing.png') }}">
            <img class="batt" src="{{ asset('/img/bat-body.png') }}" alt="bat">
            <img class="wing rightwing" src="{{ asset('/img/bat-wing.png') }}">
        </div>
        <img class="foregroundimg" src="{{ asset('/img/HauntedHouseForeground.png') }}" alt="haunted house">
    </div>
    <h1 style="text-align:center !important;" class="errorcode">ERROR 403</h1>
    <div style="text-align:center !important;" class="errortext">This area is forbidden. Turn back now!</div>

    <div style="text-align:center !important;" class="errortext">
        {{ Illuminate\Foundation\Application::VERSION }} - Url : {{ url('', []) }}
    </div>
</body>
