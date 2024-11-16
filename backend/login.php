<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";
$db = new mysqli("localhost", "root", "", "api_rest_app");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $username = $input['username'];
    $password = $input['password']; // Contraseña ingresada por el usuario

    // Consulta para obtener el hash de la contraseña almacenada en la base de datos
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica la contraseña usando SHA2 en lugar de password_verify
        $stored_password_hash = $user['password']; // El hash almacenado en la base de datos
        $password_hash = hash('sha256', $password); // Hashea la contraseña ingresada con SHA256

        if ($password_hash === $stored_password_hash) {
            // Si la contraseña coincide, crea el JWT
            $payload = [
                "iss" => "http://localhost",
                "aud" => "http://localhost",
                "iat" => time(),
                "exp" => time() + 3600,
                "user_id" => $user['id']
            ];
            $jwt = JWT::encode($payload, $secret_key, 'HS256');
            echo json_encode(["token" => $jwt]);
        } else {
            http_response_code(401);
            echo json_encode(["message" => "Invalid credentials."]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["message" => "User not found."]);
    }
}
?>
