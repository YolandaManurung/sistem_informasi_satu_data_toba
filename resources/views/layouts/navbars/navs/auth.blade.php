


<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home"> Sistem Informasi Satu Data Toba </a>
        
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="nav navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav d-flex align-items-center">
               
                 
           
                    <a class="nav-links" href=" {{route('profile.edit') }} ">
                   
                       {{ Auth::user()->username }}
                    </a>
               
                
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf 
                      
                       
                        <a class="nav-links" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="True"></i> </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

