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
    <!-- Judul form, menyesuaikan apakah sedang menambah atau mengedit produk -->
    <h2><?php echo e(isset($product) ? 'Edit Product' : 'Add Product'); ?></h2>
    
    <!-- Form untuk menambah atau mengedit produk -->
    <form method="POST" action="<?php echo e($action); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Input untuk nama produk -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="<?php echo e(old('name') ?? $product->name ?? ''); ?>" required>
        </div>

        <!-- Input untuk deskripsi produk -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required><?php echo e(old('description') ?? $product->description ?? ''); ?></textarea>
        </div>

        <!-- Input untuk harga produk -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" name="price" id="price" class="form-control"
                   value="<?php echo e(old('price') ?? $product->price ?? ''); ?>" required>
        </div>

        <!-- Dropdown untuk memilih kategori produk -->
        <div class="mb-3">
            <label for="product_category_id" class="form-label">Category</label>
            <select name="product_category_id" id="product_category_id" class="form-select" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"
                        <?php echo e((old('product_category_id') ?? $product->product_category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Input untuk mengunggah foto produk -->
        <div class="mb-3">
            <label for="photo" class="form-label">Product Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            <?php if(isset($product) && $product->photo): ?>
                <img src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="Product Photo" class="img-thumbnail mt-2" width="150">
            <?php endif; ?>
        </div>

        <!-- Tombol untuk menyimpan data -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
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
<?php /**PATH C:\laragon\www\online-shop\resources\views/products/form.blade.php ENDPATH**/ ?>