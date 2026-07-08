<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nuova richiesta revisore</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
            background-color: #F8F6F0;
        }

        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }

            .fluid-padding {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }
    </style>
</head>
<body style="margin:0; padding:0; background-color:#F8F6F0;">
<div style="display:none; max-height:0; overflow:hidden; mso-hide:all;">
    {{ $user->name }} vuole diventare revisore su Presto.it
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F8F6F0;">
    <tr>
        <td align="center" style="padding:32px 16px;">

            <table role="presentation" class="email-container" width="600" cellpadding="0" cellspacing="0" border="0"
                   style="width:600px; max-width:600px; background-color:#ffffff; border-radius:12px; overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td align="center" style="background-color:#d97841; padding:28px 24px;">
                        <span style="font-family:Georgia,'Times New Roman',serif; font-size:26px; color:#ffffff; letter-spacing:0.5px;">Presto<span
                                    style="color:#f2c7b1;">.it</span></span>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td class="fluid-padding" style="padding:36px 40px 8px 40px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="font-family:Georgia,'Times New Roman',serif; font-size:22px; color:#56514b; padding-bottom:12px;">
                                    Nuova candidatura da revisore
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; color:#56514b; padding-bottom:24px;">
                                    <strong>{{ $user->name }}</strong> ha chiesto di entrare a far parte del team di
                                    revisori di Presto.it. Trovi i dettagli qui sotto e il curriculum in allegato.
                                </td>
                            </tr>
                        </table>

                        <!-- Info card -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                               style="background-color:#e9e1d3; border-radius:8px;">
                            <tr>
                                <td style="padding:20px 24px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:13px; color:#8a8478; letter-spacing:0.5px; padding-bottom:2px;">
                                                NOME
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:15px; color:#56514b; padding-bottom:16px;">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:13px; color:#8a8478; letter-spacing:0.5px; padding-bottom:2px;">
                                                EMAIL
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:15px; color:#56514b; padding-bottom:16px;">
                                                <a href="mailto:{{ $user->email }}"
                                                   style="color:#d97841; text-decoration:none;">{{ $user->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:13px; color:#8a8478; letter-spacing:0.5px; padding-bottom:2px;">
                                                PERCHÉ VUOLE DIVENTARE REVISORE
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:21px; color:#56514b; {{ $pastExperience ? 'padding-bottom:16px;' : '' }}">
                                                {!! nl2br(e($why)) !!}
                                            </td>
                                        </tr>
                                        @if ($pastExperience)
                                            <tr>
                                                <td style="font-family:Arial,Helvetica,sans-serif; font-size:13px; color:#8a8478; letter-spacing:0.5px; padding-bottom:2px;">
                                                    ESPERIENZE E COMPETENZE
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:21px; color:#56514b;">
                                                    {!! nl2br(e($pastExperience)) !!}
                                                </td>
                                            </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="font-family:Arial,Helvetica,sans-serif; font-size:13px; line-height:19px; color:#8a8478; padding-top:16px;">
                                    📎 Il curriculum di {{ $user->name }} è allegato a questa email.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td align="center" style="padding:28px 40px 40px 40px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="border-radius:6px; background-color:#d97841;">
                                    <!--[if mso]>
                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ route('make.revisor', $user) }}" style="height:46px;v-text-anchor:middle;width:240px;" arcsize="12%" stroke="f" fillcolor="#d97841">
                                    <w:anchorlock/>
                                    <center style="color:#ffffff;font-family:Arial,sans-serif;font-size:16px;font-weight:bold;">Rendi revisore</center>
                                    </v:roundrect>
                                    <![endif]-->
                                    <!--[if !mso]><!-->
                                    <a href="{{ route('make.revisor', $user) }}"
                                       style="display:inline-block; padding:14px 32px; font-family:Arial,Helvetica,sans-serif; font-size:16px; font-weight:bold; color:#ffffff; text-decoration:none; border-radius:6px;">Rendi
                                        revisore</a>
                                    <!--<![endif]-->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center"
                        style="background-color:#F8F6F0; padding:20px 24px; border-top:1px solid #e9e1d3;">
                        <span style="font-family:Arial,Helvetica,sans-serif; font-size:12px; color:#8a8478;">
                            Questa email è stata inviata automaticamente da Presto.it &mdash; non rispondere.
                        </span>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>
</body>
</html>
