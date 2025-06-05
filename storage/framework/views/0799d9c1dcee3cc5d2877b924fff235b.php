<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0a274b; /* Warna biru */
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff; /* Warna putih untuk teks */
        }
        .nav-link {
            color: #fff; /* Warna putih untuk link */
        }
        .nav-link:hover {
            color: #ffd700; /* Warna kuning untuk hover */
        }
        .btn-dark {
            background-color: #0a274b; /* Warna biru */
            border-color: #0a274b;
        }
        .btn-dark:hover {
            background-color: #ffd700; /* Warna kuning */
            border-color: #ffd700;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Online Shop</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('products.index')); ?>">Products</a></li>
        </ul>
    </div>
</nav>
<div class="container mb-5">
    <!-- Tempat untuk konten dinamis -->
    <?php echo e($slot); ?>

</div>
</body>
</html>
<?php /**PATH C:\laragon\www\online-shop\resources\views/components/template.blade.php ENDPATH**/ ?>