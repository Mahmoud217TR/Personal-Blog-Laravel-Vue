<nav>
    <ul class="nav justify-content-center d-lg-flex d-md-block d-flex">
        @include('layouts.nav-buttons',['icon'=>'bi-house', 'text'=>'Profile','href'=> route('profile'),'name'=>'profile'])
        @include('layouts.nav-buttons',['icon'=>'bi-person-circle', 'text'=>'Home', 'href'=> route('home'), 'name'=>'home'])
        @include('layouts.nav-buttons',['icon'=>'bi-arrow-left-circle-fill', 'text'=>'Back', 'href'=> url()->previous(), 'name'=>'back'])
    </ul>
</nav>