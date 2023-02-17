<!Doctype Html>
<Html>
<!--<link rel="stylesheet" href="--><?php //echo URL ?><!--public/css/header.css">-->
<link rel="stylesheet" href="<?php echo URL ?>public/css/ticket.css">
<Head>
</Head>
<Body>
<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست تیکت
        های
        شما</h1>
</div>
<?php if (count($data['ticket_id']) > 0) { ?>
    <?php
    foreach ($data['ticket_info'] as $item) {
        ?>
        <form action="<?php echo URL . 'dashboard/answer_ticket/' . $item['id']; ?>">
            <div class="row">
                <div class="column" style="background-color:#aaa; padding-left:15px;border-radius: 12px">
                    <h1>Subject: <?php echo $item['subject']; ?></h1>
                    <h4>Message: <br></h4>
                    <p><?php echo $item['message']; ?></p>
                    <?php if ($_SESSION['type'] == COMPANY) { ?>
                        <div>

                            <button type="submit">Answer</button>

                            <a class="delete_ticket"
                               id="delete_question_btn"
                               href="<?php echo URL . 'dashboard/delete_ticket/' . $item['id'] ?>">حذف</a>
                        </div>
                        <br>
                        <br>
                    <?php } else { ?>
                        <a class="delete_ticket"
                           id="delete_question_btn"
                           href="<?php echo URL . 'dashboard/delete_ticket/' . $item['id'] ?>">حذف</a>
                        <h4 style="color: #1c1c1c;">company answer:</h4>
                        <?php if (!empty($item['reply'])) { ?>
                            <p><?php echo $item['reply'] ?></p>
                        <?php } else { ?>
                            <p>فعلا جوابی ندارین</p>
                        <?php } ?>
                        <p style="color: #e1a70a"><?php echo $item['status']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </form>
    <?php } ?>
<?php } else { ?>
    <div class="grid justify-center items-center">
        <h3
                class="block text-right text-blueGray-600 text-base text-center my-4 transition-all duration-300 cursor-pointer p-4">
            شما تاکنون تیکتی ارسال نکرده اید.</h3>
        <a href="<?php echo URL . 'dashboard/add_ticket' ?>" class=" bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow
                            hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150
                            text-center">افزودن
            تیکت جدید</a>
    </div>
<?php } ?>
</Body>
</Html>




