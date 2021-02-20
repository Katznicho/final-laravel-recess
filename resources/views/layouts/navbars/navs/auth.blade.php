<style>
    .make-fixed{
        position:sticky !important;
        top:0 !important;
        z-index: 100 !important;
        left: 0;

    }
    nav.navbar.navbar-expand-lg.navbar-absolute.navbar-transparent{
        background:#1c478e !important;
        color:#fff;
        position:sticky !important;
        top:0 !important;
        left: 0 !important;
        z-index: 100 !important;

    }
</style>
<div class="make-fixed">
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid ">
            <div class="navbar-wrapper d-none">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <div class="mr-auto">
                    <h4>COVID 19 MANAGEMENT SYSTEM</h4>
                </div>
                     
                <a href="{{ route('logout') }}" 
                class="btn btn-success font-weight-bold"
                onclick="event.preventDefault();  
                document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>

            </div>
        </div>
    </nav>
    
    </div>
