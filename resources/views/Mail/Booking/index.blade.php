<!DOCTYPE html>
<html lang="en" 
xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            .email-container {
                min-width: 414px !important;
            }
        }

    </style>
    <!-- CSS Reset : END -->
    <!-- Reset list spacing because Outlook ignores much of our inline CSS. -->
    <!--[if mso]>
    <style type="text/css">
        ul,
        ol {
            margin: 0 !important;
        }
        li {
            margin-left: 30px !important;
        }
        li.list-item-first {
            margin-top: 0 !important;
        }
        li.list-item-last {
            margin-bottom: 10px !important;
        }
    </style>
    <![endif]-->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 17px !important;
            }

        }

    </style>
</head>
<!--
    The email background color (#222222) is defined in three places:
    1. body tag: for most email clients
    2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
    3. mso conditional: For Windows 10 Mail
-->
<body width="100%" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">
    <!--[if mso | IE]>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #222222;">
    <tr>
    <td>
    <![endif]-->

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            {{-- Congratulations, your booking was successful. --}}
        </div>
        <!-- Visually Hidden Preheader Text : END -->

        <!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
        <!-- Preview Text Spacing Hack : BEGIN -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <!-- Preview Text Spacing Hack : END -->

        <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 600px; margin: auto;" class="email-container">
            <!-- Email Header : END -->

            <!-- Email Body : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">

                <!-- Hero Image, Flush : BEGIN -->
                <tr>
                    <td style="padding: 20px; padding-bottom: 2px; align="center" style="background-color: #ffffff;">
                        <img src="http://ajuwayatravel.com/images/logo.png" width="50"  alt="ajuwayatravel" border="0" align="left" class="g-img">
                    </td>
                   {{--  <td>
                        <h2 style="font-family: sans-serif; font-size: 19px; line-height: 125%; color: #333333; font-weight: normal;"><strong>Ajuwaya Travel</strong></h2>
                    </td> --}}
                </tr>
                <!-- Hero Image, Flush : END -->

                <!-- 1 Column Text + Button : BEGIN -->
                <tr>
                    <td style="background-color: #ffffff;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            
                            <tr style="margin-bottom: 5px ">
                                <td style="padding: 20px; padding-bottom: 2px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 19px; line-height: 125%; color: #333333; font-weight: normal;">
                                        Booking Successful
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px; padding-top: 2px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <p style="margin: 0;">Hello {{ ucwords($booking->name) }},</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px; padding-top: 2px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <p style="margin: 0;">Your booking was successful, below are your details.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <h3 style="margin: 0 0 0 0; font-family: sans-serif; font-size: 18px; line-height: 125%; color: #333333; font-weight: 550 ;">
                                            Booking details</h3>
                                    <ul style="padding: 0; margin: 0 0 10px 0; list-style-type: disc;">
                                        <li style="margin:0 0 10px 30px;" class="list-item-first">
                                            Name: {{ $booking->name }}
                                        </li>
                                        <li style="margin:0 0 10px 30px;">
                                            Phone Number: {{ $booking->phone }}
                                        </li>
                                        <li style="margin:0 0 10px 30px;">
                                            Reference Code: <strong>{{ $booking->bk_ref }}</strong>
                                        </li>
                                        <li style="margin:0 0 10px 30px;">
                                            Seat Number(s): {{ $booking->seat }}
                                        </li>
                                        <li style="margin:0 0 10px 30px;">
                                            Takeoff Point: {{ $booking->route->take_off }}
                                        </li>
                                        <li style="margin:0 0 10px 30px;">
                                            Takeoff Time: <small>{{ $booking->route->takeoff->format('l jS \\of F Y h:i:s A') }}</small>
                                        </li>
                                        <li style="margin:0 0 10px 30px;" class="list-item-last">
                                            Destination: {{ $booking->route->camp->toUp() }}
                                        </li>
                                    </ul>
                                    <p style="margin: 0;">Ensure you keep this mail safely. Be at the takeoff location before the takeoff time.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555;">
                                    <p style="margin: 0;">Warmest Regards</p>
                                    <p style="margin: 0;">Yemi Alabi.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- Email Body : END -->

            <!-- Email Footer : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
                <tr>
                    <td style="padding: 40px 10px; font-family: sans-serif; font-size: 12px; line-height: 140%; text-align: center; color: #888888;">
                        <webversion style="color: #cccccc; text-decoration: underline; font-weight: bold;">
                        <a href="#">Ajuwayatravel.com</a></webversion>
                        <br><br>
                            AjuwayaTravel<br>
                            <span class="unstyle-auto-detected-links">
                                Address<br>(123) 456-7890
                            </span>
                        <br><br>
                        {{-- <unsubscribe style="color: #888888; text-decoration: underline;">unsubscribe</unsubscribe> --}}
                    </td>
                </tr>
            </table>
            <!-- Email Footer : END -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </div>

        <!-- Full Bleed Background Section : BEGIN -->
        <!--  -->
        <!-- Full Bleed Background Section : END -->

    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <![endif]-->
    </center>
</body>
</html>