<html>
  <head>
    <style>
      /* Mengatur tampilan email */
      body {
		text-align:center;
        font-family: Arial, sans-serif;
        font-size: 25px;
		align-items: center;
    	justify-content: center;
    	position: relative;
      }
      
      h1 {
		text-align:center;
        font-size: 28px;
		font-family:Georgia;
        color: #0037a6;
      }
      
      p {
		text-align:center;
        line-height: 1.5;
        color: black;
      }
      
      /* Mengatur tampilan tombol aktivasi */
      .activate-button {
        align-content:center;
        display: inline-block;
        background-color:#0037a6;
        color: yellow;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 4px;
      }
      
      .activate-button:hover {
        background-color: yellow;
        color: #0037a6;
      }
    </style>
  </head>
  <body>
	<center>
	<img src="https://d15k2d11r6t6rl.cloudfront.net/public/users/BeeFree/beefree-ufk6ughs5s/Modern%20and%20Minimalist%20Laundry%20Business%20Logo.png" width="200px" alt="">
    <h1>Hello <br>
Welcome to MS Laundry</h1>
    <p>Thank you for registering with our service. To complete the registration process,<br> We need to verify your account by clicking on the button below.:</p>
    <a href="<?= url_to('activate-account') . '?token=' . $hash ?>"><button class="activate-button">Activate Account</button></a>
    <p>If you did not request a password reset, you can safely ignore this email.</p>
    <p>Thank You.</p>
	</center>
  </body>
</html>