@extends('components.app')
@section('title', 'Error Page')
@section('content')
<body class="error-page">

    <div class="main-wrapper">
        <div class="error-box">
            <h1>404</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-circle"></i> Oops! Page not found!</h3>
            <p class="h4 font-weight-normal">The page you requested was not found.</p>
            <a href="index.html" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
    
@endsection
