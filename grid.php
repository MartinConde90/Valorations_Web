
<!DOCTYPE html>
<html>
    <head>
    
    <meta charset="utf-8" name="viewport" content="widh=device-width,initial-scale=1.0">
        <title>Elemento</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <style>
            .conjunto{
                width: 100%;
            }
        </style>
    </head>
    
    
    <body>
        
        <table cellpadding="2" cellspacing="3" border-collapse="separate"; class="conjunto">
        <tr >
            <div>
                <h1>Apocalipsis</h1>
                
            </div>
            <td  class="contenidoE">
                <div>
                    <form>
                            <p class="clasificacion">
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <label for="radio1">&#10031;</label>
                                <input id="radio2" type="radio" name="estrellas" value="4">
                                <label for="radio2">&#10031;</label>
                                <input id="radio3" type="radio" name="estrellas" value="3">
                                <label for="radio3">&#10031;</label>
                                <input id="radio4" type="radio" name="estrellas" value="2">
                                <label for="radio4">&#10031;</label>
                                <input id="radio5" type="radio" name="estrellas" value="1">
                                <label for="radio5">&#10031;</label>
                            </p>
                        </form>
                </div>
                <div class="imagen">
                    <img src="img/Cocge.jpg">
                </div>  
                <h2>Sinopsis:</h2>
                    
                    
                <p class="sinopsis">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                 Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                   remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </td>
            <td class="informacion">
                <h2>Título Original:</h2>
                <h2>Género:</h2>
                <h2>Subgénero:</h2>
                <h2>Autor:</h2>
                <h2>País:</h2>
                <h2>Editorial:</h2>
                <h2>Fecha de publicación:</h2>
                <h2>Número de páginas:</h2>
                <h2>Saga:</h2>
            </td>
        </tr>
        <tr>    
            <td class="comentarios">
                <input type="text" placeholder="Escribe algo para publicar">
                <div class="comentarioUsuario">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                 Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                   remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                </div>
            </td>
            
        </tr>
</table>

        

    </body>
    <footer>Este documento fue escrito en 2011.</footer>
</html>