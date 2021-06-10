<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome User</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div> -->

<div class="container">

    <br>
    <div class="row">

        <div class="col-md-6">
            <form method="POST" action="<?php echo base_url('Ordering/insertOrders'); ?>">
                <h4>Burger Meals</h4>
                <table class="table table-hover" border="1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $burgerResults;
                        $burgerResult;
                        if ($burgerResults = 1) {

                            foreach ($burgerResult as $row) {
                        ?>
                                <tr style="cursor: pointer" class="clickable-row-service">
                                    <td>
                                        <input type="checkbox" name="burgerId[]" value="<?php echo $row->burgerId; ?>" />
                                    </td>
                                    <td>
                                        <?php echo $row->burgerDescription; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->burgerPrice; ?>
                                    </td>

                                </tr>

                            <?php } ?>
                    </tbody>
                <?php } ?>

                </table>

                <?php echo $this->pagination_bootstrap->render(); ?>



        </div>
        <div class="col-md-6">
            <h4>Beverages Meals</h4>
            <table class="table table-hover" border="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result;
                    if ($results = 1) {

                        foreach ($result as $row) {
                    ?>
                            <tr style="cursor: pointer" class="clickable-row-service">
                                <td>
                                    <input type="checkbox" name="beveragesId[]" value="<?php echo $row->beveragesId; ?>" />
                                </td>
                                <td>
                                    <?php echo $row->beveragesDescription; ?>
                                </td>
                                <td>
                                    <?php echo $row->beveragesPrice; ?>
                                </td>

                            </tr>

                        <?php } ?>
                </tbody>
            <?php } ?>
            </table>



            <?php echo $this->pagination_bootstrap->render(); ?>

        </div>




    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Combo Meals</h4>
            <table class="table table-hover" border="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($comboResults = 1) {

                        foreach ($comboResult as $row) {
                    ?>
                            <tr style="cursor: pointer" class="clickable-row-service">
                                <td>
                                    <input type="checkbox" name="combomealsId[]" value="<?php echo $row->combomealsId; ?>" />
                                </td>
                                <td>
                                    <?php echo $row->comboMeals; ?>
                                </td>
                                <td>
                                    <?php echo $row->comboPrice; ?>
                                </td>

                            </tr>

                        <?php } ?>
                </tbody>
            <?php } ?>
            </table>



            <?php echo $this->pagination_bootstrap->render(); ?>

        </div>
        <div class="col-md-6 col-md-offset-4">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Enter Coupon: </h1>
                    <p class="lead">
                        <input type="text" name="txtCoupon" id="txtCoupon" onkeyup="checkCouponCode()">
                    </p>
                    <p>Valid code is <code>GO2018</code></p>
                    <div id="ack"></div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-info btn-lg" id="btnSubmit">Add to CheckOut</button>
    <a title="Summary" style="float:right;right:55px" href='<?php echo base_url('Ordering/OrderSummaryView'); ?>'>View Orders</a>
    </form>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        btnSubmit.disabled = false;
    });

    function checkCouponCode() {
        var validCoupon = 'GO2018';
        var inputCode = document.getElementById("txtCoupon").value;
        //document.getElementById("ack").innerHTML= inputCode;
        if (inputCode == "") {
            document.getElementById("ack").innerHTML = "<span style='font-size:25px;background-color:#4287f5'>Empty</span>";
            btnSubmit.disabled = false;

        } else if (validCoupon != inputCode) {
            document.getElementById("ack").innerHTML = "<span style='font-size:25px;background-color:#f2110a'>Invalid Coupon Code</span>";
            btnSubmit.disabled = true;
        } else {
            document.getElementById("ack").innerHTML = "<span style='font-size:25px;background-color:#0af25b'>Valid Coupon Code</span>";
            btnSubmit.disabled = false;
        }
    }
</script>