
    <div class="mt-5">
        <?php
        switch ($selected_method) {
            case 'bank_transfer':
                include '../includes/payment_bank_transfer.php';
                break;
            case 'ewallet':
                include '../includes/payment_ewallet.php';
                break;
            default:
                echo '<div class="alert alert-danger">Metode pembayaran tidak valid.</div>';
                break;
        }
        ?>
    </div>
