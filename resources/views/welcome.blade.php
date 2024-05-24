<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">URL Shortener</h1>
                <form action="{{ route('shorten') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="url">Enter URL:</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Shorten</button>
                </form>
                @if(session('shortenedUrl'))
                <div class="alert alert-success mt-3">
                    Shortened URL: <a href="{{ session('shortenedUrl') }}" target="_blank">{{ session('shortenedUrl') }}</a>
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>