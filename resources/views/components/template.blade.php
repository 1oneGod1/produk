<!DOCTYPE html>
<html>
<head>
{{-- Judul halaman --}}
<title>Produk App - {{ $title ?? 'Laravel' }}</title>
{{-- Load Bootstrap CSS dan JS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
{{-- Navigasi utama --}}
<nav class="navbar navbar-expand-lg bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
    </div>
</nav>
<div class="container">
    {{-- Konten halaman --}}
    {{ $slot }}
</div>
</body>
</html>
