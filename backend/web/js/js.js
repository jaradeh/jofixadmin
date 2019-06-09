$('.glyphicon-eye-open').addClass('fa fa-eye');
$('.glyphicon-eye-open').removeClass('glyphicon-eye-open');

$('.glyphicon-pencil').addClass('fa fa-edit');
$('.glyphicon-pencil').removeClass('glyphicon-pencil');

$('.glyphicon-trash').addClass('fa fa-trash');
$('.glyphicon-trash').removeClass('glyphicon-trash');


function makeid(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

$('.addAssignedQoutation').on('click', function () {
    var script = '<script>$(".getPrice").on("input", function () {var id = this.id;var price = $("#" + id).val();var qty = $("#qty_" + id).val();if (qty == 0) {qty = 1;}var total = price * qty;$("#quotation-total_" + id).val(total);});</script>'
    script += "<script>$('.getQuantity').on('input', function () {var id = this.id;var result = id.split('_');id = result[1];var price = $('#' + id).val();var qty = $('#qty_' + id).val();if (qty == 0) {qty = 1;}var total = price * qty;$('#quotation-total_' + id).val(total);});</script>";
    var randID = makeid(5);
    var newData = '<span class="generated"><div class="col-sm-5" style="float:left;"> <label class="control-label" for="quotation-description">Description</label> <input type="text" id="quotation-description" class="form-control" name="AssignedQuotation[' + randID + '][description]" aria-required="true"> <div class="help-block"></div> </div> <div class="col-sm-1" style="float:left;"> <label class="control-label" for="quotation-quantity">QTY</label> <input type="number" id="qty_' + randID + '" class="form-control getQuantity" name="AssignedQuotation[' + randID + '][quantity]" value="0" aria-required="true"> <div class="help-block"></div> </div> <div class="col-sm-1" style="float:left;"> <label class="control-label" for="quotation-unit">Unit</label> <input type="text" id="quotation-unit" class="form-control" name="AssignedQuotation[' + randID + '][unit]" aria-required="true"> <div class="help-block"></div> </div> <div class="col-sm-2" style="float:left;"> <label class="control-label" for="quotation-unit-price">Unit Price</label> <input type="number" id="' + randID + '" class="form-control getPrice" name="AssignedQuotation[' + randID + '][unit-price]" aria-required="true" step="0.01"> <div class="help-block"></div> </div> <div class="col-sm-3" style="float:left;"> <label class="control-label" for="quotation-unit">Total</label> <input type="number" id="quotation-total_' + randID + '" class="form-control calculateAllPrices" readonly="" name="AssignedQuotation[' + randID + '][total]" aria-required="true"> <div class="help-block"></div>  </div><span style="display:none;">' + script + '</span></span>';
    $('#addAssignedQoutationHere').append(newData);
});

$('.removeAssignedQoutation').on('click', function () {
    $('.generated:last').remove();
});

$('.getPrice').on("input", function () {
    var id = this.id;
    var price = $('#' + id).val();
    var qty = $('#qty_' + id).val();
    if (qty == 0) {
        qty = 1;
    }
    var total = price * qty;
    $('#quotation-total_' + id).val(total);
});

$('.getQuantity').on("input", function () {
    var id = this.id;
    var result = id.split('_');
    id = result[1];
    var price = $('#' + id).val();
    var qty = $('#qty_' + id).val();
    if (qty == 0) {
        qty = 1;
    }
    var total = price * qty;
    $('#quotation-total_' + id).val(total);
});


$('#calculateQoutationTotal').on("click", function () {
    var sum = 0;
    $(".calculateAllPrices").each(function () {
        var newEntry = $(this).val();
        sum = parseFloat(sum) + parseFloat(newEntry);
    });
    $('#quotation-sum').val(sum);
    var vatAmount = $('#quotation-vat').val();
    if (vatAmount == 0) {
        vatAmount = 1;
    }
    var totalVatAmount = (sum * vatAmount) / 100;
    $('#quotation-total-vat').val(totalVatAmount);
    var totalAmount = sum + totalVatAmount;
    $('#quotation-price').val(totalAmount);
});

$('#searchBtn').on("click", function () {
    var techID = $('#SearchTech').find(":selected").val();
    var dateFrom = $('#SearchFrom').val();
    var dateTo = $('#SearchTo').val();
    if (techID == "0") {
        techID = "none";
    }
    if (dateFrom == "") {
        dateFrom = "none";
    }
    if (dateTo == "") {
        dateTo = "none";
    }
    if (techID == "none" && dateFrom == "none" && dateTo == "none") {
        alert('Please select at least 1 item to search');
        exit();
    }
    window.location.href = "/backend/web/technicians/finance?searchID=1&techID=" + techID + "&dateFrom=" + dateFrom + "&dateTo=" + dateTo + "";
});