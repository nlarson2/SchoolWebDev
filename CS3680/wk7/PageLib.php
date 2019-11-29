<?php // PageLib.php   - contains Page class definition

class Page {
    ////////////////////////////
    public $title = "";
    public $content = "";
    public $links=array();
    ////////////////////////////


    public function displayHead() {
        echo "<!doctype html><html>\n".
            "<head>\n<title>$this->title</title>\n".
            "<link rel = 'stylesheet' href='style.css'>\n".
            //"<style>h1{color:red;}</style>".
            "</head>\n<body>\n";
    }
    public function displayNav() {
        echo "<nav>\n";
        foreach($this->links as $link=>$url) {
            echo "<a href='$url'>$link</a>\n";
        }
        echo "</nav>\n";
    }

    public function displayBody() {
        echo "$this->content";
    }
    public function displayFooter() {
        echo "<footer>\n<p>Footer</p>\n</footer>";
        // before closing body
        // echo "<script>  ... </script> ";
        echo "</body>\n</html>\n";
    }
    
    public function displayPage() {
        $this->displayHead();
        $this->displayNav();
        $this->displayBody();
        $this->displayFooter();
    }
}

?>
