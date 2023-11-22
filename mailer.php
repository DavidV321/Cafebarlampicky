<?php

    // Načítá pole z formuláře - name, email.....; odstraňuje bílé znaky; odstraňuje HTML
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    
    $phone = strip_tags(trim($_POST["phone"]));
    $phone = str_replace(array("\r","\n"),array(" "," "),$phone);
    
    $place = strip_tags(trim($_POST["place"]));
    $place = str_replace(array("\r","\n"),array(" "," "),$place);
    
    $number = filter_var(trim($_POST["number"]), FILTER_SANITIZE_NUMBER_INT);
    
    $date = htmlspecialchars(trim($_POST["date"]));
    
    $form = htmlspecialchars(trim($_POST["form"]));
    
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    $message = strip_tags($_POST["message"]);
    $message = htmlspecialchars ($_POST["message"]);


    // Kontroluje data popř. přesměruje na chybovou adresu
    if (empty($name) OR empty($phone) OR empty($place) OR empty($message)  OR !filter_var($number, FILTER_SANITIZE_NUMBER_INT) OR !filter_var($date) OR !filter_var($form) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://www.cafebarlampicky.cz/index.html?success=-1#form");
        exit;
    }

    // Nastavte si email, nakterý chcete, aby se vyplněný formulář odeslal - jakýkoli váš email
    $recipient = "info@cafebarlampicky.cz";

    // Nastavte předmět odeslaného emailu
    $subject = "Máte nový kontakt od: $name";

    // Obsah emailu, který se vám odešle
    $email_content = "Jméno: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Place: $place\n";
    $email_content .= "Number: $number\n";
    $email_content .= "Date: $date\n";
    $email_content .= "Form: $form\n";
    $email_content .= "Zpráva:\n$message\n";

    // Emailová hlavička
    $email_headers = "From: $name <$email>";

    // Odeslání emailu - dáme vše dohromady
    mb_send_mail($recipient, $subject, $email_content, $email_headers);
    
    // Přesměrování na stránku, pokud vše proběhlo v pořádku
    header("Location:https://www.cafebarlampicky.cz/index.html?success=1#form");

?>
