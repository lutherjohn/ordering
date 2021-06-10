<div class="modal fade" id="OrderSummaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><?php echo $title; ?> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    if($OrderSummarys = 1){
                        foreach($OrderSummary as $row){
                ?>
                <p>
                    Name: <b><?php echo $row->customer; ?></b>
                </p>
                <?php
                    if($row->couponCode == ""){
                ?>
                    <table class="table table-hover" border="1">
                    <tr>
                        <thead>
                            <th>Burger Meals</th>
                            <th>Beverages Meals</th>
                            <th>Combo Meals</th>
                            <th>Coupon Code</th>
                            <th>Less Purchase by 10%</th>
                        </thead>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                $burgerDescription = $row->burgerDescription;
                                foreach(explode(" ",$burgerDescription) as $burgers){
                            ?>
                                <?php echo $burgers; ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $beveragesDescription = $row->beveragesDescription;
                                foreach(explode(" ",$beveragesDescription) as $beverages){
                            ?>
                                <?php echo $beverages; ?>
                            <?php 
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $comboMeals = $row->comboMeals;
                                foreach(explode(",",$comboMeals) as $comboMeals){
                            ?>
                                <?php echo $comboMeals; ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                        <?php 
                            $couponCode;
                            if($row->couponCode == ""){
                                $couponCode = "Coupon code is not Used";
                            }
                            else{
                                $couponCode = "GO2018";
                            }
                            echo $couponCode; 
                        ?>
                        </td>
                        <td>No Less</td>
                    </tr>
            
                </table>
                <?php
                    }
                    else{
                ?>
                    <table class="table table-hover" border="1">
                    <tr>
                        <thead>
                            <th>Burger Meals</th>
                            <th>Beverages Meals</th>
                            <th>Combo Meals</th>
                            <th>Coupon Code</th>
                            <th>Less Purchase by 10%</th>
                        </thead>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                $burgerDescription = $row->burgerDescription;
                                foreach(explode(" ",$burgerDescription) as $burgers){
                            ?>
                                <?php echo $burgers; ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $beveragesDescription = $row->beveragesDescription;
                                foreach(explode(" ",$beveragesDescription) as $beverages){
                            ?>
                                <?php echo $beverages; ?>
                            <?php 
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $comboMeals = $row->comboMeals;
                                foreach(explode(",",$comboMeals) as $comboMeals){
                            ?>
                                <?php echo $comboMeals; ?>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                        <?php 
                            $couponCode;
                            if($row->couponCode == ""){
                                $couponCode = "Coupon code is not Used";
                            }
                            else{
                                $couponCode = "GO2018";
                            }
                            echo $couponCode; 
                        ?>
                        </td>
                        <td>
                        <?php
                            $totalOrders = 0;
                            $totalOrders = $row->burgerPrice + $row->beveragesPrice + $row->comboPrice;
                            $percentage = 10;

                            $newTotalOrders =  $totalOrders * ($percentage / 100) - $totalOrders;
                        ?>
                            <b> <?php echo $newTotalOrders; ?> </b>
                        </td>
                    </tr>
            
                    </table>
                <?php
                    }                
                ?>
                <labe> 
                    <?php
                        $totalVat = 0;
                        $totalVat = $row->burgerPrice + $row->beveragesPrice + $row->comboPrice;
                        $percentage = 12;

                        $newTotal = ($percentage / 100) * $totalVat + $totalVat;
                    ?>
                    Vat 12% : <b> <?php echo $newTotal;?> </b>
                </labe>
                <label style="float:right;right:55px">
                    <?php
                        $total = 0;
                        $total = $row->burgerPrice + $row->beveragesPrice + $row->comboPrice;
                    
                    ?>
                    Total Order: <b> <?php echo $total; ?> </b>
                </label>
                <?php
                        }
                    }
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function closeModal() {
        $('#OrderSummaryModal').modal('hide');
    }
</script>