<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $bookTitle = $_POST["bookTitle"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $condition = $_POST["condition"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $receiveMessage = isset($_POST["receiveMessage"]) ? "Yes" : "No";

    // Create email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Hotri Trivedi <hotrivedi.29@gmail.com>\r\n"; // Change sender name and email address

    // Create email message
    $subject = "Book Donation Confirmation";
    $message = "Dear $name,<br><br>";
    $message .= "Thank you for donating the book \"$bookTitle\" by $author.<br><br>";
    $message .= "<b>Book Details:</b><br>";
    $message .= "<b>Title:</b> $bookTitle<br>";
    $message .= "<b>Author:</b> $author<br>";
    $message .= "<b>Genre:</b> $genre<br>";
    $message .= "<b>Condition:</b> $condition<br>";
    $message .= "<b>Would you like to receive a message back?</b> $receiveMessage<br><br>";
    $message .= "We have received your donation request and will process it shortly.<br><br>";
    $message .= "Regards,<br>The Book Donation Team";

    // Send email
    $to = $email;

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        $errorMessage = error_get_last()['message'];
        error_log("Error sending email: $errorMessage");
        echo "Error: Email could not be sent.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
