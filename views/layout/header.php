<!Doctype Html>
<Html>
<link rel="stylesheet" href="<?php echo URL?>public/css/header.css">
<Head>
</Head>
<Body>
<header>
    <nav>
        <ul>
            <li>
                <a style="color: #111111" href="<?php echo URL . 'auth/logout' ?>">logout</a>
            </li>
            <?php if( $data['type']== USER){ ?>
                <li>
                    <a href="<?php echo URL . 'dashboard/index' ?>"> Home </a>
                </li>
                <li>
                    <a href="<?php echo URL . 'dashboard/add_ticket' ?>"> Creat Ticket </a>
                </li>
                <li>
                    <a href="<?php echo URL . 'dashboard/tickets'?>"> My Ticket </a>
                </li>
            <?php }else{ ?>
                <li>
                    <a href="<?php echo URL . 'dashboard/index' ?>"> Home </a>
                </li>
                <li>
                    <a href="<?php echo URL . 'dashboard/tickets'?>"> My Ticket </a>
                </li>
            <?php } ?>
            <p style="padding-left: 150px" ><?php echo $data['name']?></p>
        </ul>
    </nav>
</header>
</Body>
</Html>