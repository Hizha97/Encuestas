<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 11:27
 */

require_once ('RenderTrait.php');
class Navbar
{
    use RenderTrait;
    public $title;
    public $links;

    public function __construct($title, $links)
    {
        $this->title = $title;
        $this->links = $links;
    }

    public function render()
    {
        echo "<nav>";
        echo sprintf("<div class = %s>", "nav-wrapper");
        echo sprintf("<a href= %s class = %s > %s </a>", '#', 'brand-logo', $this->title);
        echo sprintf("<ul id= %s class = %s>", 'nav-mobile', 'right hide-on-med-and-down');

        foreach ($this->links as $index => $value)
        {
            echo "<li>";
            echo sprintf("<a href = %s> %s </a>", $index, $value);
            echo "</li>";
        }

        echo"</div>";
        echo "</nav>";

    }


}