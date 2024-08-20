<!DOCTYPE html>
<html>

<head>
    <title>Package Mail Inquiry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            color: #718096;
            margin: 0;
            padding: 0;
            width: 100%;
            line-height: 1.4;
        }

        .wrapper {
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .content {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .header {
            padding: 25px 0;
            text-align: center;
        }

        .body {
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
            border-top: 1px solid #edf2f7;
            border-bottom: 1px solid #edf2f7;
        }

        .inner-body {
            background-color: #ffffff;
            border: 1px solid #e8e5ef;
            border-radius: 2px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            margin: 0 auto;
            padding: 0;
            width: 570px;
        }

        .content-cell {
            padding: 32px;
        }

        .footer {
            text-align: center;
            width: 570px;
            margin: 0 auto;
            padding: 32px;
        }

        .footer p {
            line-height: 1.5em;
            color: #b0adc5;
            font-size: 12px;
        }

        @media only screen and (max-width: 600px) {

            .inner-body,
            .footer {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="header">
                            <a href="http://localhost"
                                style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none;">
                                {{ config('app.name') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell">
                                        <p style="font-size: 16px; line-height: 1.5em; text-align: left;">
                                            <strong>Name:</strong> {{ $name }}<br>
                                            <strong>Email:</strong> {{ $email }}<br>
                                            <strong>Phone:</strong> {{ $phone }}<br><br>
                                            <strong>Message:</strong><br>
                                            {{ $inquiryMessage }}<br><br>
                                            Please respond to this inquiry as soon as possible.
                                        </p>
                                        <p style="font-size: 16px; line-height: 1.5em; text-align: left;">
                                            Regards,<br>
                                            {{ $name }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer" align="center">
                            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
