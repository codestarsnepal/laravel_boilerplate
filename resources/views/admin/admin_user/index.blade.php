@extends('layouts.admin.admin')

@section('title')
    Admin User
@endsection

@section('style')
    <style></style>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin: 25px;">
            <section class="content-header">
                <h2>Organization User</h2>
            </section>
            <a type="button" href="{{ route('admin.user.create') }}" class="btn btn-primary"
                style="width: 141px;">Add User</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grade-table">
                        <table class="table" id="organization_user_table">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Nmae</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let url = '{{ route('admin.user') }}'
            let editUrl = '{{ route('super.admin.organization.edit', 123) }}'
            editUrl = editUrl.replace(123, '')
            $('#organization_user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url
                },
                columns: [{
                        data: 'first_name'
                    },
                    {
                        data: 'last_name'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: function(row) {
                            return '<a  href="#" class="btn action-btn btn-primary btn-sm edit-btn mr-1" data-id="' +
                                row.id + '">Edit</a>' +
                                '<Button class="btn action-btn btn-danger btn-sm" data-id="' +
                                row.id + '">Delete</button>'
                        },
                        name: 'id'
                    }
                ]
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                let grade_id = $(this).attr('data-id')
                let url = "{{ route('super.admin.organization.delete', 123) }}"
                url = url.replace("123", grade_id);
                let tr = $(this).parent('td').parent('tr');
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: 'get',
                                url: url,
                                success: function(res) {
                                    if (JSON.parse(res) == true) {
                                        swal("Your data has been deleted!", {
                                            icon: "success",
                                        });
                                        tr.remove();
                                        location.reload();
                                    } else {
                                        swal("Data not found!");
                                    }
                                }
                            })
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endsection
