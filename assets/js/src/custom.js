$(document).ready(() => {
  // to Manage the Tabs & defulte Tab
  let url = location.href.replace(/\/$/, "");
 
  if (location.hash) {
    var hash = url.split("#");
    $('#myTab a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      $(window).scrollTop(0);
    }, 400);
  } 
   
  $('a[data-toggle="tab"]').on("click", function() {
    let newUrl;
    const hash = $(this).attr("href");
    if(hash == "#home") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl += "/";
    history.replaceState(null, null, newUrl);
  });

  getLog(); // Real time Log
  getIpnLog(); // Real time Log IPN
  getReturnLog(); // Real time Log success Page
});

// $('#doPayment').click(function(){
//   alert("Something And now Ajax");
//   $.ajax({
//       type: 'post',
//       url: 'post.php',
//       data: $('form').serialize(),
//       success: function () {
//       alert('form was submitted');
//       }
//   });
// });

$(function () {
  $('#checkoutForm').on('submit', function (e) {
    $('form')[0].reset(); // to Clean values by duble click
  e.preventDefault();
  $.ajax({
      type: 'post',
      url: 'post.php',
      // data: $('form').serialize(),
      data: $('#checkoutForm').serialize(),
      success: function (response) {
        alert('form was submitted');
        
        $('#message').show();
        response = JSON.parse(response);
        if(response.status){
          $('#message-warning').hide();
          $('#message-info').hide();
          $('#message-success').show();
          $('#msgTitle').html("Data Sent");
          
          
          console.log(response.data); // TEMPORARY
          console.log(response.data.error.code);  // TEMPORARY

          if(response.data.error.code == 100 & response.data.payment.status == 15) {
            $('#authenticationToken').val(response.data.customerAction.authenticationToken);
            $('#paReq').val(response.data.customerAction.formData.paReq);
            $('#ntpID').val(response.data.payment.ntpID);
            $('#conclusionMsg').append('<li>Your card have 3DS</li>');
            $('#conclusionMsg').append('<li>You will be redirecting to Bank Page</li>');
            
            /**
             * Step 2) Sandbox/Auton
             * preparing for redirect
             */
            var backUrl = "http://35.204.43.65/demo/backAuth.php";
            doRedirectSandboxAuthorize(response.data.customerAction.formData.paReq, backUrl);
            
            // #3 Next step is ) Payment/Card/Verify-auth
            
          }else {
            $('#authenticationToken').val(response.data.customerAction.authenticationToken);
            $('#conclusionMsg').append('<li>Your card dosn\'t have 3DS!!!</li>');
          }
          
        }else{
          $('#message-success').hide();
          $('#message-info').hide();
          $('#message-warning').show();
        }
      },
      error: function (response) {
        alert("NOT SEND AJAX");
        $('#message').show();
        $('#message-warning').show();
        
        console.log(response);
      }
    });
  });
});

// JS make redirect to an internal page
function doRedirectSandboxAuthorize(paReq, backUrl) {
  var url = "doAuth.php?paReq="+paReq+"&backUrl="+backUrl;
  window.location.href = url;
  return true;
}

// Display Logs Real Time
function getLog() {
  $.ajax({
      url: 'http://35.204.43.65/demo/logs/realtimeLog.log',
      // url: 'http://localhost/netopia_api_card/logs/realtimeLog.log',
      dataType: 'text',
      success: function(text) {
          $("#containerDiv").html(text);
          setTimeout(getLog, 3000); // refresh every 3 seconds
      }
  })
}

// Display IPN Logs Real Time
function getIpnLog() {
  $.ajax({
      url: 'http://35.204.43.65/demo/logs/ipnLog.log',
      // url: 'http://localhost/netopia_api_card/logs/ipnLog.log',
      dataType: 'text',
      success: function(text) {
          $("#containerDivIpnLog").html(text);
          setTimeout(getIpnLog, 3000); // refresh every 3 seconds
      }
  })
}

// Display Success page Logs Real Time
function getReturnLog() {
  $.ajax({
      url: 'http://35.204.43.65/demo/logs/returnLog.log',
      // url: 'http://localhost/netopia_api_card/logs/returnLog.log',
      dataType: 'text',
      success: function(text) {
          $("#containerDivReturnLog").html(text);
          setTimeout(getReturnLog, 300000); // refresh every 3 seconds
      }
  })
}