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
      .reset-button {
		  align-content:center;
        display: inline-block;
        background-color:#0037a6;
        color: yellow;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 4px;
      }
      
      .reset-button:hover {
        background-color: yellow;
        color: #0037a6;
      }
    </style>
  </head>
  <body>
	<center>
	<img src="http://isra-km.my.id/img/Modern%20and%20Minimalist%20Laundry%20Business%20Logo.png" width="200px" alt="">
    <h1>Reset Password</h1>
    <p>Someone requested a password reset at this email address for <?= site_url() ?>.</p>
    <p>To reset the password use this code or URL and follow the instructions.</p>
    <p>Your Code: <?= $hash ?></p>
    <p>or click</p>
    <a href="<?= url_to('reset-password') . '?token=' . $hash ?>" ><button class="reset-button">Reset Password</button></a>
    <p>If you did not request a password reset, you can safely ignore this email.</p>
	</center>
  </body>
</html>
