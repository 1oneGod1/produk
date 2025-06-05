<?php if (isset($component)) { $__componentOriginal399ae2c9237569ff3f15049431f24baa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal399ae2c9237569ff3f15049431f24baa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.template','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('template'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Form untuk filter produk -->
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <!-- Dropdown untuk kategori produk -->
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if(request('category') == $category->id): echo 'selected'; endif; ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <!-- Input untuk harga minimum -->
            <input type="number" name="min_price" value="<?php echo e(request('min_price')); ?>" class="form-control" placeholder="Min Price">
        </div>
        <div class="col-md-3">
            <!-- Input untuk harga maksimum -->
            <input type="number" name="max_price" value="<?php echo e(request('max_price')); ?>" class="form-control" placeholder="Max Price">
        </div>
        <div class="col-md-3">
            <!-- Tombol untuk menerapkan filter -->
            <button class="btn btn-dark w-100">Filter</button>
        </div>
    </form>

    <!-- Tombol untuk menambahkan kategori dan produk baru -->
    <div class="text-end mb-3">
        <!-- Tombol untuk menambahkan kategori -->
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-warning me-2">Add Category</a>
        <!-- Tombol untuk menambahkan produk -->
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Add new product</a>
    </div>

    <!-- Daftar produk -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <?php if($product->photo): ?>
                            <img src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="Product Photo" class="img-fluid mb-2" style="max-height: 150px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        <?php endif; ?>
                        <!-- Menampilkan nama produk -->
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        
                        <!-- Menampilkan deskripsi produk dengan batas karakter -->
                        <p class="text-muted"><?php echo e(Str::limit($product->description, 60)); ?></p>
                        
                        <!-- Menampilkan harga produk dalam format Rupiah -->
                        <p class="fw-bold text-dark">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                        <!-- Tombol Edit -->
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <!-- Tombol Delete -->
                        <form method="POST" action="<?php echo e(route('products.destroy', $product->id)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center">No products found.</p>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal399ae2c9237569ff3f15049431f24baa)): ?>
<?php $attributes = $__attributesOriginal399ae2c9237569ff3f15049431f24baa; ?>
<?php unset($__attributesOriginal399ae2c9237569ff3f15049431f24baa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal399ae2c9237569ff3f15049431f24baa)): ?>
<?php $component = $__componentOriginal399ae2c9237569ff3f15049431f24baa; ?>
<?php unset($__componentOriginal399ae2c9237569ff3f15049431f24baa); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\online-shop\resources\views/products/list.blade.php ENDPATH**/ ?>