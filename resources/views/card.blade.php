<html>

<head>
  <script src="https://cdn.omise.co/card.js" charset="utf-8"></script>
</head>

<body>

  <form name="checkoutForm" method="POST" action="/card">
    <input type="hidden" name="description" value="Product order ฿3200.00" />
    
    {{ csrf_field() }}

    <script type="text/javascript" src="https://cdn.omise.co/card.js"               data-key="pkey_test_58x5lew98sd34rjio0a"
      data-image="http://www.mx7.com/view2/A2ElRcLZ5FAr6dEv"
      data-frame-label="UP to Train" data-button-label="ซื้อเลยจ้า" data-submit-label="Submit" 
      data-location="yes" 
      data-amount="320000"
      data-currency="thb"
      >
    </script>
    <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
  </form>


</body>


</html>