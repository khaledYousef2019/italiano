<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/style.css">
        <title>Receipt example</title>
    </head>
    <body>
        <div class="ticket">
            <p class="centered"><u><b>I T A L I A N O</b></u></p>
            <p class="right" style="float: right;text-align: right;margin-top: 0px;margin-bottom: 0px">المنطقة :  <span style="float: none"> الشعبيه</span></p>
            <p style="float: right;margin-top: .5rem;margin-bottom: .5rem" dir="rtl">رقم العميل : <span style="float: left">&nbsp 01093824508</span></p>
            <p style="float: right;margin-top: 0rem;margin-bottom: .5rem" dir="rtl">كود العميل : <span style="float: left">&nbsp <u><b>#22</u></b></span></p>
            <table style="text-align: right">
                <thead>
                    <tr>
                        <td class="quantity">الكمية</td>
                        <td class="description">المنتج</td>
                        <td class="price">السعر</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">ARDUINO UNO R3</td>
                        <td class="price">25.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">2.00</td>
                        <td class="description">JAVASCRIPT BOOK</td>
                        <td class="price">10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">STICKER PACK</td>
                        <td class="price">10.00</td>
                    </tr>
                    <tr>
                        <td class="description centered" colspan="2" >خدمة التوصيل</td>
                        <td class="price" ><p style="margin: 0;padding: 0;display: inline-block">15</p>  </td>
                    </tr>
                    <tr>
                        <td class="description centered" colspan="2" ><b><u>إجمالي الفاتورة</u></b></td>
                        <td class="price" >255.00 </td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">We Test The Best !!
                <br>Come Back Again</p>
        </div>
        <button id="btnPrint" class="hidden-print">طباعة</button>
        <script src="/script.js"></script>
    </body>
</html>