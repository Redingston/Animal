<?php
function create_input($name,$label,$type,$errors){
    $isError=false;
    $isInvalid='';
    $value='';
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $isValue=isset($_POST[$name]) and !empty($_POST[$name]);
        if($isValue)
            $value=$_POST[$name];
        $isError=isset($errors[$name]) and !empty($errors[$name]);
        $isInvalid=$isError? 'is-invalid':'';
    }
    print <<<END
        <div class="form-group">
            <label for="$name">$label</label>
            <input type="$type" class="form-control $isInvalid"
                id="$name" name="$name" value="$value"/>
END;
    if ($isError)
        print <<<END
            <div class="invalid-feedback d-block">
                $errors[$name]
            </div>
END;
    echo '</div>';
}

