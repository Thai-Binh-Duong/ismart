<?php 
    function update_info_cart()
    {
        if (isset($_SESSION['cart'])) {
            $num_order = 0;
            $total = 0;
            foreach ($_SESSION['cart']['buy'] as $item) {
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }

            $_SESSION['cart']['info'] = array(
                'num_order' => $num_order,
                'total' => $total
            );
        }
    }