<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                Registro precios
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->

            <form class="nav navbar-form navbar-left" role="search" action="/busqueda" method="GET">
                <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-sm btn-default dropdown-toogle" type="button" data-toggle="dropdown">
                        Compañía <strong class="caret"></strong>
                    </button>

                    <ul class="dropdown-menu dropdown-checkbox-menu">
                    @foreach ($menuCompanies as $menuCompany)
                        <li>
                            <div class="checkbox">
                            <label>
                            <input type="checkbox" class="checkbox-dropdown" name="companies_id[]" value="{{ $menuCompany->id }}" checked />  {{ $menuCompany->name }}
                            </label>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                </div>
                <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-sm btn-default dropdown-toogle" type="button" data-toggle="dropdown">
                        Categoría <strong class="caret"></strong>
                    </button>

                    <ul class="dropdown-menu dropdown-checkbox-menu">
                    @foreach ($menuCategories as $menuCategory)
                        <li>
                            <div class="checkbox">
                            <label>
                            <input type="checkbox" class="checkbox-dropdown" name="categories_id[]" value="{{ $menuCategory->id }}" checked />  {{ $menuCategory->name }}
                            </label>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                </div>
                <div class="form-group">
                    <input type="text" name="term" class="form-control" placeholder="Búsqueda">
                </div>
                <button id="search-products" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/inicio_sesion') }}">Iniciar sesión</a></li>
                    <li><a href="{{ url('/registro') }}">Registrarse</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/cierre_sesion') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
