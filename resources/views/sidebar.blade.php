@auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="/">Z01 Medics</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">News </a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dokumente
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach($documents as $document)

                            <a class="dropdown-item" href="{{ $document->link }}" target="_blank">{{ $document->headline }}</a>

                        @endforeach



                        @can('edit documents')
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/document/manage">Verwalte Dokumente</a>
                        @endcan

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bewertungen
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/rating/ask">Anfordern</a>
                        <a class="dropdown-item" href="/rating/create">Abgeben</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/rating/forMe">Forderungen an Dich</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->username }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/user/{{ auth()->user()->id }}"> Mein Profil</a>
                        <a class="dropdown-item" href="/logout">Log Out</a>

                    </div>
                </li>

                @can('give punishment')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            S-Strafen
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/punishment/create">Vergeben</a>

                        </div>
                    </li>
                @endcan

            </div>
        </div>

    </nav>
@endauth


