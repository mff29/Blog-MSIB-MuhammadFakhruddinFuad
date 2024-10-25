@extends('layouts.app2')
@section('title', 'Profile')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="m-0 text-center">Profile</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <section>
                                    <header>
                                        <h2 class="h4">
                                            {{ __('Profile Information') }}
                                        </h2>
                                    </header>
                                
                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                        @csrf
                                    </form>
                                
                                    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                                        @csrf
                                        @method('patch')
                                
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                            @if ($errors->get('name'))
                                                <div class="text-danger mt-1">
                                                    @foreach ($errors->get('name') as $error)
                                                        <small>{{ $error }}</small><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                            @if ($errors->get('email'))
                                                <div class="text-danger mt-1">
                                                    @foreach ($errors->get('email') as $error)
                                                        <small>{{ $error }}</small><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                
                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                <div class="mt-2">
                                                    <p class="text-muted">
                                                        {{ __('Your email address is unverified.') }}
                                                        <button form="send-verification" class="btn btn-link p-0 align-baseline">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>
                                
                                                    @if (session('status') === 'verification-link-sent')
                                                        <p class="text-success mt-1">
                                                            {{ __('A new verification link has been sent to your email address.') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                
                                        <div class="d-flex align-items-center gap-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                
                                            @if (session('status') === 'profile-updated')
                                                <p
                                                    x-data="{ show: true }"
                                                    x-show="show"
                                                    x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-white mb-0 badge bg-success"
                                                >{{ __('Saved') }}</p>
                                            @endif
                                        </div>
                                    </form>
                                </section>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <section>
                                    <header>
                                        <h2 class="h4">
                                            {{ __('Update Password') }}
                                        </h2>
                                    </header>
                                
                                    <form method="post" action="{{ route('password.update') }}" class="mt-4">
                                        @csrf
                                        @method('put')
                                
                                        <div class="mb-3">
                                            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                                            <input type="password" id="update_password_current_password" name="current_password" class="form-control" autocomplete="current-password">
                                            @if ($errors->updatePassword->get('current_password'))
                                                <div class="text-danger mt-1">
                                                    @foreach ($errors->updatePassword->get('current_password') as $error)
                                                        <small>{{ $error }}</small><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                                            <input type="password" id="update_password_password" name="password" class="form-control" autocomplete="new-password">
                                            @if ($errors->updatePassword->get('password'))
                                                <div class="text-danger mt-1">
                                                    @foreach ($errors->updatePassword->get('password') as $error)
                                                        <small>{{ $error }}</small><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
                                            @if ($errors->updatePassword->get('password_confirmation'))
                                                <div class="text-danger mt-1">
                                                    @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                                                        <small>{{ $error }}</small><br>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                
                                        <div class="d-flex align-items-center gap-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                
                                            @if (session('status') === 'password-updated')
                                                <p
                                                    x-data="{ show: true }"
                                                    x-show="show"
                                                    x-transition
                                                    x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-white mb-0 badge bg-success"
                                                >{{ __('Saved.') }}</p>
                                            @endif
                                        </div>
                                    </form>
                                </section>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <section class="mb-4">
                                    <header>
                                        <h2 class="h4">
                                            {{ __('Delete Account') }}
                                        </h2>
                                
                                        <p class="text-muted">
                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                        </p>
                                    </header>
                                
                                    <button class="btn btn-danger mt-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmUserDeletionModal"
                                    >
                                        {{ __('Delete Account') }}
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="{{ route('profile.destroy') }}">
                                                    @csrf
                                                    @method('delete')
                                
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                
                                                    <div class="modal-body">
                                                        <p class="text-muted">
                                                            {{ __('Silahkan masukkan password untuk menghapus akun anda!') }}
                                                        </p>
                                
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                                            <input
                                                                id="password"
                                                                name="password"
                                                                type="password"
                                                                class="form-control"
                                                                placeholder="{{ __('Password') }}"
                                                            >
                                                            @if ($errors->userDeletion->get('password'))
                                                                <div class="text-danger mt-1">
                                                                    @foreach ($errors->userDeletion->get('password') as $error)
                                                                        <small>{{ $error }}</small><br>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
