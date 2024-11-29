<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Login</h1>
            <form action="{{ route('login') }}" method="POST" class="w-50 mx-auto">
                @csrf
                <div class="d-flex col-12 justify-content-between align-items-center gap-2 mb-3">
                    <button type="button" class="btn btn-sm btn-success col-6" onclick="typeOn('email')" id="emailBtn">Email</button>
                    <button type="button" class="btn btn-sm btn-success col-6" onclick="typeOn('username')" id="usernameBtn">Username</button>
                </div>
                <div id="emailInput" class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email">
                </div>
                <div id="usernameInput" style="display: none" class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </body>

    <script>
        var email = document.getElementById('emailInput');
        var username = document.getElementById('usernameInput');
        function typeOn(param) {
            if (param == 'username') {
                email.style.display = 'none';
                username.style.display = 'block';
                document.getElementById('usernameBtn').classList.add(' active ');
                document.getElementById('emailBtn').classList.remove(' active ');
            } else {
                email.style.display = 'block';
                username.style.display = 'none';
                document.getElementById('usernameBtn').classList.remove(' active ');
                document.getElementById('emailBtn').classList.add(' active ');
            }
        }
    </script>
</html>
