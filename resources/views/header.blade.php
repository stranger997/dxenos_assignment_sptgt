<header>
    <nav class="navbar sticky-top navbar-dark bg-dark justify-content-center" style="color:white;">
        <p style="margin:0;">Σύστημα διαχείρισης αγγελιών. </p>
        
        @if(session()->get('user') )
        <p style="margin:0 0 0 100px;">{{ 'Καλωσήρθες ' . session()->get('user')['name'] }}</p>
        <form action="logout" method="POST">
            @csrf
            <button class="nav-link" style="margin:0 0 0 40px;">Logout</button>
        </form>
        @endif
    </nav>
</header>