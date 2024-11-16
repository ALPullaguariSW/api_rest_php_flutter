# Manual de Usuario: Configuración del Proyecto API REST + Flutter

Este manual describe los pasos necesarios para clonar y configurar el proyecto API REST + Flutter en tu máquina local.

---

## **Requisitos Previos**

Asegúrate de tener instalados los siguientes programas y herramientas:

1. **Windows 10/11** (o sistema operativo compatible con XAMPP y Flutter).
2. [**XAMPP**](https://www.apachefriends.org/index.html) (para PHP y MySQL).
3. [**Composer**](https://getcomposer.org/) (para dependencias de PHP).
4. [**Flutter SDK**](https://flutter.dev/docs/get-started/install).
5. [**Git**](https://git-scm.com/) (para clonar el repositorio).
6. [**Postman**](https://www.postman.com/) (opcional, para probar la API REST).

---

## **Paso 1: Clonar el Repositorio**

1. Abre una terminal (Git Bash o CMD).
2. Navega al directorio donde quieras clonar el backend:
   ```bash
   cd C:\xampp\htdocs
3. Clona el repositorio del backend:
   ```bash
   git clone <URL-DEL-REPOSITORIO> api_rest_app
4. Navega al directorio donde quieras clonar el frontend (Flutter):
   ```bash
   cd D:\Moviles
5. Clona nuevamente el repositorio, esta vez para el frontend:
   ```bash
   git clone <URL-DEL-REPOSITORIO> api_rest_app
   
## **Paso 2: Clonar el Repositorio**

1. Ve al directorio del backend:
   ```bash
    cd C:\xampp\htdocs\api_rest_app
2. Instala las dependencias con Composer:
   ```bash
   composer install
3. Crea la base de datos en MySQL:
  * Abre phpMyAdmin en tu navegador (http://localhost/phpmyadmin).
  * Crea una base de datos llamada:
     ```sql
     CREATE DATABASE api_rest_app;
  * Importa el archivo SQL proporcionado (si lo hay) o crea la tabla de usuarios manualmente:
    ```sql
    CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
    );
4. Reinicia Apache y MySQL desde el panel de control de XAMPP:
   ```bash
   cd D:\Moviles
5. Prueba el endpoint de login en tu navegador o con Postman:
   * URL: http://localhost/api_rest_app/login.php
   * Método: POST
   * Cuerpo de la solicitud (JSON)
   ```json
   {
    "username": "example",
    "password": "example_password"
   }
## **Paso 2: Clonar el Repositorio**
1. Ve al directorio del frontend:
   ```bash
    cd D:\Moviles\api_rest_app
2. Instala las dependencias de Flutter:
   ```bash
    flutter pub get
3. Conecta un dispositivo físico o inicia un emulador (Android Studio o Visual Studio Code).
4. Ejecuta la aplicación:
   ```bash
   flutter run
5. Verifica que la app se conecte correctamente al backend. Puedes ingresar credenciales para probar el login. 
## **Paso 2: Clonar el Repositorio**
1. Modifica el archivo _login.php_ para añadir endpoints protegidos que validen el token JWT.
2. En la app Flutter, incluye lógica para manejar tokens en solicitudes futuras.

### Nota Importante
* Actualiza los archivos composer.json o pubspec.yaml si añades dependencias adicionales.
* Asegúrate de que los puertos de Apache (80) y MySQL (3306) estén libres antes de iniciar XAMPP.

### Soporte
*Si encuentras problemas:*

1. Revisa los logs de errores de Apache en el panel de XAMPP.
2. Verifica las dependencias instaladas (Composer o Flutter).
3. Consulta la documentación oficial:
  * XAMPP
  * Flutter
  * JWT
