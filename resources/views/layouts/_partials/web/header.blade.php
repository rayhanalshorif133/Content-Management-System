{{-- direct use models --}}
@php
    use App\Models\Category;
    $categories = Category::select()
        ->with('subCategories')
        ->get();
@endphp

<header>
    <section class="nav-top-item">
        <div id="nav-container">
            <div class="bg"></div>
            <div class="button" tabindex="0">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="top-menu-bg">
                <div id="nav-content" tabindex="0">
                    <ul class="navbar-nav bg-transparent fixed-top" id="sidebar-wrapper">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">
                                &nbsp Home <span class="sr-only">(current)</span></a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.details', $category->id) }}"> &nbsp
                                    {{ $category->name }}
                                    Game</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a class="navbar-brand text-center d-block font-weight-bold" style="font-size: 2rem; color:#fff;"
                    href="{{ route('home') }}">
                    WWEBD
                    <!-- <img src="images/logo.png" style="height: 40px; width: auto;" alt="" title=""> -->
                </a>
            </div>
        </div>
    </section>

    <div id="mobile-nav-panel">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-center d-block font-weight-bold" href="{{ route('home') }}"
                tyle="font-size: 2rem; color:#fff;">
                WWEBD
                <!-- <img src="images/logo.png" style="height: 40px; width: auto;" alt="" title=""> -->
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">
                            &nbsp Home <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.details', $category->id) }}"> &nbsp
                                {{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </nav>
    </div>
    <!-- mobile-nav-panel -->
</header>
