@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ Auth::user()->fullname }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Order</span>
                                <span class="info-box-number">{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">History Order
                                        </h3>
                                        <div class="card-tools">
                                            <form action="dashboard" method="get">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="search" class="form-control float-right"
                                                        placeholder="Search" value="{{ request('search') }}">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>No Transaksi</th>
                                                    <th>No Polisi</th>
                                                    <th>Pemilik</th>
                                                    <th>Tanggal Tansaksi</th>
                                                    <th>Jenis Kendaraan</th>
                                                    <th>Tarif</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($logs as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->no_transaksi }}</td>
                                                        <td>{{ $item->no_polisi }}</td>
                                                        <td>{{ $item->user->fullname }}</td>
                                                        <td>{{ $item->tgl_transaksi }}</td>
                                                        <td>{{ $item->category->name }}</td>
                                                        <td>{{ $item->tarif }}</td>
                                                        <td>
                                                            <form action="order/{{ $item->id }}" method="POST"
                                                                style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-md delete-action">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".delete-action");
    
            deleteButtons.forEach((button) => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
    
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won\'t be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika ingin submit form yang terletak di parent button
                            button.parentElement.submit();
    
                            // Jika ingin melakukan redirect setelah SweetAlert ditutup
                            Swal.fire('Deleted!', 'Transaction deleted successfully.', 'success').then(() => {
                                window.location.href = 'dashboard';
                            });
                        }
                    });
                });
            });
        });
    </script>
    
    
@endsection
