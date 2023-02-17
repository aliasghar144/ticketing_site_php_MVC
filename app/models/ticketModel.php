<?php

class ticketModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    //my edit
    public function insert_ticket($user_id , $company_id , $subject , $message): string
    {
        $query = "INSERT INTO tickets (user_id,company_id,subject,message) VALUES (?,?,?,?)";
        $data = [
            ['type' => 'i', 'value' => $user_id],
            ['type' => 'i', 'value' => $company_id],
            ['type' => 's', 'value' => $subject],
            ['type' => 's', 'value' => $message],
        ];
        $status = $this->exeQuery($query, $data, false);
        if ($status){
            header('Location: ' . URL . 'dashboard/index');
        } else {
            header('Location: ' . URL . 'dashboard/index');
        }
    }


    public function get_all_tickets(int $user_id): array
    {
        if ($_SESSION['type'] === USER){
            $query = "SELECT * FROM tickets WHERE user_id = ? ";
        }else{
            $query = "SELECT * FROM tickets WHERE company_id = ? ";

        }

        $data = [
            ['type' => 'i', 'value' => $user_id],
        ];
        $result = $this->exeQuery($query, $data, true);
        $tickets = [];
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                array_push($tickets, $result->fetch_assoc());
            }
            return ['status' => 1, 'result' => $tickets];
        } else {
            return ['status' => 0, 'result' => 'Error'];
        }
    }

    public function get_ticket_byID(int $question_id): array
    {
        $query = "SELECT * FROM tickets WHERE ticket_id = ?";

        $data = [
            ['type' => 'i', 'value' => $question_id],
        ];

        return $this->exeQuery($query, $data, true)->fetch_all($mode = MYSQLI_ASSOC);

    }

    public function update_question(int $question_id, int $option_id, string $question_info, float $grade): bool
    {
        $query = "UPDATE question SET q_info=?, grade=?, question.option_id=? WHERE question.question_id=?";

        $data = [
            ['type' => 's', 'value' => $question_info],
            ['type' => 'd', 'value' => $grade],
            ['type' => 'i', 'value' => $option_id],
            ['type' => 'i', 'value' => $question_id],
        ];

        return $this->exeQuery($query, $data, false);
    }


    public function reply_ticket( string $reply, $status,int $ticket_id): bool
    {
        $query = "UPDATE tickets SET reply=?, status=? WHERE tickets.ticket_id=?";
        $data = [
            ['type' => 's', 'value' => $reply],
            ['type' => 's', 'value' => $status],
            ['type' => 'i', 'value' => $ticket_id],
        ];
        return $this->exeQuery($query, $data, false);
    }

    //my edite
    public function get_company(){
        $conn = new mysqli('localhost', 'root', '', 'ticketing');
        $query = "SELECT name,company_id FROM company";
        $prepare = $this->connection->prepare($query);
        $prepare->execute();
        $result = $prepare->get_result();
        $result = $result->fetch_all();
        $data = [];
        foreach ($result as $item){
            array_push($data ,['id'=>$item[0],'company_id'=>$item[1]]);
        }
        return $data;
    }

}