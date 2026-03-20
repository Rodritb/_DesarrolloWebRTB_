<?php

class examen 
{
    public $cadena1;
    public $cadena2;

    function __construct($c1, $c2) {
        $this->cadena1 = $c1;
        $this->cadena2 = $c2;
    }

   function cruzar() 
    {

        $encontro = false;

        for ($i = 0; $i < strlen($this->cadena1); $i++) 
        {
            
                $letraC1 = $this->cadena1[$i]; 

            for ($j = 0; $j < strlen($this->cadena2); $j++) 
            {

                $letraC2 = $this->cadena2[$j]; 
                
                if (strtolower($letraC1) == strtolower($letraC2)) 
                {

                    $encontro = true;
                    
                    echo "<table border='1'>";
        
                    $longC1 = strlen($this->cadena1);             
                    
                    for ($k = 0; $k < $j; $k++) 
                    {
                        echo "<tr>";
                        
                        for ($m = 0; $m < $i; $m++) 
                        {   
                            echo "<td></td>";
                        }
                       
                        echo "<td style='background-color:lightblue'>" . $this->cadena2[$k] . "</td>";
                        echo "</tr>";
                    }

                    
                    echo "<tr>";
                    for ($m = 0; $m < $longC1; $m++) 
                    {
                        if ($m == $i) 
                        {                      
                            echo "<td style='background-color:lightblue'>" . $this->cadena1[$m] . "</td>";
                        } else 
                        {
                            echo "<td>" . $this->cadena1[$m] . "</td>";
                        }
                    }
                    echo "</tr>";
                   
                    for ($k = $j + 1; $k < strlen($this->cadena2); $k++) 
                    {
                        echo "<tr>";
                        for ($m = 0; $m < $i; $m++) 
                        {
                            echo "<td></td>";
                        }
                        echo "<td style='background-color:lightblue'>" . $this->cadena2[$k] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table><br>";

                    break; 
                }
            }
            if ($encontro) break;
        }
        if (!$encontro) 
        {
            echo "<p>no existen letras comunes</p>";
        }
    }
}

?>