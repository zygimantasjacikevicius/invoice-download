<?php

if (!empty($_POST['submit'])) {

    // var_dump($_POST);
    $invoiceNo = $_POST['invoice_no'];
    $date = $_POST['date'];
    $companyName = $_POST['company_name'];
    $companyAddress = $_POST['company_address'];
    $companyCode = $_POST['company_code'];
    $vatCode = $_POST['vat_code'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $payUntil = $_POST['pay_until'];
    $manager = $_POST['manager'];
    $service = $_POST['service'];
    $matas = $_POST['mato_vnt'];
    $amount = $_POST['amount'];
    $priceNoVat = $_POST['price_no_vat'];
    $advancePayment = $_POST['advance_payment'];
    $amountWords = $_POST['amount_words'];



    require_once("tfpdf.php");
    $pdf = new tFPDF();
    $pdf->AddPage();

    // Add a Unicode font (uses UTF-8)
    $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
    $pdf->SetFont('DejaVu', '', 14);

    $pdf->Cell(180, 10, "Išankstinė sąskaita apmokėjimui Nr. {$invoiceNo} ", '0', '1',);
    $pdf->Cell(180, 10, "Sąskaitos išrašymo data: {$date}", 'B', '1');

    $pdf->Cell(190, 10, "", '0', '1',);
    $pdf->Cell(190, 10, "Pardavėjas: UAB 'Aplikacijų centras'", '', 'L',);
    $pdf->Cell(190, 10, "Įmonės kodas: 304611351", '0', '1',);
    $pdf->Cell(190, 10, "Įmonės adresas: Ulonų g. 5, Vilnius", '0', '1',);
    $pdf->Cell(190, 10, "", '0', '1',);
    $pdf->Cell(190, 10, "Pirkėjas: {$companyName}", 'T', 'L', 'true');
    $pdf->Cell(190, 10, "Įmonės kodas: {$companyCode}", '0', 'L', 'true');
    $pdf->Cell(190, 10, "Įmonės adresas: {$companyAddress}", 'B', '1',);

    $pdf->Cell(190, 10, "", '0', '1',);

    $pdf->Cell(100, 10, "Prekės pavadinimas: {$service}", '', 'L', 'true');
    $pdf->Cell(30, 10, "Matas: {$matas}", '', 'L', 'true');
    $pdf->Cell(30, 10, "Kiekis: {$amount}", '', 'L', 'true');
    $pdf->Cell(30, 10, "Kaina be PVM: {$priceNoVat}", '', 'L', 'true');
    $pdf->Cell(190, 10, "", 'B', 'L', 'true');

    $num = 2;

    for ($x = 0; $x <= count($_POST); $x++) {
        if (isset($_POST['service' . $num])) {
            $pdf->Cell(100, 10, "Prekės pavadinimas: {$_POST['service' .$num]}", '', 'L', 'true');
            $pdf->Cell(30, 10, "Matas: {$_POST['mato_vnt' .$num]}", '', 'L', 'true');
            $pdf->Cell(30, 10, "Kiekis: {$_POST['amount' .$num]}", '', 'L', 'true');
            $pdf->Cell(30, 10, "Kaina be PVM: {$_POST['price_no_vat' .$num]}", '', 'L', 'true');
            $pdf->Cell(190, 10, "", 'B', 'L', 'true');

            $num++;
        } else {
            break;
        }
    }

    $pdf->Cell(190, 10, "", '0', '1',);
    $pdf->MultiCell(190, 10, "Avanso suma žodžiais: {$amountWords}", '0', '1',);
    $pdf->Cell(190, 10, "", '0', '1',);

    $pdf->Cell(190, 10, "Avansas mokėjimui: {$advancePayment}", '0', '1',);
    $pdf->Cell(190, 10, "", '0', '1',);

    $pdf->Cell(140, 10, "Sąskaitą priėmė: ", 0, 0);

    $pdf->Cell(190, 10, "", '0', '1',);
    $pdf->Cell(190, 10, "Sąskaitą išrašė: {$manager}", '0', '1',);







    // Select a standard font (uses windows-1252)
    $pdf->SetFont('Arial', '', 14);

    $pdf->Output();
}
