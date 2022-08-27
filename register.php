<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
        function valideKey(evt){
            
        // code is the decimal ASCII representation of the pressed key.
        var code = (evt.which) ? evt.which : evt.keyCode;
            
        if(code==8){ // backspace.
            return true;
        }else if(code>=48 && code<=57){ // is a number.
            return true;
        }else{ // other keys.
            alert("Ingresar solo numeros");
            return false;
            }
        }

        function SoloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
            especiales = [8,13,48,49,50,51,52,53,54,55,56,57];
            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            alert("Ingresar solo letras y numeros");
            return false;
        }
    }
    </script>

    <title>StuBank</title>
</head>
<body>
    <form action="comprobar_register.php" method="post">

		<label>Numero de cuenta:</label>
        <input type="text" name="nCuenta" required>

        <label>Usuario:</label>
        <input type="text" name="name_user" onkeypress="return SoloLetras(event);" required>

        <label>Apellido paterno:</label>
        <input type="text" name="apellidoP" onkeypress="return SoloLetras(event);" required>

        <label>Apellido materno:</label>
        <input type="text" name="apellidoM" onkeypress="return SoloLetras(event);" required>

		<label>Telefono:</label>
		<input type="tel" maxlength="10" name="telefono_user" onkeypress="return valideKey(event);" required>

		<label>Fecha de nacimiento:</label>
        <input type="date" name="fecNac" required>

		<label>Correo electronico:</label>
		<input type="email" name="correo_user" required>

		<label>CURP:</label>
        <input type="text" name="curp" required>

        <label>Contraseña:</label>
        <input type="password" name="passw_user" required>

        <label>Confirmar contraseña:</label>
        <input type="password" name="passw_user2" required>

		<center>
			<input type="submit" value="Registrarse">
		</center>
    </form>
</body>
</html>