#Proyecto mundoPerico


##PROYECTO
El presente proyecto consiste en una aplicación web basada en el patrón MVC (Model Vista Controlador), que ha sido implementada en el lenguaje de programación PHP y pensada para ser descargada y estudiada.

##Lenguajes
A parte de PHP, este proyecto incluye el uso de lenguajes tales como Markdown, que se utiliza para dotar de formato el presente documento, así como YAML y JSON, que son utilizados en archivos de configuración, así como SQL, que se utiliza para la creación de bases de datos con una carga inicial de datos y también para el acceso a los mismos.

##Tecnologías
Este proyecto, facilita el contacto inicial con las tecnologías más populares para la iniciación a las aplicaciones web. En este caso, y habiendo elegido PHP como lenguaje en que está implementada la aplicación, se utiliza php-fpm para la ejecución de su código; a parte se utiliza Nginx como servicio web para poder atender peticiones via HTTP y determinar cómo deben ser atendidas (pudiendo implicar la ejecución de la aplicación).

Por otro lado, se usan tecnologías como MariaDB para el almacenamiento de datos que son accedidos y presentados por la aplicación (en algunos casos), lo que implica la utilización de algunas extensiones PECL de PHP, tales como PDO, con su respectivo driver PDO-MySQL así como la extensión Mysqlnd que dota a PHP de la capacidad de comunicarse con una servicio de base de datos Mysql o MariaDB.

Finalmente se utilizan los ejecutables composer, que permite dotar a una aplicación escrita en PHP de librerías y paquetes (conocidos como vendors) que hay disponibles en packagist.org; y git, que por tratarse de un sistema descentralizado de control de versiones, se utiliza para gestionar la publicación de entregas de versiones de los archivos de la aplicación así como también para el despliegue de la misma.

#ESPECIFICACIÓN

##TEMÁTICA
La aplicación que hay detrás de este proyecto muestra un catálogo de certificados de profesionalidad de la familia IFCD (Desarrollo de Software).
En cada certificado constan varios apartados y un listado de sus módulos.
Para cada módulo, se ofrecerá un listado de sus Unidades Formativas y un resumen de sus contenidos.
Para estas últimas se mostrará un resumen de sus contenidos.

##FUNCIONALIDADES
La aplicación web sirve información de los contenidos albergados (certificados y unidades formativas) a partir de la carga de URLs.
En otras palabras, las URLs de la aplicación permiten obtener respuestas que correspondan con los parámetros de los mismos.

Listado de Contenidos
Esta funcionalidad se ofrece mediante una vista HTML que se carga para las rutas '' (vacía), '/' (barra), '/home' y '/home'.
La vista prepara una parrilla de los contenidos disponibles que se rellena mediante la carga de datos obtenidos de forma asíncrona mediante AJAX.
La carga de contenidos ocurre tras que suceda el evento load. Es entonces cuando se solicitan dichos contenidos mediante una llamada a la ruta ajax?contents=all.

