<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="utf-8">
    <title>Mesaj formular contact — CS Victoria Maramureș</title>
</head>
<body style="margin:0;padding:0;background:#fafaf7;font-family:Arial,Helvetica,sans-serif;color:#0a0a0a">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#fafaf7;padding:32px 16px">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background:#ffffff;border:1px solid #e5e5e5">
                    <tr>
                        <td style="background:#0a0a0a;padding:24px 28px">
                            <div style="font-family:Arial,Helvetica,sans-serif;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:#dc2626;font-weight:700">◆ Formular contact · csvictoriamm.ro</div>
                            <div style="font-family:'Oswald',Arial,sans-serif;font-size:28px;color:#fafaf7;margin-top:8px;letter-spacing:.02em">Mesaj nou primit</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;line-height:1.55">
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #e5e5e5;width:140px;color:#737373;font-size:12px;letter-spacing:.1em;text-transform:uppercase">Nume</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #e5e5e5;font-weight:700">{{ $payload['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #e5e5e5;color:#737373;font-size:12px;letter-spacing:.1em;text-transform:uppercase">Email</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #e5e5e5"><a href="mailto:{{ $payload['email'] }}" style="color:#dc2626;text-decoration:none">{{ $payload['email'] }}</a></td>
                                </tr>
                                @if (! empty($payload['phone']))
                                    <tr>
                                        <td style="padding:10px 0;border-bottom:1px solid #e5e5e5;color:#737373;font-size:12px;letter-spacing:.1em;text-transform:uppercase">Telefon</td>
                                        <td style="padding:10px 0;border-bottom:1px solid #e5e5e5"><a href="tel:{{ $payload['phone'] }}" style="color:#0a0a0a;text-decoration:none">{{ $payload['phone'] }}</a></td>
                                    </tr>
                                @endif
                                @if (! empty($payload['discipline']))
                                    <tr>
                                        <td style="padding:10px 0;border-bottom:1px solid #e5e5e5;color:#737373;font-size:12px;letter-spacing:.1em;text-transform:uppercase">Interes</td>
                                        <td style="padding:10px 0;border-bottom:1px solid #e5e5e5">{{ $payload['discipline'] }}</td>
                                    </tr>
                                @endif
                            </table>

                            <div style="margin-top:20px">
                                <div style="font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:#737373;margin-bottom:8px">Mesaj</div>
                                <div style="background:#fafaf7;border-left:3px solid #dc2626;padding:14px 16px;white-space:pre-wrap;font-size:14px;line-height:1.6">{{ $payload['message'] }}</div>
                            </div>

                            <div style="margin-top:28px;padding-top:18px;border-top:1px solid #e5e5e5;font-size:11px;color:#737373;letter-spacing:.05em">
                                Răspunde direct la acest email — destinatarul va fi <strong style="color:#0a0a0a">{{ $payload['name'] }}</strong>.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#fafaf7;padding:14px 28px;font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:#737373;border-top:1px solid #e5e5e5">
                            CS Victoria Maramureș · csvictoriamm.ro
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
