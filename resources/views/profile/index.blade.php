@extends('layouts.template')

@section('content')
<style>
    /* Custom styling for the Edit Profile page */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin: 50px auto;
        max-width: 600px;
        transition: all 0.3s ease-in-out;
    }

    .container:hover {
        transform: translateY(-10px);
    }

    h2 {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 40px;
        color: #333;
        text-align: center;
    }

    .profile-details {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-details img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-details h3 {
        font-size: 22px;
        margin-top: 20px;
        font-weight: bold;
        color: #333;
    }

    .profile-details p {
        font-size: 16px;
        color: #666;
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        font-size: 16px;
        font-weight: 600;
        color: #444;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    input[type="text"], input[type="password"], input[type="file"] {
        width: 100%;
        padding: 15px 20px;
        font-size: 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="file"] {
        padding: 10px;
        height: 45px;
        background-color: #f9f9f9;
        box-sizing: border-box;
    }

    input[type="file"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .form-group-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .form-group-flex input[type="file"] {
        flex: 1;
        margin-right: 15px;
    }

    .form-group-flex button {
        flex-shrink: 0;
        background-color: #007bff;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group-flex button:hover {
        background-color: #0056b3;
        box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: center;
    }

    .text-danger {
        font-size: 12px;
        color: #e3342f;
        margin-top: 5px;
    }
</style>
<div class="container">
    <h2>Edit Profil</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Display current profile information -->
    <div class="profile-details">
        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://via.placeholder.com/150' }}" alt="Profile Photo">
        <h3>{{ $user->nama }}</h3>
        <p>Username: {{ $user->username }}</p>
    </div>

    <form action="{{ url('profile/update_profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group-flex">
            <input type="file" name="avatar" id="avatar" class="form-control">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        @error('avatar')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </form>
    <br></br>
    <hr class="divider">

    <form action="{{ url('profile/update_informasi') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
