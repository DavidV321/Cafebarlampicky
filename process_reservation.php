<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání hodnot z formuláře s použitím htmlspecialchars
    $event_date = htmlspecialchars($_POST["event_date"]);
    $number_of_people = htmlspecialchars($_POST["number_of_people"]);
    $event_time = htmlspecialchars($_POST["event_time"]);
    $visit_duration = htmlspecialchars($_POST["visit_duration"]);
    $full_name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    // E-mailová adresa příjemce
    $recipient = "info@cafebarlampicky.cz";

    // Vytvoření zprávy e-mailu
    $subject = "Nová rezervace";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $email_body = "Datum události: $event_date\n";
    $email_body .= "Počet osob: $number_of_people\n";
    $email_body .= "Čas události: $event_time\n";
    $email_body .= "Délka návštěvy: $visit_duration\n";
    $email_body .= "Jméno a příjmení: $full_name\n";
    $email_body .= "E-mail: $email\n";
    $email_body .= "Telefon: $phone\n";
    $email_body .= "Zpráva:\n$message";

    // Odeslání e-mailu
    mb_language("uni");
    mb_internal_encoding("UTF-8");

    mb_send_mail($recipient, $subject, $email_body, $headers);

    // Přesměrování zpět na stránku s potvrzením
    header("Location: confirmation_page.html");
    exit;
} else {
    // Pokud není požadavek typu POST, přesměrovat na domovskou stránku nebo jinou chybovou stránku
    header("Location: index.html");
    exit;
}
?>