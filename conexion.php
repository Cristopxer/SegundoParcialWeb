<?php   
class conexion {
    //Definiendo los atributos de la clase
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;
    public  $total_consultas;
    
    
    public function __construct() {
        require_once 'config_db.php';
        $this->host=HOST;
        $this->user=USER;
        $this->password=PASSWORD;
        $this->database=DATABASE;
        $this->CrearConexion();	        	        
    }

    public function Ejecutar($sql){ 
      $this->total_consultas++; 
      $resultado = mysqli_query($this->conn,$sql);
      if(!$resultado){ 
        echo 'MySQL Error: ' . mysqli_error($resultado);
        exit;
      }
      return $resultado;
    }

    
    public function CrearConexion(){
        // Metodo que crea y retorna la conexion a la base de datos
        try {
            $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database) or die('No se pudo conectar: ' . mysqli_error($this->conn));
	       // echo 'Conectado a base de datos <BR>';
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            //echo $exc->getMessage();
        }        
    }
    
    public function CerrarConexion(){
        //Metodo que cierra la conexion
        $this->conn->close();
    }
}
?>
