<html>
<head>
<title>Successfully</title>
<style  type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  min-width: 400px;
  margin: 0 auto 100px;
  padding: 55px 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form img{
	max-width:200px;
	margin:0px auto;
	margin-bottom:30px;
}

h2{
	color:#009900;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #0061a5;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
body {
  background: #fff; /* fallback for old browsers */
  font-family: "Roboto", sans-serif;     
}
</style>
</head>
<body>
    <pre>
            </pre>
    <div class="login-page">
      <div class="form">
        <img src="success.jpg"  />
        <h2>Payment Completed Successfully!</h2>
        <p>Thank you for purchasing a campaign with us - we appreciate your business.</p>
      </div>
    </div>
</body>
<script>
      var sessionId = <?php echo json_encode($_GET['session_id']) ?>;
      if (sessionId) {
        fetch("https://www.legaladvertisers.co.uk/client-portal/stripe/get-checkout-session.php?sessionId=" + sessionId).then(function(result){
          return result.json()
        }).then(function(session){
          var sessionJSON = JSON.stringify(session, null, 2);
          document.querySelector("pre").textContent = sessionJSON;
        }).catch(function(err){
          console.log('Error when fetching Checkout session', err);
        });
      }
    </script>
<script>
var timer = setTimeout(function() {
 	window.location='https://www.legaladvertisers.co.uk/client-portal/'
 }, 5000);
</script>
</html>