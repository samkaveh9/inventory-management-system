<?php require_once(__DIR__.'/../common/head.php'); ?>
    <section class="body-main">      
<?php require_once(__DIR__.'/../common/sidebar.php'); ?>
        <section id="main-body" class="main-body">
        <?php if (strlen($data['message']) > 1) { ?>
                <div class="notice notice-info margin-top-three">
                    <strong><?= $data['message'] ?></strong>
                </div>
             <?php } ?>
            <section class="column">
                <section class="column-8 margin-width-auto">
                    <section class="main-body-main">
                        <section class="main-body-main-header">
                            <div class="display-flex justify-content-between">
                                <h5>ایجاد انبار</h5>
                                <a href="<?= ROOT_PATH.'repository' ?>" class="button button-sm button-black">انصراف</a>
                            </div>

                            <div class="box margin-top-four">
                                <div class="box-header">
                                    <strong>ایجاد انبار</strong>
                                </div>
                                <div class="box-body">
                                    <form action="<?= htmlentities($_SERVER['REQUEST_URI']) ?>" method="post">

                                          <label>نام انبار</label>
                                          <input type="text" class="input-main display-flex margin-auto" name="name" placeholder="نام انبار را وارد کنید">

                                          <label>موقعیت انبار</label>
                                          <input type="text" class="input-main display-flex margin-auto" name="location" placeholder="موقعیت انبار را وارد کنید">

                                        <button class="button button-sm button-blue" name="btn">ثبت</button>
                                    </form>
                                </div>
                            </div>

                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>