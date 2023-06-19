<?php $__env->startSection('content'); ?>
    <script>
        var token = localStorage.getItem('token');

        $.ajax({
            url: '/api/get-token',
            method: 'POST',
            data: {
                token: token
            },
            success: function(response) {
                console.log('Token sent successfully!');
                // Handle the response from the server if needed
            },
            error: function(xhr, status, error) {
                console.log('Error sending token:', error);
                // Handle the error if needed
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelProjects\Tajeri-web\resources\views/auth/user.blade.php ENDPATH**/ ?>