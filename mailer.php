<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zabezpečení před injekcí
    function secureInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $recipient = "info@cafebarlampicky.cz";
    $subject = "Nová poptávka z formuláře";

    $name = secureInput($_POST["name"]);
    $email = secureInput($_POST["email"]);
    $phone = secureInput($_POST["phone"]);
    $date = secureInput($_POST["date"]);
    $place = secureInput($_POST["place"]);
    $number = secureInput($_POST["number"]);
    $formType = secureInput($_POST["form"]);
    $message = secureInput($_POST["message"]);

    // Vytvoření těla e-mailu
    $body = "Jméno a Příjmení: $name\n";
    $body .= "Email: $email\n";
    $body .= "Telefonní číslo: $phone\n";
    $body .= "Datum události: $date\n";
    $body .= "Místo konání: $place\n";
    $body .= "Počet osob: $number\n";
    $body .= "Typ události: $formType\n";
    $body .= "Zpráva:\n$message";

    // Nastavení hlaviček pro e-mail
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Odeslání e-mailu
    mb_language("uni");
    mb_internal_encoding("UTF-8");

    if (mb_send_mail($recipient, $subject, $body, $headers)) {
        // Přesměrování na stránku potvrzení
        header("Location: confirmation.html");
        exit();
    } else {
        // Případné zpracování chyby (pokud odeslání selže)
        echo "Omlouváme se, došlo k chybě při odesílání formuláře.";
    }
}
?>
