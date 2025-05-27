<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rappel de contrat - UBA Compliance Monitoring</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h2 style="color: #b71c1c; font-size: 20px; margin-bottom: 20px;">
            📌 UBA Compliance Monitoring : <span style="color: #222;">"{{ $title }}"</span>
        </h2>

        <p style="font-size: 15px;">Bonjour,</p>

        <p style="font-size: 15px;">
            Ce message est un <strong>rappel automatique</strong> concernant le contrat suivant :
        </p>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Titre</strong></td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $title }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Description</strong></td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $description }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Date de début</strong></td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $startDate }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;"><strong>Date de fin</strong></td>
                <td style="padding: 8px;">{{ $endDate }}</td>
            </tr>
        </table>

        <p style="font-size: 15px;">
            Ce contrat est prévu pour le <strong>{{ $startDate }}</strong>. Veuillez prendre les dispositions nécessaires.
        </p>

        <p style="font-size: 15px;">Merci pour votre attention.</p>

        <p style="font-size: 15px; margin-top: 30px;">Cordialement,<br>
        <strong>UBA Compliance Monitoring System</strong></p>
    </div>
</body>
</html>
