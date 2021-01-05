<!DOCTYPE html>

<!-- Formulaire de l'administrateur/pharmacien de l'actualités -->

<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PREMIERS PAS AVEC BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/tab.css" >
<!--Bootstrap script-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
        <script  language=javascript >
           function verif()
            {
              
                 if(f1.t2.value=="")
                {
                     alert("champ mailest obligatoire");
                return false;
                }
                else if(f1.t2.value.indexOf('@')==-1)
                {
                    alert("champ mailest est incorrect");
                    return false;
                }
                  else if((!f1.r1[0].checked )&&(!f1.r1[1].checked) )
                {
                    alert("champ sexe obligatoire");
                    return false;
                }
                   else if(!f1.ch1.checked &&!f1.ch2.checked &&!f1.ch3.checked)
                {
                    alert("champ favourit obligatoire");
                    return false;
                }
                   else if(f1.s.selectedIndex<0)
                {
                    alert("champ n obligatoire");
                    return false;
                }
                else
                {
                    return true;
                }
            }
         
        </script>
     <style>
     button 
     {
         width:100%;
         background-color:blue;
         text-align:center;
         color:white;
         padding:10px;
     }
    input 
     {
         width:100%;
         background-color:green;
         text-align:center;
         color:black;
     }
   
    }
     </style>
    </head>
    <body>
  
  <form  method="POST" action="index1.php" enctype="multipart/form-data" >
       <table  bgcolor="yellow" border="2px" >
       <tr>
       <td colspan="2"> <input type="file" name="fileup"/></td>
       </tr>
       
        <tr>
       <td> <label for="mp"> DESCRIPTION</></td>
        <td><input type="text" name="mp"></td>
        </tr>
        <tr>
       <td> <label for="descr"> DESCRIPTION READMORE</></td>
        <td><input type="text" name="descr"></td>
        </tr>
        <tr>
       <td> <label for="title"> TITRE</></td>
        <td><input type="text" name="title"></td>
        </tr>
        <tr>
       <td> <label for="dc"> DATE CREATION</></td>
        <td><input type="text" name="dc"></td>
        </tr>
        <tr>
        <td  colspan="2"><button   name="envoyer" >envoyer</button></td>
        
        </tr>
        <tr>
        <td colspan="2"><button   name="aff" >afficher</button></td>
        </tr>
        <tr>
        <td colspan="2"> <button   name="sup">suprimer</button></td>
        </tr>
        <tr>
        <td colspan="2"> <button   name="up">mis a jour</button></td>
        </tr>
        <tr>
        <td colspan="2"> <button   name="re">recherche</button></td>
        </tr>
        <tr>
        <td colspan="2"> <button   name="re">deconnecter</button></td>
        </tr>
        
         </table>
        </form>
    
      
       
      </body>
        </html>
    