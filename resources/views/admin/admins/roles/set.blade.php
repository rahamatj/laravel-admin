@extends('admin.master')

@section('title', 'Admins - ' . $admin->name . ' - Set Roles')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                        <h2>{{ $admin->name }} - Set Designations</h2>
                        <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ route('admin.admins.roles.set', ['admin' => $admin]) }}"
                        class="form-horizontal form-label-left" method="post" novalidate>
                        @csrf
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                    for="description">Designations <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ul class="admin-routes">
                                    @foreach($roles as $role)
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="designations[]"
                                                        value="{{ $role->id }}"
                                                        @foreach($admin->roles as $adminRole)
                                                            {{ $adminRole->id == $role->id
                                                                ? 'checked' : '' }}
                                                        @endforeach>
                                                  {{ $role->name }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Set</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection