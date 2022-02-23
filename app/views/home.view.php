<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>
<!-- MODALS START -->

<!-- Enter Amount Modal Start -->
<div class="modal fade js-amount-paid" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Checkout</h4>
            </div>
            <div class="modal-body">
                <input type="text" class="js-amount-paid-input form-control" placeholder="Enter amount paid" autofocus>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="reset_paid_amount();" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-dismiss="modal">Next</button>
            </div>
        </div>
    </div>
</div>
<!-- Enter Amount Model End -->

<!-- Change Modal Start-->
<div class="modal fade js-change" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Change</h4>
            </div>
            <div class="modal-body">
                <div class="form-control text-center" style="font-size: 30px;">
                    $<span class="js-change-amount">00.00</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="empty_cart();" class="btn btn-primary btn-lg" data-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Change Model End -->

<!-- MODALS END -->
<div class="d-flex">
    <div style="height:600px;" class="shadow-sm col-7 p-4">

        <div class="input-group mb-3">
            <h4> Items &nbsp;</h4>
            <input type=" text" onkeyup="get_data(this.value);" class="ms-4 form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus>
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        </div>

        <div onclick="add_item(event);" class="js-products d-flex " style="flex-wrap: wrap;height: 90%;overflow-y: scroll;">
            <!-- LOAD DATA AJAX -->
        </div>
    </div>

    <div class="col-5 bg-light p-4">

        <div>
            <center>
                <h4>Cart <div class="js-items-count badge bg-primary rounded-circle text-white">0</div>
                </h4>
            </center>
        </div>
        <div class="table-responsive" style="height: 400px;overflow-y:scroll">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <tbody class="js-items">



                </tbody>



            </table>
        </div>
        <div class="alert alert-danger" style="font-size:30px">Total: $<span class="js-total">00.00</span></div>
        <div class="d-flex justify-content-between">
            <button onclick="clear_all();" class="btn btn-outline-danger my-2 px-5">Clear All</button>
            <button id="btnModal" type="button" onclick="show_modal(event);" class="btn btn-success my-2 px-5">Checkout</button>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>