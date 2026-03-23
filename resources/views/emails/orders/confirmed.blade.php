<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Conferma ordine</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- HEADER -->
                    <tr>
                        <td style="background:#212529; color:#ffffff; padding:20px; text-align:center;">
                            <h1 style="margin:0;">NovaShop</h1>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px;">

                            <h2 style="margin-top:0;">Grazie per il tuo ordine! 🎉</h2>

                            <p>
                                Il tuo ordine <strong>#{{ $order->id }}</strong> è stato confermato con successo.
                            </p>

                            <p>
                                <strong>Totale:</strong>
                                € {{ number_format($order->total_price, 2, ',', '.') }}
                            </p>

                            <hr style="margin:20px 0;">

                            <h3>Prodotti acquistati</h3>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
                                @foreach ($order->items as $item)
                                    <tr style="border-bottom:1px solid #eee;">
                                        <td>
                                            <strong>{{ $item->product->name }}</strong><br>
                                            <small>
                                                Quantità: {{ $item->quantity }} •
                                                € {{ number_format($item->unit_price, 2, ',', '.') }}
                                            </small>
                                        </td>
                                        <td align="right">
                                            € {{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <hr style="margin:20px 0;">

                            <p>
                                Stato ordine:
                                <strong style="color:#198754;">
                                    {{ ucfirst($order->status) }}
                                </strong>
                            </p>

                            <p style="margin-top:30px;">
                                A presto,<br>
                                <strong>Team NovaShop</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f8f9fa; padding:15px; text-align:center; font-size:12px; color:#777;">
                            © {{ date('Y') }} NovaShop — Tutti i diritti riservati
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
