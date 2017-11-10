$(document).ready(function() {
    var zindex = 10;

    $("div.card2").click(function(e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
            isShowing = true
        }

        if ($("div.cards2").hasClass("showing")) {
            // a card is already in view
            $("div.card2.show")
                .removeClass("show");

            if (isShowing) {
                // this card was showing - reset the grid
                $("div.cards2")
                    .removeClass("showing");
            } else {
                // this card isn't showing - get in with it
                $(this)
                    .css({ zIndex: zindex })
                    .addClass("show");

            }

            zindex++;

        } else {
            // no cards in view
            $("div.cards2")
                .addClass("showing");
            $(this)
                .css({ zIndex: zindex })
                .addClass("show");

            zindex++;
        }

    });
});