<!DOCTYPE html>

<html>

    <head>
        <title>Javascript: AJAJ</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <h1> Hecho por: Sebastián Montero Castro - B95016 </h1>
        <form>
            <select id="provinciaList" name="provinciaList" onchange="javascript:loadCantones();">
                <option value="0">Seleccione una provincia:</option>
            </select>
            <br><br><br>
            <select id="cantonesList" name="cantonesList" onchange="javascript:loadDistritos();" >
                <option value="0">Seleccione un cantón:</option>
            </select>
            <br><br><br>
            <select id="distritosList" name="distritosList" onchange="javascript:completed();">
                <option value="0">Seleccione un distrito:</option>
            </select>
        </form>

        <!-- SCRIPTS PARA CARGAR LA INFORMACION (USAN JQUERY) -->
        <script>
            var provincias = <?php include 'provincias.php'; ?>;
            var opciones = "";
            provincias.forEach(element =>{
                opciones += "<option value=" + element['id'] + ">" + element['nombre'] + "</option>";
            });
            document.getElementById("provinciaList").innerHTML += opciones;
        </script>

        <script>
            function loadCantones(){
                var provinciaSeleccionada = document.getElementById("provinciaList").value;
                if(provinciaSeleccionada != ""){
                    $.ajax({
                        url: "cantones.php",
                        type: "POST",
                        data: "{\"id\":"+provinciaSeleccionada+"}",
                        success: function(resp) {
                            var cantonesObtenidos = JSON.parse(resp);
                            var opciones = "";
                            cantonesObtenidos.forEach(element => {
                                opciones += "<option value=" + element['id'] + ">" + element['nombre'] + "</option>";
                            });
                            document.getElementById("cantonesList").innerHTML = "<option value=\"0\">Seleccione un cantón:</option>" + opciones;
                        }
                    })
                }
            }
        </script>

        <script>
            function loadDistritos(){
                var cantonSeleccionado = document.getElementById("cantonesList").value;
                if(cantonSeleccionado != ""){
                    $.ajax({
                        url: "distritos.php",
                        type: "POST",
                        data: "{\"id\":"+cantonSeleccionado+"}",
                        success: function(resp) {
                            var distritosObtenidos = JSON.parse(resp);
                            var opciones = "";
                            distritosObtenidos.forEach(element => {
                                opciones += "<option value=" + element['id'] + ">" + element['nombre'] + "</option>";
                            });
                            document.getElementById("distritosList").innerHTML = "<option value=\"0\">Seleccione un distrito:</option>" + opciones;
                        }
                    })
                }
            }
        </script>

        <script>
            function completed(){
                var img = document.createElement("img");
                img.setAttribute("src","https://www.models-resource.com/resources/big_icons/15/14995.png");
                document.body.appendChild(img);
                return false;
            }
        </script>
    </body>
</html>