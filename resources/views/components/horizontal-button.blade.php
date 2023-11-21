{{-- <div class="m-1 flex-grow-1" style="min-width: 120px;">
    <button @click="tab = '{{ $tab }}'"
    class="btn btn-block btn-primary btn-sm">{{ $slot }}</button>
</div> --}}
<li class="nav-item">
    <a @click="tab = '{{ $tab }}'" class="nav-link" href="#">{{ $slot }}</a>
</li>