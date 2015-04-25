<?php

    include("conexion.php");

    if(isset($_POST["button"]))
    {
	
        session_start();
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $count=false;
		if(!isset($_SESSION['conta']))
		$_SESSION['conta']=0;
		if($_SESSION['conta']<3)
		{
        if(isset($usuario) && !empty($usuario) && isset($clave) && !empty($clave))
        {
            $sql="SELECT usuario,clave FROM empleado where usuario='".$usuario."' AND estado = 0";
            $encrip=md5($clave);
            $res=mysqli_query($conn,$sql);

                while($resultado=mysqli_fetch_array($res))
                {

                  if($resultado['usuario']==$usuario && $resultado['clave']==$encrip)
                  {              

                       $count=true;
					   
                  }   
				  
                }
            if($count==true)
              {
                    $count=false;
					$_SESSION['conta']=0;
                     $_SESSION['usuario']=$usuario; 
                     $_SESSION['clave']=$clave;
                     ?>
                     <script>
                     window.location.href="home.php";
                     </script>
               <?php

              }
            else{
					
				
					$_SESSION['conta']=$_SESSION['conta']+1;				
					if($_SESSION['conta']>=3)
					{
					?>
					<script type='text/javascript'>alert('Su cuenta ha sido bloqueada');</script>
					<?php 
					}
					?>
					<script>
                   alert('Usuario o contrase\u00F1a err\u00F3neos ');
                   window.location.href="index.php";
                   </script>
                   <?php 
                }

        }
		}
		else
		?>
		
					<script>
                   window.location.href="index.php";
                   </script>
					<?php 
		
  }

?>
