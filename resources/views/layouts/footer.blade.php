<footer class="transparent-bg text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2025 MyPocket. All Rights Reserved.</p>
        {{-- <small>Made with ❤️ using Bootstrap</small> --}}
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

<script>
    $(document).on('click', '#logout', function() {

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan logout dari sistem!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, logout!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ route('logout') }}`,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        window.location.href = "{{ route('login') }}";
                    },
                });
            }
        });
    });
</script>

@stack('script')

</body>

</html>