``## REQUISITOS
### Sistema operativo y sistema de archivos
Para el correcto funcionamiento de la aplicación se necesitará disponer de un sistema operativo de tipo servidor como: Windows Server (en versiones 2016 o posterior), Ubuntu Server (en versiones 16.04 o posterior), Debian (en versiones 9 o posterior), Red Had Enterprise Linux (en versiones 6 o posterior), CentOS (en versiones 6 o posterior), Solaris (en versiones 11.3 o posterior) o Fedora (en versiones 25 o posterior).  
El sistema operativo deberá tener usuarios, entre los que se requerirá disponer de uno para el que puedan realizarse operaciones administrativas que permitan la instalación de [software de terceros (_3rd party software_)](https://techterms.com/definition/thirdparty). También deberá disponer de un sistema de archivos (detallado a continuación), de [interfaces de red](https://www.youtube.com/watch?v=PYTG7bvpvRI) y, [de una interfaz de consola o interfaz de línea de comandos](https://es.wikipedia.org/wiki/Interfaz_de_l%C3%ADnea_de_comandos).
El sistema de archivos debe permitir el uso de _sockets_ y el almacenamiento de archivos. Se necesitará usar un sistema de archivos _jerárquico_, preferiblemente que cumpla con [POSIX](https://pubs.opengroup.org/onlinepubs/9699919799/), en el que se dispongan del directorio `/var/www`, que será propuesto para el despliegue de la aplicación.
Se necesitará que los servicios web y de applicación puedan acceder en modo de lectura a la carpeta de aplicación que allí se creará tanto para poder servir respuestas a las peticiones _HTTP_ entregando los archivos que se soliciten, como también para poder abrir y leer el código de la aplicación.  
> **Nota: La aplicación ha sido probada en el sistema operativo CentOS 7 utilizando un sistema de archivos local, compatible con POSIX**.  
### Servicios y conexiones
Se necesitará disponer de un servidor web, ya sea Apache (versiones 2.4 o posterior) o Nginx (versión 1.11 o posterior).  
En el caso que se desee utilizar Nginx, se aconseja proveerlo en el sistema operativo siguiendo las instrucciones que se encuentran [en la documentación oficial que hay en nginx.com](https://www.nginx.com/resources/wiki/start/topics/tutorials/install/).  
El servidor web deberá escuchar en el puerto [_TCP_](https://es.ccm.net/contents/281-protocolo-tcp) [`80`](http://www.steves-internet-guide.com/tcpip-ports-sockets/), preferiblemente para todas las interfaces de red, e indispensablemente para aquella que pueda ser accedida desde el dispositivo cliente.  
También se necesitará disponer de un servidor de aplicaciones para la interpretación y ejecución de aplicaciones implementadas en _PHP_, con lo que se aconseja seguir las indicaciones para [instalación y configuración de la web oficial de PHP](https://www.php.net/manual/es/install.php).  
En el caso de nuestra aplicación se aconseja utilizar el demonio de aplicaciones [PHP-FPM](https://blog.guillen.io/2017/03/15/apache-instalar-y-configurar-php-fpm-fastcgi-process-manager/).  
Alternativamente pueden utilizarse [el módulo Fast-CGI](https://fastcgi-archives.github.io/) (disponible para una amplia gama de servidores web), que no debe confundirse con el módulo _fcgid_ ([disponible para Apache](https://httpd.apache.org/mod_fcgid/)).  
**Se desaconseja** en este caso utilizar [el módulo _PHP_ para Apache](https://cwiki.apache.org/confluence/display/HTTPD/PHP) o el [módulo _PHP_ para Nginx](https://medium.com/@getpagespeed/how-to-install-ngx-php7-nginx-module-in-centos-redhat-7-b9e0dacc67d2), o [equivalente](https://www.php.net/manual/es/install.php). 
Finalmente se necesitará disponer de un servidor de bases de datos para la gestión de la persistencia de los contenidos. En este caso la aplicación está pensada para utilizar servidores de bases de datos tipo MySQL, por lo que se aconseja elegir entre MySQL Community Server (versión 5.7 o posterior) y MariaDB (versión 10.11 o posterior).  
Para su instalación, se aconseja seguir las instrucciones que se indican en la [web oficial de MySQL](https://dev.mysql.com/doc/refman/8.0/en/installing.html) o en la [web oficial de MariaDB](https://mariadb.com/kb/en/library/getting-installing-and-upgrading-mariadb/), según la elección.
> **Nota: La aplicación ha sido probada utilizando el servidor web Nginx 1.17 para CentOS 7 del repositorio de https://nginx.org, el servidor de aplicaciones PHP-FPM 7.2 del repositorio php 7.2 de http://rpms.remirepo.net, que han sido interconectados mediante el [módulo Fast-CGI de Nginx](http://nginx.org/en/docs/http/ngx_http_fastcgi_module.html)**
### Paquetes, extensiones y librerías
Para que la aplicación pueda ejecutarse será necesario que se disponga del software _composer_, que debe adquirirse utilizando las instrucciones disponibles en [getcomposer.org/download](https://getcomposer.org/download/).  
Por otro lado, se necesitará instalar el software _git_ para poder realizar el despliegue de la aplicación.  
Para ello se sugiere realizar la instalación [atendiendo a la opción que corresponda con el Sistema Operativo elegido](https://git-scm.com/downloads).
Además, se hará altamente recomendable disponer del [software cliente de MySQL](https://dev.mysql.com/doc/refman/8.0/en/mysql.html) para intérprete de comandos, en tanto que las instrucciones de _despliegue de datos_ (ver más adelante) se facilitarán empleando este software.  
Para una correcta instalación de este software se aconseja seguir las [instrucciónes de la web oficial](https://dev.mysql.com/doc/refman/8.0/en/installing.html).
En cuanto a __PHP__ se requerirán las extensiones:
- [yaml](https://www.php.net/manual/es/book.yaml.php) : para la interpretación de textos en notación _YAML_
- [json](https://www.php.net/manual/es/book.json.php) : para la interpretación de textos en notación _JSON_
- [pdo](https://www.php.net/manual/es/book.pdo.php) : para la gestión abstracta de conexiones a servicios de bases de datos y al acceso a datos
- [pdo_mysql](https://www.php.net/manual/es/ref.pdo-mysql.php) : para la integración de _mysqlnd_ en _pdo_
- [mysqlnd](https://www.php.net/manual/es/book.mysqlnd.php) : para la conexión al servicio de base de datos
- [url](https://www.php.net/manual/es/book.url.php) : para el tratamiento de las URLs peticionadas en las solicitudes HTTP
Para sostener una correcta evolución futura de la aplicación, se aconseja instalar igualmente las [extensiones de _PHP_](https://www.php.net/manual/es/funcref.php):
- [opcache](https://www.php.net/manual/es/book.opcache.php): para la generación de una cache con los códigos de aplicación procesados como opcode, que es un tipo de bytecode
- [dom](https://www.php.net/manual/es/book.dom.php), [xmlreader](https://www.php.net/manual/es/book.xmlreader.php) y [xml](https://www.php.net/manual/es/intro.xml.php) : para la manipulación interna de archivos escritos en XML o HTML
- [mbstring](https://www.php.net/manual/es/book.mbstring.php) e [iconv](https://www.php.net/manual/es/book.iconv.php) : para una mejor gestión de la internacionalización (i18n) de los textos
- [bcmath](https://www.php.net/manual/es/book.bc.php) : para una mejor manipulación y operación con de valores _float_
- [curl](https://www.php.net/manual/es/book.curl.php) : para la connexión vía HTTP con servicios externos
- [gd](https://www.php.net/manual/es/book.image.php) : para la manipulación de imágenes y producción de códigos QR
- [tokenizer](https://www.php.net/manual/es/book.tokenizer.php) : para la generación de códigos aleatorios con los que validar accesos y acciones
Finalmente, y en relación a las extensiones de _PHP_, éstas funcionarán correctamente en Sistemas Operativos que dispongan de las librerías:
- [libyaml](https://www.php.net/manual/es/yaml.requirements.php) : para la extensión yaml
## INSTALACIÓN
Para instalar la aplicación es necesario disponer del software _git_, del software _composer_, del software cliente de consola de comandos _mysql_ y de connexión a internet.  
La instalación de la aplicación consiste en dos pasos:
- **El despliegue de la aplicación**
- **El despliegue de los datos**
### Despliegue
El despliegue de una aplicación web pasa por dos estadios, en los cuales se descargará una réplica de la aplicación en el directorio `/var/www`.  
En caso de no disponer de este directorio, deberá tomarse un directorio análogo que pueda ser accedido tanto por el servicio web como por el servicio de aplicaciones.  
Durante la posterior fase de configuración del entorno, a este directorio le llamaremos `HOSTS_ROOT`.  Por otro lado, al directorio con que se genere la aplicación (`/var/www/tuttifrutti.shop`) le llamaremos `APP_ROOT`, y al directorio de la aplicación que deberá ser servido por el servicio web (`/var/www/aplicaciones.web/public`) le llamaremos `DOCUMENT_ROOT`.
#### Aplicación
La descarga de la réplica de la aplicación se realiza mediante el software _git_ utilizando su [instrucción de clonado `clone`](https://git-scm.com/book/es/v1/Fundamentos-de-Git-Obteniendo-un-repositorio-Git).  Es justamente en esta operación cuando se hace imprescindible disponer de conexión a internet.  
Tras la descarga de la aplicación deberá crearse un archivo `autoload.php` que permitirá la carga de clases en la aplicación. Para ello se utilizará la [instrucción de volcado de clases `dump-autoload`][dump-autoload] del software _composer_ .
[dump-autoload]: https://getcomposer.org/doc/03-cli.md#dump-autoload-dumpautoload-
```bash
#!/bin/bash
cd HOSTS_ROOT
git clone https://github.com/temple/tuttifrutti.shop tuttifrutti.shop
cd APP_ROOT
composer dump-autoload``

Para realizar las anteriores operaciones será necesario utilizar una sesión de usuario del sistema operativo que disponga de permisos para acceder y escribir dentro del directorio HOSTS_ROOT.
Naturalmente dicho usuario debe tener permiso de ejecución de los software git y composer.

Nota: Una vez desplegada la réplica de la aplicación deberemos comprobar la existencia del directorio APP_ROOT. Este directorio y su contenido, también deberá poder ser accedidos en modo lectura por el servicio de aplicaciones. En cuanto al directorio DOCUMENT_ROOT, deberá ser accesible en modo lectura por el servicio web.

##Datos
El despliegue de los datos se realiza utilizando el software mysql antes mencionado.
Mediante este software se realizará una carga en el servicio de bases datos, de los datos contenidos en el archivo app.init.sql que encontraremos en la carpeta data que habrá dentro del directorio APP_ROOT.

Esta operación requerirá que el servicio de base de datos esté en funcionamiento, y escuche un puerto TCP en una dirección IP que sea accesible por parte del sistema operativo en el que hemos realizado el despliegue de la aplicación .

Nota: En caso de tratarse de un servicio MySQL en un sistema linux basado en systemd como Ubuntu, Debian, Fedora, CentOS o Red Hat Enterprise Linux, pueden ejecutarse, usando un usuario con permisos de administración de servicios, las instrucciones systemctl start mysqld o systemctl start mariadb para poner en marcha dicho servicio en el sistema en el que esté instalado, según se trate de MySQL o de MariaDB respectivamente.

Para la realización del despliegue de los datos será necesario disponer de las credenciales de un usuario del servicio de bases de datos que tenga permiso para crear una base de datos.
En nuestro caso partimos de la base de que se dispone del usuario root y que este puede crear bases de datos en el servicio. También partimos de la base de que el servicio de base de datos está accesible a través del protocolo TCP en el puerto 3306 de la dirección IP 127.0.0.1 (conocida como localhost) a los que llamaremos respectivamente DB_PORT y DB_HOST.

Para el despliegue inicial de datos deberemos ejecutar las siguientes instrucciones:

``#!/bin/bash
cd APP_ROOT
mysql -u root -p -P DB_PORT -h DB_HOST < data/app.init.sql``



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
define ("DB", $pdo);
foreach($pdo->query('SELECT * from mydb.usuario') as $fila) {
        print_r($fila);
    }`

Los archivos .sql estan guardados en la carpeta data dentro del proyecto.