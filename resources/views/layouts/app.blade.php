<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
</head>
<body>

    <header>
        <h1>Library System</h1>
    </header>

    <nav>
        <a href="/dashboard">Dashboard</a> |
        <a href="/books">Books</a> |
        <a href="/categories">Categories</a> |
        <a href="/members">Members</a>
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>

    <hr>

    <footer>
        <p>Library System</p>
    </footer>

</body>
</html>