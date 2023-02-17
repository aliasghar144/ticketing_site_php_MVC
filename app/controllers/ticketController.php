<?php

class ticketController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_ticket()
    {

        $tickets = $this->model('ticket');
        $result = $tickets->get_company();
        $userdata = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type']
        ];
        $this->header('header', $userdata);
        $this->view('dashboard/addTicketView', $result);
    }

    //my edit
    public function add_one_ticket()
    {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        $tickets = $this->model('ticket');
        $result = $tickets->get_company();
        foreach ($result as $item) {
            if ($item['id'] == $company) {
                $companyid = $item['company_id'];
            }
        }
        // add ticket
        $result = $tickets->insert_ticket($_SESSION['id'], $companyid, $subject, $message);
    }

    //my edit
    public function show_tickets()
    {

        $ticket = $this->model("ticket");
        $result = $ticket->get_all_tickets($_SESSION['id']);

        if ($result['status'] === 1) {
            $ticket_ids = [];
            $ticket_info = [];
//            $options_info = [];
            foreach ($result['result'] as $item) {
                if (!in_array($item['ticket_id'], $ticket_ids)) {
                    array_push($ticket_ids, $item['ticket_id']);
                    array_push($ticket_info, ['id' => $item['ticket_id'], 'subject' => $item['subject'], 'message' => $item['message'], 'status' => $item['status'], 'company_id' => $item['company_id'], 'reply' => $item['reply']]);
                }
            }

            $data = [
                'ticket_id' => $ticket_ids,
                'ticket_info' => $ticket_info,
            ];
        } else {
            $data = [
                'questions_id' => [],
                'questions_info' => [],
            ];
        }
        $userdata = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type']
        ];
        $this->header('header', $userdata);
        $this->view('dashboard/ticketsView', $data);
    }


    public function answer_ticket(int $ticket_id): void
    {
        $ticket = $this->model('ticket');
        $ticket = $ticket->get_ticket_byID($ticket_id)[0];
        $data = [
            'ticket_id' => $ticket['ticket_id'],
            'user_id' => $ticket['user_id'],
            'company_id' => $ticket['company_id'],
            'subject' => $ticket['subject'],
            'message' => $ticket['message'],
            'status' => $ticket['status'],
        ];

        $userdata = [
            'name' => $_SESSION['name'],
            'type' => $_SESSION['type']
        ];

        $this->header('header', $userdata);
        $this->view('dashboard/editTicketView', $data);
//        $this->footer('footer');
    }


    public function reply_one_ticket(int $ticket_id)
    {
        $ticket_reply = filter_var($_POST['reply'], FILTER_SANITIZE_STRING);
        $ticket_status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
        $ticket = $this->model('ticket');
        $status1 = $ticket->reply_ticket($ticket_reply, $ticket_status,$ticket_id);
        if ($status1) {
            // show success message
            echo "success";
            header('Location: ' . URL . 'dashboard/index');
        } else {
            // show error and problem
            echo "error";
            header('Location: ' . URL . 'dashboard/reply_one_ticket/' . $ticket_id);
        }
    }

    public function delete_ticket(int $ticket_id): void
    {

        $question = $this->model('ticket');
        $status = $question->delete_ticket($ticket_id);

        if ($status) {
            // show success message
            header('Location: ' . URL . 'dashboard/tickets');
        } else {
            // show failed message
            header('Location: ' . URL . 'dashboard/tickets');
        }
    }

}