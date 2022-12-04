<script>
    @if(session()->has('error_alert'))
        @if(gettype(session('error_alert')) == 'array')
            @for($a = 0; $a < count(session('error_alert')); $a++)
                iziToast.error({
                    message: "{{ session('error_alert')[$a] }}",
                    position: "topRight"
                });
            @endfor
        @else
            iziToast.error({
                message: "{{ session('error_alert') }}",
                position: "topRight"
            });
        @endif
    @endif
</script>