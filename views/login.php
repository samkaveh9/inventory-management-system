<div class="main ">
    <div class="column">
        <div class="column-8 margin-width-auto">
            <?php if (strlen($data['error']) > 1) { ?>
                <div class="notice notice-blue margin-top-three">
                    <strong><?= $data['error'] ?></strong>
                </div>
             <?php } ?>

            <div class="box text-center margin-top-three">
                <div class="box-header">
                    ورود
                </div>
                <div class="box-body">
                    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="form-signin">
                        <h6 class="margin-bottom-three font-weight-normal">برای ورود اطلاعات خود را وارد کنید</h6>
                        <label class="margin-top-four">نام</label>
                        <input type="text" name="name" class="input-main margin-height-four display-flex margin-auto margin-top-three" placeholder="نام خود را وارد کنید" required autofocus>
                       
                        <label for="inputEmail" class="margin-top-four">ایمیل</label>
                        <input type="email" name="email" id="inputEmail" class="input-main margin-height-four display-flex margin-auto margin-top-three" placeholder="ایمیل خود را وارد کنید" required autofocus>
                       
                        <label for="inputPassword">کلمه عبور</label>
                        <input type="password" name="password" id="inputPassword" class="input-main margin-height-four display-flex margin-auto" placeholder="کلمه عبور خود را وارد کنید" required>
                       
                        <div class="margin-top-three">
                         <button class="button button-sm button-blue display-block margin-auto" name="btn" type="submit">ورود</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>