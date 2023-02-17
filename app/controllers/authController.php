<?php

class authController extends Controller
{
    public function __construct()
    {
    }


    public function check_user(): string
    {
        if ($_POST['type'] === USER)
            return USER;
        if ($_POST['type'] === COMPANY)
            return COMPANY;
        return 'ERROR';
    }


    public function save_user_session(string $name, int $id): void
    {
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['type'] = $this->check_user();
    }


    public function userregister(): void
    {
        $this->view('auth/userRegisterView');
    }


    public function companyregister(): void
    {
        $this->view('auth/companyRegisterView');
    }

    public function register_user(): void
    {
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
        $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $duplicate_password = filter_var($_POST['duplicate_password'], FILTER_SANITIZE_STRING);

        $person = $this->model($this->check_user());
        $status = $person->isPersonExists($this->check_user(), $email, $password)['status'];
        if ($status === 1) {
            echo "User is exist";
        } else {
            $status = $person->insertPerson($this->check_user(), $fullname, $mobile, $email, $password);
            if ($status) {
                if ($_POST['type'] == COMPANY) {
                    header('Location: '. URL .'auth/companylogin');
                }
                header('Location: ' . URL . 'auth/userlogin');
            } else {
                echo "we have problem";
            }
        }
    }

    public function userlogin(): void
    {
//        $this->header('header');
        // $this->navbar('navbar');
        $this->view('auth/userloginView');
//        $this->footer('footer');
    }

    public function companylogin(): void
    {
//        $this->header('header');
        // $this->navbar('navbar');
        $this->view('auth/companyLoginView');
//        $this->footer('footer');
    }

    public function login_user(): void
    {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $person = $this->model($this->check_user());
        $result = $person->isPersonExists($this->check_user(), $email, $password);
        if ($result['status'] === 1) {
            $status = $result['status'];
            $name = $result['result']['name'];
            $id = $result['result']["{$this->check_user()}_id"];
        }
        if ($status === 1) {
            $this->save_user_session($name, $id);
            header('Location: ' . URL . 'dashboard/index');
            exit;
        } else {
            // echo "login failed";
            // flash message
            if ($_POST['type'] === COMPANY) {
                header('Location: ' . URL . 'auth/companylogin');
            }
            header('Location: ' . URL . 'auth/userlogin');
        }
    }

    public function logout()
    {
        session_destroy();
        session_start();
        header('Location:' . URL . 'auth/userlogin');
        exit();
    }
}