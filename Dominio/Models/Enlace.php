class Enlace
{
    private $id;
    private $titulo;
    private $descripcion;
    private $url;
    private $fecha;
    private $autor;
    private $id_usuario;
    
    public function __construct()
    {
        $this->id = null;
        $this->titulo = null;
        $this->descripcion = null;
        $this->url = null;
        $this->fecha = null;
        $this->autor = null;
   }

    public function getData()
    {
        return array( 
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'url' => $this->url,
            'fecha' => $this->fecha,
            'id_usuario' => $this->id_usuario
        );
    }

    public function set ($attribute, $data )
    {
        $this->$attribute = $data;
    }


}