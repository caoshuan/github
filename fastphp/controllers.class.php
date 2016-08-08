<?php
class controllers
{
    public function requireview($name)
    {
        require VIEW_PATH."$name".'.php';
    }
}
