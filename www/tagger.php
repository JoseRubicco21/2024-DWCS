<?php declare (strict_types=1);
    require './tagsEnum.php';

    function surroundWith(Tags $tag, mixed $value) : string {
        return "<$tag>" . $value . "</$tag>";
    };

    function append(Tags $tag, mixed $value) : string {
        return $value . "<$tag>" . $tag . "</$tag>";
    }

    function preppend(Tags $tag, mixed $value) : string {
        return  "<$tag>" . $tag . "</$tag>" . $value;
    }


?>