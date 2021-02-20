


<footer class="footer">
    <div class="container-fluid">
        
    @auth( )
    <div class="d-flex justify-content-center">
        <div class="copyright mt-4 ml-1" style="color:#fff !important;
        background:#000; padding:10px !important;
         font-weight:bold !important;">
            &copy; {{ now()->year }} {{ __('made with') }} 
            <i class="tim-icons icon-heart-2"></i> {{ __('by') }}
            <small class="m-2">Group 4</small>
            <small>All Rights Reserved</small>
            <a href="{{ route('home') }}">BackHome</a>
            
        </div>
    </div>

</div>
    @endauth()

    @guest()
    <div class="copyright text-center align-center">
            &copy; {{ now()->year }} {{ __('made with') }} 
            <i class="tim-icons icon-heart-2"></i> {{ __('by') }}
            <small class="m-2">Group 4</small>
            <small>All Rights Reserved </small>
            
        </div>
    </div>
    @endguest()
    
</footer>
