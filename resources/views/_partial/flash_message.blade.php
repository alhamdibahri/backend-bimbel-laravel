@if(Session::has('flash_message'))
<script>
    Swal.fire(
        'Berhasil!',
        "{{ Session::get('flash_message') }}",
        'success'
    )
</script>
@endif