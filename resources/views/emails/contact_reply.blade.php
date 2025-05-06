<!DOCTYPE html>
<html>
<head>
    <title>Réponse à votre demande de contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .email-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin: 0;
            color: #333333;
        }
        .email-body {
            line-height: 1.8;
            font-size: 16px;
        }
        .email-body p {
            margin: 15px 0;
            color: #555555;
        }
        .email-body .greeting {
            font-size: 18px;
            font-weight: 500;
            color: #333333;
        }
        .email-body .message {
            font-size: 16px;
            font-style: italic;
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin: 20px 0;
        }
        .email-footer {
            text-align: center;
            border-top: 2px solid #e0e0e0;
            padding-top: 20px;
            margin-top: 30px;
            color: #999999;
        }
        .email-footer .signature {
            margin-top: 20px;
            font-size: 16px;
            font-weight: 500;
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Réponse à votre demande de contact</h1>
        </div>
        <div class="email-body">
            <p class="greeting">Bonjour {{ $prenom }} {{ $nom }},</p>
            <p>Merci pour votre message. Nous avons bien pris en compte votre demande et vous remercions de nous avoir contactés.</p>
            <p class="message">{{ $reply_message }}</p>
            <p>Si vous avez d'autres questions ou besoin d'assistance supplémentaire, n'hésitez pas à nous contacter.</p>
        </div>
        <div class="email-footer">
            <p>Cordialement,</p>
            <p class="signature">L'équipe Packom</p>
        </div>
    </div>
</body>
</html>
