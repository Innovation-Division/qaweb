@extends('layouts.account-management')

@section('content')
<div class="account-form-wrapper">
    @include('register.create-account-as')
    @include('register.create-account-as-partner')
    @include('forms.form1-ph')
    @include('forms.form2-ph')
    @include('forms.form2-1-ph')
    @include('forms.form3-ph')
    @include('forms.form4-ph')
    @include('forms.form5-ph')
    @include('forms.form6-otp')
    @include('forms.modal')
</div>
@endsection
