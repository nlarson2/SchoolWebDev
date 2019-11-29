<?php 
    require_once("PageLib.php");

    class ContactForm {
        public $action = "./contact.php";
        public $method = "post";
        private $formCode = "";
        private $formClose = "";
        private $postedValues = array();
        
        public function __construct($arg=NULL) {
           $this->formCode.= "<form action='$this->action' method='$this->method'>\n";
           $this->formClose .= "</form>";
        }

        public function displayForm()
        {
            echo$this->formCode;
            echo$this->formClose;
        }
        //------------------Label String, id = $for 
        public function addLabel($label, $for) {
           $this->formCode .= "<label id = '$for'>$label:</label><br>\n";
        }

        public function addInput($type, $id, $name, $placeholder='', $value='', $required=true) {
           $this->formCode .= "<input type = '$type' id = '$id' name = '$name' ";
           $this->formCode .= "placeholder = '$placeholder' value = '$value'";
            if($required)
               $this->formCode .= " required";
           $this->formCode .= "><br>\n";
        }

        public function addTextArea($id, $name,$placeholder='', $rows=8, $cols=40, $required=true) {
           $this->formCode .= "<textArea";
           $this->formCode .= " id = '$id' name = '$name' placeholder = '$placeholder'";
           $this->formCode .= " rows ='$rows' cols = '$cols'";
            if($required)
               $this->formCode .= " required";
           $this->formCode .= "></textarea><br>\n";
        }
    }
    class ContactPage extends Page {
        
        public $form;

        public function __construct($arg=NULL) {
           $this->form = new ContactForm();
        }

        public function displayPage() {
            $this->displayHead();
            $this->displayNav();
            $this->displayBody();
            $this->form->displayForm();
            $this->displayFooter();
        }
    }
?>