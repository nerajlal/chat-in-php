<html>
<head>
	<title>Chat</title>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
		}
		.chat-box {
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #ccc;
			margin: 50px auto;
			max-width: 600px;
			padding: 20px;
		}
		.chat-box h2 {
			margin: 0px 0px 20px;
			text-align: center;
		}
		.chat-box .messages {
			max-height: 400px;
			overflow-y: scroll;
		}
		.chat-box .message {
  background-color: #F2F2F2;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px;
  padding: 10px;
  max-width: 70%;
  word-wrap: break-word;
}

		.chat-box .message.sent {
			background-color: #D7F9FF;
			align-self: flex-end;
		}
		.chat-box .message.received {
			background-color: #F2F2F2;
			align-self: flex-start;
		}
		.chat-box .message .meta {
			color: #777;
			font-size: 12px;
			margin-bottom: 5px;
		}
		.chat-box form {
			display: flex;
			margin-top: 20px;
		}
		.chat-box input[type="text"] {
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #ccc;
			flex-grow: 1;
			margin-right: 10px;
			padding: 10px;
		}
		.chat-box input[type="submit"] {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: white;
			cursor: pointer;
			padding: 10px 20px;
		}
		.chat-box .message.sent-by-me {
  background-color: #D7F9FF;
  align-self: flex-end;
  text-align: right;
}

	</style>
</head>
<body>


<?php
$conn = new mysqli('localhost', 'root', '', 'chatdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$my_id='Alice';
// Set the senderid and receiverid
$current_user = 'Alice'; // set senderid to 'Alice'
$recipient = 'Bob'; // set receiverid to 'Bob'

// Check if the user has submitted a message
if(isset($_POST['message']) && !empty($_POST['message'])){
    $message = $_POST['message'];
    $time = date('Y-m-d H:i:s');
    
    // Store the message in the database
    $sql = "INSERT INTO messages (senderid, receiverid, message, time) VALUES ('$current_user', '$recipient', '$message', '$time')";
    if ($conn->query($sql) === TRUE) {
        // Success
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "SELECT * FROM (SELECT * FROM messages WHERE (senderid='$current_user' AND receiverid='$recipient') OR (senderid='$recipient' AND receiverid='$current_user') ORDER BY time DESC LIMIT 10) sub ORDER BY time ASC";
$result = $conn->query($sql);
$messages = ''; // Initialize the messages variable
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$class = ($row['senderid'] == $my_id) ? 'sent-by-me' : '';
		$messages .= '<div class="message ' . $class . '"><span class="meta"></span>' . $row['message'] . '</div>';
	  }
	  
} else {
    $messages = "No messages yet.";
}
$conn->close();
?>
	<div class="chat-box">
		<h2>Chat</h2>
		<div class="messages">
			<?php echo $messages; ?>
		</div>
		<form method="post">
			<input type="text" name="message" placeholder="Enter your message">
			<input type="submit" value="Send">
		</form>
	</div>
</body>
</html>
