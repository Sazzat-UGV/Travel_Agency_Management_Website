@if (session('success'))
    <script>
        iziToast.show({
            color: 'green',
            position: 'topRight',
            message: '{{ session('success') }}'
        });
    </script>
@endif
@if (session('error'))
    <script>
        iziToast.show({
            color: 'red',
            position: 'topRight',
            message: '{{ session('error') }}'
        });
    </script>
@endif
