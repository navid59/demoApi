<?php
require_once("config/config.php");

// $_SESSION["apiKey"] = $setting->apiKey;

/** Simulate product price */
$prices = array_column($products, 'pPrice');

?>
<div class="row" style="padding-top:15px;">
  <div class="col-md-4 order-md-2 mb-4">
    <form id="checkoutForm" class="needs-validation" novalidate>
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Product Info</span>
      <span class="badge badge-secondary badge-pill">&nbsp;</span>
    </h4>
    <ul class="list-group mb-3">
      <?php
      $i=0;
      foreach($products as $product) {
        $i++;
        ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?=$product['pName']?> - <?=$colorRange[rand(0, 3)]?></h6>
            <small class="text-muted"><?=$product['pDetail']?></small>
            <small class="text-muted"><?=$product['pCode']?></small>
          </div>
          <span class="text-muted"><?=$product['pPrice']?> RON</span>
        </li>
        <input type="hidden" name="products[<?=$i?>][pName]" value="<?=$product['pName']?>">
        <input type="hidden" name="products[<?=$i?>][pCode]" value="<?=$product['pCode']?>">
        <input type="hidden" name="products[<?=$i?>][pCategory]" value="<?=$product['pCategory']?>">
        <input type="hidden" name="products[<?=$i?>][pPrice]" value="<?=$product['pPrice']?>">
        <input type="hidden" name="products[<?=$i?>][pVat]" value="<?=$product['pVat']?>">
        <?php
      }
      ?>
      <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
          <h6 class="my-0">Promo code</h6>
          <small>EXAMPLECODE</small>
        </div>
        <span class="text-success">0 RON</span>
      </li>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (RON)</span>
        <strong><?=array_sum($prices);?></strong>
        <input type="hidden" name="amount" value="<?=array_sum($prices);?>">
      </li>
    </ul>
  </div>
  <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Config Information</h4>
      <div class="mb-3">
          <label for="apiKey">API KEY</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">API Key</span>
              </div>
              <input type="text" class="form-control" id="apiKey" name="apiKey" placeholder="String - Length(0-255)" value="<?=$setting->apiKey;?>" required>
              <div class="invalid-feedback" style="width: 100%;">
                  API Key is required.
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="ntpID">NETOPIA Payments ID (ntpID)</label>
          <input type="text" class="form-control" id="ntpID" name="ntpID" placeholder="String - Length(1-64)" value="" required disabled>
          <div class="invalid-feedback">
            Valid ntpID is required.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="posSignature">pos Signature</label>
          <input type="text" class="form-control" id="posSignature" name="posSignature" placeholder="" value="<?=$setting->posSignature;?>" required>
          <div class="invalid-feedback">
            Valid posSignature is required.
          </div>
        </div>
      </div>
      
      <div class="mb-3">
          <label for="authenticationToken">Authentication Token</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">Auth Token</span>
              </div>
              <input type="text" class="form-control" id="authenticationToken" name="authenticationToken" placeholder="String - Length(0-255)" required disabled>
              <div class="invalid-feedback" style="width: 100%;">
                  Your authentication Token is required.
              </div>
          </div>
      </div>


      <div class="mb-3">
          <label for="paReq">Token paReq</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">Req Token</span>
              </div>
              <input type="text" class="form-control" id="paReq" name="paReq" placeholder="String - Length(0-255)" required disabled>
              <div class="invalid-feedback" style="width: 100%;">
                  Token is required.
              </div>
          </div>
      </div>


      <div class="mb-3">                    
          <label for="orderID">order ID</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">#</span>
              </div>
              <input type="text" class="form-control" id="orderID" name="orderID" placeholder="" required value="<?=str_shuffle('RandomizeString1234567890')."_".rand(0,10000)?>">
              <div class="invalid-feedback" style="width: 100%;">
                  The order ID is required.
              </div>
          </div>
      </div>

      <div class="mb-3">
        <label for="notifyUrl">notify Url (IPN)</label>
        <input type="text" class="form-control" id="notifyUrl" name="notifyUrl" value="<?=$setting->notifyUrl;?>" placeholder="Enter IPN URL" required>
        <div class="invalid-feedback">
          Please enter your notify Url.
        </div>
      </div>

      <div class="mb-3">
        <label for="redirectUrl">redirect Url<span class="text-muted"></span></label>
        <input type="text" class="form-control" id="redirectUrl" name="redirectUrl"  value="<?=$setting->redirectUrl;?>" placeholder="Enter Confirm URL">
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="currency">Currency</label>
          <select class="custom-select d-block w-100" id="currency" name="currency" required>
            <option value="">Choose...</option>
            <option value="RON" selected>RON</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="emailTemplate">email Template</label>
          <select class="custom-select d-block w-100" id="emailTemplate" name="emailTemplate" required>
            <option value="">Choose...</option>
            <option value="confirm" selected>Confirm</option>
            <option value="1">Template #1</option>
            <option value="2">Template #2</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="language">Language</label>
          <select class="custom-select d-block w-100" id="language" name="language" required>
            <option value="">Choose...</option>
            <option value="ro" selected>Romanian</option>
            <option value="en">English</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <h4 class="mb-3">Billing address</h4>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="billingFirstName" name="billingFirstName" placeholder="" value="<?=$billingShippingInfo[0]['firstName']?>" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="billingLastName" name="billingLastName" placeholder="" value="<?=$billingShippingInfo[0]['lastName']?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
      </div>      

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" id="billingEmail" name="billingEmail" value="<?=$billingShippingInfo[0]['email']?>" placeholder="you@example.com">
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>      

      <div class="mb-3">
        <label for="billingPhone">Phone <span class="text-muted"></span></label>
        <input type="phone" class="form-control" id="billingPhone" name="billingPhone" value="<?=$billingShippingInfo[0]['phone']?>" placeholder="ex. 0732000000">
        <div class="invalid-feedback">
          Please enter a valid phone address for billing updates.
        </div>
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="billingAddress" name="billingAddress" value="<?=$billingShippingInfo[0]['address']?>" placeholder="1234 Main St" required>
        <div class="invalid-feedback">
          Please enter your shipping address.
        </div>
      </div>

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="billingAddress2" name="billingAddress2" value="<?=$billingShippingInfo[0]['address2']?>" placeholder="Apartment or suite">
      </div>

      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" id="billingCountry" name="billingCountry" required>
            <option value="">Choose...</option>
            <option value="Romania" selected>Romania</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="billingCity">City</label>
          <select class="custom-select d-block w-100" id="billingCity" name="billingCity" required>
            <option value="">Choose...</option>
            <option value="Bucuresti" selected>Bucuresti</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" id="billingState" name="billingState" required>
            <option value="">Choose...</option>
            <option value="Bucuresti" selected>Bucuresti</option>
            <option value="Ilfov">Ilfov</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="billingZip" name="billingZip"  value="<?=$billingShippingInfo[0]['zip']?>" placeholder="" required>
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <h4 class="mb-3">Shipping address</h4>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="shippingFirstName" name="shippingFirstName" placeholder=""  value="<?=$billingShippingInfo[0]['firstName']?>" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="shippingLastName" name="shippingLastName" placeholder=""  value="<?=$billingShippingInfo[0]['lastName']?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
      </div>

      

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" id="shippingEmail" name="shippingEmail" value="<?=$billingShippingInfo[0]['email']?>" placeholder="you@example.com">
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>      

      <div class="mb-3">
        <label for="shippingPhone">Phone <span class="text-muted">(Optional)</span></label>
        <input type="phone" class="form-control" id="shippingPhone" name="shippingPhone" value="<?=$billingShippingInfo[0]['phone']?>" placeholder="ex. 0732000000">
        <div class="invalid-feedback">
          Please enter a valid phone address for shipping updates.
        </div>
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="shippingAddress" name="shippingAddress" value="<?=$billingShippingInfo[0]['address']?>" placeholder="1234 Main St" required>
        <div class="invalid-feedback">
          Please enter your shipping address.
        </div>
      </div>

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="shippingAddress2" name="shippingAddress2" value="<?=$billingShippingInfo[0]['address2']?>" placeholder="Apartment or suite">
      </div>

      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" id="shippingCountry" name="shippingCountry" required>
            <option value="">Choose...</option>
            <option Value="Romania" selected>Romania</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="shippingCity">City</label>
          <select class="custom-select d-block w-100" id="shippingCity" name="shippingCity" required>
            <option value="">Choose...</option>
            <option value="Bucuresti" selected>Bucuresti</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" id="shippingState" name="shippingState" required>
            <option value="">Choose...</option>
            <option value="Bucuresti" selected>Bucuresti</option>
            <option value="Ilfov">Ilfov</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="shippingZip" name="shippingZip" value="<?=$billingShippingInfo[0]['zip']?>" placeholder="" required>
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
      </div>

      <hr class="mb-4">

      <h4 class="mb-3">Payment Method</h4>
      <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="card" name="paymentMethod" type="radio" class="custom-control-input" value="card" checked required>
          <label class="custom-control-label" for="card">Credit / Debit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="btc" name="paymentMethod" type="radio" class="custom-control-input" required disabled>
          <label class="custom-control-label" for="btc">BTC</label>
        </div>
      </div>

      <h4 class="mb-3">Card Information</h4>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="cc-name">Name on card</label>
          <input type="text" class="form-control" id="cc-name" name="cc-name" value="Test Test" placeholder="" required>
          <small class="text-muted">Full name as displayed on card</small>
          <div class="invalid-feedback">
            Name on card is required
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cc-number">Credit card number</label>
          <input type="text" class="form-control" id="cc-number" name="account" value="9900009184214768" placeholder="" required>
          <div class="invalid-feedback">
            Credit card number is required
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="cc-expiration-month">Expiration Month</label>
          <input type="text" class="form-control" id="cc-expiration-month" name="expMonth" value="<?=rand(1,12)?>" placeholder="" required>
          <div class="invalid-feedback">
            Expiration Month required
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cc-expiration-year">Expiration Year</label>
          <input type="text" class="form-control" id="cc-expiration-year" name="expYear" value="<?=date('Y', strtotime('+3 year'))?>" placeholder="" required>
          <div class="invalid-feedback">
            Expiration Year required
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cc-cvv">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" name="secretCode" value="111" placeholder="" required>
          <div class="invalid-feedback">
            Security code required
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" id="doPayment" type="submit">Continue to checkout</button>
    </form>
    <hr class="mb-4">
    <div id="message" style="display: none">
      <div id="message-success" class="alert alert-success" role="alert" style="display: none">
        <h4 class="alert-heading">Well done!</h4>
        <h6 id="msgTitle"></h6>
        <p id="resDetails"></p>
        <hr>
        <ul id="conclusionMsg" class="mb-0">
        </ul>        
      </div>
      <div id="message-warning" class="alert alert-warning" role="alert" style="display: none">
        <h4 class="alert-heading" id="msg-warning-title"></h4>
        <p><span id="warning-status-msg"></span> & <span id="warning-type-code"></span>.</p>
        <hr>
        <p class="mb-0" id="warning-full-msg"></p>
      </div>
      <div id="message-info" class="alert alert-info" role="alert" style="display: none">
        <h4 class="alert-heading">Good to know!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>
    </div>
  </div>
</div>