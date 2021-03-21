<?php

function inputElement($icon, $placeholder, $name, $value, $type)
{
    $ele = "
        <div>
        <h5>$icon : $placeholder</h5>
        <div class=\"input-lg\">
        <input type=\"$type\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
        </div>
        </div>
    
    ";
    echo $ele;
}

function inputTextArea($icon, $placeholder, $name, $value, $rows, $cols)
{
    $ele = "
        <div>
        <h5>$icon : $placeholder</h5>
        <div class=\"input-lg\">
        <textarea rows=\"$rows\" cols=\"$cols\" name='$name' value='$value'  placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\"></textarea>
        </div>
        </div>
    
    ";
    echo $ele;
}

function inputDropDown($icon, $placeholder, $name, $value)
{

    $ele = "
    <div>
    <h5>$icon : $placeholder</h5>
    <div class=\"input-lg\">
    <select class=\"form-control\" name='$name'>
    <option value=\"1\">Indoor Games</option>
    <option value=\"2\">Outdoor Games</option>
    <option value=\"3\">Educational Meetups</option>
    <option value=\"4\">Collection</option>
    <option value=\"5\">Art</option>
    <option value=\"6\">Cooking</option>
    <option value=\"7\">Music</option>
    </select>
    </div>
    </div>

";
    echo $ele;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr)
{
    $btn = "
        <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}

function searchBar($btnid, $styleclass, $text, $name, $attr)
{
    $btn = "
    <div class=\"input-group col-md-5\">
    <input type=\"text\" class=\"form-control\" placeholder=\"Client Name\" name=\"keyword\" required=\"required\" />
    <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    </div>
";
    echo $btn;
}
