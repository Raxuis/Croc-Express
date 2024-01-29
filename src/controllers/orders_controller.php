<?php
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'orders' && !isset($_GET['order_id'])) {
        $orders = $orderManager->getOrdersByUserId($_SESSION['user_id']);

        if (count($orders) < 1) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Vous n\'avez pas encore de commandes';
            header('Location:index.php');
            exit();
        }
    } else if ($_GET['page'] == 'orders' && isset($_GET['order_id'])) {
        $order = $orderManager->getOne($_GET['order_id']);
        $products = $orderProductManager->getProductsOfOrder($order['id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getPdf'])) {
            try {
                ob_start();
                /* $_GET['order_id'] = $_POST['getPdf']; */
                include PATH_VIEWS . 'orders.php';
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
    }
}
require PATH_VIEWS . 'orders.php';