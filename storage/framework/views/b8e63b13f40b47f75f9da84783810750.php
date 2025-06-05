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
    <div class="text-center py-5 bg-light rounded shadow-sm">
        <!-- Judul utama halaman beranda -->
        <h1 class="display-4 fw-bold">Discover Our Products</h1>
        
        <!-- Deskripsi singkat tentang produk -->
        <p class="lead text-muted">Explore our collection of high-quality products!</p>

        <!-- Tombol untuk menuju halaman produk -->
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-dark btn-lg px-4">Shop Now</a>
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
<?php /**PATH C:\laragon\www\online-shop\resources\views/home.blade.php ENDPATH**/ ?>