@extends('layouts.app')

@section('title')
    Organization
@endsection

@section('style')
    <style></style>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin: 25px;">
            <section class="content-header">
                <h2>Organization </h2>
            </section>
            <a type="button" href="{{ route('super.admin.organization.create') }}" class="btn btn-primary"
                style="width: 141px;">Add Organization</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grade-table">
                        <table class="table" id="organization_table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone Number</th>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let url = '{{ route('super.admin.organization') }}'
            let editUrl = '{{ route('super.admin.organization.edit', 123) }}'
            editUrl = editUrl.replace(123, '')
            $('#organization_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url
                },
                columns: [{
                        data: function(row) {
                            return '<a href="organization/users/' + row.id + '">' + row.name +
                                '</a>'
                        },
                        name: 'id'
                    },
                    {
                        data: 'plan.name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'contact_number'
                    },
                    {
                        data: function(row) {
                            return '<a  href="' + editUrl + row.id +
                                '" class="btn action-btn btn-primary btn-sm edit-btn mr-1" data-id="' +
                                row.id + '">Edit</a>' +
                                '<Button class="btn action-btn btn-danger btn-sm delete" data-id="' +
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
