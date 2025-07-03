@extends('admin.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Rol İzin Yönetimi </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Yetkilendirme</h4>
                      <p class="card-description"> İlgili role ait yetkilendirmeleri buradan yapabilirsiniz. </p>
                      <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')

                        {{-- Rol Adı --}}
                        <div class="form-group">
                            <label for="role_name">Rol Adı</label>
                            <input type="text" name="name" class="form-control" id="role_name"
                                value="{{ $role->name }}" placeholder="Rol adı" required>
                        </div>

                        {{-- Yetkiler --}}
                        <div class="form-group">
                            <label>Yetkiler</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->name }}"
                                                class="form-check-input"
                                                id="perm_{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                {{ ucfirst($permission->name) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Submit Butonları --}}
                        <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">Geri Dön</a>
                    </form>
                    
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                    2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                        href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                        templates</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
