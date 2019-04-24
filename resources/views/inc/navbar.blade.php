<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Vakatiehuisjes') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                <li>
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li>
                    <a class="nav-link" href="/services">Services</a>
                </li>
                <li>
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
            </ul>
        </div>
    -->
    </div>
</nav>
