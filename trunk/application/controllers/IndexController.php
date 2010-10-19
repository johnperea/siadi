<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
	
    public function indexAction()
    {
	    $this->view->title = "Login Siadi";
			//A�adimos el t�tulo, delante del t�tulo definido por defecto para nuestra aplicaci�n
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Instanciamos el formulario
			$form = new Form_LoginUsuario();
			//Especificamos el nombre del bot�n de env�o del formulario
			$form->submit->setLabel('Entrar');
			//$form->setAction('/persona/');
			//Asignamos a la vista el formulario
			$this->view->form = $form;
	
			if ($this->getRequest()->isPost()){ //Si se env�an los datos, los recuperamos del formulario
				$formData = $this->getRequest()->getPost();
				if ($form->isValid($formData)){ //Validamos que los datos recibidos sean correctos
					//Asignamos los valores recuperados a variables
					
					
					$this->view->mensaje = "Error login";
					
					
					?>
					JOHN
					<?php
					
					
					$usuario = $form->getValue('usuario');
					$contrasena = $form->getValue('contrasena');
					
					$Personas = new Model_DbTable_Personas();
					$sujeto = $Personas->usuarioPersona($usuario);
					
					
					if($sujeto['usuario'] == $usuario && $sujeto['contrasena'] == $contrasena){
					
						return $this->_forward('/persona/');
					
					}
					else{
						$this->view->mensaje = "Error login";
						return $this->_forward('/persona/');
					}
					
					
					
					
					
					
					
					
					//$Personas = new Model_DbTable_Personas();
					//Insertamos el nuevo Persona en nuestra BBDD
					//$Personas->addPersona($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena );
					//Redireccionamos a la home, donde podremos ver el nuevo Persona introducido.
					//$this->_redirect('/');
				}else{ //Si los datos del formulario, no son v�lidos, se muestra el formulario con los datos de nuevo.
					$form->populate($formData);
				}
			} // action body
			else{
			
			
			}
			//
    }


}

