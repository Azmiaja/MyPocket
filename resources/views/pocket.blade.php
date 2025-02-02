        @extends('layouts.app')
        @section('container')
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-1 g-4"  data-bs-spy="scroll" data-bs-target=".comtainer" data-bs-smooth-scroll="true">
                    <div class="col">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="card transparent-bg text-light shadow">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-uppercase">Income</h5>
                                        <div class="mt-4">
                                            <form action="{{ route('store.income') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <div class="form-group">
                                                    @error('income')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-currency-fill"></i></span>
                                                        <input type="number" class="form-control" id="frIncome"
                                                            value="{{ old('income') }}" name="income">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @error('date')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-calendar-schedule-fill"></i></span>
                                                        <input type="date" class="form-control" id="frDate"
                                                            name="date" value="{{ old('date') }}">
                                                    </div>
                                                </div>
                                                <button type="submit" id="btn-income"
                                                    class="btn btn-warning fw-bold text-light">Save</button>
                                                <a href="#income" class="btn btn-primary fw-bold">View <i
                                                        class="ri-arrow-down-double-fill"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="card transparent-bg text-light shadow">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 text-uppercase fw-bold" >Data Incomes</h5>
                                        <table class="table-glass table-bordered table-income w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Income</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4"
                                                        class="thTotalIncome text-center disabled table-primary">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"
                                                        class="tdTotalIncome text-center disabled table-info">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="card transparent-bg shadow">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-uppercase">Outcome</h5>
                                        <div class="mt-4">
                                            <form action="{{ route('store.outcome') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <div class="form-group">
                                                    @error('outcome')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-money-dollar-box-fill"></i></span>
                                                        <input type="number" class="form-control" placeholder="Rp.0"
                                                            value="{{ old('outcome') }}" name="outcome">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @error('date')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-calendar-schedule-fill"></i></span>
                                                        <input type="date" class="form-control"
                                                            value="{{ old('date') }}" name="date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    @error('deskripsi')
                                                        <span class="text-danger" role="alert">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-edit-2-fill"></i></span>
                                                        <input type="text" class="form-control" placeholder="Deskripsi"
                                                            name="deskripsi" value="{{ old('deskripsi') }}">
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-warning fw-bold text-light">Save</button>
                                                <a href="#outcome" class="btn btn-primary fw-bold">View <i
                                                        class="ri-arrow-down-double-fill"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="card transparent-bg shadow">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4 text-uppercase fw-bold">Data Outcomes</h5>
                                        <table class="table-glass table-bordered table-outcome">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Outcome</th>
                                                    <th>Deskription</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5"
                                                        class="thTotalOutcome text-center disabled table-primary">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"
                                                        class="tdTotalOutcome text-center disabled table-info">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col d-block d-lg-none" id="income">
                        <div class="card transparent-bg shadow">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-uppercase fw-bold">Data Incomes</h5>
                                <table class="table-glass table-bordered nowrap table-income" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Income</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" class="thTotalIncome text-center disabled table-primary">
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="tdTotalIncome text-center disabled table-info">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col d-block d-lg-none" id="outcome">
                        <div class="card transparent-bg shadow">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-uppercase fw-bold outcome">Data Outcomes</h5>
                                <table class="table-glass table-bordered nowrap table-outcome" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Outcome</th>
                                            <th>Deskcrip</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="thTotalOutcome text-center disabled table-primary">
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="tdTotalOutcome text-center disabled table-info">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @push('script')
                <script>
                    function getFormIncome() {
                        $.ajax({
                            url: '{{ url('/get/form-income') }}',
                            type: "GET",
                            success: function(response) {
                                $('#frIncome').attr('placeholder',
                                    `Sisa Income Anda ~ Rp. ${response.in.toLocaleString('id-ID')}`);
                                $('#frDate').val(response.date);
                            }
                        })
                    }

                    function getTotalOutcome() {
                        $.ajax({
                            url: `{{ url('/get/total-outcome') }}`,
                            type: 'GET',
                            success: function(response) {
                                $('.tdTotalOutcome').text(`Rp. ${response.total.toLocaleString('id-ID')}`)
                                $('.thTotalOutcome').text(`Total / ${response.date}`)
                            }
                        });
                    }

                    function getTotalIncome() {
                        $.ajax({
                            url: `{{ url('/get/total-income') }}`,
                            type: 'GET',
                            success: function(response) {
                                $('.tdTotalIncome').text(`Rp. ${response.total.toLocaleString('id-ID')}`)
                                $('.thTotalIncome').text(`Total / ${response.date}`)
                            }
                        });
                    }
                    $(document).ready(function() {
                        // table income
                        var tableIncome = $('.table-income').DataTable({
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            ajax: "{{ url('/get/table-income') }}",
                            columns: [{
                                    data: 'DT_RowIndex',
                                    width: '5%',
                                    className: 'text-center'
                                },
                                {
                                    data: 'date',
                                    name: 'date',
                                    width: '30%'
                                },
                                {
                                    data: 'income',
                                    name: 'income',
                                    width: '50%'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    className: 'text-lg-center',
                                    orderable: false,
                                    searchable: false
                                },
                            ]
                        });

                        // table outcome
                        var tableOutcome = $('.table-outcome').DataTable({
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            ajax: "{{ url('/get/table-outcome') }}",
                            columns: [{
                                    data: 'DT_RowIndex',
                                    width: '5%',
                                    className: 'text-center'
                                },
                                {
                                    data: 'date',
                                    name: 'date',
                                    width: '30%'
                                },
                                {
                                    data: 'outcome',
                                    name: 'outcome',
                                    width: '30%'
                                },
                                {
                                    data: 'deskripsi',
                                    name: 'deskripsi',
                                    // width: '50%'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    className: 'text-lg-center',
                                    orderable: false,
                                    searchable: false
                                },
                            ]
                        });
                        getFormIncome();
                        getTotalOutcome();
                        getTotalIncome();
                    });

                    $(document).on('click', '.deleteIncome', function() {
                        let id = $(this).data('id');

                        Swal.fire({
                            title: "Apakah Anda yakin?",
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, Hapus!",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: `{{ url('/delete/income/${id}') }}`,
                                    type: "DELETE",
                                    dataType: 'json',
                                    data: {
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        if (response.status === "success") {
                                            Swal.fire("Berhasil!", response.message, "success");
                                            $('.table-income').DataTable().ajax.reload();
                                            getFormIncome();
                                            getTotalOutcome();
                                            getTotalIncome();
                                        } else {
                                            Swal.fire("Gagal!", response.message, "error");
                                        }
                                    },
                                    error: function(xhr) {
                                        Swal.fire("Error!", "Terjadi kesalahan pada server.", "error");
                                    }
                                });
                            }
                        });
                    });

                    $(document).on('click', '.deleteOutcome', function() {
                        let id = $(this).data('id');

                        Swal.fire({
                            title: "Apakah Anda yakin?",
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, Hapus!",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: `{{ url('/delete/outcome/${id}') }}`,
                                    type: "DELETE",
                                    dataType: 'json',
                                    data: {
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        if (response.status === "success") {
                                            Swal.fire("Berhasil!", response.message, "success");
                                            $('.table-outcome').DataTable().ajax.reload();
                                            getFormIncome();
                                            getTotalOutcome();
                                            getTotalIncome();
                                        } else {
                                            Swal.fire("Gagal!", response.message, "error");
                                        }
                                    },
                                    error: function(xhr) {
                                        Swal.fire("Error!", "Terjadi kesalahan pada server.", "error");
                                    }
                                });
                            }
                        });
                    });
                </script>
            @endpush
        @endsection
