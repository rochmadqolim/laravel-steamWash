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

        <!-- Modal Detail-->
            <div class="modal fade" id="detailModal{{ Auth::user()->id }}" tabindex="-1" role="dialog"
                aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="update-form-{{ Auth::user()->id }}" action="update/{{ Auth::user()->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" class="form-control" id="username" name="username"
                                        value="{{ Auth::user()->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::user()->fullname }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Modal Detail-->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Profile</h3>

                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($user = Auth::user())
                                            <tr>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#detailModal{{ $user->id }}"
                                                        class="btn btn-primary fs-5">
                                                        Update
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const updateForm = document.getElementById('update-form-{{ Auth::user()->id }}');
    
            updateForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission
    
                // Simulate an AJAX request or fetch API to send form data to the server
                fetch(updateForm.action, {
                    method: updateForm.method,
                    body: new FormData(updateForm)
                })
                .then(response => {
                    if (response.ok) {
    
                            Swal.fire('Updated!', 'User details have been updated successfully.', 'success').then(() => {
                            window.location.href = 'user';
                        });
                

                    } else {
                        // If the update fails, show an error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'There was an error updating the user details.'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle other errors if needed
                });
            });
        });
    </script>
    
@endsection

