<nav>
    <ul class="nav justify-content-center">
        @include('layouts.nav-buttons',['text'=>'Profile','href'=> route('profile'),'name'=>'profile'])
        @include('layouts.nav-buttons',['text'=>'Home','href'=> route('home'),'name'=>'home'])
        @include('layouts.nav-buttons',['text'=>'Back','href'=> url()->previous(),'name'=>'back'])
    </ul>
</nav>