<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
      body{
      text-align: center;
      margin: 0 auto;
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      }
      ul{
      margin:0;
      padding: 0;
      }
      li{
      display: inline-block;
      text-decoration: unset;
      }
      a{
      text-decoration: none;
      }
      p{
      margin: 15px 0;
      }
      h5{
      color:#444;
      text-align:left;
      font-weight:400;
      }
      .text-center{
      text-align: center
      }
      .main-bg-light{
      background-color: #fafafa;
      box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
      }
      .title{
      color: #444444;
      font-size: 22px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
      display: inline-block;
      line-height: 1;
      }
      table{
      margin-top:30px
      }
      table.top-0{
      margin-top:0;
      }
      table.order-detail , .order-detail th , .order-detail td {
      border: 1px solid #ddd;
      border-collapse: collapse;
      }
      .order-detail th{
      font-size:16px;
      padding:15px;
      text-align:center;
      }
      .footer-social-icon tr td img{
      margin-left:5px;
      margin-right:5px;
      }
      .justify-content-center{
        display: flex;
        justify-content: center;
      }
    </style>
  </head>
  <body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
      <tbody>
        <tr>
          <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td><h2>Queenera Salon</h2></td>
                </tr>
                <tr>
                  <td><img src="{{asset('assets/images/email-template/success.png')}}" alt=""></td>
                </tr>
                <tr>
                  <td>
                    <h2 class="title">thank you</h2>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>{{$order->user->name}} Your Order Confirmed</p>
                    <p>Transaction ID: {{$order->order_number}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div style="border-top:1px solid #777;height:1px;margin-top: 30px;"></div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="justify-content-center">
                <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <h2>YOUR ORDER DETAILS</h2>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="justify-content-center">
                <div>
                    <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left">
                    <tbody>
                        <tr align="left">
                        <th>PRODUCT</th>
                        <th>DESCRIPTION</th>
                        <th>QUANTITY</th>
                        <th>PRICE </th>
                        </tr>
                            @foreach($order->orderItems as $orderItem)
                                <tr>
                                    <td><img src="{{asset('images/'.$orderItem->product->product_image)}}" alt="" width="130"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">{!! \Illuminate\Support\Str::limit( $orderItem->product->product_description, 25, '...') !!} </h5>
                                    </td>
                                    <td valign="top">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px; text-align: center;"><span>{{$orderItem->quantity}}</span></h5>
                                    </td>
                                    <td valign="top">
                                        <h5 style="text-alignt:center; font-size: 14px; color:#444;margin:10px; padding-right: 10px;" ><b>Rp. {{number_format($orderItem->product->product_price*$orderItem->quantity, 2)}}</b></h5>
                                    </td>
                                </tr>
                            @endforeach
                        
                        <tr>
                        <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">TOTAL PAID :</td>
                        <td class="price" colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;"><b>Rp. {{number_format($order->order_amount, 2)}}</b></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">

            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
            <td style="padding: 30px;">
                Copyright Queenera Salon
            </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>