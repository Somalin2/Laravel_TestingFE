<html>
    <head></head>
    <body>
    <?php if(count($tests) > 0): ?>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>DESC</td>
            </tr>
            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $test->id; ?></td>
                <td><?php echo $test->name; ?></td>
                <td><?php echo $test->description; ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
    </body>
</html>
<?php /**PATH /Users/macbook/shopping/resources/views/test/index.blade.php ENDPATH**/ ?>