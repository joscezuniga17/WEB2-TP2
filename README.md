# TP-parte2
## Integrantes:
*Nombre: Joscelyn Agustina Zuñiga

*Email: zunigajosce@gmail.com

## Tematica: Playlist Musical
## Descripción:
Consiste en un sistema web que permite a los usuarios iniciar sesión y gestionar playlists musicales personalizadas. Cada usuario podrá crear y administrar sus propias listas de reproducción, agregando o eliminando canciones según sus preferencias.
Además, cada canción podrá incluir información como título, artista, género, estado de ánimo (mood) y un enlace a YouTube para su reproducción externa.
La aplicación también ofrecerá funcionalidades de búsqueda y filtrado, permitiendo a los usuarios encontrar canciones según su género o mood musical (por ejemplo: “feliz”, “fiesta”, “triste”).
El objetivo es brindar una experiencia simple de gestión musical personalizada.

Para ejecutar la aplicación se necesita:
- Apache
- MySQL
- PHP
- XAMPP (recomendado)

# Instalación
1. Copiar la carpeta del proyecto dentro de:
C:\xampp\htdocs\TP2
2. Iniciar Apache y MySQL desde XAMPP.
3. Ingresar a phpMyAdmin:
http://localhost/phpmyadmin
4. Crear la base de datos:
db_playlist
5. Importar el archivo SQL incluido en el proyecto.
6. Verificar que la configuración de conexión coincida con:
. Host: localhost
.Usuario: root
. Contraseña: vacía
 .Base de datos: db_playlist
7. Abrir en el navegador:
http://localhost/TP2/
# Acceso administrador
Para acceder a las funciones protegidas se debe iniciar sesión con:
Usuario: webadmin  
Contraseña: admin
## Funcionalidades

# Usuario público
. Visualizar playlists
. Ver listado de canciones
. Ver detalle de canciones
# Administrador
Luego de iniciar sesión puede:
. Agregar canciones
. Editar canciones
. Eliminar canciones
. Administrar playlists
# Navegación
Rutas principales:
. `/home`
. `/listar`
. `/login`
. `/logout`



