<div class="dashboard-sidebar-wrapper">
    <div class="dashboard-sidebar-menu">
        <ul>
            <li class="@if (Route::is('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAARxJREFUSEvt1EsuREEUxvFfr8JAgiaewx6S2IHYjIkdsCA2IEw7kYjHwGMgYRNIyb1SSvW9VVrPnFmdnPr+p+o8BmZsgxnrqwHM4QRv2MNrSXKlgCB+geVG9B7bJZASQBA/wyqeGsAi7rDbB+kDxJk/Y6cBnGMevS/pAuTE4xcUQSYBusTb2oZv6oXkACXixZAUUCNeBIkBcbeEy0M8lvQ6lvDQxH7rrhhwha1IsK/DUvZ75BhjFM6xyC3W/ghwg80U0Gq3mbTwfRxhI0n5Ggc4bfzpvU937hvSwBeE+uQsDNrKtIBsZkj9v37BP+BH7Yr+dpoahI25UDjBaViY/LABvizXpqHvj7FeCbnEYTQXE+egUrc7vHbfVMM/AMMeVBkx8bReAAAAAElFTkSuQmCC" />
                    <h6>Dashboard</h6>
                </a>
            </li>
            <li class="@if (Route::is('booking') || Route::is('user_invoice')) active @endif">
                <a href="{{ route('booking') }}">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAd9JREFUSEvN1UvITWEUBuDnd0tKyiUxkJRcw0C5ZCAZyEyZu4SBmEjKTJGhkRIR5sQUA1Ei9yS3gTBhgIEQUXyrvq3zb/vb55y//vq/2p1zOu9e73rXu9b6BgzzGRjm+EYMwVTswCbMy6pf4hJO42OpEt0UjMcx7MLoQpBfOIn9+FnHtBHMx+Wc8e/8/TwepGBfMQebc+BI5EVWGJ//TolgNu5gOi6mEuzBh4KCmbiGhRmzAu8qbIngNlbibAJv76HTpuEW5uI61rURrM8Zvc9l+FEj+JN/15ObhdfZq7W4EbgmBaewE3txvCH7EkFAz2TFJ7C7RPAqS12KJ30SLMMjPM+eNCqIthuD6Iz/2g6VgqZmmYgv+ZlUV3AOW2oZR1tuLXjQRvAplTeGc5CCCbiPBfnNkLkc33voogqyKM3GU0QXrm7yIHo5SOJE8Gd9BA/oQRxFVGNbyeSqJAHq54Rnb/JwbsCVEkE/QTuxlYddB63zpcNpkc1IPhzA5wLz5LxRY9PGOokN8LbCti27CHwVi/M6jq16Dw9Tncd1zMohTME3rMHjpvYqlWVsmokjeWOOaqld3Av7sgeDYN3ugwq8BBuTcavyEwpiLd9MCi+k/+6WyHslGKrxI+dOHrKCv64NVRmrB563AAAAAElFTkSuQmCC" />
                    <h6>Booking</h6>
                </a>
            </li>
            <li class="@if (Route::is('reviewIndex')) active @endif">
                <a href="{{ route('reviewIndex') }}">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAd9JREFUSEvN1UvITWEUBuDnd0tKyiUxkJRcw0C5ZCAZyEyZu4SBmEjKTJGhkRIR5sQUA1Ei9yS3gTBhgIEQUXyrvq3zb/vb55y//vq/2p1zOu9e73rXu9b6BgzzGRjm+EYMwVTswCbMy6pf4hJO42OpEt0UjMcx7MLoQpBfOIn9+FnHtBHMx+Wc8e/8/TwepGBfMQebc+BI5EVWGJ//TolgNu5gOi6mEuzBh4KCmbiGhRmzAu8qbIngNlbibAJv76HTpuEW5uI61rURrM8Zvc9l+FEj+JN/15ObhdfZq7W4EbgmBaewE3txvCH7EkFAz2TFJ7C7RPAqS12KJ30SLMMjPM+eNCqIthuD6Iz/2g6VgqZmmYgv+ZlUV3AOW2oZR1tuLXjQRvAplTeGc5CCCbiPBfnNkLkc33voogqyKM3GU0QXrm7yIHo5SOJE8Gd9BA/oQRxFVGNbyeSqJAHq54Rnb/JwbsCVEkE/QTuxlYddB63zpcNpkc1IPhzA5wLz5LxRY9PGOokN8LbCti27CHwVi/M6jq16Dw9Tncd1zMohTME3rMHjpvYqlWVsmokjeWOOaqld3Av7sgeDYN3ugwq8BBuTcavyEwpiLd9MCi+k/+6WyHslGKrxI+dOHrKCv64NVRmrB563AAAAAElFTkSuQmCC" />
                    <h6>Reviews</h6>
                </a>
            </li>
            <li class="@if (Route::is('message')) active @endif">
                <a href="{{ route('message') }}">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAP5JREFUSEvt1D1KxFAUxfHflC5gLBQGBsFxG67A1nZKawWxsdZmsLSzdQUuYJZgoZ0oiIUuwEZRH7wHSUgmXwQsJk0e7+aef3Ju3hkZ+BoNrC8LOMAF9npCH3GCu6CTBbxiu6d4an/CThHwE6t9bcvpZMXWgOR/K4vmuIydp7iJ66r9UG4FeMc4in5gM66r9v8fYHCLupy7VjNYA3Jh94JJhScpUvZxjd0a754xLYZdiOtwqGYlzVtY4LDBUO5xVhbXZb3pj/j8g28g3M9xha8GsJxFqwChdotjvDURTs/UZX/4ggccYdlGuCkgvHGw47uLeHHIXTVW9tVZ1Bv6C0XQQRmS+Po6AAAAAElFTkSuQmCC"/>
                    <h6>Messages</h6>
                </a>
            </li>
            <li class="@if (Route::is('profile')) active @endif">
                <a href="{{ route('profile') }}">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAZxJREFUSEu11L1vjWEYx/HPSecmmgpCajHUaOofIF5K01EbU/8CidCkpoYNIQzduyojUukLo9UmBgtB21RIGQnPldxtTh7nPveTU+da7/v6fa/3lj5bq8/6mgImq0Bu4kQK6D3m8bwUYBPAHG5nhGZxvxukBDiPF9hAgFaS2DncwRGcwXoOUgKsJoFpPK6JTGEJy7jYK+AbDlRlGMTPmsgwtvEZx3oFbOIQDuJrBhB/olQdrVSiqPlZRDmeZEoUPbrQK6C9yTEx0ZOBBL2Lw/ttcgR2DSEWwu32u+pLQB/uZ0x3fUdxHTGev/Ayzf+7/7FoJY2u792aHOMZUY/hVJqmdrEtvMHrlM2PTqQcIKZiMTWxSQaxCzNYq3/uBJjAs/TxKW4hjtv3mnNkGMcv3sMnLAKLsd2zOmAIb1PkcWtuNAkf91I5v+BkNXk7u351wFU8wCucbige30InljIO35Vq8xdygDhol0rLkwGPp8P3CJdzgA8YQZSqXvNSQkfxCR9xPAf4kx5KNyoH+8e/V6FSNtkpauzY9GPfM/gL5dBHGcZ57nQAAAAASUVORK5CYII=" />
                    <h6>Edit Profile</h6>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMJJREFUSEvdlcEJwlAMhr9e3EEEQXqoI3QLl9ANvLiBHaBreHQQL72JgnsogfdApcofaKD6znn/l/xJSEHwK4L1GQ1gBeyBpVBxB2yBo8WqFdyAmSCeQ85A6QHc008loZdY5YNp/x5gArTAJlkzaAVT4ADUjiF47v/XHpioiRvEMwQSYJ1sMXs8731QPlYQDrCsQy3KtoQ2OUNCx7SvwYPuwX8CrsDcsRwXYOHZVDs4DVAJkBOw8x4cQbc/RL0H4wU8ALeMKBlSozKnAAAAAElFTkSuQmCC" />
                    <h6>Log Out</h6>
                </a>
            </li>

        </ul>
    </div>
</div>
