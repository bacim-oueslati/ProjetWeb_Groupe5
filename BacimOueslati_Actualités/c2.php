<?php

/* Manipulation de la base de données */

class crud
{
    public $ae;
    public $mp;
    public $descr;
    public $title;
    public $dc;
    public $nuser;
    public $com;
    public $nf;
    public $cb;
    function add($em,$mp,$descr,$title, $dc, $com, $cb)
        {
          $this->ae=$em;
          $this->com=$com;
          $this->mp=$mp;
          $this->cb=$cb;
          $this->descr=$descr;
          $this->title=$title;
          $this->dc=$dc;
        
          $query =  $this->cb->prepare('INSERT INTO w11(ae,mp,descr,title,dc, com) VALUES(:ae,:mp,:descr,:title,:dc,:com)');
          $query->bindValue ( 'ae',$this->ae );
          $query->bindValue ( 'mp',$this->mp );
          $query->bindValue ( 'descr',$this->descr );
          $query->bindValue ( 'title',$this->title );
          $query->bindValue ( 'dc',$this->dc );
          $query->bindValue ( 'com',$this->com );
          $query->execute();
        }
        function addcom($nf,$com,$nuser,$cb)
        {
          $this->nf=$nf;
          $this->com=$com;
          $this->cb=$cb;
          $this->nuser=$nuser;
          $query =  $this->cb->prepare('INSERT INTO w1(nf,com,nuser) VALUES(:nf,:com,:nuser)');
          $query->bindValue ( 'nf',$this->nf );
          $query->bindValue ( 'com',$this->com );
          $query->bindValue ( 'nuser',$this->nuser );
          $query->execute();
        }
        function aff($cb)
        {
          $this->cb=$cb;
          $query =  $this->cb->prepare('SELECT * FROM w11');
          $query->execute();
           $res = $query->fetchAll();
           
           foreach ($res as $row)
           {
            echo '<div class="container">';
            echo '<div class="row">';
            echo ' <div class="col-md-4" style="height:150px">';
            echo "   <img src='images/".$row['ae']."'"." alt='' class='img-responsive thumbnail' style='margin-top:25px;margin-right:0px;height:100%;width:800px'>";
                    
            echo'</div>';
            echo ' <div class="col-md-8"  >';
                    
                   
            echo "<p style='width:600px;overflow:auto;text-aligne:justify;margin-top:25px;padding:2px;border-left:1px solid blue;height:150px'>
                  ".$row['mp']."
                    </p>";
                    echo " <form method='POST' action='descr.php'> ";
                   
                    echo ' <button  name="'.$row['descr'].'"'.'class="btn btn-info ">read more <span class="glyphicon glyphicon-chevron-right"></span></button>';
                   echo '<input type="text" value="'.$row['descr'].'"'.'name="cvn" style="color:white;border:1px solid white"/>';
                   echo '<input type="text" value="'.$row['ae'].'"'.'name="cv" style="color:white;border:1px solid white"/>';
                   echo " </form > ";

                   


                    echo ' </div>';
                    echo '</div>';
                    echo '</div>';
                    
            
           }
           
        }
        function affcom($nf,$cb)
        {
          $this->cb=$cb;
          $query =  $this->cb->prepare('SELECT com FROM w1');
          $query->execute();
           $res = $query->fetchAll();
           
           foreach ($res as $row)
           {       
            echo "<p style='width:100%;overflow:auto;text-aligne:justify;margin-top:2px;padding:2px;border-left:1px solid blue;height:20px'>
                  ".$row['com']."
                    </p>";
           }
           
        }
           function sup($title,$cb)
        {
          $this->title=$title;
          $this->cb=$cb;
          $query =  $this->cb->prepare("DELETE FROM w11 where title='".$this->title."'");
          $query->bindValue ( 'title',$this->title );
          $query->execute();
        }
        function up($em,$mp,$cb)
        {
          $this->ae=$em;
          $this->mp=$mp;
          $this->cb=$cb;
          $this->descr=$descr;
          $this->title=$title;
          $this->dc=$dc;
          $this->cb=$cb;
          $query =  $this->cb->prepare("UPDATE w11 SET mp = :mp,ae = :ae ,descr = :descr,title = :title,dc = :dc where ae ='".$this->ae."'");
          $query->bindValue ( 'ae',$this->ae );
          $query->bindValue ( 'mp',$this->mp );
          $query->bindValue ( 'ae',$this->descr );
          $query->bindValue ( 'mp',$this->title );
          $query->bindValue ( 'mp',$this->dc );
          $query->execute();
        }
        function upc($nf,$com,$nuser,$cb)
        {
          $this->nf=$nf;
          $this->com=$com;
          $this->cb=$cb;
          $this->nuser=$nuser;
         
          $query =  $this->cb->prepare("UPDATE w1 SET nf = :nf,com = :com ,nuser = :nuser where nf ='".$this->nf."'"." && nuser='".$this->nuser."'");
          $query->bindValue ( 'nf',$this->nf );
          $query->bindValue ( 'com',$this->com );
          $query->bindValue ( 'nuser',$this->nuser );
          $query->execute();
        }
        function up1($ae,$com,$cb)
        {
          $this->com=$com;
          $this->ae=$ae;
          $this->cb=$cb;
          $query =  $this->cb->prepare("UPDATE w11 SET com = :com where ae ='".$this->ae."'");
        
          $query->bindValue ( 'com',$this->com );
          $query->execute();
        }

        function re($title,$cb)
        {
          $this->cb=$cb;
          $this->ae=$ae;
          $query =  $this->cb->prepare("SELECT * FROM w11 where title ='".$this->title."'");
          $query->execute();
           $res = $query->fetchAll();
             
           foreach ($res as $row)
           {
            echo '<div class="container">';
            echo '<div class="row">';
            echo ' <div class="col-md-4" style="height:150px">';
            echo "   <img src='images/".$row['ae']."'"." alt='' class='img-responsive thumbnail' style='margin-top:25px;margin-right:0px;height:100%;width:800px'>";
                    
            echo'</div>';
            echo ' <div class="col-md-8"  >';
                    
                   
            echo "<p style='width:200px;overflow:auto;text-aligne:justify;margin-top:25px;padding:2px;border-left:1px solid blue;height:150px'>
                  ".$row['mp']."
                    </p>";
                    echo ' <a href="high-school.jpg" class="btn btn-info ">read more <span class="glyphicon glyphicon-chevron-right"></span></a>';
                    echo ' </div>';
                    echo '</div>';
                    echo '</div>';
            
           }
           }
           function rete($descr,$cb)
        {
          $this->cb=$cb;
          $this->descr=$descr;
          $query =  $this->cb->prepare("SELECT * FROM w11 where descr ='".$this->descr."'");
          $query->execute();
           $res = $query->fetchAll();
           foreach ($res as $row)
           {
           echo "<th4>".$row['descr']."</th4>";
           }
          }
        
}
?>