<?php 
         include "../../entities/commande.php";
      include "../../core/commandeC.php";
       include "../../entities/user.php";
      include "../../core/userC.php";
    $commandeC=new commandeC();
     $listC=$commandeC->retrieveCommandes();
     $userC= new userC();



// Include the main TCPDF library (search for installation path).
require_once('D:\wamp64\www\Achref\Project2\views\Back\vendor\tcpdf_min/tcpdf.php');
// include PDF parser class
require_once('D:\wamp64\www\Achref\Project2\views\Back\vendor\tcpdf_min/tcpdf_parser.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Amicale STB Bank');
$pdf->SetTitle('Liste des participants');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Liste des commandes', 'Pharmacie');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

$output='';   
 foreach ($listC as $row){
            $userId=$row['idClient'];
            $usersList=$userC->retrieveUserById($userId);
                foreach ($usersList as $row1) {
           
      $output .= '<tr> 
                          <td>'.$row1["name"].'</td>  
                          <td>'.$row['prixTotal'].'</td>
                          <td>'.$row['date'].'</td>    
                          <td>'.$row['etat'].'</td> 

                     </tr>  
                          ';  
      
  }
    }                                                 
$html='';                                                      
$html .= ' <table>
            <thead>
                <tr>  
                    <th> Nom </th>
                    <th> Total </th>
                    <th> Date </th>
                    <th> Etat </th>
                </tr>
            </thead>
            <tbody>';
$html .= $output;
$html.= '</tbody>
         </table>'; 

 
$pdf->writeHTML($html, true, false, true, false, '');
// add a page


// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('Liste des commandes', 'I');