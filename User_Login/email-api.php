
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <!-- <title>Vinit's Mail</title> -->
</head>
<body>
    


    <div class="main">
    <div class="mail-area">
        <h1>Mail API</h1>
        
		        
        <form method="post" action="sendmail.php" enctype="multipart/form-data">
            <input type="email" name="femail" class="input" value="<?php $_GET['email'];echo $_GET['email'];?>" readonly>
            <input type="email" name="email" class="input" placeholder="Receiver's email-id" required>
            <input type="text" name="subject" class="input" placeholder="Subject" required>

            <textarea class="input" name="message" placeholder="Message" required></textarea>
            <input type="file" name="attachment" class="up" multiple>
            <div>
			<input  class="input btn" type="submit" name="send" value="Send">
            
            </div>
			
			
        </form>
		
    </div>
	
	
</body>
</html>