<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" href="{{ asset('assets/images/logo/q1.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/q1.png') }}" type="image/x-icon">
  <title>Invoice {{ $booking->booking_code }}</title>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700" rel="stylesheet">
  <style type="text/css">
    body {
      font-family: 'Work Sans', sans-serif;
      margin: 0;
      padding: 0;
      text-align: center;
      background-color: #ffffff;
    }

    h2 {
      color: #444444;
      font-size: 24px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
    }

    p {
      margin: 15px 0;
    }

    table {
      margin: 30px auto;
      border-collapse: collapse;
      width: 100%;
      max-width: 650px;
      background-color: #ffffff;
      box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
    }

    th, td {
      border: 1px solid #565656;
      padding: 15px;
      text-align: center;
    }

    th {
      font-size: 16px;
    }

    .total-paid {
      text-align: left;
      padding-left: 20px;
      border-right: none;
      font-size: 13px;
      color: #000000;
    }

    .price {
      text-align: right;
      padding-right: 28px;
      font-size: 13px;
      color: #000000;
      border-left: none;
    }

    .footer {
      background-color: #ffffff;
      padding: 30px;
      text-align: center;
    }

    .footer p {
      margin: 0;
    }
  </style>
</head>

<body>
  <table border="0">
    <tbody>
      <tr>
        <td>
          <h2>Queenera Salon</h2>
          <h2 class="title">Thank You</h2>
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/images/email-template/success.png'))) }}" alt="">
          <p>{{ $booking->username }} Your Booking {{ $booking->status }}</p>
          <p>Transaction ID: {{ $booking->booking_code }}</p>
          <hr style="border-top: 1px solid #777; height: 1px; margin-top: 30px;">
        </td>
      </tr>
    </tbody>
  </table>

  <table border="0">
    <tbody>
      <tr>
        <td>
          <h2>YOUR BOOKING DETAILS</h2>
        </td>
      </tr>
    </tbody>
  </table>

  <table>
    <tbody>
      <tr>
        <th>SERVICE</th>
        <th>START DATE</th>
        <th>END DATE</th>
      </tr>
      <tr>
        <td>{{ $booking->service->service_name }}</td>
        <td>{{ \Carbon\Carbon::parse($booking->start_booking_date)->format('d F Y H:i') }}</td>
        <td>{{ \Carbon\Carbon::parse($booking->end_booking_date)->format('d F Y H:i') }}</td>
    </tr>
    <tr>
      <td colspan="2" class="total-paid">PRICE:</td>
      <td class="price"><b>{{ number_format($booking->service->service_price,2) }}</b></td>
    </tr>
      <tr>
        <td colspan="2" class="total-paid">PAYMENT METHOD:</td>
        <td class="price"><b>{{ $booking->payment_method }}</b></td>
      </tr>
    </tbody>
  </table>

  <div class="footer">
    <p>Queenera Salon</p>
  </div>
</body>

</html>
