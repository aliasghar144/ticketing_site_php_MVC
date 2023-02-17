<!--<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">-->
<!--    <form action="--><?php //echo URL . 'dashboard/edit_one_question/' . $data['question_id']; ?><!--" method="post"-->
<!--        class="max-w-xl grid mx-auto bg-blueGray-200 p-5">-->
<!--        <div class="relative w-full my-4">-->
<!--            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="question_info">-->
<!--                سوال:-->
<!--            </label>-->
<!--            <textarea name="question_info" cols="30" rows="5" required-->
<!--                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"-->
<!--                placeholder="متن سوال را وارد کنید">--><?php //echo $data['question_info'] ?><!--</textarea>-->
<!--        </div>-->
<!--        <div class="relative w-full my-4">-->
<!--            <div>-->
<!--                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="grade">نمره سوال: </label>-->
<!--                <input type="text" name="grade" required value="--><?php //echo $data['grade'] ?><!--" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm-->
<!--                    shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />-->
<!--            </div>-->
<!--        </div>-->
<!--        --><?php //if ($data['type'] === 0) { ?>
<!--            <div class="relative w-full my-4">-->
<!--                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="option_descriptive">-->
<!--                    پاسخ سوال تشریحی-->
<!--                </label>-->
<!--                <textarea name="option_descriptive" cols="30" rows="10"-->
<!--                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"-->
<!--                    placeholder="پاسخ سوال را وارد کنید">--><?php //echo $data['options_list'][0]['info'] ?><!--</textarea>-->
<!--                <input type="hidden" value="--><?php //echo $data['correct_option_id']; ?><!--" name="option_id_descriptive">-->
<!--            </div>-->
<!--            --><?php //} else if ($data['type'] === 1) { ?>
<!--            --><?php //foreach ($data['options_list'] as $option) { ?>
<!--                <div class="relative w-full my-2">-->
<!--                    <label class="block text-blueGray-600 text-xs font-bold mb-2">-->
<!--                        گزینه:-->
<!--                    </label>-->
<!--                    <textarea name="option_multi[--><?php //echo $option['option_id']; ?><!--]" cols="30" rows="5"-->
<!--                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"-->
<!--                        placeholder="پاسخ سوال را وارد کنید">--><?php //echo $option['info'] ?><!--</textarea>-->
<!--                    --><?php //if ($data['correct_option_id'] === $option['option_id']) { ?>
<!--                        <label class="inline-flex items-center cursor-pointer mt-3"><input type="radio" name="check_correct_option"-->
<!--                                value="--><?php //echo $option['option_id'] ?><!--"-->
<!--                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"-->
<!--                                checked /><span class="ml-2 text-sm font-semibold text-blueGray-600">این گزینه درست-->
<!--                                است</span></label>-->
<!--                        --><?php //} else { ?>
<!--                        <label class="inline-flex items-center cursor-pointer mt-3"><input type="radio" name="check_correct_option"-->
<!--                                value="--><?php //echo $option['option_id'] ?><!--"-->
<!--                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span-->
<!--                                class="ml-2 text-sm font-semibold text-blueGray-600">این گزینه درست است</span></label>-->
<!--                        --><?php //} ?>
<!--                </div>-->
<!--                --><?php //} ?>
<!--            --><?php //} ?>
<!--        <input type="hidden" name="type" value="--><?php //echo $data['type']; ?><!--">-->
<!--        <div class="text-center mt-2">-->
<!--            <button-->
<!--                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"-->
<!--                type="submit">-->
<!--                ویرایش سوال-->
<!--            </button>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!---->
<!---->

<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact form</title>
    <style>
        html, body {
            min-height: 100%;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            margin: 0 0 20px;
            font-weight: 400;
            color: #1c87c9;
        }

        p {
            margin: 0 0 5px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #1c87c9;
        }

        form {
            padding: 25px;
            margin: 25px;
            box-shadow: 0 2px 5px #f5f5f5;
            background: #f5f5f5;
        }

        .fas {
            margin: 25px 10px 0;
            font-size: 72px;
            color: #fff;
        }

        .fa-envelope {
            transform: rotate(-20deg);
        }

        .fa-at, .fa-mail-bulk {
            transform: rotate(10deg);
        }

        input, textarea {
            width: calc(100% - 18px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #1c87c9;
            outline: none;
        }

        input::placeholder {
            color: #666;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #1c87c9;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }

        button:hover {
            background: #2371a0;
        }

        @media (min-width: 568px) {
            .main-block {
                flex-direction: row;
            }

            .left-part, form {
                width: 50%;
            }

            .fa-envelope {
                margin-top: 0;
                margin-left: 20%;
            }

            .fa-at {
                margin-top: -10%;
                margin-left: 65%;
            }

            .fa-mail-bulk {
                margin-top: 2%;
                margin-left: 28%;
            }
        }
    </style>
</head>
<body>

<div class="main-block">
    <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
    </div>
    <form action="<?php echo URL . 'dashboard/reply_one_ticket/'.$data['ticket_id']; ?>" method="post">
        <h1>Answer to ticket</h1>
        <div class="info">
            <h3>user problem is:</h3>
            <p><?php echo $data['message'] ?></p>
            <br>
        </div>
        <br>
        <br>
        <p>your answer:</p>
        <div>
            <textarea name="reply" rows="4"></textarea>
        </div>
        <p>set new status</p>
        <input type="text" name="status">
        <button type="submit">Answer</button>
    </form>
</div>
</body>
</html>
</html>