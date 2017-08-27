var total_price = 0;
var total_pax = 0;
var init_calculate = function() {
    var total_price = 0;
    var total_pax = 0;
    tjq("input[name*='total_']").each(function(index) {
        var num_pax = tjq(this).val();
        var data = tjq(this).attr('data');
        var price_type = tjq("input[name='price_" + data + "']").val();
        tjq("input[name='num_" + data + "']").val(num_pax);
        total_pax = total_pax + parseInt(num_pax);
        total_price = total_price + (parseInt(price_type) * parseInt(num_pax));
        summarySelected(data);
    });
    window.total_price = total_price;
    window.total_pax = total_pax;
    setSummaryDisplay(total_price, total_pax);
}
var reset_price = function(total_price, total_pax) {
    console.log('reset');
    total_price = 0;
    total_pax = 0;
    window.total_price = 0;
    window.total_pax = 0;
    tjq("input[name*='num_'").each(function() {
        tjq(this).val(0);
    });
    tjq("input[name*='total_'").each(function() {
        tjq(this).val(0);
    });
    tjq('label[name*="num_"]').each(function() {
        tjq(this).html('-');
    });
    tjq('label[name*="sum_"]').each(function() {
        tjq(this).html('-');
        tjq(this).parent().hide('fade', 200);
    });
    setSummaryDisplay(total_price, total_pax);
}
var formatPrice = function(price) {
    var value = price;
    var num = value.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    return num;
}
var setTotalPrice = function() {}
var initSummaryDisplay = function() {
    if (tjq("#tpb_tp_id").val() == '') {
        tjq('.customer-select').hide();
    }
}
var summarySelected = function(target) {
    var total_price_type = 0;
    var total_pax_type = tjq('input[name="total_' + target + '"]').val();
    var price_type = tjq('input[name="price_' + target + '"]').val();
    price_type = parseInt(price_type);
    total_price_type = parseInt(total_pax_type) * price_type;
    total_pax_type = (total_pax_type == 0) ? '-' : (total_pax_type + ' x ' + formatPrice(price_type));
    total_price_type = (total_price_type == 0) ? '-' : formatPrice(total_price_type);
    tjq('label.num_' + target).html(total_pax_type);
    tjq('label.sum_' + target).html(total_price_type);
    if (total_pax_type != '-') {
        tjq('label.sum_' + target).parent().show('fade', 200);
        setSummarySelectedStyle();
        if (tjq('.show_promo_discount').length > 0) {
            tjq('.show_promo_discount').removeClass('hidden');
            tjq('.show_promo_discount').show('fade', 200);
            var total_pax_alltype = 0;
            var total_promo_discount_price = 0;
            tjq('input[name*="num_"]').each(function() {
                total_pax_alltype = eval(total_pax_alltype + eval(tjq(this).val()));
            });
            promo_discount_type = tjq('.show_promo_discount').data('dt');
            promo_discount_price = eval(tjq('.show_promo_discount').data('da'));
            if (promo_discount_type == 'B') {
                promo_discount_price = promo_discount_price;
            } else {
                promo_discount_price = eval(promo_discount_price / 100);
            }
            total_promo_discount_price = eval(total_pax_alltype * promo_discount_price)
            tjq('label.num_promo_discount').html(total_pax_alltype + ' x ' + formatPrice(promo_discount_price));
            tjq('label.sum_promo_discount').html('-' + formatPrice(total_promo_discount_price));
        }
    } else {
        tjq('label.sum_' + target).parent().hide('fade', 200);
        setSummarySelectedStyle();
    }
}
var setSummarySelectedStyle = function() {
    var counter = 0;
    tjq('.item-selected').each(function(index) {
        var dis_style = tjq(this).css('display');
        if (dis_style != 'none') {
            if (tjq(this).hasClass('row-odd')) {
                tjq(this).removeClass('row-odd');
            }
            if (tjq(this).hasClass('row-even')) {
                tjq(this).removeClass('row-even');
            }
            switch (counter %= 2) {
                case 0:
                    tjq(this).addClass('row-even');
                    break;
                case 1:
                    tjq(this).addClass('row-odd');
                    break;
                default:
            }
            counter++;
        }
    });
}
var setSummaryDisplay = function(total_price, total_pax) {
    if (total_pax > 0) {
        tjq(".customer-not-select").hide('fade', 200, function() {
            tjq(".customer-select ").show('blind', 300);
            tjq('span.ch_without_ad').addClass('hidden');
        });
        tjq('span.total-price').html(formatPrice(total_price));
        tjq('span.total-pax').html(total_pax);

        var after_price = 0;
        if (tjq('.show_promo_discount').length > 0) {
            promo_discount_type = tjq('.show_promo_discount').data('dt');
            promo_discount_price = eval(tjq('.show_promo_discount').data('da'));
            if (promo_discount_type == 'B') {
                promo_discount_price = promo_discount_price;
            } else {
                promo_discount_price = eval(promo_discount_price / 100);
            }
            total_promo_discount_price = eval(total_pax * promo_discount_price)
            after_price = eval(total_price - total_promo_discount_price);
            tjq('span.total-price').css('text-decoration', 'line-through');
            tjq('.after-price').remove();
            tjq('span.total-price').parent().append('<div class="after-price">' + formatPrice(after_price) + '</div>');
        }
    } else {
        tjq(".customer-select ").hide();
        tjq(".customer-not-select").show('blind', 300);
        tjq('span.total-price').html('-');
        tjq('span.total-pax').html('-');
        tjq(".show_promo_discount").hide();
        tjq('.after-price').remove();
    }
}
var beforeAddNumChild = function(target) {
    var twin = tjq("input[name='total_tpr_price_1ATwin_HT']").val();
    twin = parseInt(twin);
    var single = tjq("input[name='total_tpr_price_1ASingle_HT']").val();
    single = parseInt(single);
    var triple = tjq("input[name='total_tpr_price_3A_HT']").val();
    triple = parseInt(triple);

    var child_bed = tjq("input[name='total_tpr_price_2A1Cbed_HT']").val();
    child_bed = parseInt(child_bed);
    var child_notbed = tjq("input[name='total_tpr_price_2A1CNobed_HT']").val();
    child_notbed = parseInt(child_notbed);

    if (twin + single + triple == 0) {
        msgErr('ch_without_ad');
        return false;
    } else if ((twin / 2 <= (child_bed + child_notbed))) {
        return false;
    }
    return true;
}
var afterSubNumAdult = function(target) {
    var child_prices = ['tpr_price_1A1C_HT', 'tpr_price_2A1Cbed_HT', 'tpr_price_2A1CNobed_HT'];
    var twin = tjq("input[name='total_tpr_price_1ATwin_HT']").val();
    twin = parseInt(twin);
    var max_child = (twin / 2);
    var child_bed = tjq("input[name='total_tpr_price_2A1Cbed_HT']").val();
    child_bed = parseInt(child_bed);
    var child_notbed = tjq("input[name='total_tpr_price_2A1CNobed_HT']").val();
    child_notbed = parseInt(child_notbed);
    var child = child_bed + child_notbed;
    var diff = 0;
    if (max_child < child) {
        diff = child - max_child;
        for (var i = 0; i < diff; i++) {
            if (child_notbed > 0) {
                child_notbed--;
            } else {
                child_bed--;
            }
        }
    }
    tjq('input[name="total_tpr_price_2A1CNobed_HT"]').val(child_notbed);
    tjq('input[name="total_tpr_price_2A1Cbed_HT"]').val(child_bed);
    tjq('input[name="num_tpr_price_2A1CNobed_HT"]').val(child_notbed);
    tjq('input[name="num_tpr_price_2A1Cbed_HT"]').val(child_bed);
    console.log('child bed : ' + tjq('input[name="num_tpr_price_2A1Cbed_HT"]').val());
    console.log('child not bed : ' + tjq('input[name="num_tpr_price_2A1CNobed_HT"]').val());
    init_calculate();
    return true;
}
var msgErr = function(err_code) {
    switch (err_code) {
        case 'ch_without_ad':
            tjq('span.ch_without_ad').removeClass('hidden');
            break;
        default:
    }
    return false;
}
var sub_num_pax = function(target, pax) {
    var num_pax = tjq('input[name="num_' + target + '"]').val();
    num_pax = parseInt(num_pax);
    if (num_pax > 0) {
        tjq('input[name="num_' + target + '"]').val(num_pax - pax);
        tjq('label.num_' + target).val(num_pax - pax);
        tjq('input[name="total_' + target + '"]').val(num_pax - pax);
        var price_type = tjq('input[name="price_' + target + '"]').val();
        total_price = parseInt(total_price) - (parseInt(price_type) * pax);
        total_pax = parseInt(total_pax) - pax;
        summarySelected(target);
        setSummaryDisplay(total_price, total_pax);
        if (tjq('.show_promo_discount').length > 0) {
            tjq('.show_promo_discount').removeClass('hidden');
            tjq('.show_promo_discount').show('fade', 200);
            var total_pax_alltype = 0;
            var total_promo_discount_price = 0;
            tjq('input[name*="num_"]').each(function() {
                total_pax_alltype = eval(total_pax_alltype + eval(tjq(this).val()));
            });
            promo_discount_type = tjq('.show_promo_discount').data('dt');
            promo_discount_price = eval(tjq('.show_promo_discount').data('da'));
            if (promo_discount_type == 'B') {
                promo_discount_price = promo_discount_price;
            } else {
                promo_discount_price = eval(promo_discount_price / 100);
            }
            total_promo_discount_price = eval(total_pax_alltype * promo_discount_price)
            tjq('label.num_promo_discount').html(total_pax_alltype + ' x ' + formatPrice(promo_discount_price));
            tjq('label.sum_promo_discount').html('-' + formatPrice(total_promo_discount_price));
        }
    }
    var subb;
    var adult_prices = ['tpr_price_1ATwin_HT', ];
    if (tjq.inArray(target, adult_prices) >= 0) {
        subb = afterSubNumAdult(target);
    }
}
var add_num_pax = function(target, pax) {
    var adder;
    var child_prices = ['tpr_price_1A1C_HT', 'tpr_price_2A1Cbed_HT', 'tpr_price_2A1CNobed_HT'];
    if (tjq.inArray(target, child_prices) >= 0) {
        adder = beforeAddNumChild(target);
    } else {
        adder = true;
    }
    if (adder) {
        var num_pax = tjq('input[name="num_' + target + '"]').val();
        num_pax = parseInt(num_pax);
        tjq('input[name="num_' + target + '"]').val(num_pax + pax);
        tjq('label.num_' + target).val(num_pax - pax);
        tjq('input[name="total_' + target + '"]').val(num_pax + pax);
        var price_type = tjq('input[name="price_' + target + '"]').val();
        total_price = parseInt(total_price) + (parseInt(price_type) * pax);
        total_pax = parseInt(total_pax) + pax;
        summarySelected(target);
        setSummaryDisplay(total_price, total_pax);
    }
}