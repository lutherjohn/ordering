<?php defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL & ~E_NOTICE);
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Transaction</h1>
    </div>
</div>

<div class="container">
    <div class="row">

        <table class="table table-hover" border="1">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Burger</th>
                    <th scope="col">Beverages</th>
                    <th scope="col">Combo Meal</th>
                    <th scope="col">Coupon Code</th>
                    <th scope="col">Total Order</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <?php
            if ($Orders = 1 || is_array($Orders) || is_object($Orders)) {
                foreach ($Order as $rows) {
            ?>

                    <tr>
                        <td>
                            <?php echo $rows->customer; ?>
                        </td>
                        <td>
                            <?php
                            //$data = array();
                            $burger = $rows->burgerPrice;

                            //$explodeBurgers = ;

                            foreach (explode(",", $burger) as $row) {
                            ?>

                                <?php echo "{$row}"; ?>
                            <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php echo $rows->beveragesPrice; ?>
                        </td>
                        <td>
                            <?php echo $rows->comboPrice; ?>
                        </td>
                        <td>
                            <?php
                            $couponCode;
                            if ($rows->couponCode == "") {
                                $couponCode = "Coupon code is not Used";
                            } else {
                                $couponCode = "GO2018";
                            }
                            echo $couponCode;
                            ?>
                        </td>
                        <td>
                            <?php
                            $total = 0;
                            $total = $rows->burgerPrice + $rows->beveragesPrice + $rows->comboPrice;

                            ?>
                            <?php echo $total; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="getOrderById(<?php echo $rows->orderId; ?>)">
                                <i class="bi bi-collection-fill"></i>
                                View Summary
                            </button>

                        </td>
                    </tr>

            <?php
                }
            } else {
                echo 'error';
            }

            ?>
        </table>


        <?php echo $this->pagination_bootstrap->render(); ?>
    </div>
    <a title="Summary" style="float:right;right:55px" href='<?php echo base_url('Ordering/index'); ?>'>Back</a>


    <br>
    <br>
    <div id="ph_modal"></div>
</div>

<script type="text/javascript">
    $getId = 0;

    function getOrderById(setId) {
        $getId = setId;
        //alert($getId);
        launchOrderSummaryModal($getId);
    }

    function launchOrderSummaryModal($getId) {

        $('#ph_modal').load('<?php echo base_url() . 'Ordering/orderSummaryLoad/'; ?>' + $getId, function() {
            $('#OrderSummaryModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });

    }
</script>