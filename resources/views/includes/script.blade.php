<script src="{{ url('https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js') }}">
</script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script src="{{ asset('/assets/js/sidebars.js') }}"></script>

<script>
    function hideMenu() {
        const sidebar = document.querySelector('#menu-items');
        sidebar.classList.toggle('d-none');
    }
</script>
