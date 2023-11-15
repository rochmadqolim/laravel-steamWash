@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ Auth::user()->fullname }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Order Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="order" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Pemilik</label>
                                            <input type="hidden" id="pemilik_id" name="pemilik_id"
                                                value="{{ Auth::user()->id }}">
                                            <input type="text" class="form-control" value="{{ Auth::user()->fullname }}"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_polisi">Nomer Polisi</label>
                                            <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kendaraan</label>
                                            <select name="category_id" id="category" class="form-control select2"
                                                style="width: 100%">
                                                <option selected="selected">Choose Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-5 float-right mt-5">
                                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Order">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Price List
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 550px;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jenis Name</th>
                                        <th>Tarif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> {{ $item->name }}</td>
                                            <td> {{ $item->price }}</td>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderForm = document.querySelector('form[action="order"]');

            orderForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch(this.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        Swal.fire('Success!', 'Your order has been placed.', 'success').then(() => {
                            window.location.href = 'dashboard';
                        });
                    } else {
                        Swal.fire('Error!', 'There was an error placing your order.', 'error');
                    }
                }).catch(error => {
                    console.error('There was an error!', error);
                });
            });
        });
    </script>
@endsection
