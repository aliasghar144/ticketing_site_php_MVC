<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact form</title>
    <link rel="stylesheet" href="<?php echo URL ?>public/css/form.css">

</head>
<body>

<div class="main-block">
    <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
    </div>
    <form action="<?php echo URL . 'dashboard/add_one_ticket' ?>" method="post">
        <h1>Send Ticket</h1>
        <div class="info">
            <br>
            <input class="fname" type="text" name="subject" placeholder="Subject">
            <label for="cars">Choose a company:</label>
            <select name="company" id="company">
                <?php
                foreach ($data as $company) {
                    ?>
                    <option name="company_name" value="<?php echo $company['id'] ?>"><?php echo $company['id']?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <br>
        <p>Message</p>
        <div>
            <textarea name="message" rows="4"></textarea>
        </div>
        <input name="user_id" type="text" value="<?php echo $_SESSION['id']?>" hidden>
        <button type="submit">Send Ticket</button>
    </form>
</div>
</body>
</html>
</html>