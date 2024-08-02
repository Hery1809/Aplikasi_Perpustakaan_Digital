<!-- resources/views/account/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4 text-left">{{ __('Edit Account') }}</h2>

            @if(session('success'))
                <div class="alert alert-success text-left" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('update.account') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3 text-left">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus>
                </div>

                <!-- Email Address Input Field with Tooltip -->
                <div class="form-group mb-3 text-left">
                    <label for="email">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}" required
                        data-bs-toggle="tooltip" data-bs-placement="top" title="The email address is not made public. It will only be used if you need to be contacted about your account or for opted-in notifications.">
                </div>

                <!-- Profile Picture Upload -->
                <div class="form-group mb-3 text-left">
                    <label for="profile_picture">{{ __('Profile Picture') }}</label>
                    <div class="d-flex align-items-center">
                        <!-- Use the default image path initially -->
                        <img id="profile-picture-preview" src="{{ Auth::user()->profile_picture ?? asset('images/blank_picture.jpg') }}" width="160" height="160" alt="Profile Picture" class="img-responsive me-3" loading="lazy">
                        <input id="profile_picture" type="file" class="form-control" name="profile_picture" onchange="previewImage(event)">
                    </div>
                </div>

                <!-- Info Input Field -->
                <div class="form-group mb-3 text-left">
                    <label for="info">{{ __('Info') }}</label>
                    <input id="info" type="text" class="form-control" name="info" value="{{ old('info', Auth::user()->info) }}">
                </div>

                <!-- Social Authentications Box -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a aria-controls="edit-social-auth--content" aria-expanded="false" aria-pressed="true" data-bs-toggle="collapse" role="button" class="panel-title collapsed no-underline" href="#edit-social-auth--content">
                            {{ __('Social Authentications') }}
                        </a>
                    </div>
                    <div id="edit-social-auth--content" class="collapse">
                        <div class="card-body">
                            <table data-drupal-selector="edit-accounts" class="responsive-enabled table table-hover table-striped" id="edit-accounts" data-striping="1" data-once="tableresponsive">
                                <thead>
                                    <tr>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Network') }}</th>
                                        <th>{{ __('Provider User ID') }}</th>
                                        <th>{{ __('Operations') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-drupal-selector="edit-accounts-social-auth-facebook" class="odd">
                                        <td></td>
                                        <td>facebook</td>
                                        <td>-</td>
                                        <td>
                                            <div data-drupal-selector="edit-accounts-social-auth-facebook-operations" class="btn-group dropdown">
                                                <button formnovalidate="formnovalidate" class="btn-xs button js-form-submit form-submit btn-default btn" data-dropdown-target="#dropdown-item-facebook" type="submit" name="op" value="Authenticate">
                                                    {{ __('Authenticate') }}
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li role="menuitem">
                                                        <a href="/user/login/facebook?destination=/user/{{ Auth::id() }}/edit" formnovalidate="formnovalidate" id="dropdown-item-facebook" class="hidden">
                                                            {{ __('Authenticate') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-drupal-selector="edit-accounts-social-auth-google" class="even">
                                        <td><span title="Connected" data-drupal-selector="edit-accounts-social-auth-google-status">✔️</span></td>
                                        <td>google</td>
                                        <td>115924984297436912362</td>
                                        <td>
                                            <div data-drupal-selector="edit-accounts-social-auth-google-operations" class="btn-group dropdown">
                                                <button formnovalidate="formnovalidate" class="btn-xs button js-form-submit form-submit btn-default btn" data-dropdown-target="#dropdown-item-google" type="submit" name="op" value="Authenticate">
                                                    {{ __('Authenticate') }}
                                                </button>
                                                <button class="btn-default btn-xs btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">{{ __('Toggle Dropdown') }}</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li role="menuitem">
                                                        <a href="/user/login/google?destination=/user/{{ Auth::id() }}/edit" formnovalidate="formnovalidate" id="dropdown-item-google" class="hidden">
                                                            {{ __('Authenticate') }}
                                                        </a>
                                                    </li>
                                                    <li role="menuitem">
                                                        <a href="/admin/social-auth/profiles/{{ Auth::id() }}/delete" formnovalidate="formnovalidate" id="ajax-link-delete">
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

                <!-- Current Password Input Field -->
                <div class="form-group mb-3 text-left">
                    <label for="current_password">{{ __('Current Password') }}</label>
                    <input id="current_password" type="password" class="form-control" name="current_password">
                    <small class="form-text text-muted">
                        {{ __('Required if you want to change the Email address or Password below. ') }}
                        <a href="{{ route('password.request') }}">{{ __('Reset your password.') }}</a>
                    </small>
                </div>

                <!-- Password Input Field -->
                <div class="form-group mb-3 text-left">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" oninput="updatePasswordStrength()">

                    <!-- Password Strength Meter -->
                    <div class="mt-2">
                        <div id="password-strength-meter" class="progress">
                            <div id="strength-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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

                <!-- Confirm Password Input Field -->
                <div class="form-group mb-3 text-left">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>

                <!-- Checker Input Field with Label for Save Downloads History -->
                <div class="form-group mb-3 text-left">
                    <div class="form-check">
                        <input data-drupal-selector="edit-field-downloads-history-value" class="form-check-input" type="checkbox" id="edit-field-downloads-history-value" name="field_downloads_history[value]" value="1">
                        <label class="form-check-label" for="edit-field-downloads-history-value">
                            {{ __('Save Downloads History') }}
                        </label>
                    </div>
                </div>

                <!-- Checker Input Field with Label for Newsletter -->
                <div class="form-group mb-3 text-left">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newsletter-checkbox" name="newsletter_checkbox" value="1">
                        <label class="form-check-label" for="newsletter-checkbox">
                            {{ __('Check the box to receive our daily newsletter with recent eBook freebies and discounts.') }}
                        </label>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="form-group mt-3 text-left">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profile-picture-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Initialize Bootstrap tooltips
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Update password strength and recommendations
function updatePasswordStrength() {
    var passwordField = document.getElementById('password');
    var recommendations = document.getElementById('password-recommendations');
    var strengthText = document.getElementById('password-strength');
    var strengthBar = document.getElementById('strength-bar');

    var password = passwordField.value;
    var strength = getPasswordStrength(password);

    if (password.length > 0) {
        recommendations.style.display = 'block';
        if (strength === 'Strong') {
            recommendations.style.display = 'none';
            strengthBar.className = 'progress-bar bg-success';
            strengthBar.style.width = '100%';
        } else if (strength === 'Moderate') {
            strengthBar.className = 'progress-bar bg-warning';
            strengthBar.style.width = '50%';
        } else {
            strengthBar.className = 'progress-bar bg-danger';
            strengthBar.style.width = '25%';
        }
        strengthText.textContent = strength;
    } else {
        recommendations.style.display = 'none';
        strengthBar.className = 'progress-bar bg-danger';
        strengthBar.style.width = '0%';
        strengthText.textContent = 'Password strength: Weak';
    }
}

// Get password strength
function getPasswordStrength(password) {
    var strength = 'Weak';
    if (password.length >= 12) {
        strength = 'Moderate';
        if (/[a-z]/.test(password) && /[A-Z]/.test(password) && /[0-9]/.test(password) && /[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            strength = 'Strong';
        }
    }
    return 'Password strength: ' + strength;
}
</script>
@endsection

<style>
/* Custom CSS to remove underline and blue color from link */
.no-underline {
    text-decoration: none !important;
    color: inherit !important;
}

/* Optional: add hover effect if needed */
.no-underline:hover {
    color: inherit;
    text-decoration: none;
}
</style>
