<?php

class personModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertPerson(string $person, string $fullname, string $mobile, string $email, string $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $access_token = bin2hex(openssl_random_pseudo_bytes(16));

        $query = "INSERT INTO $person (name,mobile,email,password,access_token)
         VALUES (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $fullname],
            ['type' => 's', 'value' => $mobile],
            ['type' => 's', 'value' => $email],
            ['type' => 's', 'value' => $password_hash],
            ['type' => 's', 'value' => $access_token],
        ];
        return $this->exeQuery($query, $data, false);
    }

    public function isPersonExists(string $person, string $email, string $password): array
    {
        $query = "SELECT * FROM $person WHERE email=? LIMIT 0,1";
        $data = [
            ['type' => 's', 'value' => $email]
        ];
        $result = $this->exeQuery($query, $data, true);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return ['status' => 1, 'result' => $user];
            } else {
                return ['status' => 0, 'result' => 'password was wrong.'];
            }
        } else {
            return ['status' => 0, 'result' => "$person does not exist."];
        }
    }
}