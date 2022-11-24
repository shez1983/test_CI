<header class="site-header "> <!-- mobile-menu-active -->
    <div class="mobile-site-header">
        <a class="brand" href="/template/home">
            <img src="{{ Vite::asset('resources/images/logos/logo.svg') }}" alt="Voluntering Wales">
        </a>

        <div class="site-header__utils">
            <a href="#" class="icon-user mb-1"></a>
            <button class="hamburger hamburger--spin" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>

    <div class="mobile-menu">
        <div class="mobile-site-header">
            <div class="mobile-site-header__heading">
                Your Options
            </div>

            <button class="hamburger hamburger--spin is-active" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

        <div class="mobile-menu__main">

        <div class="well mb-4">
            <div class="well__header">
                <div class="well__heading">Main tasks</div>
                    <div class="d-flex flex-column">
                        <a href="#" class="btn btn-secondary mb-3"><i class="icon-time"></i>Log your time</a>
                        <a href="#" class="btn btn-info mb-3">View opportunities</a>
                        <a href="#" class="btn btn-info">Find an organisation</a>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="well__header">
                    <div class="well__heading">Language preference</div>
                    <p>This will be the language used throughout the Volunteering Wales platform.</p>
                </div>

                <form>
                    <div class="form-check form-check-reverse mb-2">
                        <input class="form-check-input" type="radio" name="lang" value="" id="reverse-radio-1">
                        <label class="form-check-label" for="reverse-radio-1">
                            <strong>Cymraeg</strong>
                        </label>
                    </div>
                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="radio" name="lang" value="" id="reverse-radio-2">
                        <label class="form-check-label" for="reverse-radio-2">
                            <strong>English</strong>
                        </label>
                    </div>
                </form>
            </div>

        </div>

        <div class="mobile-menu__footer">
            <div class="mobile-menu__footer-inner">
                <div class="d-block w-100">
                    <a href="#" class="btn btn-secondary w-100">Button</a>
                </div>
            </div>
        </div>
    </div>
</header>