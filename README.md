## Bienvenido a DadoRoom
Este mini Framework incluye un script MySQL con una base de datos, 

### Para usar el ejemplo incluido debes:
1. Ejecutar el script de base de datos
2. Editar el archivo `libs/BD.php` con los valores de la base de datos (Usuario, Contraseña y Host)
3. listo.
 
```markdown
Valores a cambiar en `libs/BD.php`
$db_host = "localhost"; cambiar si solo se quiere conectar a una base de datos que no este en tu propio servidor
$db_username = "root"; cambiar a tu usuario; root es el usuario por defecto en wamp
$db_pass = ""; colocar la contraseña de tu usuario, 
$db_name = "dadoroom";  el nombre de la base de datos, dadoroom en el nombre de la base de datos de ejemplo incluido
```
 ### Para empezar a crear tu propio proyecto debes:
1. Cambiar los valores de tu base de datos si es que quieres usar una, en `libs/BD.php`
2. Cambiar los siguientes valores en `libs/App.php`
```markdown
Valores a cambiar
`public $base_url = "http://localhost/DadoRoom/"; `
  - Deberas de cambiar DadoRoom por el nombre de tu proyecto para que se tenga un metodo para traer la tu url.
  - Esta variable sirve para poner un ruta directa a varios procesos necesitan una url estatica
  - Puedes llamar esta url en las vistas ejecutadas por controladores que tengan de herencia la clase App con  $this->base_url(), 
    por ejemplo esta variable esta los archivos de complementos/referencias
    
`public $controlador_default = "Home";`
  -Controlador por defecto, modificar si quiere cambiar su controlador principal
   
```
 3. Verificar valores de la clase sesiones en  `libs/sesiones.php`
```markdown
Valores a cambiar
  `public $filtro_usuario`
  - Si esta variable es verdadera(true) se ejecutara un filtro por la cual al ingresar al sistema verificara si el usuario tiene sesion iniciada, de no tener sesion se redireccionar a una pagina determinada.
  - De ser falso(false) no se ejecutara dicho filtro
  
   `public $inicio_sesion_vista = "Home/inicio";`
   -Metodo seleccionado para ejecutar la vista para iniciar sesion si esque se tiene el filtro activado
    
   `public $carpeta_recursos = "Assets";`
   -Carpeta de recursos por la cual no se ejecutara dicho filtro, ya que si se ejecutara no se permitiria el uso de estos recursos si no se tiene una sesion iniciada
    
   
   `public $sesion_usuario = "usuario";`
   -Nombre de la sesion principal.
```
 ## Modelo
 Al crear un modelo, se debe tener una herencia de la clase Modelo del archivo `libs/Modelo.php`
 
 ```markdown
Variables y datos al considerar al crear un archivo Modelo, (se usara los datos del ejemplo)
  `public $tabla = "usuarios";`
  - Colocar el nombre de la tabla de la base de datos
  
   `public $pk = "idUsuario";`
   -Colocar el id principal de la tabla seleccionada
    
   `public $entidad = true;`
   - *Importante* En algunos casos se guardan datos diferentes de lo que se muestran en la base de datos, por ejemplo el `estatus`  de usuario se guarda con valores 1 o 0, pero al usuario se le muestra como activo o inactivo, para esto se puede usar una clase entidad donde se pueden filtrar los datos antes de mostrarlos al usuario final, favor de checar el ejemplo.
   - Si esta variable esta en true, se buscara el archivo de la variable `$entidad_nombre` en la carpeta de Entidad, si no se tiene esta clase marcara un error.
    
   `public $entidad_nombre = "UsuarioEntidad";`
   -Nombre de la entidad usada para los datos del modelo, este nombre tiene que ser igual al archivo dentro de la carpeta Entidad, de lo contrario marcara un error
    
   `public $columnas `
   -Colocar las columnas de la tabla dentro del arreglo, estas se utilizan para los procesos de insert y update.
```
 
 ## Trabajar con la base de datos
 Para la insercion de datos utilizar `save` 
 Ejemplo para guardar datos en la tabla usuario desde un controlador: 
 
```markdown
 Guardar todos los datos en un arreglo:
  $datos["usuario"]="dado";  
  
  $datos["password"]="12345";
  
  $datos["rol"]=0;
  
  $datos["estatus"]=1;
   
        /* Llamar al Modelo Usuarios */
        `require_once 'Modelo/UsuarioModel.php';`
        /* Crear Objeto */
        `$usuarioM = new UsuarioModel();`
        
        /* Guardar Datos, usar obejeto para llamar el metodo save y pasar el arreglo */
        `$usuarios = $usuarioM->save($datos);`
        
        /*Con las columnas en el arreglo $columnas, se buscara el nombre de los valores del arreglo $datos, se comparan y se crea el script para poder guardar los datos en la abse de datos*/
        #### Este metodo retorna el ultimo id guardado en la base de datos
        
        
 ```
 
 
 
