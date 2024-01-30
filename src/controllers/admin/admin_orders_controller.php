<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$orders = $orderManager->getAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getPdf'])) {
    try {
        ob_start();
        /* $_GET['order_id'] = $_POST['getPdf']; */
        include PATH_VIEWS . 'admin/admin_orders.php';
        $content = ob_get_clean();
        ob_end_clean();
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($content);
        $dompdf->render();
        $dompdf->stream('order_n°' . $_GET['order_id']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


}
require PATH_VIEWS . 'admin/admin_orders.php';
