<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->lang->load(array('header', 'contact'));
    }

	public function index()
	{
        $this->load->view('modulos/header');
        $this->load->view('contact/mapa_contacto');
        $this->load->view('contact/index');
        $this->load->view('modulos/footer');
    }
    
    public function send(){
        /*
         * Cuando cargamos una librería
         * es similar a hacer en PHP puro esto:
         * require_once("libreria.php");
         * $lib=new Libreria();
         */
          
         //Cargamos la librería email
         $this->load->library('email');
          
         /*
          * Configuramos los parámetros para enviar el email,
          * las siguientes configuraciones es recomendable
          * hacerlas en el fichero email.php dentro del directorio config,
          * en este caso para hacer un ejemplo rápido lo hacemos 
          * en el propio controlador
          */
          
         //Indicamos el protocolo a utilizar
          $config['protocol'] = 'smtp';
           
         //El servidor de correo que utilizaremos
          $config["smtp_host"] = 'smtp.gmail.com';
           
         //Nuestro usuario
          $config["smtp_user"] = 'correo@gmail.com';
           
         //Nuestra contraseña
          $config["smtp_pass"] = 'contraseña';    
           
         //El puerto que utilizará el servidor smtp
          $config["smtp_port"] = '587';
          
         //El juego de caracteres a utilizar
          $config['charset'] = 'utf-8';
   
         //Permitimos que se puedan cortar palabras
          $config['wordwrap'] = TRUE;
           
         //El email debe ser valido  
         $config['validate'] = true;
         
          
        //Establecemos esta configuración
          $this->email->initialize($config);
   
        //Ponemos la dirección de correo que enviará el email y un nombre
          $this->email->from('correo@gmail.com', 'Victor Robles');
           
        /*
         * Ponemos el o los destinatarios para los que va el email
         * en este caso al ser un formulario de contacto te lo enviarás a ti
         * mismo
         */
          $this->email->to('correo@gmail.com', 'Víctor Robles');
           
        //Definimos el asunto del mensaje
          $this->email->subject($this->input->post("asunto"));
           
        //Definimos el mensaje a enviar
        $this->email->message(
            "Nombre: ".$this->input->post("nombre").
            "Telefono: ".$this->input->post("telefono").
            "Email: ".$this->input->post("email").
            "Asunto: ".$this->input->post("asunto").
            "Mensaje: ".$this->input->post("mensaje")
        );
           
          //Enviamos el email y si se produce bien o mal que avise con una flasdata
          if($this->email->send()){
              $this->session->set_flashdata('envio', 'Email enviado correctamente');
          }else{
              $this->session->set_flashdata('envio', 'No se a enviado el email');
          }
           
          redirect(base_url("contact"));
     }    
}
