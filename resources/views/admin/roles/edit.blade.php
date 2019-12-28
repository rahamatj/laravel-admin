@extends('admin.master')

@section('title', 'Roles - Edit - '. $role->name)

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="row">
                        <div class="col-lg-7">
                            <h2>Roles - Edit - {{ $role->name }}</h2>
                        </div>

                        <div class="col-lg-5 text-right">
                            <a href="{{ route('admin.roles.show', ['role' => $role]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">All</a>
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-success">New</a>
                            <a href="javascript:void(0)"
                                class="btn btn-danger"
                                onclick="if(confirm('Are you sure you want to delete this?')) {
                                            event.preventDefault();
                                            document.getElementById('delete-role-form').submit();
                                        }">
                              Delete
                            </a>
                            <form id="delete-designation-form" method="POST" style="display: none;"
                                  action="{{ route('admin.roles.destroy', ['role' => $role]) }}">
                              @csrf
                              @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ route('admin.roles.update', ['role' => $role]) }}"
                        class="form-horizontal form-label-left" method="post" novalidate>
                        @csrf
                        @method('PATCH')
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="name" required="required" type="text"
                              value="{{ $role->name }}">
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      {{ $errors->first('name') }}
                                  </span>
                              @endif
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                    for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="description" required="required" name="description"
                                        class="form-control col-md-7 col-xs-12">{!! $role->description !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                    for="description">Routes <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="role-routes">
                                @foreach($roleRoutes as $roleRoute)
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                              <input type="checkbox" name="routes[]"
                                                    value="{{ $roleRoute }}"
                                                    @foreach($role->permissions as $permission)
                                                        {{ $permission->route == $roleRoute
                                                                ? 'checked' : '' }}
                                                    @endforeach>
                                              {{ $roleRoute }}
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
                              <button id="send" type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
