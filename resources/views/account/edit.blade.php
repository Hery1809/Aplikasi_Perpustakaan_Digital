@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Account') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success text-left" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('update.account') }}" enctype="multipart/form-data" id="account-form">
                        @csrf

                        <div class="form-group mb-3 text-left">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', Auth::user()->name) }}" required autofocus>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="email">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="profile_picture">{{ __('Profile Picture') }}</label>
                            <div class="d-flex align-items-center">
                                <img id="profile-picture-preview"
                                    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/blank_picture.jpg') }}"
                                    width="160" height="160" alt="Profile Picture" class="img-responsive me-3">
                                <input id="profile_picture" type="file" class="form-control" name="profile_picture"
                                    accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="info">{{ __('Info') }}</label>
                            <input id="info" type="text" class="form-control" name="info"
                                value="{{ old('info', Auth::user()->info) }}">
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <a aria-controls="edit-social-auth--content" aria-expanded="false"
                                    data-bs-toggle="collapse" role="button" class="panel-title collapsed"
                                    href="#edit-social-auth--content">
                                    {{ __('Social Authentications') }}
                                </a>
                            </div>
                            <div id="edit-social-auth--content" class="collapse">
                                <div class="card-body">
                                    <table class="responsive-enabled table table-hover table-striped" id="edit-accounts">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Network') }}</th>
                                                <th>{{ __('Provider User ID') }}</th>
                                                <th>{{ __('Operations') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td></td>
                                                <td>facebook</td>
                                                <td>-</td>
                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <button formnovalidate="formnovalidate"
                                                            class="btn-xs button js-form-submit form-submit btn-default btn"
                                                            type="submit" name="op" value="Authenticate">
                                                            {{ __('Authenticate') }}
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li role="menuitem">
                                                                <a href="/user/login/facebook?destination=/user/{{ Auth::id() }}/edit"
                                                                    formnovalidate="formnovalidate" id="dropdown-item-facebook"
                                                                    class="hidden">
                                                                    {{ __('Authenticate') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td><span title="Connected">✔️</span></td>
                                                <td>google</td>
                                                <td>115924984297436912362</td>
                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <button formnovalidate="formnovalidate"
                                                            class="btn-xs button js-form-submit form-submit btn-default btn"
                                                            type="submit" name="op" value="Authenticate">
                                                            {{ __('Authenticate') }}
                                                        </button>
                                                        <button class="btn-default btn-xs btn dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">{{ __('Toggle Dropdown') }}</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li role="menuitem">
                                                                <a href="/user/login/google?destination=/user/{{ Auth::id() }}/edit"
                                                                    formnovalidate="formnovalidate" id="dropdown-item-google"
                                                                    class="hidden">
                                                                    {{ __('Authenticate') }}
                                                                </a>
                                                            </li>
                                                            <li role="menuitem">
                                                                <a href="/admin/social-auth/profiles/{{ Auth::id() }}/delete"
                                                                    formnovalidate="formnovalidate" id="ajax-link-delete">
                                                                    {{ __('Delete') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="current_password">{{ __('Current Password') }}</label>
                            <input id="current_password" type="password" class="form-control" name="current_password">
                            <small class="form-text text-muted">
                                {{ __('Required if you want to change the Email address or Password below.') }}
                                <a href="{{ route('password.request') }}">{{ __('Reset your password.') }}</a>
                            </small>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password"
                                oninput="updatePasswordStrength()">
                            <div class="mt-2">
                                <div id="password-strength-meter" class="progress">
                                    <div id="strength-bar" class="progress-bar" role="progressbar" style="width: 0%;"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small id="password-strength" class="form-text text-muted">
                                    {{ __('Password strength: Weak') }}
                                </small>
                                <div id="password-recommendations" class="mt-2">
                                    <p><strong>{{ __('Recommendations to make your password stronger:') }}</strong></p>
                                    <ul>
                                        <li>{{ __('Make it at least 12 characters') }}</li>
                                        <li>{{ __('Add lowercase letters') }}</li>
                                        <li>{{ __('Add uppercase letters') }}</li>
                                        <li>{{ __('Add numbers') }}</li>
                                        <li>{{ __('Add punctuation') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation">
                        </div>

                        <div class="form-group mb-3 text-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="edit-field-downloads-history-value"
                                    name="field_downloads_history[value]" value="1">
                                <label class="form-check-label" for="edit-field-downloads-history-value">
                                    {{ __('Save Downloads History') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter-checkbox"
                                    name="newsletter_checkbox" value="1">
                                <label class="form-check-label" for="newsletter-checkbox">
                                    {{ __('Check the box to receive our daily newsletter with recent eBook freebies and discounts.') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mt-3 text-left">
                            <button type="submit" class="btn btn-primary" id="save-button">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });

        document.getElementById('account-form').addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with form submission
                    this.submit();
                }
            });
        });

        function updatePasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('strength-bar');
            const passwordStrength = document.getElementById('password-strength');

            let strength = 0;

            if (password.length > 0) {
                strength += password.length * 2;
                if (/[a-z]/.test(password)) strength += 10;
                if (/[A-Z]/.test(password)) strength += 20;
                if (/[0-9]/.test(password)) strength += 20;
                if (/[\W_]/.test(password)) strength += 25;
            }

            strength = Math.min(strength, 100);
            strengthBar.style.width = `${strength}%`;

            if (strength < 50) {
                passwordStrength.textContent = 'Password strength: Weak';
            } else if (strength < 75) {
                passwordStrength.textContent = 'Password strength: Medium';
            } else {
                passwordStrength.textContent = 'Password strength: Strong';
            }
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile-picture-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
@endsection
