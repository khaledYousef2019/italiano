<?php


namespace PHPMVC\Controllers;


use Mpdf\Mpdf;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
//use PHPMVC\Models\ProductCategoryModel;
use PHPMVC\Models\DocumentModel;

class DocumentController extends AbstractController
{

    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('document.default');
//        var_dump($this->_controller);
        $this->_data['documents'] = DocumentModel::getAll();
//        $this->_data['categories'] = ProductCategoryModel::getAll();
        $this->_view();
//        var_dump($this->_data);
    }

    public function createAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('document.create');
        $this->_language->load('document.labels');
        $this->_language->load('document.units');

        $this->_data['documents'] = DocumentModel::getAll();

        if(isset($_POST['submit']) ) {
            $document = new DocumentModel();
            $document->name = $this->filterStr($_POST['Name']);
            $document->content = $_POST['content'];
            $document->serial = rand(100000000,999999999);

            if($document->save())
            {
                $this->redirect('/document');
            }
        }

        $this->_view();
    }
    public function editAction()
    {
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]) : $this->redirect('/document');
        $document = DocumentModel::getByPK($id);

        if($document === false) {
            $this->redirect('/document');
        }
        $this->_language->load('template.common');
        $this->_language->load('document.edit');
        $this->_language->load('document.labels');
//        $this->_language->load('document.units');
//    var_dump($document);exit();
        $this->_data['document'] = $document;
//        $this->_data['categories'] = ProductCategoryModel::getAll();

        if(isset($_POST['submit']) ) {
            $document->name = $this->filterStr($_POST['name']);
            $document->content = $_POST['content'];
//            $document->price = isset($_POST['price']) ? $this->filterFloat($_POST['price']) : 0;

            if($document->save())
            {
                $this->redirect('/document');
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $document = DocumentModel::getByPK($id);

        if($document === false) {
            $this->redirect('/document');
        }

        if($document->delete())
        {
            $this->redirect('/document');
        }
    }
    public function pdfAction(){
        $id = $this->filterInt($this->_params[0]);
        $document = DocumentModel::getByPK($id);


        require_once __DIR__ . '/vendor/autoload.php';


        $html = '
<html>
<head>
<style>
@page {
    size: 8.225in 11.50in;
    margin: 10% 9% 9% 7%;
    margin-footer: 25mm;
    margin-header: 5mm;
    background-image:url(final.jpg);
    background-repeat: no-repeat;
    background-image-resize:6;

}
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 14pt;"></span><br /><br /><br /><br /><span style="font-family:dejavusanscondensed;"></span></td>
<td width="50%" style="text-align: right;"><br /><span style="font-weight: bold; font-size: 12pt;"></span></td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="text-align: center; padding-top: 3mm; ">
<table width="100%" >
    <tr>
        <td colspan="3" text-align="left" width="33%">Witness by hand and seal of:</td>

    </tr>
    <tr>
    <td text-align="left" width="33%" style="font-size:15px;" colspan="3"><strong>President</strong></td>
    </tr>
        <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr><tr>
        <td></td>
    </tr>
        <tr>
    <td style="font-size:15px" colspan="2" text-align="left" width="33%"><strong>Ambassador \ Ekramy El Zaghat</strong></td>
    <td text-align="right"><img src="final.jpg" width="100" height="100" style="margin: 0 0 0 7cm;position: absolute;">
</td>
    </tr>
</table>

</div>

</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->


<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style=" "><span style="font-size: 7pt; color: #555555; font-family: sans;"></span><br /><br /><br /><br /><br /><br />Date: '.date("F j, Y").'<br />Date: 08 March 2021</td>
<td width="10%">&nbsp;</td>
</tr></table>

<br />




<div style="height:100%;">

'.$document->content.'

</div>


</body>
</html>
';

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10,
            'default_font_size' => 15,
            'default_font' => 'XBRiyaz'
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("WFDP - Document");
        $mpdf->SetAuthor("MR.Ekramy El-zaghat");
//        $mpdf->SetWatermarkText("WFDP");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        $mpdf->Output();
    }
}
