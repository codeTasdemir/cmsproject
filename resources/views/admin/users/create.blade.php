@extends('admin.layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">  Yeni Kullanıcı Ekle </h3>
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
                      <h4 class="card-title">Kullanıcı Bilgileri</h4>
                      <p class="card-description"> Yeni Kullanıcınızı aşağıdaki formu doldurarak oluşturabilirsiniz. </p>
                      <form action="{{ route('users.store') }}" method="POST" class="forms-sample">
                        @csrf
                    
                        {{-- Kullanıcı Adı --}}
                        <div class="form-group">
                            <label for="username">Ad Soyad</label>
                            <input type="text" name="name" class="form-control" id="username"
                                   value="{{ old('name') }}" placeholder="Kullanıcı Adı" required>
                        </div>
                    
                        {{-- E-posta --}}
                        <div class="form-group">
                            <label for="email">E-Posta Adresi</label>
                            <input type="email" name="email" class="form-control" id="email"
                                   value="{{ old('email') }}" placeholder="E-posta" required>
                        </div>
                    
                        {{-- Şifre --}}
                        <div class="form-group">
                            <label for="password">Şifre</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Şifre" required>
                        </div>
                    
                        {{-- Şifre Tekrar --}}
                        <div class="form-group">
                            <label for="password_confirmation">Şifre Tekrar</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Şifre Tekrar" required>
                        </div>
                    
                        {{-- Rol Seçimi --}}
                        <div class="form-group">
                            <label for="role">Rol Seç</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" disabled selected>Rol seçin</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        {{-- Submit Butonu --}}
                        <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                        <a href="{{ route('users.index') }}" class="btn btn-dark">İptal</a>
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
