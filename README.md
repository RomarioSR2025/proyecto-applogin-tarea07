# 🚀 Proyecto Login con Avatar - CodeIgniter 4

Este proyecto implementa un **sistema de login y registro de usuarios con avatar opcional** utilizando **CodeIgniter 4**, ideal para ejecutarse en **Laragon** o cualquier entorno con PHP y MySQL.

---

## 📌 Características

* Registro de usuarios con:

  * Nombre
  * Correo electrónico
  * Contraseña (encriptada con `password_hash`)
  * Avatar opcional (imagen de perfil)
* Login con validación de credenciales.
* Pantalla de bienvenida mostrando el avatar del usuario (si existe).
* Manejo de rutas y controladores en CodeIgniter 4.

---

## ⚙️ Requisitos

* [Laragon](https://laragon.org/) o entorno con:

  * PHP >= 7.4
  * MySQL/MariaDB
  * Composer
* CodeIgniter 4

---

## 📂 Instalación

1. Clonar o descargar este proyecto en la carpeta `www` de Laragon:

   ```bash
   cd C:\laragon\www
   git clone https://github.com/tuusuario/miapp.git
   ```

2. Instalar dependencias:

   ```bash
   composer install
   ```

3. Crear base de datos en MySQL:

   ```sql
   CREATE DATABASE miapp;
   USE miapp;

   CREATE TABLE usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100) NOT NULL,
       email VARCHAR(150) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       avatar VARCHAR(255) DEFAULT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Configurar la conexión en `app/Config/Database.php`:

   ```php
   public $default = [
       'hostname' => 'localhost',
       'username' => 'root',
       'password' => '',
       'database' => 'miapp',
       'DBDriver' => 'MySQLi',
       'DBDebug'  => (ENVIRONMENT !== 'production'),
   ];
   ```

---

## 📂 Estructura principal

```
app/
 ├── Controllers/
 │    └── Usuarios.php   # Controlador de login y registro
 ├── Models/
 │    └── UsuarioModel.php
 ├── Views/
 │    ├── login.php
 │    ├── registro.php
 │    └── bienvenida.php
public/
 └── uploads/avatars/    # Carpeta donde se guardan los avatares
```

---

## 🚀 Uso

1. Iniciar Laragon y abrir en el navegador:

   * Registro: [http://localhost/miapp/public/index.php/usuarios/registro](http://localhost/miapp/public/index.php/usuarios/registro)
   * Login: [http://localhost/miapp/public/index.php/usuarios/login](http://localhost/miapp/public/index.php/usuarios/login)

2. Registrar un usuario (con o sin avatar).

3. Iniciar sesión con ese usuario.

4. Ver pantalla de bienvenida y avatar.

---

## ✅ Notas

* Los avatares se guardan en la carpeta `public/uploads/avatars`.
* El campo avatar en la base de datos puede ser `NULL`.
* Se recomienda configurar **.env** con la base de datos en lugar de editar `Database.php` directamente.

---

## 📄 Licencia

Este proyecto es libre para uso educativo y de prueba.
