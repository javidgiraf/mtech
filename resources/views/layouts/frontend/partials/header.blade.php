     <!-- ======================
             HEADER START   
         ====================== -->

         <header class="header">
        <div class="row toggle-menus">
            <div class="col-xl-9 col-lg-8 col-md-6 col-5">
                <!-- logo -->
                <a href="{{ route('home') }}"> <img class="logo" src="{{ asset('assets/frontend/img/m-tech-logo.png') }}" alt="logo"> </a>
                <!-- logo -->
            </div>


            <!-- Serach -->
            <div class="col-xl-1 col-lg-2 col-md-3 col-3 search-icn">
                <div class="search-wrappers">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Type to search" />
                        <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                    </div>
                    <span class="close" onclick="searchToggle(this, event);"></span>
                </div>
            </div>
            <!-- Serach -->


            <!-- Humberger -->
            <div class="col-xl-2 col-lg-2 col-md-3 col-4">
                <button aria-label="Toggle menu" class="nav-button button-lines button-lines-x close" role="button"
                    type="button" data="trigger">
                    <span class="lines active"> <span class="menu-text"> Menu </span> </span>
                    <!-- <span class="menu-text"> Menu </span> -->
                </button>
            </div>
            <!-- Humberger -->

        </div>
    </header>
    
    <nav class="nav-wrappers">

        <ul class="nav-m">
            <li> <a href="{{ route('home') }}"> Home </a> </li>
            <li> <a href="{{ route('about-us') }}"> About Us </a> </li>
            <li> <a href="{{ route('product-details') }}"> Product </a> </li>
            <li> <a href="{{ route('service-details') }}"> Service </a> </li>
            <li> <a href="{{ route('careers') }}"> Careers </a> </li>
            <li> <a href="{{ route('clients') }}"> Clients </a> </li>
            <li> <a href="{{ route('blogs') }}"> Blogs </a> </li>
            <li> <a href="{{ route('contact-us') }}"> Contact Us </a> </li>

        </ul>
        <span class="nav-marker"></span>
    </nav>

    <!-- ======================
               HEADER END   
         ====================== -->
