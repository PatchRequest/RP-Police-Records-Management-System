@extends('layout')


@section('content')
    <div class="box">
        <div class="box-body">

            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Rolle</th>
                    @foreach($allPermissions as $permission)
                        <th scope="col">{{ $permission->name }}</th>

                    @endforeach

                </tr>
                </thead>
                <tbody>
                @foreach($allRoles as $role)
                    <tr>
                        <th scope="row">{{ $role->name }}</th>
                        @foreach($allPermissions as $permission)

                            <form method="POST" action="/permissions">

                                <div class="form-check">
                                    <input type="hidden" value="{{ $permission->id }}" name="permission">
                                    <input type="hidden" value="{{ $role->id }}" name="role">
                                    @csrf


                                    <th scope="col" ><input type="checkbox"  class="flat-red" onchange="this.form.submit()"   {{ ($role->hasPermissionTo($permission->name)) ? "checked" : "" }} ></th>

                                </div>

                            </form>

                        @endforeach

                    </tr>
                @endforeach





                </tbody>
            </table>
        </div>
    </div>





@endsection


