#Proyecto mundoPerico


##Instalacion Virtual-Box y configuracion.

Para crear la nueva "virtual-box" he modificado el archivo backend.pp de la ruta backend/puppet/manifests/ y he añadido el siguiente codigo:

``nginx::resource::server{"mundoperico.com":
  use_default_location => false,
  listen_port => 80,
  www_root  => "/var/www/mundoperico.com/public",
  index_files => [ 'index.html', 'index.php' ],
}
# Qué hará nginx por defecto con este "server"
nginx::resource::location{ 'mundoperico.com/':
  server      => "mundoperico.com",
  location => '/',
  # Esta configuración pertenece al dominio que digamos
  ensure         => present,
  # Esta configuración debe quedar escrita siempre
  # en algún fichero de configuración de nginx 
  # por lo tanto puppet creará un archivo en /etc/nginx/conf.d/
  autoindex   => 'off',
  # No se listará el contenido de la carpeta
  location_cfg_append =>{
    try_files => '$uri /index.php$is_args$args' 
  },
  index_files => ['index.php']
}
nginx::resource::location { "mundoperico.com/index.php":
  server         => "mundoperico.com",
  location       => '~ ^/index\.php(/|$)',
  ensure         => present,
  fastcgi        => "${url_servidor_aplicaciones}",
  # location of fastcgi 
  fastcgi_split_path => '^(.+\.php)(/.*)$',
  # Info para el servidor de aplicaciones
  #location_cfg_append =>{
  # Info para el servidor de aplicaciones
  # fastcgi_split_path_info => '^(.+\.php)(/.*)$'
  #},
  fastcgi_param  => {
    'APP_ENV'          => 'dev',
    'SCRIPT_FILENAME'  => '$realpath_root$fastcgi_script_name',
    'DOCUMENT_ROOT'    => '$realpath_root'
  }
}``

En la consola de vagrant usamos la instruccion: `vagrant provision`

Abrir el archivo hosts de c:\usuarios\system32\drivers\etc\ con un editos de texto como Administrador y añadimos lo siguiente: 

`192.168.33.10 mundoperico.com`



##Despliegue

Para desplegar el repositorio de git hub se hace un `git clone https://github.com/DucKa23/mundoperico.com.git` en la consola de vagrant.

Para poder probar el proyecto tenemos la opcion de entrar a varios modulos, estos son:

##Prueba del proyecto

Entramos en los diferentes modulos donde cada uno tendra su controlador y su vista. Para probarlo entramos en un navegador y haremos lo siguiente: 


**mundoperico.com y mundoperico.com/home** que aparecera la vista de inicio del modulo Home.

**mundoperico.com/noticia** que aparecera la vista de noticia del modulo noticia..

**mundoperico.com/error** que aparecera cuando la direccion no exista y saldra la vista error del modulo Error. 

Ejemplo: mundoperico.com/asdasdadasd



**mundoperico.com/login** que aparecera la vista de login del modulo login.

**mundoperico.com/historia** que aparecera la vista de historia del modulo historia.

**mundoperico.com/registro** que aparecera la vista de registro del modulo registro.

**mundoperico.com/contact** que aparecera la vista de contact del modulo Contact.

En esta pagina podemos comprobar el uso de JQuery y AJAX.


##Base de datos


Como tenemos instalado el PDO anteriormente, modificamos el archivo app.yml y añadimos:

`db:
  host: localhost
  dbname: mydb
  user: root
  pass: secret`


y en el archivo bootstrap.php añadimos lo siguiente para la conexion a la bbdd desde el primer momento;

`$host = $GLOBALS['config']['app']['db']['host'];
$scheme = $GLOBALS['config']['app']['db']['dbname'];
$usuario = $GLOBALS['config']['app']['db']['user'];
$contraseña = $GLOBALS['config']['app']['db']['pass'];
$pdo = new PDO('mysql:host='.$host.';dbname='.$scheme, $usuario, $contraseña);
define ("DB", $pdo);`


Los archivos .sql estan guardados en la carpeta data dentro del proyecto.